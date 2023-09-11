<?php

namespace App\Console\Commands;

use App\Models\Income;
use App\Services\ParsingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IncomeParsCommand extends Command
{
    private string $host;
    private string $port;
    private string $key;

    public function __construct()
    {
        @parent::__construct();
        $this->host = env('WP_HOST', 'not_found_host');
        $this->port = env('WP_PORT', 'not_found_port');
        $this->key = env('WP_KEY', 'not_found_key');
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pars:incomes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing all incomes values';

    /**
     * Execute the console command.
     */
    public function handle(ParsingService $service)
    {
        $url = "$this->host:$this->port/api/incomes?";
        $query = http_build_query([
            'key' => $this->key,
            'dateFrom' => '2000-01-01',
            'dateTo' => '2030-01-01',
            'limit' => 500,
        ]);

        while ($service->currentPage <= $service->lastPage) {
            $response = $service->get($url, $query);
            if ($response->status() !== 200) break;

            $data = $service->getData($response);

//            DB::transaction(function () use ($data) {
//                Income::insert($data->toArray());
//            });
            DB::transaction(function () use ($data) {
                $data->each(function ($income) {
                    Income::create($income);
                });
            });

            unset($data, $response, $chunk);
            $memoryUsage = memory_get_usage();
            $memoryUsageInMB = round($memoryUsage / 1024 / 1024, 2);
            dump("CURRENT:  $service->currentPage LAST: $service->lastPage", 'memory: ' . $memoryUsageInMB);
            $service->currentPage++;
        }
    }
}

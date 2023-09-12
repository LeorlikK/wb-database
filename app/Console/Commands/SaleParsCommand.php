<?php

namespace App\Console\Commands;

use App\Models\Sale;
use App\Models\Stock;
use App\Services\ParsingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class SaleParsCommand extends Command
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
    protected $signature = 'pars:sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing all sales values';

    /**
     * Execute the console command.
     */
    public function handle(ParsingService $service)
    {
        $url = "$this->host:$this->port/api/sales?";
        $query = http_build_query([
            'key' => $this->key,
            'dateFrom' => '2000-01-01',
            'dateTo' => '2030-01-01',
            'limit' => 500,
        ]);

        $start = now();
        $memoryUsageInMB = 0;
        while ($service->currentPage <= $service->lastPage) {
            $response = $service->get($url, $query);
            if ($response->status() !== 200) {
                if ($response->status() === 429) {
                    $this->error(now() . " SALES: response 'Too many requests'");
                    $service->sleepIfTooManyRequests(300, 'sales');
                } else {
                    break;
                }
            }

            $data = $service->getData($response);

//            DB::transaction(function () use ($data) {
//                Sale::insert($data->toArray());
//            });
            DB::transaction(function () use ($data) {
                $data->each(function ($income) {
                    Sale::create($income);
                });
            });

            unset($data, $response, $chunk);
            $memoryUsage = memory_get_usage();
            $memoryUsageInMB = round($memoryUsage / 1024 / 1024, 2);
            $service->currentPage++;
        }

        $this->info($service->printInfo($start, $memoryUsageInMB, 'SALES'));
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Income;
use App\Models\Stock;
use App\Services\ParsingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class StockParsCommand extends Command
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
    protected $signature = 'pars:stocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing all stocks values';

    /**
     * Execute the console command.
     */
    public function handle(ParsingService $service)
    {
        $url = "$this->host:$this->port/api/sales?";
        $query = http_build_query([
            'key' => $this->key,
            'dateFrom' => now()->format('Y:m:d'),
            'limit' => 250,
        ]);

        while ($service->currentPage <= $service->lastPage){
            $response = $service->get($url, $query);
//            $response->close();
            if ($response->status() !== 200) break;

            $data = $service->getData($response);
            $response->close();

            $data->lazy()->each(function ($stock){
                DB::transaction(function () use($stock) {
                    Stock::create($stock);
                });
            });

            unset($data, $response, $chunk);
            $memoryUsage = memory_get_usage();
            $memoryUsageInMB = round($memoryUsage / 1024 / 1024, 2);
            dump('parsing page: ' . $service->currentPage, 'memory: ' . $memoryUsageInMB);
            $service->currentPage++;
        }
    }
}

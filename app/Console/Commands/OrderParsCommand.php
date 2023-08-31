<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\ParsingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class OrderParsCommand extends Command
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
    protected $signature = 'pars:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing all orders values';

    /**
     * Execute the console command.
     */
    public function handle(ParsingService $service)
    {
        $url = "$this->host:$this->port/api/orders?";
        $query = http_build_query([
            'key' => $this->key,
            'dateFrom' => '2000-01-01',
            'dateTo' => '2030-01-01',
            'limit' => 500,
        ]);

        while ($service->currentPage <= $service->lastPage){
            $response = $service->get($url, $query);
            if ($response->status() !== 200) break;

            $data = $service->getData($response);
            $data->chunk(500)->each(function ($chunk){
                DB::transaction(function () use($chunk) {
                    $chunk->each(function ($income){
                        Order::create($income);
                    });
                });
            });

            dump('parsing page: ' . $service->currentPage);
            $service->currentPage++;
        }
    }
}

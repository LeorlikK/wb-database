<?php

namespace App\Console\Commands;

use App\Services\Api\ApiTrait;
use App\Services\Api\ParsingServiceAbstract;
use Illuminate\Console\Command;

class StockParsCommand extends Command
{
    use ApiTrait;

    private string $table = 'stocks';
    private string $host;
    private string $port;
    private string $key;

    public function __construct()
    {
        @parent::__construct();
        $this->host = config('parsing.host');
        $this->port = config('parsing.port');
        $this->key = config('parsing.key');
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
    public function handle(ParsingServiceAbstract $service)
    {
        $url = "$this->host:$this->port/api/stocks?";
        $query = http_build_query([
            'key' => $this->key,
            'dateFrom' => now()->subHours(12)->format('Y-m-d'),
            'limit' => 500,
        ]);

        $this->parsingWhileCircle($service, $url, $query);
    }
}

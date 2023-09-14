<?php

namespace App\Console\Commands;

use App\Services\Api\ApiTrait;
use App\Services\Api\ParsingServiceAbstract;
use Illuminate\Console\Command;

class IncomeParsCommand extends Command
{
    use ApiTrait;

    private string $table = 'incomes';
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
    public function handle(ParsingServiceAbstract $service)
    {
        $url = "$this->host:$this->port/api/incomes?";
        $query = http_build_query([
            'key' => $this->key,
            'dateFrom' => '2000-01-01',
            'dateTo' => '2030-01-01',
            'limit' => 500,
        ]);

        $this->parsingWhileCircle($service, $url, $query);
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\ApiService;
use App\Services\Api\ParsingServiceAbstract;
use Illuminate\Console\Command;

class StockParsCommand extends Command
{
    private string $tableName = 'stocks';
    private string $host;
    private string $port;

    public function __construct()
    {
        @parent::__construct();
        $this->host = config('parsing.host');
        $this->port = config('parsing.port');
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
    public function handle()
    {
        $account = Account::first();
        $apiService = ApiService::first();
        $service = app()->makeWith(ParsingServiceAbstract::class,
            [
                'apiService' => $apiService,
                'account' => $account
            ]
        );

        $url = "$this->host:$this->port/api/stocks?";
        $query = http_build_query([
//            'dateFrom' => now()->subHours(12)->format('Y-m-d'),
            'dateFrom' => now()->format('Y-m-d'),
            'limit' => 500,
        ]);

        if ($service->token) {
            $service->parsing($url, $query, $this->tableName);
        } else {
            $this->error(now() . " Account $account->login don't have token for ApiService $apiService->name");
        }
    }
}

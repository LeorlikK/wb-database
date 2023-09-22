<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\ApiService;
use App\Services\Api\CommandAccountService;
use App\Services\Api\ParsingServiceAbstract;
use Illuminate\Console\Command;

class StockParsCommand extends Command
{
    private string $tableName = 'stocks {--account}';
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
    protected $signature = 'pars:stocks {accountId?} {serviceId?} {--account}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing all stocks values';

    /**
     * Execute the console command.
     */
    public function handle(CommandAccountService $commandAccountService)
    {
        [$account, $apiService] = $commandAccountService->choiceAccountAndService($this);

        $service = app()->makeWith(ParsingServiceAbstract::class,
            [
                'apiService' => $apiService,
                'account' => $account
            ]
        );

        $url = "$this->host:$this->port/api/stocks?";
        $query = http_build_query([
            'dateFrom' => now()->subDay()->format('Y-m-d'),
            'limit' => 500,
        ]);

        if ($service->account && $service->apiService) {
            if ($service->token) {
                $service->parsing($url, $query, $this->tableName);
            } else {
                $this->error(now() . " Account $account->login don't have token for ApiService $apiService->name");
            }
        } else {
            $this->error(now() . " Could not find account or service");
        }
    }
}

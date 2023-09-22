<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\ApiService;
use App\Services\Api\CommandAccountService;
use App\Services\Api\ParsingServiceAbstract;
use Illuminate\Console\Command;

class RunAllCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pars:all {accountId?} {serviceId?} {--account}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run parsing all commands';

    /**
     * Execute the console command.
     */
    public function handle(CommandAccountService $commandAccountService)
    {
        [$account, $apiService] = $commandAccountService->choiceAccountAndService($this);
        $data = ['accountId' => $account?->id, 'serviceId' => $apiService?->id];

        $this->info(now() . " Start parsing...");
        $this->call(IncomeParsCommand::class, $data);
        $this->call(OrderParsCommand::class, $data);
        $this->call(SaleParsCommand::class, $data);
        $this->call(StockParsCommand::class, $data);
        $this->info(now() . " Finished parsing");
    }
}

<?php

namespace App\Services\Api;

use App\Models\Account;
use App\Models\ApiService;
use Illuminate\Console\Command;

class CommandAccountService
{
    public function choiceAccountAndService(Command $command): array
    {
        if ($command->option('account')) {
            $accountsArray = Account::all()->pluck('login', 'id')->toArray();
            $accountName = $command->choice('Choice account', $accountsArray);
            $account = Account::find(array_search($accountName, $accountsArray));

            $apiServicesArray = ApiService::all()->pluck('name', 'id')->toArray();
            $apiServiceName = $command->choice('Choice api service', $apiServicesArray);
            $apiService = ApiService::find(array_search($apiServiceName, $apiServicesArray));
        } elseif ($command->arguments()['accountId'] && $command->arguments()['serviceId']) {
            $account = Account::find($command->arguments()['accountId']);
            $apiService = ApiService::find($command->arguments()['serviceId']);
        } elseif ($accountId = config('parsing.account') && $serviceId = config('parsing.service')) {
            $account = Account::find($accountId);
            $apiService = ApiService::find($serviceId);
        } else {
            $account = Account::first();
            $apiService = ApiService::first();
        }

        return [$account, $apiService];
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\ApiService;
use App\Models\Token;
use App\Models\TokenType;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

class CreateTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new token(account_id, token_type_id, api_service_id)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $accountsArray = Account::all()->pluck('login', 'id')->toArray();
        $tokenTypesArray = TokenType::all()->pluck('name', 'id')->toArray();

        $accountLogin = $this->choice('Choice account_id', $accountsArray);
        $tokenTypeName = $this->choice('Choice token_type_id', $tokenTypesArray);
        $token = $this->ask('Input token');

        try {
            Token::create([
                'account_id' => array_search($accountLogin, $accountsArray),
                'token_type_id' => array_search($tokenTypeName, $tokenTypesArray),
                'token' => $token
            ]);
            $this->info("Token created");
        }catch (QueryException $e) {
            $this->error("Error creating token: " . $e->getMessage());
        }catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}

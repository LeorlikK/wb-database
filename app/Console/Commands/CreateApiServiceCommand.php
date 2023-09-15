<?php

namespace App\Console\Commands;

use App\Models\ApiService;
use App\Models\TokenType;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

class CreateApiServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:api_service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new api service(account_id, token_type_id, api_service_id)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tokenTypeArray = TokenType::all()->pluck('name', 'id')->toArray();

        $tokenTypeName = $this->choice('Choice token type', $tokenTypeArray);
        $name = $this->ask('Input api service name');

        try {
            ApiService::create([
                'name' => $name,
                'token_types_id' => array_search($tokenTypeName, $tokenTypeArray)
            ]);
            $this->info("Api service created: $name ");
        } catch (QueryException $e) {
            $this->error("Error creating api service: " . $e->getMessage());
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}

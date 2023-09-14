<?php

namespace App\Console\Commands;

use App\Models\TokenType;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

class CreateTokenTypeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:token_type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new token_type(name)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Input token type name');

        try {
            TokenType::create([
                'name' => $name
            ]);
            $this->info("Token type created: $name");
        } catch (QueryException $e) {
            $this->error("Error creating token type: " . $e->getMessage());
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}

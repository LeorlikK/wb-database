<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

class CreateCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'create:company {name}';
    protected $signature = 'create:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new company(name)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Input company name');

        try {
            Company::create([
                'name' => $name
            ]);
            $this->info("Company created: $name");
        } catch (QueryException $e) {
            $this->error("Error creating company: " . $e->getMessage());
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}

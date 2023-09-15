<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\Office;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

class CreateOfficeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:office';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new office(company_id, name)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $companyArray = Company::all()->pluck('name', 'id')->toArray();

        $companyName = $this->choice('Choice company_id', $companyArray);
        $officeName = $this->ask('Input office name');

        try {
            Office::create([
                'company_id' => array_search($companyName, $companyArray),
                'name' => $officeName
            ]);
            $this->info("Office created: $officeName");
        } catch (QueryException $e) {
            $this->error("Error creating office: " . $e->getMessage());
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}

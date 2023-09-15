<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\ApiService;
use App\Models\Company;
use App\Models\Office;
use App\Models\Token;
use App\Models\TokenType;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $company = Company::factory(1)->create(['name' => 'FirstCompany'])->first();


        $office = Office::factory(1)->create(['company_id' => $company->id, 'name' => 'FirstOffice'])->first();

        $accountOne = Account::factory(1)->create(['office_id' => $office->id, 'login' => 'leorlik_one'])->first();
        $accountTwo = Account::factory(1)->create(['office_id' => $office->id, 'login' => 'leorlik_two'])->first();

        $tokenType = TokenType::factory(3)->create();

        ApiService::factory(1)->create(
            [
                'name' => 'ApiServiceOne',
                'token_types_id' => $tokenType->first()->id
            ]
        )->first();
        ApiService::factory(1)->create(
            [
                'name' => 'ApiServiceTwo',
                'token_types_id' => $tokenType->first()->id
            ]
        )->first();

        $tokenType->each(function ($type) use ($accountOne) {
            Token::factory(1)->create([
                'account_id' => $accountOne->id,
                'token_type_id' => $type->id,
            ]);
        });

        $tokenType->each(function ($type) use ($accountTwo) {
            Token::factory(1)->create([
                'account_id' => $accountTwo->id,
                'token_type_id' => $type->id,
            ]);
        });
    }
}
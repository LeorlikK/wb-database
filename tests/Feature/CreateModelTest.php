<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Account;
use App\Models\ApiService;
use App\Models\Company;
use App\Models\Office;
use App\Models\Token;
use App\Models\TokenType;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class CreateModelTest extends TestCase
{
    use LazilyRefreshDatabase;
    /**
     * A basic test example.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TestSeeder::class);
    }

    public function test_create_models(): void
    {
        $company = Company::first();
        $this->assertDatabaseCount('companies', 1);
        $this->assertCount(1, $company->offices);
        $this->assertInstanceOf(Office::class, $company->offices->first());


        $office = Office::first();
        $this->assertDatabaseCount('offices', 1);
        $this->assertCount(2, $office->accounts);
        $this->assertInstanceOf(Company::class, $office->company);
        $this->assertInstanceOf(Account::class, $office->accounts->first());

        $account = Account::first();
        $this->assertDatabaseCount('accounts', 2);
        $this->assertCount(6, $account->tokens);
        $this->assertInstanceOf(Office::class, $account->office);
        $this->assertInstanceOf(Token::class, $account->tokens->first());


        $tokenType = TokenType::first();
        $this->assertDatabaseCount('token_types', 3);
        $this->assertCount(2, $tokenType->tokens);
        $this->assertInstanceOf(Token::class, $tokenType->tokens->first());


        $apiService = ApiService::first();
        $this->assertCount(3, $apiService->tokens);
        $this->assertInstanceOf(Token::class, $apiService->tokens->first());

        $this->assertDatabaseCount('api_services', 2);

        $token = Token::first();
        $this->assertDatabaseCount('tokens', 6);
        $this->assertInstanceOf(Account::class, $token->account);
        $this->assertInstanceOf(TokenType::class, $token->type);
        $this->assertInstanceOf(ApiService::class, $token->apiService);
    }
}

<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Account;
use App\Models\ApiService;
use App\Models\Token;
use App\Services\Api\ParsingServiceAbstract;
use App\Services\Api\ParsingServiceFirst;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TestSeeder::class);
    }

    /**
     * A basic test example.
     */
    public function test_di_for_api_service(): void
    {
        $apiServices = ApiService::all();
        $accounts = Account::all();
        $tokens = Token::all();

        $host = env('WP_HOST', 'not_found_host');
        $port = env('WP_PORT', 'not_found_port');
        $key = env('WP_KEY', 'not_found_key');
        $url = "$host:$port/api/incomes?";
        $query = http_build_query([
            'key' => $key,
            'dateFrom' => '2000-01-01',
            'dateTo' => '2030-01-01',
            'limit' => 500,
        ]);

        $apiParsingService = app()->make(ParsingServiceAbstract::class);
        $this->assertInstanceOf(ParsingServiceFirst::class, $apiParsingService);
        $this->assertObjectHasProperty('apiService', $apiParsingService);
        $response = $apiParsingService->get($accounts->first(), $url, $query);
        $this->assertEquals(200, $response->status());
        $data = $apiParsingService->getData($accounts->first(), $response);
        $this->assertCount(500, $data);
    }

    public function test_change_token_and_account()
    {
        $apiService = ApiService::first();
        $service = app()->makeWith(ParsingServiceFirst::class, ['apiService' => $apiService]);
        $this->assertObjectHasProperty('apiService', $service);
        $this->assertObjectHasProperty('currentAccount', $service);
        $this->assertObjectHasProperty('token', $service);

        $hasNewToken = $service->choiceOrChangeTokenAndAccount();
        $this->assertEquals(1, $service->token->id);
        $this->assertEquals(1, $service->currentAccount->id);
        $this->assertTrue($hasNewToken);

        $hasNewToken = $service->choiceOrChangeTokenAndAccount($service->token->id);
        $this->assertEquals(1, $service->token->id);
        $this->assertEquals(1, $service->currentAccount->id);
        $this->assertFalse($hasNewToken);

        $hasNewToken = $service->choiceOrChangeTokenAndAccount($service->token->id);
        $this->assertEquals(1, $service->token->id);
        $this->assertEquals(1, $service->currentAccount->id);
        $this->assertFalse($hasNewToken);
    }
}

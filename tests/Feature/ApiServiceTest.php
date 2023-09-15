<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Account;
use App\Models\ApiService;
use App\Models\Token;
use App\Services\Api\ParsingServiceAbstract;
use App\Services\Api\ParsingServiceCircle;
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

        $service = app()->makeWith(ParsingServiceAbstract::class,
            [
                'apiService' => $apiServices->first(),
                'account' => $accounts->first()
            ]
        );
        $this->assertInstanceOf(ParsingServiceCircle::class, $service);
        $this->assertObjectHasProperty('apiService', $service);
        $this->assertObjectHasProperty('account', $service);
        $response = $service->get($url, $query, 'incomes');
        $this->assertEquals(200, $response->status());
        $data = $service->getData($response);
        $this->assertCount(500, $data);
    }
}

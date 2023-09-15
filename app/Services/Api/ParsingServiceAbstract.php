<?php

namespace App\Services\Api;

use App\Models\Account;
use App\Models\ApiService;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

abstract class ParsingServiceAbstract
{
    /**
     * Токен для get запроса.
     */
    public ?string $token = null;
    public ?string $tokenTypeApiService = null;

    public function __construct(public ApiService $apiService, public Account $account)
    {
        $this->tokenTypeApiService = $apiService->tokenType?->name;
        $this->token = Token::query()
            ->tokenForThisAccountApiService($apiService, $account)
            ->first()
            ?->token;
    }

    abstract public function parsing(string $url, string $query, string $tableName): void;

    public function get(string $url, string $query, ?string $page=null): Response
    {
        $page = $page ?? 1;
        $query .= "&page=$page";

        switch ($this->tokenTypeApiService) {
            case 'bearer':
                return Http::withHeaders(['Authorization' => 'Bearer ' . $this->token])->get($url . $query);
            case 'key':
                $query .= "&key=$this->token";
                return Http::get($url . $query);
            default:
                return Http::get($url . $query);
        }
    }

    public function getData(Response $response): Collection
    {
        return $response->collect('data')->map(function ($item) {
            $item['account_id'] = $this->account->id;
            return $item;
        });
    }

    public function getLastPage(Response $response): int
    {
        return $response->collect('meta')['last_page'];
    }

    public function sleepIfTooManyRequests(int $timeSleep, string $commandName): void
    {
        dump(now() . " {$commandName}: go to sleep => $timeSleep seconds");
        for ($i = $timeSleep; $i > 0; $i--) {
            sleep(1);
        }
        dump(now() . " {$commandName}: exit from sleep");
    }

    public function printInfo(Carbon $start, string $memory, string $name, string $lastPage): string
    {
        $finish = now();
        $diff = $finish->diff($start);
        $formatDiff = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);

        return now() . " $name => page: $lastPage; time: $formatDiff; memory: $memory";
    }
}

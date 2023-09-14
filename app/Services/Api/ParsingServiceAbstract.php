<?php

namespace App\Services\Api;

use App\Models\Account;
use App\Models\ApiService;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

abstract class ParsingServiceAbstract
{
    public int $currentPage = 1;
    public int $lastPage = 10;
    public ?Token $token = null;
    public ?Account $currentAccount = null;
    protected ApiService $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    abstract public function get(string $url, string $query);

    abstract public function getData(Response $response);

    protected function getTokenThisAccountAndService(Collection $tokens, string $name): ?Token
    {
        return $tokens->filter(function ($token) use ($name) {
            return $token->type->name === $name;
        })->first();
    }

    /**
     * Находит токены данного apiService с опредленным type.
     * Если id отсутствует в аргументах, то установит первый подходящий, если id передан,
     * то установит токен, идущий следом за текущим bи вернет true.
     * Если токен не обнаружен, то вновь установит первый и вернет false.
     */
    public function choiceOrChangeTokenAndAccount(int $tokenId = null): bool
    {
        $tokenCollection = $this->apiService->tokens()->moreThanCurrentId($tokenId)->get();
        $this->token = $this->getTokenThisAccountAndService($tokenCollection, $this->tokenType);
        $this->currentAccount = $this->token?->account;
        if (!$this->token) {
            $this->token = $this->getTokenThisAccountAndService($this->apiService->tokens, $this->tokenType);
            $this->currentAccount = $this->token?->account;
            return false;
        }

        return true;
    }

    public function sleepIfTooManyRequests(int $timeSleep, string $commandName): void
    {
        for ($i = $timeSleep; $i > 0; $i--) {
            sleep(1);
        }
    }

    public function printInfo(Carbon $start, string $memory, string $name): string
    {
        $finish = now();
        $diff = $finish->diff($start);
        $formatDiff = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);

        return now() . " $name => page: $this->lastPage; time: $formatDiff; memory: $memory";
    }
}

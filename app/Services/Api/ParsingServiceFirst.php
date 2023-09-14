<?php

namespace App\Services\Api;

use App\Models\ApiService;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ParsingServiceFirst extends ParsingServiceAbstract
{
    public string $tokenType = 'bearer';

    public function __construct(ApiService $apiService)
    {
        parent::__construct($apiService);
    }

    public function get(string $url, string $query): Response
    {
        /**
         * Токен должен будет подставляться в запрос.
         */
//        $this->token;

        $query .= "&page=$this->currentPage";

        return Http::get($url . $query);
    }

    public function getData(Response $response): Collection
    {
        $responseCollect = $response->collect();
        $meta = $responseCollect->get('meta');
        $this->lastPage = $meta['last_page'];

        return $response->collect('data')->map(function ($item) {
            $item['account_id'] = $this->currentAccount->id;
            return $item;
        });
    }
}

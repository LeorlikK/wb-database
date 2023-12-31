<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ParsingService
{
    public int $currentPage = 1;
    public int $lastPage = 10;

    public function get(string $url, string $query): Response
    {
        $query .= "&page=$this->currentPage";

        return Http::get($url . $query);
    }

    public function getData(Response $response):Collection
    {
        $responseCollect = $response->collect();
        $meta = $responseCollect->get('meta');
        $this->lastPage = $meta['last_page'];

        return $response->collect('data');
    }
}

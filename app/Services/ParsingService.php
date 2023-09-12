<?php

namespace App\Services;

use Carbon\Carbon;
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

    public function sleepIfTooManyRequests(int $timeSleep, string $commandName): void
    {
        for ($i = $timeSleep; $i > 0; $i--) {
            sleep(1);
            dump("$commandName: time left to sleep $i");
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

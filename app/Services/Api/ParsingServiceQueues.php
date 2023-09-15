<?php

namespace App\Services\Api;

use App\Jobs\ParsingJob;

class ParsingServiceQueues extends ParsingServiceAbstract
{
    public function parsing(
        string $url,
        string $query,
        string $tableName,
    ): void
    {
        $response = $this->get($url, $query);
        $lastPage= $this->getLastPage($response);

        for ($page = 1; $page <= $lastPage; $page++) {
            ParsingJob::dispatch($this, $url, $query, $tableName, $page)->onQueue('parsing');
        }
    }
}

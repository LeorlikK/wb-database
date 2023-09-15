<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\DB;

class ParsingServiceCircle extends ParsingServiceAbstract
{
    public function parsing(
        string $url,
        string $query,
        string $tableName,
    ): void
    {
        $start = now();
        $memoryUsageInMB = 0;
        $upperTableName = strtoupper($tableName);

        $currentPage = 1;
        $lastPage = 100;

        while ($currentPage <= $lastPage) {
            $response = $this->get($url, $query, $currentPage);
            if ($response->status() !== 200) {
                if ($response->status() === 429) {
                    dump(now() . " {$upperTableName}: response 'Too many requests'");
                    $this->sleepIfTooManyRequests(300, $upperTableName);
                    continue;
                } else {
                    dump(now() . " {$upperTableName}: failed with status code {$response->status()}");
                    break;
                }
            }

            $lastPage = $this->getLastPage($response);
            $data = $this->getData($response);

//            DB::transaction(function () use ($data, $tableName) {
//                DB::table($tableName)->insert($data->toArray());
//            });
            DB::transaction(function () use ($data, $tableName) {
                $data->each(function ($income) use ($tableName) {
                    DB::table($tableName)->insert($income);
                });
            });

            unset($data, $response, $chunk);
            $memoryUsage = memory_get_usage();
            $memoryUsageInMB = round($memoryUsage / 1024 / 1024, 2);
            $currentPage++;
        }

        dump($this->printInfo($start, $memoryUsageInMB, $upperTableName, $lastPage));
    }
}

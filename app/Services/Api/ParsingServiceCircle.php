<?php

namespace App\Services\Api;

use App\Models\Cron;
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
        $lastPage = 1000;
        $status = true;

        while ($currentPage <= $lastPage) {
            $response = $this->get($url, $query, $currentPage);
            if ($response->status() !== 200) {
                if ($response->status() === 429) {
                    dump(now() . " {$upperTableName}: response 'Too many requests'");
                    $this->sleepIfTooManyRequests(300, $upperTableName);
                    continue;
                } else {
                    dump(now() . " {$upperTableName}: failed with status code {$response->status()}");
                    $status = false;
                    $lastPage = $lastPage === 1000 || $currentPage === 1 ? 0 : $lastPage;
                    break;
                }
            }

            $lastPage = $this->getLastPage($response);
            $data = $this->getData($response);

            DB::transaction(function () use ($data, $tableName) {
                DB::table($tableName)->insert($data->toArray());
            });
//            DB::transaction(function () use ($data, $tableName) {
//                $data->each(function ($income) use ($tableName) {
//                    DB::table($tableName)->insert($income);
//                });
//            });

//            unset($data, $response, $chunk);
            gc_collect_cycles();
            $memoryUsage = memory_get_usage();
            $memoryUsageInMB = round($memoryUsage / 1024 / 1024, 2);
            $currentPage++;
            /**
             * Быстрее ждать одну секунду, чем получать 429 и ждать 300 сек.
             */
            sleep(1);
        }

        dump($this->printInfo($start, $memoryUsageInMB, $upperTableName, $lastPage));
        Cron::create([
            'table_name' => $tableName,
            'status' => $status,
        ]);
    }
}

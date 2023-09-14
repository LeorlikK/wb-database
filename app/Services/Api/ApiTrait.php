<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\DB;

trait ApiTrait
{
    public function parsingWhileCircle(ParsingServiceAbstract $service, string $url, string $query): void
    {
        $start = now();
        $memoryUsageInMB = 0;
        $upperTableName = strtoupper($this->table);

        $service->choiceOrChangeTokenAndAccount();

        while ($service->currentPage <= $service->lastPage) {
            $response = $service->get($url, $query);
            if ($response->status() !== 200) {
                if ($response->status() === 429) {
                    $this->error(now() . " {$upperTableName}: response 'Too many requests'");
                    /**
                     * При статусе ответа 429 ищет и назначает следующий токен.
                     * Если токенов больше нет, то вновь устанавливает первый токен и отправляется ждать N кол-во времени.
                     */
                    $tokenNotLast = $service->choiceOrChangeTokenAndAccount($service->token);
                    if (!$tokenNotLast) {
                        $service->sleepIfTooManyRequests(300, 'incomes');
                    }
                    continue;
                } else {
                    $this->error(now() . " {$upperTableName}: failed with status code {$response->status()}");
                    break;
                }
            }

            $data = $service->getData($response);

            /**
             * Отправляет один запрос, вместо N обращений, но почему-то вызывает утечку памяти.
             */
////            DB::transaction(function () use ($data) {
////                Income::insert($data->toArray());
////            });

            DB::transaction(function () use ($data) {
                $data->each(function ($income) {
//                    Income::create($income);
                    DB::table($this->table)->insert($income);
                });
            });

            unset($data, $response, $chunk);
            $memoryUsage = memory_get_usage();
            $memoryUsageInMB = round($memoryUsage / 1024 / 1024, 2);
            $service->currentPage++;
        }

        $this->info($service->printInfo($start, $memoryUsageInMB, $upperTableName));
    }
}

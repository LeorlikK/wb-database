<?php

namespace App\Jobs;

use App\Services\Api\ParsingServiceAbstract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 5;
    /**
     * Create a new job instance.
     */
    public function __construct
    (
        private ParsingServiceAbstract $service,
        private string                 $url,
        private string                 $query,
        private string                 $tableName,
        private int                    $page,
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = $this->service->get($this->url, $this->query, $this->page);
        if ($response->status() !== 200) {
            if ($response->status() === 429) {
                $this->release(300);
            }
        }

        $data = $this->service->getData($response);

        DB::transaction(function () use ($data) {
            $data->each(function ($income) {
                DB::table($this->tableName)->insert($income);
            });
        });
    }
}

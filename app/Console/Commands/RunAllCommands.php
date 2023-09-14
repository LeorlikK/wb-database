<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunAllCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pars:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run parsing all commands';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info(now() . " Start parsing...");
        $this->call(IncomeParsCommand::class);
        $this->call(OrderParsCommand::class);
        $this->call(SaleParsCommand::class);
        $this->call(StockParsCommand::class);
        $this->info(now() . " Finished parsing");
    }
}

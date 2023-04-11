<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class getDbName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:get_db_name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to get current database name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $db = DB::connection()->getDatabaseName();
        $this -> info("current db is $db");
    }
}

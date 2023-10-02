<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class InitializeProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:initialize-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute de server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = config('database.connections.mysql.database');

        // if (!DB::statement("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'")) {
        //     DB::statement("CREATE DATABASE $databaseName");
        //     $this->info("Database '$databaseName' successfully created.");
        // }
        DB::statement("CREATE DATABASE IF NOT EXISTS '$databaseName'");
        $this->info("Database '$databaseName' successfully created.");

        Artisan::call('migrate');
        Artisan::call('db:seed CityTableSeeder');
        $this->info('Tables created and data added!');
    }
}

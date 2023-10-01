<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Barranquilla'],
            ['name' => 'Neiva'],
            ['name' => 'Bogotá'],
            ['name' => 'Medellín'],
            ['name' => 'Soledad'],
            ['name' => 'Montería'],
            ['name' => 'Barranquilla'],
            ['name' => 'Riohacha'],
            ['name' => 'Quibdó']
        ];

        DB::table('cities')->insert($cities);
    }
}

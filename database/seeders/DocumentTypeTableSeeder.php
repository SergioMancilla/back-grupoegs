<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_types = [
            ['document_type' => 'CC'],
            ['document_type' => 'CE'],
            ['document_type' => 'TI'],
            ['document_type' => 'NIT']
        ];

        DB::table('document_types')->insert($id_types);
    }
}

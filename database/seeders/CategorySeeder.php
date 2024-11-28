<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories') -> insert([
            'Platform' => 'Console'
        ]);

        DB::table('categories') -> insert([
            'Platform' => 'PC'
        ]);

        DB::table('categories') -> insert([
            'Platform' => 'Mobile'
        ]);

        DB::table('categories') -> insert([
            'Platform' => 'Other'
        ]);
    }



}

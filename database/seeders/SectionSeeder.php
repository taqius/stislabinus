<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_section')->insert([
            'section' => 'Admin',
        ]);
        DB::table('user_section')->insert([
            'section' => 'User',
        ]);
    }
}

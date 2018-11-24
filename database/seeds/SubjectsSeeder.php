<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert(['name'=> 'English']);
        DB::table('subjects')->insert(['name'=> 'Mathematics']);
        DB::table('subjects')->insert(['name'=> 'Science']);
        DB::table('subjects')->insert(['name'=> 'Social Studies']);
        DB::table('subjects')->insert(['name'=> 'Swahili']);
    }
}

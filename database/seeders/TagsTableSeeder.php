<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [ 'name' => 'fantasy'],
            [ 'name' => 'surrealism'],
            [ 'name' => 'realism'],
            [ 'name' => 'abstract'],
            [ 'name' => 'figurative'],
            [ 'name' => 'renaissance'],
            [ 'name' => 'expresionnism'],
        ]);
    }
}

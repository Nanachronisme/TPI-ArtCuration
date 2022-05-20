<?php
/**
 * Auteur: Larissa De Barros
 * Date: 19.05.2022
 * Description: Creates all the constants necessary for the inner working of the App
 */

namespace Database\Seeders;

use App\Models\TimePeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [ 'name' => 'Traditional Painting'],
            [ 'name' => 'Digital Painting'],
            [ 'name' => 'Traditional Sculpture' ],
            [ 'name' => 'Digital Sculpture' ],
            [ 'name' => 'Installation' ],
            [ 'name' => 'Other' ]
        ]);

        DB::table('time_periods')->insert([
            [ 'name' => '2000-Now'],
            [ 'name' => '1900-1999'],
            [ 'name' => '1800-1899'],
            [ 'name' => '1700-1799'],
            [ 'name' => '1600-1699'],
        ]);

        DB::table('mediums')->insert([
            [ 'name' => 'Acrylics'],
            [ 'name' => 'Oil'],
            [ 'name' => 'Digital'],
        ]);

        DB::table('countries')->insert([
            ['name' => 'Afghanistan'],

            ['name' => 'Åland Islands'],

            ['name' => 'Albania'],

            ['name' => 'Algeria'],

            ['name' => 'American Samoa'],

            ['name' => 'Andorra'],

            ['name' => 'Angola'],
        ]);

    }
}

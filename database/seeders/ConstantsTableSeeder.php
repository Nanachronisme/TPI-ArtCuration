<?php
/**
 * Author: Larissa De Barros
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
            [ 'period' => '2000-Now'],
            [ 'period' => '1900-1999'],
            [ 'period' => '1800-1899'],
            [ 'period' => '1700-1799'],
            [ 'period' => '1600-1699'],
            [ 'period' => '1500-1599'],
            [ 'period' => '1400-1499'],
            [ 'period' => '1300-1399'],
            [ 'period' => '1200-1299'],
            [ 'period' => '1100-1199'],
            [ 'period' => '1000-1099'],
            [ 'period' => '500-999'],
            [ 'period' => '0-499'],
            [ 'period' => '500BC-0'],
            [ 'period' => '8000BC-499BC'],
            [ 'period' => 'FarPast-8000BC'],
        ]);

        //medium names were mostly taken from wikiart
        DB::table('mediums')->insert([
            [ 'name' => 'Digital'],
            [ 'name' => 'Oil'],
            [ 'name' => 'Pastel'],
            [ 'name' => 'Acrylics'],
            [ 'name' => 'Watercolor'],
            [ 'name' => 'Charcoal'],
            [ 'name' => 'Graphite'],
            [ 'name' => 'Colored Markers'],
            [ 'name' => 'Mixed Media'],
            [ 'name' => 'Paper'],
            [ 'name' => 'Photography'],
            [ 'name' => 'Tempera'],
            [ 'name' => 'Fresco'],
            [ 'name' => 'Wax'],
            [ 'name' => 'Encaustic'],
            [ 'name' => 'Pencil'],
            [ 'name' => 'Gold'],
            [ 'name' => 'Bronze'],
            [ 'name' => 'Clay'],
            [ 'name' => 'Wood'],
            [ 'name' => 'Porcelain'],
        ]);

        DB::table('countries')->insert([
            ['name' => 'Afghanistan'],
            ['name' => 'Åland Islands'],
            ['name' => 'Albania'],
            ['name' => 'Algeria'],
            ['name' => 'American Samoa'],
            ['name' => 'Andorra'],
            ['name' => 'Angola'], 
            ['name' => 'China'],  
            ['name' => 'Japan'],  
            ['name' => 'South Korea'],
            ['name' => 'Taiwan'],
            ['name' => 'Thailand'],
            ['name' => 'United States'],  
            ['name' => 'France'],  
            ['name' => 'Italy'],
            ['name' => 'Spain'],
            ['name' => 'Switzerland'],
            ['name' => 'Austria'],
            ['name' => 'The United Kingdom of Great Britain and Northern Ireland'],
            ['name' => 'Mexico'],
            ['name' => 'Germany'],
            ['name' => 'Canada'],
            ['name' => 'Czech Republic'],
            ['name' => 'Denmark'],
            ['name' => 'Russia'],
            ['name' => 'Poland'],
            ['name' => 'Greece'],
            ['name' => 'Egypt'],
        ]);

    }
}

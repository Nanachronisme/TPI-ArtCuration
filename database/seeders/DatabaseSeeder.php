<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Country;
use App\Models\Tag;
use App\Models\TimePeriod;
use Database\Factories\ArtistTimePeriodFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Instantiate all the constants required for the application running
        $this->call(ConstantsTableSeeder::class);

        //Insertion of informations in pivot Tables, better solutions might exist but I did not find them yet. 
        //I did not find another suitable way to do so
        Artist::factory(10)->create()->each(function ($artist){
            DB::table('artist_time_period')->insert([
                'time_period_id' => TimePeriod::pluck('id')->random() ,
                'artist_id' => $artist->id
            ]);
            DB::table('artist_country')->insert([
                'country_id' => Country::pluck('id')->random() ,
                'artist_id' => $artist->id
            ]);
        });

        Artwork::factory(60)->create();
        Tag::factory(30)->create();

        //Artist::factory()->hasTimePeriods(1,)->create();



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

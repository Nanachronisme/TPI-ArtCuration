<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Country;
use App\Models\Tag;
use App\Models\TimePeriod;
use Illuminate\Database\Seeder;

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
        //verify if timePeriod is empty, so it won't run constants classes twice
        if(!TimePeriod::exists())
        {
            $this->call(ConstantsTableSeeder::class);
        }
        
        Tag::factory(30)->create();

        //Insertion of informations in pivot Tables, better solutions might exist but I did not find them yet. 
        //I did not find another suitable way to do so
        Artist::factory(10)->create()->each(function (Artist $artist){
            //many to many relationships can only be defined afterthe artist
            $artist->timePeriods()->sync( TimePeriod::pluck('id')->random());
            $artist->countries()->sync( Country::pluck('id')->random());
            $artist->tags()->sync( Tag::pluck('id')->random(5));
        });

        Artwork::factory(60)->create();

    }
}

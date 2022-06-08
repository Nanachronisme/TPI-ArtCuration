<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Country;
use App\Models\Medium;
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
        //Data that should only be inserted once
        if(!TimePeriod::exists())
        {
            $this->call(UsersTableSeeder::class);
            $this->call(ConstantsTableSeeder::class);
            $this->call(TagsTableSeeder::class);
        }
        if(!Artist::exists())
        {
            $this->call(FirstArtistsSeeder::class);
            $this->call(FirstArtworksSeeder::class);
        }
        Tag::factory(30)->create();
        
        Artist::factory(30)->create()->each(function ($artist){
            //many to many relationships can only be defined after the artist
            $artist->timePeriods()->sync( TimePeriod::pluck('id')->random());
            $artist->countries()->sync( Country::pluck('id')->random());
            $artist->tags()->sync( Tag::pluck('id')->random(5));
        });

        Artwork::factory(20)->create()->each(function ($artwork){
            //chooses a random timePeriod from the author's available timePeriods
            $artwork->timePeriod()->associate(TimePeriod::find(
                Artist::find($artwork->artist_id)->timePeriods
                    ->pluck('id')
                    ->random()
            ));
            $artwork->mediums()->sync( Medium::pluck('id')->random(2));
            $artwork->tags()->sync( Tag::pluck('id')->random(5));
            $artwork->save(); //save makes sure associate methods are stored
        }); 
        
    }
}

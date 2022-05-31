<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Country;
use App\Models\Medium;
use App\Models\Tag;
use App\Models\TimePeriod;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirstArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = Artist::Create([
            'artist_name' => 'Andrew Wyeth',
            'original_name' => 'Andrew Newell Wyeth',
            'birth_date' => 'July 12, 1917',
            'death_date' => 'January 16, 2009',
            'description' => 'Andrew Newell Wyeth was an American visual artist, primarily a realist painter, working predominantly in a regionalist style. He was one of the best-known U.S. artists of the middle 20th century.
            Source: https://en.wikipedia.org/wiki/Andrew_Wyeth ',
            'website1' => 'https://andrewwyeth.com/'
        ]);

        $artist->timePeriods()->sync([1,2]); 
        $artist->countries()->sync(Country::where('name', 'USA')->first()->id);

        $artwork = Artwork::create([
            'title' => 'Christina\'s World',
            'original_title' => 'Christina\'s World',
            'creation_date' => '1948',
            'dimensions' => '81.9 cm × 121.3 cm (32+1⁄4 in × 47+3⁄4 in)[',
            'description' => "Christina's World is a 1948 painting by American painter Andrew Wyeth and one of the best-known American paintings of the mid-20th century. It is a tempera work done in a realist style, depicting a woman semi-reclining on the ground in a treeless, mostly tawny field, looking up at a gray house on the horizon; a barn and various other small outbuildings are adjacent to the house.",
            'source_link' => 'https://www.moma.org/collection/works/78455',
            'copyright' => 'Copyrighted Material',
            'image_path' => 'andrew-wyeth-christinas-world-395x265.jpg',
            'type_id' => Type::where('name', 'Traditional Painting')->first()->id,
            'artist_id' => $artist->id,
            'time_period_id' => 2,
        ]);
        $artwork->mediums()->sync( Medium::where('name', 'Tempera')->first()->id);
        $artwork->tags()->sync( Tag::where('name', 'realism')->first()->id);


    }
}

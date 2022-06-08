<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Creates the first artworks for the first artists created
 */
namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Medium;
use App\Models\Tag;
use App\Models\TimePeriod;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstArtworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //Andrew Wyeth Artwork
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
                'artist_id' => Artist::first()->id,
                'time_period_id' => 2,
            ]);
            $artwork->mediums()->sync( Medium::where('name', 'Tempera')->first()->id);
            $artwork->tags()->firstOrCreate(['name' =>'realism']);
    
            //unknown artist artwork
            $artwork = Artwork::create([
                'title' => 'The Angel With Golden Hair',
                'original_title' => 'Ангел Златые власы, Angel Zlatye Vlasy',
                'creation_date' => 'c. 1200',
                'dimensions' => '48.8 cm × 39 cm (19.2 in × 15 in)',
                'description' => "The Angel with Golden Hair (Russian: Ангел Златые власы, Angel Zlatye Vlasy) is a tempera icon by an unknown Russian artist, painted in the second half of the 12th century. It is displayed in the Russian Museum in Saint Petersburg.
                Source:https://en.wikipedia.org/wiki/The_Angel_with_Golden_Hair",
                'source_link' => 'https://www.moma.org/collection/works/78455',
                'copyright' => 'Public Domain',
                'image_path' => 'Goldenlocks.jpg',
                'type_id' => Type::where('name', 'Traditional Painting')->first()->id,
                'artist_id' => Artist::where('artist_name', 'Unknown Author')->first()->id,
                'time_period_id' => TimePeriod::where('period', '1200-1299')->first()->id
            ]);
            $artwork->mediums()->sync( Medium::where('name', 'Tempera')->first()->id, Medium::where('name', 'Wood')->first()->id);
            $artwork->tags()->firstOrCreate(['name' => 'icon']);
        
    }
}

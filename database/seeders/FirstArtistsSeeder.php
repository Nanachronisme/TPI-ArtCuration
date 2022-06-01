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

class FirstArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = collect([
            //0
            [
                'artist_name' => 'Andrew Wyeth',
                'original_name' => 'Andrew Newell Wyeth',
                'birth_date' => 'July 12, 1917',
                'death_date' => 'January 16, 2009',
                'description' => 'Andrew Newell Wyeth was an American visual artist, primarily a realist painter, working predominantly in a regionalist style. He was one of the best-known U.S. artists of the middle 20th century.
                Source: https://en.wikipedia.org/wiki/Andrew_Wyeth ',
                'website1' => 'https://andrewwyeth.com/'
            ], //1
            [
                'artist_name' => 'Pablo Picasso',
                'original_name' => 'Pablo Diego José Francisco de Paula Juan Nepomuceno María de los Remedios Cipriano de la Santísima Trinidad Ruiz y Picasso',
                'birth_date' => 'October 25, 1881',
                'death_date' => 'April 8, 1973',
                'description' => "Pablo Ruiz Picasso (25 October 1881 – 8 April 1973) was a Spanish painter, sculptor, printmaker, ceramicist and theatre designer who spent most of his adult life in France. Regarded as one of the most influential artists of the 20th century, he is known for co-founding the Cubist movement, the invention of constructed sculpture, the co-invention of collage, and for the wide variety of styles that he helped develop and explore. Among his most famous works are the proto-Cubist Les Demoiselles d'Avignon (1907), and Guernica (1937), a dramatic portrayal of the bombing of Guernica by German and Italian air forces during the Spanish Civil War. 
                Source: https://en.wikipedia.org/wiki/Pablo_Picasso",
            ], //2
            [
                'artist_name' => 'Salvador Dali',
                'original_name' => 'Salvador Domingo Felipe Jacinto Dalí i Domènech, Marquess of Dalí of Púbol',
                'birth_date' => '11 May 1904',
                'death_date' => '23 January 1989',
                'description' => 'Salvador Domingo Felipe Jacinto Dalí i Domènech, Marquess of Dalí of Púbol 11 May 1904 – 23 January 1989) was a Spanish surrealist artist renowned for his technical skill, precise draftsmanship, and the striking and bizarre images in his work. 
                Source: https://en.wikipedia.org/wiki/Salvador_Dal%C3%AD '
            ], //3
            [
                'artist_name' => 'James Jean',
                'birth_date' => '1979',
                'description' => 'James Jean is a Taiwanese-American visual artist working primarily in painting and drawing. He lives and works in Los Angeles, where he moved from New York in 2003.
                Source: https://en.wikipedia.org/wiki/James_Jean',
                'website1' => 'http://www.jamesjean.com/'
            ], //4
            [
                'artist_name' => 'Gekidan Inu Curry',
                'description' => "Gekidan Inu Curry (Japanese: 劇団イヌカレー, Hepburn: Gekidan Inu Karē, \"Theatrical Company Dog Curry\"), stylized as gekidan INU CURRY, is an animation troupe consisting of ex-Gainax animator Ayumi Shiraishi (白石 亜由美, Shiraishi Ayumi) under the name 2-Shiroinu (2白犬, \"2-White Dog\") and ex-TANTO 2D painter Yōsuke Anai (穴井 洋輔, Anai Yōsuke) under the name Doroinu (泥犬, \"Muddy Dog\"). They are known for their production design works in the Puella Magi Madoka Magica series, as well as creating the ending credits sequence for Maria Holic and Usagi Drop. They also regularly contribute illustrations to Maaya Sakamoto's Manpukuron column in Newtype Magazine. Doroinu directed and wrote the Magia Record: Puella Magi Madoka Magica Side Story anime, which began airing in January 2020.
                Source: https://en.wikipedia.org/wiki/Gekidan_Inu_Curry",
            ], //5
            [
                'artist_name' => 'Wu Daozi',
                'original_name' => '吳道子',
                'birth_date' => ' c.680',
                'death_date' => ' c.760',
                'description' => "Wu Daozi (680–c. 760), also known as Daoxuan, was a Chinese artist of the Tang Dynasty. Michael Sullivan considers him one of \"the masters of the seventh century,\" Some of his works survive; many, mostly murals, have been lost.
                Wu traveled widely and created murals in Buddhist and Daoist temples. Wu also drew mountains, rivers, flowers, birds. No authentic originals are extant, though some exist in later copies or stone carvings. Wu's famous painting of Confucius was preserved by having been copied in a stone engraving.
                https://en.wikipedia.org/wiki/Wu_Daozi",
            ], //6
            [
                'artist_name' => 'Unknown Author',
                'description' => "This entry is a placeholder for artworks without identified artists",
            ]
        ]);

        foreach($artists as $artist){
            Artist::create($artist);
        }        

        Artist::first()->timePeriods()->sync([1,2]); 
        Artist::first()->countries()->sync(Country::where('name', 'United States')->first()->id);
        Artist::first()->tags()->firstOrCreate( ['name' => 'realism']) ;      
        //dd(Artist::first());
        
        Artist::all()->skip(1)->first()->timePeriods()->sync([2]); 
        Artist::all()->skip(1)->first()->countries()->sync(Country::where('name', 'Italy')->first()->id);
        Artist::all()->skip(1)->first()->tags()->firstOrCreate( ['name' => 'cubism']) ;
        
        Artist::all()->skip(2)->first()->timePeriods()->sync([2]); 
        Artist::all()->skip(2)->first()->countries()->sync(Country::where('name', 'Spain')->first()->id);
        Artist::all()->skip(2)->first()->tags()->firstOrCreate( ['name' => 'surrealism']) ;
        

        Artist::all()->skip(3)->first()->timePeriods()->sync([1]); 
        Artist::all()->skip(3)->first()->countries()->sync(Country::where('name', 'United States')->first()->id, Country::where('name', 'Taiwan')->first()->id );
        Artist::all()->skip(3)->first()->tags()->firstOrCreate( ['name' => 'comics'], ['name' => 'fantasy'], ['name' => 'surrealism']) ;
        

        Artist::all()->skip(4)->first()->timePeriods()->sync([1]); 
        Artist::all()->skip(4)->first()->countries()->sync(Country::where('name', 'Japan')->first()->id);
        Artist::all()->skip(4)->first()->tags()->firstOrCreate( ['name' => 'russian animation'], ['name' => 'animation'], ['name' => 'anime']) ;
        
        Artist::all()->skip(5)->first()->timePeriods()->sync([]); 
        Artist::all()->skip(5)->first()->countries()->sync(Country::where('name', 'China')->first()->id);
        Artist::all()->skip(5)->first()->tags()->firstOrCreate( ['name' => 'Tang Dynasty']) ;
        
        foreach( TimePeriod::all()->pluck('id') as $timePeriod)
        {
            Artist::all()->skip(6)->first()->timePeriods()->attach($timePeriod); 
        }
        //add all default countries
        foreach( Country::all()->pluck('id') as $country)
        {
            Artist::all()->skip(6)->first()->countries()->attach($country); 
        }

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
        $artwork->tags()->firstOrCreate([Tag::where('name', 'realism')->first()->id]);

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
        $artwork->mediums()->sync( [Medium::where('name', 'Tempera')->first()->id, Medium::where('name', 'Wood')->first()->id] );
        $artwork->tags()->firstOrCreate([Tag::where('name', 'icon')->first()->id]);


    }
}

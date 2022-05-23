<?php
/**
 * Auteur: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $artists = Artist::all();
        $artworks = Artwork::latest();
        $types = Type::all() ;
        $tags = Tag::all(); //trier par popularité :bSELECT Count('artist_id') ORDER BY COUNT('artist_id') DESC

        //dd(Artist::first()->timePeriods, Artist::first()->countries);
        //dd($artists->first()->artworks->first()->image_path);
        //dd( $artists->first()->timePeriods );

        return view('home', ['tags' => $tags, 'artists' => $artists, 'artworks' => $artworks, 'categories' => $types ]);
    }

    public function random()
    {
        //insert function to return random artist.
    }
}

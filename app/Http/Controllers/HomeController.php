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

        ;


        return view('home', ['tags' => $tags, 'artists' => $artists, 'artworks' => $artworks, 'categories' => $types ]);
    }
}

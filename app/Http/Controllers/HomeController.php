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
use App\Models\TimePeriod;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data = [
            'artists' => Artist::all(),
            'artworks' => Artwork::latest(),
            'categories' => Type::all(),
            'tags' => Tag::all() //trier par popularité :bSELECT Count('artist_id') ORDER BY COUNT('artist_id') DESC
        ];
        
        return view('home')->with($data);
    }

    public function random()
    {
        //insert function to return random artist.
    }
}

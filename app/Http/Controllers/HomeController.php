<?php
/**
 * Author: Larissa De Barros
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
    /**
     * Home Page
     *
     */
    public function index()
    {
        $data = [
            'artists' => Artist::latest()->limit(3)->get(),
            'artworks' => Artwork::latest()->limit(12)->get(),
            'categories' => Type::all(),
            'tags' => Tag::all(), //TODO Order by popularity :SELECT Count('artist_id') ORDER BY COUNT('artist_id') DESC
            'placeholder' => Artist::PLACEHOLDER //in case an artist has no artworks
        ];
        
        return view('home')->with($data);
    }

}

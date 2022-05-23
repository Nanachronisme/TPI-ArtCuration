<?php
/**
 * Auteur: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateArtistRequest;
use App\Models\Artist;
use App\Models\Country;
use App\Models\TimePeriod;
use App\Models\Type;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Redirects to the Artist Search page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('search.search-artists', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Type::all();
        $timePeriods = TimePeriod::all();
        $countries = Country::all();
        return view('admin.create-artist', ['categories' => $categories, 'timePeriods' => $timePeriods, 'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArtistRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        //the create method will automatically save the result
        //the slug will be automatically generated after creation of the asset
        $artist = Artist::create([
            'artist_name' => $request->input('artistName'),
            'original_name' => $request->input('originalName'),
            'birth_date' => $request->input('birthDate'),
            'death_date' => $request->input('deathDate'),
            'description' => $request->input('description'),
        ]);
        
        //dd($artist);
        
        return redirect('/artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('show-artist', $slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $artist = Artist::where("id", $slug)->firstOrFail();
        $data = [
            'artist' => $artist, //TODO change all to slugs after testing
            'countries' => Country::all(),
            'categories' => Type::all(),
            'timePeriods' => TimePeriod::all(),
        ];
        return view('admin.edit-artist')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(CreateArtistRequest $request, $slug)
    {
        // Retrieve the validated input data...
        $request->validated();

        $artist = Artist::where("id", $slug)->firstOrFail();

        //the slug will be automatically update because of the "onUpdate" config in sluggable/config.php
        $artist->update([
            'artist_name' => $request->input('artistName'),
            'original_name' => $request->input('originalName'),
            'birth_date' => $request->input('birthDate'),
            'death_date' => $request->input('deathDate'),
            'description' => $request->input('description'),
        ]);

        $artist->save();

        return redirect()->route('artists.show', $artist->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}

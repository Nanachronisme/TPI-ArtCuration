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
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'random', 'show');
    }
    
    /**
     * Redirects to the Artist Search page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //in case an artist has no artworks
        $placeholder = 'https://via.placeholder.com/900';

        //dd(Artist::first()->artworks->first()->image_path);
        return view('search.search-artists', [
            'artists' => Artist::latest()
                    ->filter(request(['search']))
                    ->paginate(12),
            'placeholder' => $placeholder
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Type::all(),
            'timePeriods' => TimePeriod::all(),
            'countries' => Country::all()
        ];
        return view('admin.create-artist')->with($data); //TODO uniformise the passing of data, with() or , $data)
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
        
        //foreign key requests should be done after a save so artist id is already created
        $artist->timePeriods()->attach($request->timePeriods); 
        $artist->countries()->attach($request->countries); 
        
        return redirect()->route('artists.show', $artist->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $artist = Artist::where('slug', $slug)->firstOrFail();  
        
        return view('show-artist')->with('artist', $artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = [
            'artist' => Artist::where("slug", $slug)->firstOrFail(), //TODO change all to slugs after testing
            'countries' => Country::all(),
            'categories' => Type::all(),
            'timePeriods' => TimePeriod::all(),
        ];

        //dd($artist->websites()->first());

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
        
        $artist = Artist::where("slug", $slug)->firstOrFail();
        
        $request->validated();
        //the slug will be automatically update because of the "onUpdate" config in sluggable/config.php
        $artist->update([
            'artist_name' => $request->input('artistName'),
            'original_name' => $request->input('originalName'),
            'birth_date' => $request->input('birthDate'),
            'death_date' => $request->input('deathDate'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            $artist->timePeriods()->sync([$request->timePeriods]),
            $artist->countries()->sync([$request->countries])
        ]);
        
        $artist->save(); //the save method is required to generate the new slug

        return redirect()->route('artists.show', $artist->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($artist)
    {
        $artist->delete();
        return redirect('/teachers');
    }
}

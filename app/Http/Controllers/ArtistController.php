<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Controls all logic related to Artists
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateArtistRequest;
use App\Models\Artist;
use App\Models\Country;
use App\Models\Tag;
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
       // dd(request());

        
       // $countries = DB::table('artist_country')->select('artist_id')->where('country_id', request(['country']));

        $data = [
            'artists' => Artist::latest()
                     //ease the processing of large datasets
                    ->filter(request(['search','timePeriod','country']))
                    ->paginate(12),
            'placeholder' => Artist::PLACEHOLDER,
            'timePeriods' => TimePeriod::all(),
            'countries' => Country::all(),
        ];
        //dd($data['artists']);
        
        return view('search.search-artists')->with($data);
        
    }

    /**
     * Redirects to a random artist
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $artist = Artist::all()->random();

        return redirect()->route('artists.show', $artist->slug);
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
        //$request->tags ? $artist->tags()->firstOrCreate( ['name' => $request->tags]) : ''
        $artist->timePeriods()->attach($request->timePeriods); 
        $artist->countries()->sync($request->countries ? [$request->countries] : []);
        $request->tags ? $artist->tags()->firstOrCreate( ['name' => $request->tags]) : '' ;

        
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
            'artist' => Artist::where("slug", $slug)->firstOrFail(),
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
    public function update(CreateArtistRequest $request, Artist $artist)
    {
                
        $request->validated();

        //the slug will be automatically updated because 
        //of the "onUpdate" config in sluggable/config.php
        $artist->update([
            'artist_name' => $request->input('artistName'),
            'original_name' => $request->input('originalName'),
            'birth_date' => $request->input('birthDate'),
            'death_date' => $request->input('deathDate'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            //TODO add possibility to assign new tags
            $request->tags ? $artist->tags()->firstOrCreate( ['name' => $request->tags]) : '' ,
            $artist->timePeriods()->sync([$request->timePeriods]),
            $artist->countries()->sync( $request->countries ? [$request->countries] : [])
        ]);
        //dd($request->originalName, $artist->original_name, $request->input('originalName'));

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
        $artist = Artist::where('slug', $slug)->firstOrFail();
        $artist->delete();
        return redirect()->route('home');
    }
}

<?php
/**
 * Auteur: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

//TODO add another param slug to function docs

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Medium;
use App\Models\Type;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search.search-artists', [
            'artists' => Artwork::latest()
                ->filter(request(['search']))
                ->paginate(10) 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($artistSlug)
    {
        $data = [
            'artist' => Artist::where('slug', $artistSlug)->firstOrFail(),
            'categories' => Type::all(),
            'mediums' => Medium::all()
        ];
        return view('admin.create-artwork')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($artistSlug, $artworkSlug)
    {
        $data = [
            'artwork' => Artwork::where('slug', $artworkSlug)->firstOrFail(),
            'artist' => Artist::where('slug', $artistSlug)->firstOrFail()
        ];
        //dd($data['artwork']);
        return view('show-artwork')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($artistSlug, $artworkSlug)  
    {
        $data = [
            'artist' => Artist::where("slug", $artistSlug)->firstOrFail(),
            'artwork' => Artwork::where("slug", $artworkSlug)->firstOrFail(),
            'categories' => Type::all(),
            'mediums' => Medium::all()
        ];
        //dd($data['artwork']);
        return view('admin.edit-artwork')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $artistSlug, $artworkSlug)
    {
        $artwork = Artwork::where("slug", $artworkSlug)->firstOrFail();
        
        $request->validated();
        //the slug will be automatically update because of the "onUpdate" config in sluggable/config.php
        $artwork->update([
            'title' => $request->input('artistName'),
            'original_title' => $request->input('originalName'),
            'creation_date' => $request->input('creationDate'),
            'dimensions' => $request->input('dimensions'),
            'description' => $request->input('description'),
            'source_link' => $request->input('sourceLink'),
            'image_path' => $request->input('imagePath'),
            $artwork->timePeriod()->associate([$request->timePeriods]),
            $artwork->tags()->sync([$request->tags])
        ]);
        
        $artwork->save(); //the save method is required to generate the new slug

        return redirect()->route('artists.artworks.show', $artistSlug, $artwork->slug);
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

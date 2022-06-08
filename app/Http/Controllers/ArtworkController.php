<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Controls all logic related to Artworks
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateArtworkRequest;
use App\Http\Requests\UpdateArtworkRequest;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Medium;
use App\Models\TimePeriod;
use App\Models\Type;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File as FacadesFile;

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
        $data = [
            'artworks' => Artwork::latest()
                    ->filter(request(['search', 'category', 'timePeriod', 'medium', 'order']))
                    ->paginate(16),
            'timePeriods' => TimePeriod::all(),
            'mediums' => Medium::all(),
            'categories' => Type::all(),
        ];
        
        return view('search.search-artworks', $data);
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
    public function store(CreateArtworkRequest $request, Artist $artist)
    {        
        $request->validated();   

        $imageName = $this->getArtworkFileName($request->image, $artist->slug, $request->title);
        //I do not know how to store a full image Path while having it display properly directly
        //only imageName will be stored for the time being, and the path will be created with
        //public path method etc...
        
        //the slug will be automatically updated because of the "onUpdate" config in sluggable/config.php
        $artwork = Artwork::create([
            'title' => $request->input('title'),
            'original_title' => $request->input('originaltitle'),
            'creation_date' => $request->input('creationDate'),
            'dimensions' => $request->input('dimensions'),
            'description' => $request->input('description'),
            'source_link' => $request->input('sourceLink'),
            'copyright' => $request->input('copyright'),
            'image_path' => $imageName,
            'type_id' => $request->input('category'),
            //using the associate function would be preferable but I do not know how to use it 
            //without errors for required fields
            'artist_id' => $artist->id,
            'time_period_id' => $request->timePeriod,
        ]);
        //nullable foreign key requests
        $artwork->mediums()->attach($request->mediums);
        $request->tags ? $artwork->tags()->firstOrCreate( ['name' => $request->tags]) : '' ;
        
        $request->image->move(public_path('artworks'), $imageName);

        return redirect()->route('artists.artworks.show', [$artist->slug, $artwork->slug]);
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
        //dd($data['artwork']->mediums->has(3), $data['artwork']->mediums->contains(3));
        return view('admin.edit-artwork')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtworkRequest $request, Artist $artist, Artwork $artwork)
    {
        $request->validated();
        
        //verify if new image file name is required
        $oldPath = $artwork->image_path;
        if(isset($request->image))
        {
            $newImageName = $this->getArtworkFileName($request->image, $artist->slug, $request->title);
        }
        else
        {
            $newImageName = $oldPath;
        }
        
        //dd(isset($request->tags));
        //the slug will be automatically updated because of the "onUpdate" config in sluggable/config.php
        $artwork->update([
            'title' => $request->input('title'),
            'original_title' => $request->input('originalTitle'),
            'creation_date' => $request->input('creationDate'),
            'dimensions' => $request->input('dimensions'),
            'description' => $request->input('description'),
            'source_link' => $request->input('sourceLink'),
            'image_path' => $newImageName,
            'copyright' => $request->input('copyright'),
            $artwork->timePeriod()->associate($request->timePeriod),
            $artwork->mediums()->sync( $request->mediums ?? [] ),
            $request->tags ? $artwork->tags()->firstOrCreate( ['name' => $request->tags]) : ''
        ]);

        //delete old image and upload the new one
        if (isset($request->image)) 
        {
            if (FacadesFile::exists(public_path('artworks/' . $oldPath))) 
            {
                FacadesFile::delete(public_path('artworks/' . $oldPath));
            }

            $request->image->move(public_path('artworks'), $newImageName);
        }

        return redirect()->route('artists.artworks.show', [$artist->slug, $artwork->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($artistSlug, $artworkSlug) //nested resource do not allow removal of one parameter
    {
        $artwork = Artwork::where('slug', $artworkSlug)->firstOrFail();

        if (FacadesFile::exists(public_path('artworks/' . $artwork->image_path))) 
        {
            FacadesFile::delete(public_path('artworks/' . $artwork->image_path));
        }

        $artwork->delete();
        
        return redirect()->route('home');

    }

    /**
     * Will generate the Artwork FileName using convention: 
     * ArtistSlug-ArtworkSlug-WidthxHeight.extension
     *
     * @param $image
     * @param string $artistSlug
     * @param string $artworkTitle
     * @return string
     */
    private function getArtworkFileName($image, string $artistSlug, string $artworkTitle) :string
    {
        //we have to generate the slug directly since the items has not yet been created
        $artworkSlug = SlugService::createSlug(Artwork::class, 'slug', $artworkTitle);
        $width = getimagesize($image)[0];
        $height = getimagesize($image)[1];
        $newImageName = $artistSlug . '-' . $artworkSlug . '-' . $width . 'x' .$height . '.' .  time() . $image->extension();
        return $newImageName;
    }
}

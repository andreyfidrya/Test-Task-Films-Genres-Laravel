<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Film;
use App\Models\Genre;

class AdminController extends Controller
{
    public function index()
    {    
        $publishedfilms = Film::all();
        $allgenres = Genre::all()->sortBy('name');
        return view('admin.index',compact('publishedfilms','allgenres'));
    }

    public function add_genre()
    {
        return view('admin.genre-add');
    }

    public function genre_store(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:15',
            'image' => 'mimes:png,jpj,jpeg|max:2040'            
        ]);

        $genre = new Genre();
        $genre->name = $request->name;        
        $genre->save();
        return redirect()->route('admin.index');
    }

    public function genre_edit($id){
        $genre = Genre::find($id);
        return view('admin.genre-edit',compact('genre'));
    }

    public function genre_update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:25',            
            'image' => 'mimes:png,jpj,jpeg|max:2040',
            'genres' => [ 'required', 'array', 'min:1']            
        ]);

        $genre = Genre::find($request->id);
        $genre->name = $request->name;        
        
        $genre->save();
        return redirect()->route('admin.index');
    }

    public function genre_delete($id)
    {
        $genre = Genre::find($id);        
        $genre->delete();
        return redirect()->route('admin.index');
    }

    public function add_film()
    {
        $genres = Genre::all()->sortBy('name');
        return view('admin.film-add',compact('genres'));
    }

    public function film_store(Request $request){
        
        $request->validate([
            'name' => 'required|min:3|max:25', 
            'image' => 'mimes:png,jpj,jpeg|max:2040',
            'genres' => [ 'required', 'array', 'min:1']           
        ]);

        $film = new Film();
        $film->name = $request->name;
                
        $current_timestamp = Carbon::now()->timestamp;
        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $imageName = $current_timestamp . '.' . $image->extension();
            $image->move(public_path('posters'),$imageName);            
            $film->link = $imageName;
        }        

        $film->save();
        $film->genres()->sync($_POST['genres']);

        return redirect()->route('admin.index');
    }

    public function film_edit($id)
    {
        $film = Film::find($id);
        $genres = Genre::select('id','name')->orderBy('name')->get(); 
        $filmgenres = $film->genres()->get();
               
        return view('admin.film-edit', compact('film', 'genres'));
    }

    public function film_update(Request $request){
        
        $request->validate([
            'name' => 'required|min:3|max:25',
            'image' => 'mimes:png,jpj,jpeg|max:2040',
            'genres' => [ 'required', 'array', 'min:1']            
        ]);

        $film = Film::find($request->id);        
        $film->name = $request->name;
                      
        $current_timestamp = Carbon::now()->timestamp;
        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $imageName = $current_timestamp . '.' . $image->extension();
            $image->move(public_path('posters'),$imageName);            
            $film->link = $imageName;
        }        

        $film->save();
        $film->genres()->sync($_POST['genres']);

        return redirect()->route('admin.index');
    }

    public function film_delete($id)
    {
        $film = Film::find($id);
        $film->genres()->detach();        
        $film->delete();
        return redirect()->route('admin.index');
    }
}

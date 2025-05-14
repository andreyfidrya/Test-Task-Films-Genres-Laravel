<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'name' => 'required|min:3|max:15',            
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
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\GenreResource;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        $genres = DB::table('genres')->paginate(3);
        if($genres)
        {
            return GenreResource::collection($genres);
        }
        else
        {
            return response()->json(['message' => 'No records are available'], 200);
        }
    }

    public function show(Genre $genre)
    {
        $genre->load('films')->paginate(3);
        
        return response()->json($genre);        
    }
}

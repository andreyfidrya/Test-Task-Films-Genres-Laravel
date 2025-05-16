<?php

namespace App\Http\Controllers\Api;

use App\Models\Film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FilmResource;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        //$films = DB::table('films')->paginate(3);
        $films = Film::with('genres')->paginate(3);
        if($films)
        {
            return FilmResource::collection($films);
        }
        else
        {
            return response()->json(['message' => 'No records are available'], 200);
        }
    }

    public function show($id)
    {
        $film = Film::with('genres')->findOrFail($id);
        return new FilmResource ($film);
    }
}

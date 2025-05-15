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
            return response()->json($genres, 200);
        }
        else
        {
            return response()->json(['message' => 'No records are available'], 200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class HomeController extends Controller
{
    public function index()
    {    
        $publishedfilms = Film::all()->where('publication_status', 'published');
        return view('home',compact('publishedfilms'));
    }
}
<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieUrl;
use App\Models\ProductsType;
use App\Models\Storytellings;
use App\Models\User;

class MovieController extends Controller
{
    public function AllMovie(){
        $movie = Movie::latest()->get();
        return view('backend.movie.all_movie',compact('movie'));

    } // End Method

    public function AddMovie(){

        $productType = ProductsType::latest()->get();
        $storytellings = Storytellings::latest()->get();
        $activeCreator = User::where('status','active')->where('role','creator')->latest()->get();

        return view('backend.movie.add_movie',compact('productType','storytellings','activeCreator'));

    } // End Method

}

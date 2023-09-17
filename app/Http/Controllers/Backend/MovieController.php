<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\ProductsType;
use App\Models\Goal;
use App\Models\AppealPoints;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function AllMovie(){
        $movie = Movie::latest()->get();
        return view('backend.movie.all_movie',compact('movie'));

    } // End Method

    public function AddMovie(){

        $productType = ProductsType::latest()->get();
        $goal = Goal::latest()->get();
        $appealPoints = AppealPoints::latest()->get();
        $activeCreator = User::where('status','active')->where('role','creator')->latest()->get();

        return view('backend.movie.add_movie',compact(
            'productType',
            'goal',
            'appealPoints',
            'activeCreator'
        ));

    } // End Method

    public function StoreMovie(Request $request){

        $target = $request->movie_targets;
        // dd($targets);
        

        $mcode = IdGenerator::generate([
            'table' => 'movies', 
            'field' => 'movie_code', 
            'length' => 5,
            'prefix' => 'MC'
        ]);

        $movies_id = Movie::insertGetId([
            'movcat_id' => $request -> movcat_id,
            'movie_url' => $request -> movie_url,
            'movie_title' => $request -> movie_title,
            'movie_code' => $mcode,
            'movie_status' => $request -> movie_status,

            'movie_goals' => $request->movie_goals,
            'movie_appeals' => $request->movie_appeals,

            
            'featured' => $request->featured,
            'hot' => $request->hot,

            'creator_id' => $request->creator_id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        $url = $request->input('movie_url');


        $notification = array(
            'message' => 'Movie Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> route('all.movie') -> with($notification);



    } // End Method

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\ProductsType;
use App\Models\Goal;
use App\Models\Targets;
use App\Models\AppealPoints;
use App\Models\ColorTerms;
use App\Models\ShapeTerms;
use App\Models\BrightnessTerms;
use App\Models\EmotionalTerms;
use App\Models\EnvironmentTerms;
use App\Models\ObjectTerms;
use App\Models\Storytellings;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MovieMessage;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function MovieDetails($id){
        $movie = Movie::findOrFail($id);
        $key = $movie->id;
        $targets = $movie->targets_type_id;
        $movie_targe = explode(',', $targets);
        $colors = $movie->color_id;
        $movie_color = explode(',', $colors);
        $shapes = $movie->shape_id;
        $movie_shape = explode(',', $shapes);
        $brights = $movie->brightness_id;
        $movie_brightness = explode(',', $brights);
        $emots = $movie->emotional_id;
        $movie_emotional = explode(',', $emots);
        $enviro = $movie->environment_id;
        $movie_environment = explode(',', $enviro);
        $objec = $movie->object_id;
        $movie_object = explode(',', $objec);
        $storytell = $movie->storytellings_id;
        $movie_storytelling = explode(',', $storytell);
        $tag = Tag::where('mov_id', $id)->get();
        $cat_id = $movie->movcat_id;
        $relatedMovieCat = Movie::where('movcat_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(1)->get();
        $goal_id = $movie->movie_goals;
        $relatedMovieGoal = Movie::where('movie_goals', $goal_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(1)->get();
        $appeal_id = $movie->movie_appelas;
        $relatedMovieAppeal = Movie::where('movie_appeals', $appeal_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(1)->get();
        return view('frontend.movie.movie_details', compact(
            'movie', 
            'key', 
            'movie_targe', 
            'movie_color',
            'movie_shape', 
            'movie_brightness',
            'movie_emotional',
            'movie_environment', 
            'movie_object',
            'movie_storytelling',
            'tag',
            'relatedMovieCat',
            'relatedMovieGoal',
            'relatedMovieAppeal'
        ));

    } // End Method

    public function MovieMessage(Request $request){
        $mid = $request->movie_id;
        $cid = $request->creator_id;
        if (Auth::check()){
            MovieMessage::insert([
                'user_id' => Auth::user()->id,
                'creator_id' => $cid,
                'movie_id' => $mid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Send Message Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);


        }else{
            $notification = array(
                'message' => 'Please Login Your Account First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    } // End Method

    public function CreatorDetails($id){
        $creator = User::findOrFail($id);
        $movie = Movie::where('creator_id', $id)->get();
        $featured = Movie::where('featured', '1')->limit(3)->get();
        return view('frontend.creator.creator_details', 
        compact('creator', 
        'movie', 
        'featured'
    ));

    } // End Method

    public function CreatorDetailsMessage(Request $request){
        $cid = $request->creator_id;
        if (Auth::check()){
            MovieMessage::insert([
                'user_id' => Auth::user()->id,
                'creator_id' => $cid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Send Message Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);


        }else{
            $notification = array(
                'message' => 'Please Login Your Account First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    } // End Method

    public function MovieType($id){
        $movie = Movie::where('status', '1')->where('movcat_id', $id)->get();
        $cbread = ProductsType::where('id', $id)->first();
        return view('frontend.movie.movie_type', compact('movie', 'cbread'));

    } // End Method


}

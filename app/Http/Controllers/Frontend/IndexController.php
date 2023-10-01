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
        $admovie = Movie::where('movie_status', 'ad_movie')->get();
        $othmovie = Movie::where('movie_status', 'other')->get();
        return view('frontend.creator.creator_details', 
        compact('creator', 
        'movie', 
        'featured',
        'admovie',
        'othmovie'
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

    public function AdvertisingContent(){
        $movie = Movie::where('status', '1')->where('movie_status', 'ad_movie')->paginate(5);
        return view('frontend.movie.advertising', compact('movie'));

    } // End Method

    public function OtherContent(){
        $movie = Movie::where('status', '1')->where('movie_status', 'other')->paginate(5);
        return view('frontend.movie.other', compact('movie'));

    } // End Method

    public function MovieType($id){
        $movie = Movie::where('status', '1')->where('movcat_id', $id)->paginate(5);
        $cbread = ProductsType::where('id', $id)->first();
        return view('frontend.movie.movie_type', compact('movie', 'cbread'));

    } // End Method

    public function Type16($id){
        $movie = Movie::where('status', '1')->where('movcat_id', $id)->paginate(16);
        $cbread = ProductsType::where('id', $id)->first();
        return view('frontend.movie.type_16', compact('movie', 'cbread'));

    } // End Method

    // Advertising Contents Search
    public function AdvertisingGallerySearch(Request $request){
        $item = $request->search;
        $movcat_id = $request->movcat_id; // category
        $movie_goals = $request->movie_goals; // goal
        $movie_appeals = $request->movie_appeals; // appeal
        $admovie = Movie::where('movie_status', 'ad_movie')->get();
        $othmovie = Movie::where('movie_status', 'other')->get();
    
        $query = Movie::where('movie_title', 'like', '%' . $item . '%')
            ->where('movie_status', 'ad_movie')
            ->with('type', 'goals');
    
        if ($movcat_id !== "Select Category") {
            // Filter by category if selected
            $query->whereHas('type', function ($query) use ($movcat_id) {
                $query->where('type_name', $movcat_id);
            });
        }
    
        if ($movie_goals !== "Select Goal") {
            // Filter by goal if selected
            $query->where('movie_goals', $movie_goals);
        }

        // Filter by appeal point if selected
        if ($movie_appeals !== "Select Appeal Point") {
            $query->whereHas('appeals', function($query) use ($movie_appeals) {
                $query->where('appeal_point', 'like', '%' . $movie_appeals . '%');
            });
        }
    
        $movie = $query->paginate(5);
    
        return view('frontend.movie.movie_search', compact('movie'));
    } // End Method

    // Other Contents Search
    public function OtherGallerySearch(Request $request){
        $item = $request->search;
        $movcat_id = $request->movcat_id; // category
        $movie_goals = $request->movie_goals; // goal
        $movie_appeals = $request->movie_appeals; // appeal
        $admovie = Movie::where('movie_status', 'ad_movie')->get();
        $othmovie = Movie::where('movie_status', 'other')->get();
    
        $query = Movie::where('movie_title', 'like', '%' . $item . '%')
            ->where('movie_status', 'other')
            ->with('type', 'goals');
    
        if ($movcat_id !== "Select Category") {
            // Filter by category if selected
            $query->whereHas('type', function ($query) use ($movcat_id) {
                $query->where('type_name', $movcat_id);
            });
        }
    
        if ($movie_goals !== "Select Goal") {
            // Filter by goal if selected
            $query->where('movie_goals', $movie_goals);
        }

        // Filter by appeal point if selected
        if ($movie_appeals !== "Select Appeal Point") {
            $q->whereHas('appeals', function($query) use ($movie_appeals) {
                $query->where('appeal_point', 'like', '%' . $movie_appeals . '%');
            });
        }
    
        $movie = $query->paginate(5);
    
        return view('frontend.movie.movie_search', compact('movie', 'other'));
    } // End Method

    // All Contents Search
    public function AllGallerySearch(Request $request){
        $movie_status = $request->movie_status;
        $item = $request->search;
        $movcat_id = $request->movcat_id; // category
        $movie_goals = $request->movie_goals; // goal
        $movie_appeals = $request->movie_appeals; // appeal

        $query = Movie::where('status', '1');

        $query->where(function($q) use ($movcat_id, $movie_goals, $movie_appeals) {
            // Filter by category if selected
            if ($movcat_id !== "Select Category") {
                $q->whereHas('type', function($query) use ($movcat_id) {
                    $query->where('type_name', $movcat_id);
                });
            }

            // Filter by goal if selected
            if ($movie_goals !== "Select Goal") {
                $q->where('movie_goals', 'like', '%' . $movie_goals . '%');
            }

            // Filter by appeal point if selected
            if ($movie_appeals !== "Select Appeal Point") {
                $q->whereHas('appeals', function($query) use ($movie_appeals) {
                    $query->where('appeal_point', 'like', '%' . $movie_appeals . '%');
                });
            }
        });

        $movie = $query->paginate(5);

        return view('frontend.movie.movie_search', compact('movie'));
    } // End Method

}

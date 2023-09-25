<?php

namespace App\Http\Controllers\Creator;

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
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\MovieMessage;

class CreatorMovieController extends Controller
{
    public function CreatorAllMovie(){
        $id = Auth::user()->id;
        $movie = Movie::where('creator_id', $id)->latest()->get();
        return view('creator.movie.all_movie',compact('movie'));

    } // End Method  

    public function CreatorAddMovie(){

        // $apiKey = env('YOUTUBE_API_KEY');

        $productType = ProductsType::latest()->get();
        $goal = Goal::latest()->get();
        $targets = Targets::latest()->get();
        $appealPoints = AppealPoints::latest()->get();
        $color = ColorTerms::latest()->get();
        $shape = ShapeTerms::latest()->get();
        $brightness = BrightnessTerms::latest()->get();
        $emotional = EmotionalTerms::latest()->get();
        $environment = EnvironmentTerms::latest()->get();
        $object = ObjectTerms::latest()->get();
        $storytellings = Storytellings::latest()->get();
        $tags = Tag::latest()->get();

        return view('creator.movie.add_movie',compact(
            // 'apiKey',
            'productType',
            'goal',
            'targets',
            'appealPoints',
            'color',
            'shape',
            'brightness',
            'emotional',
            'environment',
            'object',
            'storytellings',
            'tags'
        ));

    } // End Method

    public function CreatorStoreMovie(Request $request){

        $targe = $request->targets_type_id;
        $targets = implode(",", $targe);
        // dd($targets);

        $colo = $request->color_id;
        $colors = implode(",", $colo);
        // dd($colors);
        $shap = $request->shape_id;
        $shapes = implode(",", $shap);
        // dd($colors);
        $bright = $request->brightness_id;
        $brightnesses = implode(",", $bright);
        // dd($colors);
        $emotion = $request->emotional_id;
        $emotionals = implode(",", $emotion);
        // dd($colors);
        $enviro = $request->environment_id;
        $environments = implode(",", $enviro);
        // dd($colors);
        $obje = $request->object_id;
        $objects = implode(",", $obje);
        // dd($colors);
        
        $storytell = $request->storytellings_id;
        $storytellingses = implode(",", $storytell);
        // dd($colors);
        

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
            'targets_type_id' => $targets,
            'movie_appeals' => $request->movie_appeals,

            'color_id' => $colors,
            'shape_id' => $shapes,
            'brightness_id' => $brightnesses,
            'emotional_id' => $emotionals,
            'environment_id' => $environments,
            'object_id' => $objects,

            'storytellings_id' => $storytellingses,
            
            'featured' => $request->featured,
            'hot' => $request->hot,

            'creator_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        $url = $request->input('movie_url');

        // Tags Add From Here //
        $tags = Count($request->genre);
        if($tags != NULL) {
            for ($i=0; $i < $tags; $i++) {
                $tcount = new Tag();
                $tcount -> mov_id = $movies_id;
                $tcount -> genre = $request -> genre[$i];
                $tcount -> tag = $request -> tag[$i];
                $tcount -> save();
            }
        }
        // End Tags //

        $notification = array(
            'message' => 'Movie Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> route('creator.all.movie') -> with($notification);

    } // End Method

    public function CreatorEditMovie($id){
        $movie = Movie::findOrFail($id);
        $productType = ProductsType::latest()->get();
        $goal = Goal::latest()->get();
        $targets = Targets::latest()->get();
        $tar = $movie->targets_type_id;
        $movie_tar = explode(',', $tar);
        $appealPoints = AppealPoints::latest()->get();

        $color = ColorTerms::latest()->get();
        $col = $movie->color_id;
        $movie_col = explode(',', $col);

        $shape = ShapeTerms::latest()->get();
        $sha = $movie->shape_id;
        $movie_sha = explode(',', $sha);

        $brightness = BrightnessTerms::latest()->get();
        $bri = $movie->brightness_id;
        $movie_bri = explode(',', $bri);

        $emotional = EmotionalTerms::latest()->get();
        $emo = $movie->emotional_id;
        $movie_emo = explode(',', $emo);
        
        $environment = EnvironmentTerms::latest()->get();
        $env = $movie->environment_id;
        $movie_env = explode(',', $env);

        $object = ObjectTerms::latest()->get();
        $obj = $movie->object_id;
        $movie_obj = explode(',', $obj);

        $storytellings = Storytellings::latest()->get();
        $sto = $movie->storytellings_id;
        $movie_sto = explode(',', $sto);

        $tag = Tag::where('mov_id', $id)->get();

        return view('creator.movie.edit_movie',compact(
            'movie',
            'productType',
            'goal',
            'targets',
            'movie_tar',
            'appealPoints',

            'color',
            'movie_col',

            'shape',
            'movie_sha',

            'brightness',
            'movie_bri',

            'emotional',
            'movie_emo',

            'environment',
            'movie_env',

            'object',
            'movie_obj',

            'storytellings',
            'movie_sto',
            'tag'
        ));

    } // End Method

    public function CreatorUpdateMovie(Request $request){

        $targe = $request->targets_type_id;
        $targets = implode(",", $targe);

        $colo = $request->color_id;
        $colors = implode(",", $colo);
        // dd($colors);
        $shap = $request->shape_id;
        $shapes = implode(",", $shap);
        // dd($colors);
        $bright = $request->brightness_id;
        $brightnesses = implode(",", $bright);
        // dd($colors);
        $emotion = $request->emotional_id;
        $emotionals = implode(",", $emotion);
        // dd($colors);
        $enviro = $request->environment_id;
        $environments = implode(",", $enviro);
        // dd($colors);
        $obje = $request->object_id;
        $objects = implode(",", $obje);
        // dd($colors);
        
        $storytell = $request->storytellings_id;
        $storytellingses = implode(",", $storytell);
        // dd($colors);

        $movies_id = $request -> id;
        Movie::findorFail($movies_id) -> update([
            'movcat_id' => $request -> movcat_id,
            'movie_url' => $request -> movie_url,
            'movie_title' => $request -> movie_title,
            'movie_status' => $request -> movie_status,

            'movie_goals' => $request->movie_goals,
            'targets_type_id' => $targets,
            'movie_appeals' => $request->movie_appeals,

            'color_id' => $colors,
            'shape_id' => $shapes,
            'brightness_id' => $brightnesses,
            'emotional_id' => $emotionals,
            'environment_id' => $environments,
            'object_id' => $objects,

            'storytellings_id' => $storytellingses,
            
            'featured' => $request->featured,
            'hot' => $request->hot,

            'creator_id' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Movie Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> route('creator.all.movie') -> with($notification);

    } // End Method

    public function CreatorUpdateMovieTags(Request $request){
        // Tags Update From Here //
        $tid = $request -> id;
        if($request -> genre == NULL) {
            return redirect() -> back();
        }else{
            Tag::where('mov_id', $tid)->delete();
        }
        $tags = Count($request->genre);
        for ($i=0; $i < $tags; $i++) {
            $tcount = new Tag();
            $tcount -> mov_id = $tid;
            $tcount -> genre = $request -> genre[$i];
            $tcount -> tag = $request -> tag[$i];
            $tcount -> save();
        } //end if
        // End Tags //

        $notification = array(
            'message' => 'Tags Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> back() -> with($notification);

    } // End Method

    public function CreatorDetailsMovie($id){
        $movie = Movie::findOrFail($id);
        $productType = ProductsType::latest()->get();
        $goal = Goal::latest()->get();
        $targets = Targets::latest()->get();
        $tar = $movie->targets_type_id;
        $movie_tar = explode(',', $tar);
        $appealPoints = AppealPoints::latest()->get();

        $color = ColorTerms::latest()->get();
        $col = $movie->color_id;
        $movie_col = explode(',', $col);

        $shape = ShapeTerms::latest()->get();
        $sha = $movie->shape_id;
        $movie_sha = explode(',', $sha);

        $brightness = BrightnessTerms::latest()->get();
        $bri = $movie->brightness_id;
        $movie_bri = explode(',', $bri);

        $emotional = EmotionalTerms::latest()->get();
        $emo = $movie->emotional_id;
        $movie_emo = explode(',', $emo);
        
        $environment = EnvironmentTerms::latest()->get();
        $env = $movie->environment_id;
        $movie_env = explode(',', $env);

        $object = ObjectTerms::latest()->get();
        $obj = $movie->object_id;
        $movie_obj = explode(',', $obj);

        $storytellings = Storytellings::latest()->get();
        $sto = $movie->storytellings_id;
        $movie_sto = explode(',', $sto);

        $tag = Tag::where('mov_id', $id)->get();

        return view('creator.movie.details_movie',compact(
            'movie',
            'productType',
            'goal',
            'targets',
            'movie_tar',
            'appealPoints',

            'color',
            'movie_col',

            'shape',
            'movie_sha',

            'brightness',
            'movie_bri',

            'emotional',
            'movie_emo',

            'environment',
            'movie_env',

            'object',
            'movie_obj',

            'storytellings',
            'movie_sto',
            'tag',

        ));

    } // End Method

    public function CreatorDeleteMovie($id){
        $movie = Movie::findOrFail($id);
        Movie :: findOrFail($id) -> delete();
        $tagsData = Tag::where('mov_id', $id)->get();
        foreach($tagsData as $item){
            $item -> genre;
            Tag::where('mov_id', $id) -> delete();
        }

        $notification = array(
            'message' => 'Movie Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> back() -> with($notification);

    } // End Method

    public function BuyPackage(){
        return view('creator.package.buy_package');

    } // End Method  

    public function CreatorMovieMessage(){
        $id = Auth::user()->id;
        $usermsg = MovieMessage::where('creator_id', $id)->get();
        return view('creator.message.all_message', compact('usermsg'));

    } // End Method

    public function CreatorMessageDetails($id){
        $uid = Auth::user()->id;
        $usermsg = MovieMessage::where('creator_id', $uid)->get();
        $msgdetails = MovieMessage::findOrFail($id);
        return view('creator.message.message_details', compact('usermsg','msgdetails'));

    } // End Method

}

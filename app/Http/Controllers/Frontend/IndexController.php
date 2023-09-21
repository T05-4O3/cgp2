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

    }// End Method
}

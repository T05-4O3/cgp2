<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieUrl;
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
use App\Models\User;

class MovieController extends Controller
{
    public function AllMovie(){
        $movie = Movie::latest()->get();
        return view('backend.movie.all_movie',compact('movie'));

    } // End Method

    public function AddMovie(){

        $productType = ProductsType::latest()->get();
        $goal = Goal::latest()->get();
        $targets = Targets::latest()->get();
        $appealPoints = AppealPoints::latest()->get();
        $colorTerms = ColorTerms::latest()->get();
        $shapeTerms = ShapeTerms::latest()->get();
        $brightnessTerms = BrightnessTerms::latest()->get();
        $emotionalTerms = EmotionalTerms::latest()->get();
        $environmentTerms = EnvironmentTerms::latest()->get();
        $objectTerms = ObjectTerms::latest()->get();
        $storytellings = Storytellings::latest()->get();
        $activeCreator = User::where('status','active')->where('role','creator')->latest()->get();

        return view('backend.movie.add_movie',compact(
            'productType',
            'goal',
            'targets',
            'appealPoints',
            'colorTerms',
            'shapeTerms',
            'brightnessTerms',
            'emotionalTerms',
            'environmentTerms',
            'objectTerms',
            'storytellings',
            'activeCreator'
        ));

    } // End Method

}

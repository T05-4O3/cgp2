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
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $movie_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('movie_id',$movie_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'movie_id' => $movie_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            }else{
                return response()->json(['error' => 'This Movie Has Already in your Wishlist']);
            }else{
                return response()->json(['error' => 'At First Login Your Account']);
            }

        }

    } // End Method
}

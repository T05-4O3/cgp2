<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function AddToCompare(Request $request, $movie_id){
        if(Auth::check()){
            $exists = Compare::where('user_id', Auth::id())->where('movie_id', $movie_id)->first();
            if(!$exists){
                Compare::insert([
                    'user_id' => Auth::id(),
                    'movie_id' => $movie_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Successfully Added On Your Compare']);
            }else{
                return response()->json(['error' => 'This Movie Has Already In Your Compare']);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }

    } // End Method

    public function UserCompare(){
        return view('frontend.dashboard.compare');

    } // End Method

    public function GetCompareMovie(){
        $compare = Compare::with('movie')->where('user_id', Auth::id())->latest()->get();
        return response()->json($compare);
    } // End Method

    public function CompareRemove($id){
        Compare::where('user_id', Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Movie Remove']);
    } // End Method
}

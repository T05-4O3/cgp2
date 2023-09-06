<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function CreatorDashboard(){

        return view('creator.creator_dashboard');
        
    } // End Method
}

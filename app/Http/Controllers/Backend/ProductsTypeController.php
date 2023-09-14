<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductsType;
use App\Models\Goal;
use App\Models\Storytellings;

class ProductsTypeController extends Controller
{
    public function AllType(){
        $types = ProductsType::latest()->get();
        return view('backend.type.all_type' ,compact('types'));

    } // End Method

    public function AddType(){
        return view('backend.type.add_type');

    } // End Method

    public function StoreType(Request $request){
        // Validation
        $request->validate([
            'type_name' => 'required|unique:products_types|max:200',
            'type_icon' => 'required'
        ]);

        ProductsType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Products Type Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    } // End Method

    public function EditType($id){
        $types = ProductsType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    } // End Method

    public function UpdateType(Request $request){
        $pid = $request->id;

        ProductsType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Products Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    } // End Method

    public function DeleteType($id){
        ProductsType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Products Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Goals All Method
    public function AllGoal(){
        $goals = Goal::latest()->get();
        return view('backend.goals.all_goals' ,compact('goals'));

    } // End Method

    public function AddGoal(){
        $goals = Goal::latest()->get();
        return view('backend.goals.add_goals');

    } // End Method

    public function StoreGoal(Request $request){

        Goal::insert([
            'goal_type' => $request->goal_type,
        ]);

        $notification = array(
            'message' => 'Goals Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.goal')->with($notification);

    } // End Method

    public function EditGoal($id){
        $goals = Goal::findOrFail($id);
        return view('backend.goals.edit_goals',compact('goals'));

    } // End Method


    public function UpdateGoal(Request $request){
        $goal_id = $request->id;

        Goal::findOrFail($goal_id)->update([
            'goal_type' => $request->goal_type,
        ]);

        $notification = array(
            'message' => 'Goal Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.goal')->with($notification);

    } // End Method

    public function DeleteGoal($id){
        Goal::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Goal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Storytellings All Method
    public function AllStorytelling(){
        $storytellings = Storytellings::latest()->get();
        return view('backend.storytellings.all_storytellings' ,compact('storytellings'));

    } // End Method

    public function AddStorytelling(){
        $storytellings = Storytellings::latest()->get();
        return view('backend.storytellings.add_storytellings');

    } // End Method

    public function StoreStorytelling(Request $request){

        Storytellings::insert([
            'storytellings_name' => $request->storytellings_name,
        ]);

        $notification = array(
            'message' => 'Storytellings Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.storytelling')->with($notification);

    } // End Method

    public function EditStorytelling($id){
        $storytellings = Storytellings::findOrFail($id);
        return view('backend.storytellings.edit_storytellings',compact('storytellings'));

    } // End Method


    public function UpdateStorytelling(Request $request){
        $story_id = $request->id;

        Storytellings::findOrFail($story_id)->update([
            'storytellings_name' => $request->storytellings_name,
        ]);

        $notification = array(
            'message' => 'Storytellings Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.storytelling')->with($notification);

    } // End Method

    public function DeleteStorytelling($id){
        Storytellings::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Storytellings Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method
}

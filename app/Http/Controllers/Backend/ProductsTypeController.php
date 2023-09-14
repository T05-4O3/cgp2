<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductsType;
use App\Models\Goal;
use App\Models\Targets;
use App\Models\AppealPoints;
use App\Models\ColorTerms;
use App\Models\ShapeTerms;
use App\Models\BrightnessTerms;
use App\Models\EmotionalTerms;
use App\Models\EnvironmentTerms;
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

    // Targets All Method
    public function AllTarget(){
        $targets = Targets::latest()->get();
        return view('backend.targets.all_targets' ,compact('targets'));

    } // End Method

    public function AddTarget(){
        $targets = Targets::latest()->get();
        return view('backend.targets.add_targets');

    } // End Method

    public function StoreTarget(Request $request){

        Targets::insert([
            'target_type' => $request->target_type,
        ]);

        $notification = array(
            'message' => 'Targets Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.target')->with($notification);

    } // End Method

    public function EditTarget($id){
        $targets = Targets::findOrFail($id);
        return view('backend.targets.edit_targets',compact('targets'));

    } // End Method


    public function UpdateTarget(Request $request){
        $target_id = $request->id;

        Targets::findOrFail($target_id)->update([
            'target_type' => $request->target_type,
        ]);

        $notification = array(
            'message' => 'Target Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.target')->with($notification);

    } // End Method

    public function DeleteTarget($id){
        Targets::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Target Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Appeal Points All Method
    public function AllAppealPoint(){
        $appeals = AppealPoints::latest()->get();
        return view('backend.appeals.all_appeals' ,compact('appeals'));

    } // End Method

    public function AddAppealPoint(){
        $appeals = AppealPoints::latest()->get();
        return view('backend.appeals.add_appeals');

    } // End Method

    public function StoreAppealPoint(Request $request){

        AppealPoints::insert([
            'appeal_point' => $request->appeal_point,
        ]);

        $notification = array(
            'message' => 'Appeal Point Create Successfully',
            'appeal_point' => 'success'
        );

        return redirect()->route('all.appeal')->with($notification);

    } // End Method

    public function EditAppealPoint($id){
        $appeals = AppealPoints::findOrFail($id);
        return view('backend.appeals.edit_appeals',compact('appeals'));

    } // End Method

    public function UpdateAppealPoint(Request $request){
        $appeals_id = $request->id;

        AppealPoints::findOrFail($appeals_id)->update([
            'appeal_point' => $request->appeal_point,
        ]);

        $notification = array(
            'message' => 'Appeal Point Updated Successfully',
            'appeal_point' => 'success'
        );

        return redirect()->route('all.appeal')->with($notification);

    } // End Method

    public function DeleteAppealPoint($id){
        AppealPoints::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Appeal Point Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Color Terms All Method
    public function AllColorTerm(){
            $colors = ColorTerms::latest()->get();
            return view('backend.colors.all_colors' ,compact('colors'));

        } // End Method

        public function AddColorTerm(){
            return view('backend.colors.add_colors');

        } // End Method

    public function StoreColorTerm(Request $request){
        // Validation
        $request->validate([
            'color_term' => 'required|unique:color_terms|max:200',
            'color_icon' => 'required'
        ]);

        ColorTerms::insert([
            'color_term' => $request->color_term,
            'color_icon' => $request->color_icon,
        ]);

        $notification = array(
            'message' => 'Color Term Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.color')->with($notification);

    } // End Method

    public function EditColorTerm($id){
        $colors = ColorTerms::findOrFail($id);
        return view('backend.colors.edit_colors',compact('colors'));

    } // End Method

    public function UpdateColorTerm(Request $request){
        $pid = $request->id;

        ColorTerms::findOrFail($pid)->update([
            'color_term' => $request->color_term,
            'color_icon' => $request->color_icon,
        ]);

        $notification = array(
            'message' => 'Color Term Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.color')->with($notification);

    } // End Method

    public function DeleteColorTerm($id){
        ColorTerms::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Color Term Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Shape Terms All Method
    public function AllShapeTerm(){
            $shapes = ShapeTerms::latest()->get();
            return view('backend.shapes.all_shapes' ,compact('shapes'));

        } // End Method

        public function AddShapeTerm(){
            return view('backend.shapes.add_shapes');

        } // End Method

    public function StoreShapeTerm(Request $request){
        // Validation
        $request->validate([
            'shape_term' => 'required|unique:shape_terms|max:200',
            'shape_icon' => 'required'
        ]);

        ShapeTerms::insert([
            'shape_term' => $request->shape_term,
            'shape_icon' => $request->shape_icon,
        ]);

        $notification = array(
            'message' => 'Shape Term Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shape')->with($notification);

    } // End Method

    public function EditShapeTerm($id){
        $shapes = ShapeTerms::findOrFail($id);
        return view('backend.shapes.edit_shapes',compact('shapes'));

    } // End Method

    public function UpdateShapeTerm(Request $request){
        $pid = $request->id;

        ShapeTerms::findOrFail($pid)->update([
            'shape_term' => $request->shape_term,
            'shape_icon' => $request->shape_icon,
        ]);

        $notification = array(
            'message' => 'Shape Term Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shape')->with($notification);

    } // End Method

    public function DeleteShapeTerm($id){
        ShapeTerms::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Shape Term Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Brightness Terms All Method
    public function AllBrightnessTerm(){
            $brightness = BrightnessTerms::latest()->get();
            return view('backend.brightness.all_brightness' ,compact('brightness'));

        } // End Method

        public function AddBrightnessTerm(){
            return view('backend.brightness.add_brightness');

        } // End Method

    public function StoreBrightnessTerm(Request $request){
        // Validation
        $request->validate([
            'brightness_term' => 'required|unique:brightness_terms|max:200',
            'brightness_icon' => 'required'
        ]);

        BrightnessTerms::insert([
            'brightness_term' => $request->brightness_term,
            'brightness_icon' => $request->brightness_icon,
        ]);

        $notification = array(
            'message' => 'Brightness Term Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brightness')->with($notification);

    } // End Method

    public function EditBrightnessTerm($id){
        $brightness = BrightnessTerms::findOrFail($id);
        return view('backend.brightness.edit_brightness',compact('brightness'));

    } // End Method

    public function UpdateBrightnessTerm(Request $request){
        $pid = $request->id;

        BrightnessTerms::findOrFail($pid)->update([
            'brightness_term' => $request->brightness_term,
            'brightness_icon' => $request->brightness_icon,
        ]);

        $notification = array(
            'message' => 'Brightness Term Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brightness')->with($notification);

    } // End Method

    public function DeleteBrightnessTerm($id){
        BrightnessTerms::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brightness Term Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Emotional Terms All Method
    public function AllEmotionalTerm(){
            $emotional = EmotionalTerms::latest()->get();
            return view('backend.emotional.all_emotional' ,compact('emotional'));

        } // End Method

        public function AddEmotionalTerm(){
            return view('backend.emotional.add_emotional');

        } // End Method

    public function StoreEmotionalTerm(Request $request){
        // Validation
        $request->validate([
            'emotional_term' => 'required|unique:emotional_terms|max:200',
            'emotional_icon' => 'required'
        ]);

        EmotionalTerms::insert([
            'emotional_term' => $request->emotional_term,
            'emotional_icon' => $request->emotional_icon,
        ]);

        $notification = array(
            'message' => 'Emotional Term Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.emotional')->with($notification);

    } // End Method

    public function EditEmotionalTerm($id){
        $emotional = EmotionalTerms::findOrFail($id);
        return view('backend.emotional.edit_emotional',compact('emotional'));

    } // End Method

    public function UpdateEmotionalTerm(Request $request){
        $pid = $request->id;

        EmotionalTerms::findOrFail($pid)->update([
            'emotional_term' => $request->emotional_term,
            'emotional_icon' => $request->emotional_icon,
        ]);

        $notification = array(
            'message' => 'Emotional Term Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.emotional')->with($notification);

    } // End Method

    public function DeleteEmotionalTerm($id){
        EmotionalTerms::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Emotional Term Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    // Environment Terms All Method
    public function AllEnvironmentTerm(){
            $environment = EnvironmentTerms::latest()->get();
            return view('backend.environment.all_environment' ,compact('environment'));

        } // End Method

        public function AddEnvironmentTerm(){
            return view('backend.environment.add_environment');

        } // End Method

    public function StoreEnvironmentTerm(Request $request){
        // Validation
        $request->validate([
            'environment_term' => 'required|unique:environment_terms|max:200',
            'environment_icon' => 'required'
        ]);

        EnvironmentTerms::insert([
            'environment_term' => $request->environment_term,
            'environment_icon' => $request->environment_icon,
        ]);

        $notification = array(
            'message' => 'Environment Term Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.environment')->with($notification);

    } // End Method

    public function EditEnvironmentTerm($id){
        $environment = EnvironmentTerms::findOrFail($id);
        return view('backend.environment.edit_environment',compact('environment'));

    } // End Method

    public function UpdateEnvironmentTerm(Request $request){
        $pid = $request->id;

        EnvironmentTerms::findOrFail($pid)->update([
            'environment_term' => $request->environment_term,
            'environment_icon' => $request->environment_icon,
        ]);

        $notification = array(
            'message' => 'Environment Term Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.environment')->with($notification);

    } // End Method

    public function DeleteEnvironmentTerm($id){
        EnvironmentTerms::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Environment Term Deleted Successfully',
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

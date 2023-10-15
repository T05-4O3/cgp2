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
use DB;
use App\Models\PackagePlan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MovieMessage;
use App\Models\Schedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;

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

        $id = Auth::user()->id;
        $movie = User::where('role', 'creator')->where('id', $id)->first();
        $pcount = $movie->credit;
        // dd($pcount);
        if ($pcount == 5 || $pcount == 50){
            return redirect()->route('buy.package');
        }else{
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
        }
    } // End Method

    public function CreatorStoreMovie(Request $request){
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;

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

        User::where('id', $id)->update([
            'credit' => DB::raw('5 + '.$nid),
        ]);

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

    public function BuyBusinessPlan(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('creator.package.business_plan', compact('data'));
    } // End Method

    public function StoreBusinessPlan(Request $request){
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;
        PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'Business',
            'package_credits' => '50',
            'invoice' => 'SYK'.mt_rand(10000000,99999999),
            'package_amount' => '10000',
            'created_at' => Carbon::now(),
        ]);
        User::where('id', $id)->update([
            'credit' => DB::raw('50 + '.$nid),
        ]);
        $notification = array(
            'message' => 'You Have Purchese Business Package Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('creator.all.movie')-> with($notification);
    } // End Method

    public function BuyProfessionalPlan(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('creator.package.professional_plan', compact('data'));
    } // End Method

    public function StoreProfessionalPlan(Request $request){
        $id = Auth::user()->id;
        $uid = User::findOrFail($id);
        $nid = $uid->credit;
        PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'Professional',
            'package_credits' => '200',
            'invoice' => 'SYK'.mt_rand(10000000,99999999),
            'package_amount' => '50000',
            'created_at' => Carbon::now(),
        ]);
        User::where('id', $id)->update([
            'credit' => DB::raw('200 + '.$nid),
        ]);
        $notification = array(
            'message' => 'You Have Purchese Professional Package Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('creator.all.movie')-> with($notification);
    } // End Method

    public function PackageHistory(){
        $id = Auth::user()->id;
        $packagehistory = PackagePlan::where('user_id', $id)->get();
        return view('creator.package.package_history', compact('packagehistory'));
    } // End Method

    public function CreatorPackageInvoice($id){
        $packagehistory = PackagePlan::where('id', $id)->first();
        $pdf = Pdf::loadView('creator.package.package_history_invoice', 
        compact('packagehistory'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
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

    public function CreatorScheduleRequest(){
        $id = Auth::user()->id;
        $usermsg = Schedule::where('creator_id', $id)->with('movie')->get();
        return view('creator.schedule.schedule_request',compact('usermsg'));

    } // End Method  

    public function CreatorDetailsSchedule($id){
        $schedule = Schedule::findOrFail($id);
        return view('creator.schedule.schedule_details',compact('schedule'));

    } // End Method

    public function CreatorUpdateSchedule(Request $request){
        $sid = $request->id;
        Schedule::findOrFail($sid)->update([
            'status' => '1',
        ]);
        // Start Send Email
        $sendmail = Schedule::findOrFail($sid);
        $data = [
            'meeting_date' => $sendmail->meeting_date, 
            'meeting_time' => $sendmail->meeting_time, 
        ];
        Mail::to($request->email)->send(new ScheduleMail($data));

        //End Send Email
        $notification = array(
            'message' => 'You Have Confirm Schedule Successfully',
            'alert-type' => 'success'
        );
        return redirect() -> route('creator.schedule.request') -> with($notification);

    } // End Method  

}

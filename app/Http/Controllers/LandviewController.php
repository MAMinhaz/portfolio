<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Landview;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Landview_profession;
use Illuminate\Support\Facades\Auth;

class LandviewController extends Controller
{
    /**
     * heros info index page
     *
     * @return void
     */
    function index(){
        // data overview start
        return view('admin.landview.index', [
            "landviews" => Landview::latest()->get(),
        ]);
    }


    /**
     * hero info create page
     *
     * @return void
     */
    function create(){
        // data create start
        return view('admin.landview.create');
    }


    /**
     * hero's info create post
     *
     * @param  mixed $request
     * @return void
     */
    function create_post(Request $request){
        // validating duplicate name
        if($request->input('name')) {
            $name = Landview::all()->pluck('name');
            if(count($name) >= 1) {
                return redirect()->route('landview')->with('lv_name_dup', 'You can add your landview name once to your landview information table . If you want to add a new name try after deleting the previous title.');
            } 
        }

        // validating inputs
        $request->validate([
            'name' => ['alpha_spaces'],
            'profession_name1' => ['alpha_spaces'],
            'profession_name2' => ['alpha_spaces'],
            'profession_name3' => ['alpha_spaces'],
            'profession_name4' => ['alpha_spaces'],
            'profession_name5' => ['alpha_spaces'],
            'landview_image' => 'image',
        ],
        
        $messages = [
            'name.string' => 'Your Name should be a string.',
            'profession_name.string' => 'Your profession names should be a string.',
        ]);

        // inserting data
        $id = Landview::insertGetId([
            'name' => Str::title($request->name),
            'addedby' => Auth::id(),
            'created_at' => now(),
        ]);

        //Uploading hero Picture Start
        if($request->hasFile('landview_image')){
            $uploaded_picture = $request->file('landview_image');
            $photo_file_extention = 'landview_image_'.$id.'.'.$uploaded_picture->getClientOriginalExtension('landview_image');
            $picture_new_location = 'public/dash/uploads/landview_image/'.$photo_file_extention;
            Image::make($uploaded_picture)->save(base_path($picture_new_location));
            Landview::find($id)->update([
                'landview_image' => $photo_file_extention,
                'updated_at' => Carbon::now(),
            ]);
        }

        // profession name insert 
        for ($i=1; $i <=5; $i++){ 
            $profession_name = "profession_name".$i;
            Landview_profession::insert([
                "landview_id" => $id,
                "profession_name" => Str::title($request->$profession_name),
                "created_at" => now(),
            ]);
        }

        return redirect()->route('landview')->with('lv_saved', 'You have added new info to your landview information table');
    }


    /**
     * hero's info hard delete
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function hard_delete(Request $request, $id){
        // hero's info data
        $landview = Landview::findOrFail($id);
        // hero professions data
        $profession = Landview_profession::where('landview_id', $landview->id)->get();

        // hero's info data deleted
        $landview->forceDelete();

        // hero's profession data deleted
        foreach ($profession as $prof) {
            $prof->forceDelete();
        }

        // hero thumbnail picture deleting
        if($landview->landview_image != 'landview_image_default.jpg'){
            $picture_location = 'public/dash/uploads/landview_image/'.$landview->landview_image;
            unlink(base_path($picture_location));
        }

        return redirect()->route('landview')->with('lv_deleted', 'You have deleted an existing information from your landview information table');
    }
}

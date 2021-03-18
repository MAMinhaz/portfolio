<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Landview;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandviewController extends Controller
{
    function index(){
        // data overview start
        return view('admin.landview.index', [
            "landviews" => Landview::latest()->get(),
        ]);
        // data overview end
    }

    function create(){
        // data create start
        return view('admin.landview.create');
        // data create end
    }

    function create_post(Request $request){
        // validating duplicate title 
        if($request->input('title')) {
            $title = Landview::all()->pluck('title');

            if (count($title) >= 1){
                return redirect()->route('landview')->with('lv_title_dup', 'You can add your landview title once to your landview information table . If you want to add a new title try after deleting the previous title.');
            } 
        }
        // validating duplicate title 

        // validating duplicate name
        if($request->input('name')) {
            $name = Landview::all()->pluck('name');
            if(count($name) >= 1) {
                return redirect()->route('landview')->with('lv_name_dup', 'You can add your landview name once to your landview information table . If you want to add a new name try after deleting the previous title.');
            } 
        }
        // validating duplicate name

        // validating inputs
        $request->validate([
            'title' => ['alpha_spaces', 'nullable'],
            'name' => ['alpha_spaces', 'nullable'],
            'profession_name' => ['alpha_spaces', 'nullable'],
            'landview_image' => 'image',
        ],
        
        $messages = [
            'title.string' => 'Your Title should be a string.',
            'name.string' => 'Your Name should be a string.',
            'profession_name.string' => 'Your profession names should be a string.',
        ]);
        // validating inputs

        // inserting data
        $id = Landview::insertGetId([
            'title' => Str::title($request->title),
            'name' => Str::title($request->name),
            'addedby' => Auth::user()->id,
            'profession_name' => Str::title($request->profession_name),
            'created_at' => Carbon::now(),
        ]);
        // inserting data

/*
        // duplicate image validation
        if($request->hasFile('landview_image')){
            return $picture = Landview::all()->pluck('landview_image');
            foreach ($picture as $pictures) {
                return $pictures;
            }
            count($picture);
            if(count($picture) >= 1) {
            }
        }
        // duplicate image validation
*/

        //Uploading Profile Picture Start
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
        //Uploading Profile Picture End

        return redirect()->route('landview')->with('lv_saved', 'You have added new info to your landview information table');
    }

    function edit(Request $request, $id){
        // data edit form start
        return view('admin.landview.edit',[
            'landviews' => Landview::findOrFail($id),
        ]);
        // data edit form end
    }

    function edit_post(Request $request){
            // input data validation start
            $request->validate([
                'title' => ['alpha_spaces', 'nullable'],
                'name' => ['alpha_spaces', 'nullable'],
                'profession_name' => ['alpha_spaces', 'nullable'],
            ],
            
            $messages = [
                'title.string' => 'Your Title should be a string.',
                'name.string' => 'Your Name should be a string.',
                'profession_name.string' => 'Your profession names should be a string.',
            ]);
            // input data validation end

            // data edit with redirect with fash start
            Landview::findOrFail($request->idlandview)->update([
                'title' => Str::title($request->title),
                'name' => Str::title($request->name),
                'addedby' => Auth::user()->id,
                'profession_name' => Str::title($request->profession_name),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('landview')->with('lv_edited', 'You have edited an existing information to your landview information table');
            // data edit and redirect with flash end
    }

    function hard_delete(Request $request, $id){
        // data deleted end
        Landview::findOrFail($id)->forceDelete();
        return redirect()->route('landview')->with('lv_deleted', 'You have deleted an existing information from your landview information table');
        // data deleted end
    } 
}

<?php

namespace App\Http\Controllers;

use App\Models\Service_list;
use Illuminate\Http\Request;
use App\Models\Service_title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    function index(){
        return view('admin.service.index', [
            'services' => Service_title::all(),
        ]);
    }

    function create(){
        return view('admin.service.create');
    }

    function create_post(Request $request){
        $info = $request->input('service_list');
        // foreach ($request->input('service_list') as $value) {
        //     print_r($value."<br>");
        // } 

        // // validating inputs
        // $valid = $request->validate([
        //     'service_title' => ['alpha_spaces', 'string'],
        //     'service_list.*' => ['string'],
        // ],
        
        // $messages = [
        //     'service_title.string' => 'Your service title should be a string.',
        //     'service_list.*.string' => 'Your service list should be a string.',
        // ]);
        // // validating inputs
        // return back();




        // // inserting data
        // $id = Service_title::insertGetId([
        //     'service_title' => Str::title($request->title),
        //     'addedby' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        // ]);

        // Service_list::insert([
        //     'service_list' => Str::title($request->title),
        //     'service_title_id' => $id,
        //     'created_at' => Carbon::now(),
            
        // ]);
        // // inserting data
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Service_title;

class ServiceController extends Controller
{
    /**
     * service index page
     *
     * @return void
     */
    function index(){
        $service = Service_title::all();
        $service_count = $service->count();
        return view('admin.service.index', [
            'services' => $service,
            'count' => $service_count,
        ]);
    }


    /**
     * service create form page
     *
     * @return void
     */
    function create(){
        return view('admin.service.create');
    }


    /**
     * create_post
     *
     * @param  mixed $request
     * @return void
     */
    function create_post(Request $request){
        // validating inputs
        $request->validate([
            'service_title' => ['alpha_spaces', 'string', 'unique:service_titles,service_title'],
            'service_list_1' => ['string', 'unique:service_titles,service_list_1', 'nullable'],
            'service_list_2' => ['string', 'unique:service_titles,service_list_2', 'nullable'],
            'service_list_3' => ['string', 'unique:service_titles,service_list_3', 'nullable'],
            'service_list_4' => ['string', 'unique:service_titles,service_list_4', 'nullable'],
            'service_list_5' => ['string', 'unique:service_titles,service_list_5', 'nullable'],
            'service_list_6' => ['string', 'unique:service_titles,service_list_6', 'nullable'],
        ],
        
        $messages = [
            'service_title.string' => 'Your service title should be a string.',
            'service_list_1' => 'Your service list number 1 should be a string.',
            'service_list_2' => 'Your service list number 2 should be a string.',
            'service_list_3' => 'Your service list number 3 should be a string.',
            'service_list_4' => 'Your service list number 4 should be a string.',
            'service_list_5' => 'Your service list number 5 should be a string.',
            'service_list_6' => 'Your service list number 6 should be a string.',
        ]);
        // validating inputs

        // inserting data
        Service_title::insert([
            'service_title' => Str::title($request->service_title),
            'service_list_1' => Str::title($request->service_list_1),
            'service_list_2' => Str::title($request->service_list_2),
            'service_list_3' => Str::title($request->service_list_3),
            'service_list_4' => Str::title($request->service_list_4),
            'service_list_5' => Str::title($request->service_list_5),
            'service_list_6' => Str::title($request->service_list_6),
            'created_at' => now(),
        ]);
        // inserting data
        return redirect()->route('service')->with('service_saved', 'You have added a new service title and some new service list to your service section..');
    }


    /**
     * service edit page
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function edit(Request $request, $id){
        return view('admin.service.edit', [
            'services' => Service_title::findOrFail($id),
        ]);
    }
    
    /**
     * services edit post
     *
     * @param  mixed $request
     * @return void
     */
    function edit_post(Request $request){
        // validating inputs
        $valid = $request->validate([
            'service_title' => ['alpha_spaces', 'string'],
            'service_list_1' => ['string'],
            'service_list_2' => ['string'],
            'service_list_3' => ['string'],
            'service_list_4' => ['string'],
            'service_list_5' => ['string'],
            'service_list_6' => ['string'],
        ],
        
        $messages = [
            'service_title.string' => 'Your service title should be a string.',
            'service_list_1' => 'Your service list number 1 should be a string.',
            'service_list_2' => 'Your service list number 2 should be a string.',
            'service_list_3' => 'Your service list number 3 should be a string.',
            'service_list_4' => 'Your service list number 4 should be a string.',
            'service_list_5' => 'Your service list number 5 should be a string.',
            'service_list_6' => 'Your service list number 6 should be a string.',
        ]);

        // editing data
        Service_title::findOrFail($request->value)->update([
            'service_title' => Str::title($request->service_title),
            'service_list_1' => Str::title($request->service_list_1),
            'service_list_2' => Str::title($request->service_list_2),
            'service_list_3' => Str::title($request->service_list_3),
            'service_list_4' => Str::title($request->service_list_4),
            'service_list_5' => Str::title($request->service_list_5),
            'service_list_6' => Str::title($request->service_list_6),
            'updated_at' => now(),
        ]);
        return redirect()->route('service')->with('service_edited', 'You have edited an existing service title and some new service list to your service section..');
    }
    
    /**
     * service hard_delete
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function hard_delete(Request $request, $id){
        Service_title::findOrFail($id)->forceDelete();
        return redirect()->route('service')->with('service_deleted', 'You have deleted an service title and some new service list from your service section..');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Portfo;
use App\Models\Landview;
use App\Models\AboutMeDes;
use Illuminate\Http\Request;
use App\Models\Service_title;

class PortfolioController extends Controller
{    
    /**
     * portfolio
     *
     * @return void
     */
    function portfolio(){
        // view main portfolio page start
        return view('portfolio', [
            'landviews' => Landview::all(),
            'services' => Service_title::all(),
            'about_me_des' => AboutMeDes::all(),
        ]);
        // view main portfolio page end
    }
    
    /**
     * portfolio_index
     *
     * @return void
     */
    function portfolio_index(){
        return view('admin.portfolio.index', [
            'portfolio' => Portfo::all(),
        ]);
    }
    
    /**
     * portfolio_create
     *
     * @return void
     */
    function portfolio_create(){
        return view('admin.portfolio.create');
    }

    function portfolio_create_post(Request $request){
        // $title = $request->input('title');
        // $description = $request->input('description');
        // $date = $request->input('date');
        // $clients = $request->input('clients');
        $category_id = $request->input('category_id');
        $category_id_new = $request->input('category_id_new');
        // $thumbnail_image = $request->input('thumbnail_image');
        // $portfo_image = $request->input('portfo_image');
        


        // if(!$request->has('category_id')) {
        //     return "cat";
        // }
        // else {
        //     return $category_id;
        // }


        if(!$request->has('category_id') && empty($category_id_new)){
            print("ektao nai");
        }
        if($request->has('category_id') && !empty($category_id_new)){
            print("sobgula ase");
        }
        elseif($request->has('category_id') && empty($category_id_new)){
            print($category_id)." ase";
        }
        elseif(!$request->has('category_id') && !empty($category_id_new)){
            print($category_id_new)." ase";
        }
    }
}

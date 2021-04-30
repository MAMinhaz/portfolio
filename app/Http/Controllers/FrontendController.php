<?php

namespace App\Http\Controllers;

use App\Models\Landview;
use App\Models\AboutMeDes;
use Illuminate\Http\Request;
use App\Models\Service_title;

class FrontendController extends Controller
{
    /**
     * portfolio home page
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
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Landview;
use App\Models\AboutMeDes;
use Illuminate\Http\Request;
use App\Models\Service_title;

class PortfolioController extends Controller
{
    function portoview(){
        return view('portfolio', [
            'landviews' => Landview::all(),
            'services' => Service_title::all(),
            'about_me_des' => AboutMeDes::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Landview;
use Illuminate\Http\Request;
use App\Models\Service_title;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    function portoview(){
        return view('portfolio', [
            'landviews' => Landview::all(),
            'services' => Service_title::all(),
        ]);
    }
}

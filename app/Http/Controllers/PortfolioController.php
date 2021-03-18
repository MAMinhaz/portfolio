<?php

namespace App\Http\Controllers;

use App\Models\Landview;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    function portoview(){
        return view('portfolio', [
            'landviews' => Landview::all(),
        ]);
    }
}

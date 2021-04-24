<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfo;
use App\Models\Landview;
use App\Models\Companies;
use App\Models\AboutMeDes;
use App\Models\Sociallink;
use App\Models\Contactinfo;
use App\Models\Testimonial;
use App\Models\AboutMeSkill;
use Illuminate\Http\Request;
use App\Models\Blog_category;
use App\Models\Service_title;
use App\Models\CustomFrontend;
use App\Models\PortfoCategory;
use App\Models\AboutMeMilestone;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin_dashboard()
    {
        // return Service_title::latest()->get();
        // return Landview::latest()->get();
        // return AboutMeDes::latest()->get();
        // return AboutMeMilestone::latest()->get();
        // return AboutMeSkill::latest()->get();
        // return PortfoCategory::latest()->get();
        // return Portfo::latest()->get();
        // return Testimonial::latest()->get();
        // return Companies::latest()->get();
        // return Blog_category::latest()->get();
        // return Blog::latest()->get();
        // return Contactinfo::latest()->get();
        // return CustomFrontend::latest()->get();
        // return Sociallink::latest()->get();
        return view('home');
    }
}

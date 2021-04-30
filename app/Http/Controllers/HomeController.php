<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfo;
use App\Models\Contact;
use App\Models\Companies;
use App\Models\Testimonial;
use App\Models\AboutMeSkill;
use App\Models\Service_title;
use App\Models\CustomFrontend;
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
        return view('home', [
            'services' => Service_title::select('id')->count(),
            'about_me_skill' => AboutMeSkill::select('id')->count(),
            'testimonial' => Testimonial::select('id')->count(),
            'company' => Companies::select('id')->count(),
            'blog' => Blog::select('id')->count(),
            'contact_message' => Contact::select('id')->count(),
            'milestone' => AboutMeMilestone::select('id')->count(),
            'portfolios' => Portfo::select('id')->count(),
            'CustomFronts' => CustomFrontend::select('id', 'portfolio_theme')->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfo;
use App\Models\Contact;
use App\Models\Landview;
use App\Models\Companies;
use App\Models\AboutMeDes;
use App\Models\Sociallink;
use App\Models\Contactinfo;
use App\Models\Testimonial;
use App\Models\AboutMeSkill;
use App\Models\Blog_category;
use App\Models\Service_title;
use App\Models\CustomFrontend;
use App\Models\AboutMeMilestone;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
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



    /**
     * portfolio home page
     *
     * @return void
     */
    function portfolio(){
        // view main portfolio page start
        $hero = Landview::get(['id', 'name', 'landview_image']);
        $service = Service_title::get(['service_title', 'service_list_1', 'service_list_2', 'service_list_3', 'service_list_4', 'service_list_5', 'service_list_6']);
        $AboutMeDes = AboutMeDes::get('about_me_des');
        $milestone = AboutMeMilestone::get(['milestone_name', 'milestone_digit']);
        $testimonials = Testimonial::where('show_status', 2)->get(['testimonial_given', 'designation', 'testimonial', 'testimonial_image',]);
        $companies = Companies::where('show_status', 2)->get(['company_name', 'company_logo']);
        $social_links = Sociallink::all();
        $social_links_topbar = Sociallink::where('show_status', 2)->get(['link_name', 'link']);
        $contact_infos = Contactinfo::all();
        $contact_infos_topbar = Contactinfo::where('show_status', 2)->first();
        $blog = Blog::get(['id','title', 'category_id', 'description', 'blog_thumbnail_image', 'created_at'])->take(10);
        $portfolio = Portfo::get(['id','title', 'description', 'date', 'clients','category_id', 'thumbnail_image', 'created_at'])->take(10);
        $about_me_skills = AboutMeSkill::get(['id', 'skill_name', 'skill_percent']);
        $count_number_skills = $about_me_skills->count();

        $theme = 1;
        foreach (CustomFrontend::get('portfolio_theme') as $portfolio_theme) {
            if($portfolio_theme->portfolio_theme == 1){
                $theme = 1;
            }

            else{
                $theme = 2;
            }
        }

        if($theme == 1){
            return view('portfolio_light', [
                'heros' => $hero,
                'services' => $service,
                'AboutMeDes' => $AboutMeDes,
                'milestones' => $milestone,
                'testimonials' => $testimonials,
                'companies' => $companies,
                'social_links' => $social_links,
                'contact_infos' => $contact_infos,
                'blogs' => $blog,
                'portfolio' => $portfolio,
                'contact_infos_topbar' => $contact_infos_topbar,
                'social_links_topbar' => $social_links_topbar,
                'about_me_skills' => $about_me_skills,
                'count_number_skills' => $count_number_skills,
            ]);
        }
        else{
            return view('portfolio', [
                'heros' => $hero,
                'services' => $service,
                'AboutMeDes' => $AboutMeDes,
                'milestones' => $milestone,
                'testimonials' => $testimonials,
                'companies' => $companies,
                'social_links' => $social_links,
                'contact_infos' => $contact_infos,
                'blogs' => $blog,
                'portfolio' => $portfolio,
                'contact_infos_topbar' => $contact_infos_topbar,
                'social_links_topbar' => $social_links_topbar,
                'about_me_skills' => $about_me_skills,
                'count_number_skills' => $count_number_skills,
            ]);
        }
        
    }


    /**
     * show portfolio details
     *
     * @param  mixed $id
     * @return void
     */
    function portfolio_details($id){
        $social_links = Sociallink::all();
        $contact_infos_topbar = Contactinfo::where('show_status', 2)->first();
        $social_links_topbar = Sociallink::where('show_status', 2)->get(['link_name', 'link']);
        $portfolio = Portfo::where('id', $id)->first();

        $theme = 1;
        foreach (CustomFrontend::get('portfolio_theme') as $portfolio_theme) {
            if($portfolio_theme->portfolio_theme == 1){
                $theme = 1;
            }

            else{
                $theme = 2;
            }
        }

        if($theme == 1){
            return view('frontend.light.portfolios.portfolio_details', compact(['social_links', 'portfolio', 'contact_infos_topbar', 'social_links_topbar']));
        }

        else{
            return view('frontend.dark.portfolios.portfolio_details', compact(['social_links', 'portfolio', 'contact_infos_topbar', 'social_links_topbar']));
        }
    }


    /**
     * show blog details in portfolio
     *
     * @param  mixed $id
     * @return void
     */
    function show_blog($id){
        $blog = Blog::where('id', $id)->first();
        $blog_category = Blog_category::get(['id', 'category_name']);
        $thumbnail_pictures = Blog::get(['id', 'blog_thumbnail_image'])->take(10);
        $social_links = Sociallink::all();
        $contact_infos_topbar = Contactinfo::where('show_status', 2)->first();
        $social_links_topbar = Sociallink::where('show_status', 2)->get(['link_name', 'link']);

        $theme = 1;
        foreach (CustomFrontend::get('portfolio_theme') as $portfolio_theme) {
            if($portfolio_theme->portfolio_theme == 1){
                $theme = 1;
            }

            else{
                $theme = 2;
            }
        }

        if($theme == 1){
            return view('frontend.light.blog_details.blog_details', [
                'blog' => $blog,
                'blog_category' => $blog_category,
                'thumbnail_pictures' => $thumbnail_pictures,
                'social_links' => $social_links,
                'social_links_topbar' => $social_links_topbar,
                'contact_infos_topbar' => $contact_infos_topbar
            ]);
        }

        else{
            return view('frontend.dark.blog_details.blog_details', [
                'blog' => $blog,
                'blog_category' => $blog_category,
                'thumbnail_pictures' => $thumbnail_pictures,
                'social_links' => $social_links,
                'social_links_topbar' => $social_links_topbar,
                'contact_infos_topbar' => $contact_infos_topbar
            ]);
        }
    }


    /**
     * show all post under a blog categories
     *
     * @param  mixed $id
     * @return void
     */
    function show_categories($id){
        $contact_infos_topbar = Contactinfo::where('show_status', 2)->first();
        $social_links_topbar = Sociallink::where('show_status', 2)->get(['link_name', 'link']);
        $blogs = Blog::where('category_id', $id)->get();
        $category_name = Blog_category::find($id)->category_name;
        $social_links = Sociallink::all();

        $theme = 1;
        foreach (CustomFrontend::get('portfolio_theme') as $portfolio_theme) {
            if($portfolio_theme->portfolio_theme == 1){
                $theme = 1;
            }

            else{
                $theme = 2;
            }
        }

        if($theme == 1){
            return view('frontend.light.blog_categories.blog_categories', compact([
                'social_links',
                'blogs',
                'category_name',
                'social_links_topbar',
                'contact_infos_topbar'
            ]));
        }

        else{
            return view('frontend.dark.blog_categories.blog_categories', compact([
                'social_links',
                'blogs',
                'category_name',
                'social_links_topbar',
                'contact_infos_topbar'
            ]));
        }
    }

    
    /**
     * show portfolios category
     *
     * @param  mixed $id
     * @return void
     */
    function show_portfolios_category($id){
        $contact_infos_topbar = Contactinfo::where('show_status', 2)->first();
        $social_links_topbar = Sociallink::where('show_status', 2)->get(['link_name', 'link']);
        $portfolios = Portfo::where('id', $id)->get();
        $category_name = Portfo::find($id)->title;
        $social_links = Sociallink::all();

        $theme = 1;
        foreach (CustomFrontend::get('portfolio_theme') as $portfolio_theme) {
            if($portfolio_theme->portfolio_theme == 1){
                $theme = 1;
            }

            else{
                $theme = 2;
            }
        }

        if($theme == 1){
            return view('frontend.light.portfolio_category.portfolio_category', compact([
                'social_links', 
                'portfolios', 
                'category_name',
                'contact_infos_topbar',
                'social_links_topbar'
            ]));
        }

        else{
            return view('frontend.dark.portfolio_category.portfolio_category', compact([
                'social_links', 
                'portfolios', 
                'category_name',
                'contact_infos_topbar',
                'social_links_topbar'
            ]));
        }
    }
}

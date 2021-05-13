<?php

namespace App\Http\Controllers;

use App\Models\Portfo;
use App\Models\Landview;
use App\Models\AboutMeDes;
use Illuminate\Support\Str;
use App\Models\PortfoImages;
use Illuminate\Http\Request;
use App\Models\Service_title;
use App\Models\PortfoCategory;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    /**
     * portfolio content index
     *
     * @return void
     */
    function portfolio_index(){
        return view('admin.portfolio.index', [
            'portfolio' => Portfo::all(),
            'portfolio_category' => PortfoCategory::all(),
            'porfo_images' => PortfoImages::all(),
        ]);
    }


    /**
     * portfolio content create post
     *
     * @param  mixed $request
     * @return void
     */
    function portfolio_create_post(Request $request){
        // input validation start
        $request->validate([
            'title' => ['string', 'required'],
            'description' => ['string'],
            'date' => ['date'],
            'clients' => ['string'],
            'category_id' => ['numeric'],
        ]);

        // inserting data to portfolio table start
        $portfo_id = Portfo::insertGetId([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'clients' => $request->clients,
            'category_id' => $request->category_id,
            'created_at' => now(),
        ]);

        // portfolio thumbnail image upload start
        if ($request->hasFile('thumbnail_image')){
            $uploaded_picture = $request->file('thumbnail_image');
            $picture_name = $portfo_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/portfolios/thumbnail_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Portfo::findOrFail($portfo_id)->update([
                'thumbnail_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        // Multiple image upload start
        if($request->hasFile('portfo_image')){
            $flag = 1;

            foreach($request->file('portfo_image') as $single_picture) {
                $uploaded_picture = $single_picture;
                $picture_name = $portfo_id."_".$flag.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/portfolios/portfo_image/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));

                $flag++;

                PortfoImages::insert([
                    'portfo_id' => $portfo_id,
                    'portfo_image' => $picture_name,
                    'created_at' => now(),
                ]);
            }
        }

        return redirect()->route('portfolio_index')->with('portfo_details_done', 'Your have added a new portfolio for your portfolios ');
    }


    /**
     * portfolio edit
     *
     * @param  mixed $id
     * @return void
     */
    function portfolio_edit($id){
        return view('admin.portfolio.portfolio_content.edit', [
            'portfo_details' => Portfo::findOrFail($id),
            'portfolio_category' => PortfoCategory::all(),
        ]);
    }


    /**
     * portfolio edit post
     *
     * @param  mixed $request
     * @return void
     */
    function portfolio_edit_post(Request $request){
        // input validation
        $request->validate([
            'title' => ['string', 'required'],
            'description' => ['string'],
            'date' => ['date'],
            'clients' => ['string'],
            'category_id' => ['numeric'],
        ]);

        // updating data to portfolio table
        Portfo::findOrFail($request->value)->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'clients' => $request->clients,
                'category_id' => $request->category_id,
                'updated_at' => now(),
        ]);
        
        // redirecting to portfolio index page
        return redirect()->route('portfolio_index')->with('portfo_details_edit_done', 'Your have edited an existing portfolio for your portfolios ');
    }


    /**
     * portfolio hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function portfolio_hard_delete($id){
        // portfolio data to delete
        $portfolio = Portfo::findOrFail($id);

        // portfolio data deleting
        $portfolio->forceDelete();

        // thumbnail picture deleting
        if($portfolio->thumbnail_image != 'thumbnail_image_default.jpg'){
            $portfo_thumb_picture_location = 'public/uploads/portfolios/thumbnail_image/'.$portfolio->thumbnail_image;
            unlink(base_path($portfo_thumb_picture_location));
        }

        // portfolio multiple images deleting
        foreach (PortfoImages::where('portfo_id', $portfolio->id)->get() as $value) {
            if($value->portfo_image != 'portfo_image_default.jpg'){
                $portfo_multiple_picture_location = 'public/uploads/portfolios/portfo_image/'.$value->portfo_image;
                unlink(base_path($portfo_multiple_picture_location));
            }
        }

        // redirecting to home page
        return redirect()->route('portfolio_index')->with('portfo_details_deleted', 'Your have deleted an existing portfolio for your portfolios ');
    }


    /**
     * portfolio category create post
     *
     * @param  mixed $request
     * @return void
     */
    function portfolio_cat_create_post(Request $request){
        $request->validate([
            'category_name' => ['alpha_spaces', 'unique:portfo_categories,category_name'],
        ]);
        PortfoCategory::insert([
            'category_name' => Str::title($request->category_name),
            'created_at' => now(),
        ]);
        return redirect()->route('portfolio_index')->with('portfo_cat_done', 'Your have added a new category for your portfolios ');
    }


    /**
     * portfolio category edit
     *
     * @param  mixed $id
     * @return void
     */
    function portfolio_cat_edit($id){
        return view('admin.portfolio.portfolio_category.edit', [
            'portfolio_category' => PortfoCategory::findOrFail($id),
        ]);
    }


    /**
     * portfolio category edit post
     *
     * @param  mixed $request
     * @return void
     */
    function portfolio_cat_edit_post(Request $request){;
        $request->validate([
            'category_name' => ['alpha_spaces', 'unique:portfo_categories,category_name'],
        ]);
        PortfoCategory::findOrFail($request->value)->update([
            'category_name' => Str::title($request->category_name),
            'updated_at' => now(),
        ]);
        return redirect()->route('portfolio_index')->with('portfo_cat_edit_done', 'Your have edited an existing category of your portfolios ');
    }


    /**
     * portfolio category hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function portfolio_cat_hard_delete($id){
        PortfoCategory::findOrFail($id)->forceDelete();
        return redirect()->route('portfolio_index')->with('portfo_cat_destroyed', 'Your have deleted an existing category of your portfolios ');
    }
}

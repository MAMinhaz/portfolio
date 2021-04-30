<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomFrontend;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CustomFrontendController extends Controller
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
     * front customize index
     * @return void
     */
    function front_customize_index(){
        $datas = 0;
        if(count(CustomFrontend::all()) >= 1) {
            $datas = 1;
        }
        return view('admin.customize_frontend.index',[
            'custom_f' => CustomFrontend::latest()->get(),
            'datas' => $datas,
        ]);
    }


    /**
     * front customize create post
     * @param  mixed $request
     * @return void
     */
    function front_customize_create_post(Request $request){
        $count = CustomFrontend::all();

        // duplicate information validation
        if(count($count) >= 1) {
            return back()->with('customized_before', 'You have customized your frontend before. To Customized it again delete it first and try again..');
        }

        elseif(count($count) == 0){
            // input validation
            $request->validate([
                "job_title" => ['string', 'required'],
                "site_name" => ['string', 'required'],
                "portfolio_logo" => ['image', 'required'],
                "cv" => ['nullable'],
                "mockup_image" => ['image'],
                "hire_me_image" => ['image'],
                "testimonial_image" => ['image'],
                "get_in_touch_image" => ['image'],
            ]);

            // data upload
            $custom_front_id = CustomFrontend::insertGetId([
                "job_title" => Str::title($request->job_title),
                "site_name" => $request->job_title,
                "created_at" => now(),
            ]);

            if($request->hasFile('portfolio_logo')){
                // portfolio logo image upload
                $uploaded_picture = $request->file('portfolio_logo');
                $picture_name = "portfolio_logo_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/portfolio_logo/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));
                CustomFrontend::findOrFail($custom_front_id)->update([
                    'portfolio_logo' => $picture_name,
                    'updated_at' => now(),
                ]);
            }

            if($request->hasFile('cv')){
                // CV file upload
                $path = $request->file('cv')->storeAs(
                    'cv_upload', $custom_front_id.'.'.$request->file('cv')->getClientOriginalExtension(),
                );

                CustomFrontend::find($custom_front_id)->update([
                    'cv' => $path,
                    'updated_at' => now(),
                ]);
            }

            if($request->hasFile('mockup_image')){
                // mock-up image upload
                $uploaded_picture = $request->file('mockup_image');
                $picture_name = "mock_up_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/mockup_image/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));
                CustomFrontend::find($custom_front_id)->update([
                    'mockup_image' => $picture_name,
                    'updated_at' => now(),
                ]);
            }

            if($request->hasFile('hire_me_image')){
                // hire me image upload
                $uploaded_picture = $request->file('hire_me_image');
                $picture_name = "hire_me_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/hire_me_image/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));
                CustomFrontend::find($custom_front_id)->update([
                    'hire_me_image' => $picture_name,
                    'updated_at' => now(),
                ]);
            }

            if($request->hasFile('testimonial_image')){
                // testimonial image upload
                $uploaded_picture = $request->file('testimonial_image');
                $picture_name = "testimonial_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/testimonial_image/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));
                CustomFrontend::find($custom_front_id)->update([
                    'testimonial_image' => $picture_name,
                    'updated_at' => now(),
                ]);
            }

            if($request->hasFile('get_in_touch_image')){
                // get in touch testimonial image upload
                $uploaded_picture = $request->file('get_in_touch_image');
                $picture_name = "get_in_touch_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                $picture_location = 'public/uploads/get_in_touch_image/'.$picture_name;
                Image::make($uploaded_picture)->save(base_path($picture_location));
                CustomFrontend::find($custom_front_id)->update([
                    'get_in_touch_image' => $picture_name,
                    'updated_at' => now(),
                ]);
            }

                // customized completed
                return redirect()->route('front_customize_index')->with('front_customized', 'You successfullyl customized your portfolio website.');
        }
    }


    /**
     * front customize edit post
     *
     * @param  mixed $request
     * @return void
     */
    function front_customize_edit_post(Request $request){
        $front_data = CustomFrontend::findOrFail($request->value);

        // input validation
        $request->validate([
            "job_title" => ['string'],
            "site_name" => ['string'],
            "cv" => ['nullable'],
        ]);

        $front_data->update([
            'job_title' => Str::title($request->job_title),
            'site_name' => $request->site_name,
            'updated_at' => now(),
        ]);

        if($request->hasFile('portfolio_logo')){
            // old portfolio logo deleting
            if($front_data->portfolio_logo != 'portfolio_logo_default.png'){
                $picture_location = 'public/uploads/portfolio_logo/'.$front_data->portfolio_logo;
                unlink(base_path($picture_location));
            }

            // new portfolio logo image upload
            $uploaded_picture = $request->file('portfolio_logo');
            $picture_name = "portfolio_logo_".$front_data->id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/portfolio_logo/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            CustomFrontend::findOrFail($front_data->id)->update([
                'portfolio_logo' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        if($request->hasFile('cv')){
            if(!$front_data->cv == null){
                // old cv logo deleting
                $picture_location = 'storage/app/public/'.$front_data->cv;
                unlink(base_path($picture_location));
            }

            // new CV file upload
            $path = $request->file('cv')->storeAs(
                'cv_upload', $front_data->id.'.'.$request->file('cv')->getClientOriginalExtension(),
            );

            CustomFrontend::find($front_data->id)->update([
                'cv' => $path,
                'updated_at' => now(),
            ]);
        }

        if($request->hasFile('mockup_image')){
            // old mock-up background picture deleting
            if($front_data->mockup_image != 'mockup_default.png'){
                $picture_location = 'public/uploads/mockup_image/'.$front_data->mockup_image;
                unlink(base_path($picture_location));
            }

            // new mock-up image upload
            $uploaded_picture = $request->file('mockup_image');
            $picture_name = "mock_up_image_".$front_data->id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/mockup_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            CustomFrontend::find($front_data->id)->update([
                'mockup_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        if($request->hasFile('hire_me_image')){
            // // old hire me block's background picture deleting
            if($front_data->hire_me_image != 'hire_me_default.jpg'){
                $picture_location = 'public/uploads/hire_me_image/'.$front_data->hire_me_image;
                unlink(base_path($picture_location));
            }

            // new hire me image upload
            $uploaded_picture = $request->file('hire_me_image');
            $picture_name = "hire_me_image_".$front_data->id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/hire_me_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            CustomFrontend::find($front_data->id)->update([
                'hire_me_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        if($request->hasFile('testimonial_image')){
            // old testimonial block's background picture deleting
            if($front_data->testimonial_image != 'testimonial_default.jpg'){
                $picture_location = 'public/uploads/testimonial_image/'.$front_data->testimonial_image;
                // unlink(base_path($picture_location));
            }

            // new testimonial image upload
            $uploaded_picture = $request->file('testimonial_image');
            $picture_name = "testimonial_image_".$front_data->id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/testimonial_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            CustomFrontend::find($front_data->id)->update([
                'testimonial_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        if($request->hasFile('get_in_touch_image')){
            // old get in touch block's background picture deleting
            if($front_data->get_in_touch_image != 'get_in_touch_default.jpg'){
                $picture_location = 'public/uploads/get_in_touch_image/'.$front_data->get_in_touch_image;
                unlink(base_path($picture_location));
            }

            // new get in touch testimonial image upload
            $uploaded_picture = $request->file('get_in_touch_image');
            $picture_name = "get_in_touch_image_".$front_data->id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/get_in_touch_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            CustomFrontend::find($front_data->id)->update([
                'get_in_touch_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

            // customization edit completed
            return redirect()->route('front_customize_index')->with('front_customized_edit', 'You successfullyl customized your portfolio website again.');
    }


    /**
     * front customize hard delete
     * @param  mixed $id
     * @return void
     */
    function front_customize_hard_delete($id){
        // old customization
        $custom_front = CustomFrontend::FindOrFail($id);

        // old customization deleting
        $custom_front->forceDelete();

        // old portfolio logo deleting
        if($custom_front->portfolio_logo != 'portfolio_logo_default.png'){
            $picture_location = 'public/uploads/portfolio_logo/'.$custom_front->portfolio_logo;
            unlink(base_path($picture_location));
        }

        // old cv logo deleting
        if(!$custom_front->cv == ''){
            $name = explode('/', $custom_front->cv);
            $file = $name[1];

            // // file deleting
            $picture_location = 'storage/app/public/'.$custom_front->cv;
            unlink(base_path($picture_location));
        }

        // old mock-up background picture deleting
        if($custom_front->mockup_image != 'mockup_default.png'){
            $picture_location = 'public/uploads/mockup_image/'.$custom_front->mockup_image;
            unlink(base_path($picture_location));
        }

        // old hire me block's background picture deleting
        if($custom_front->hire_me_image != 'hire_me_default.jpg'){
            $picture_location = 'public/uploads/hire_me_image/'.$custom_front->hire_me_image;
            unlink(base_path($picture_location));
        }

        // old testimonial block's background picture deleting
        if($custom_front->testimonial_image != 'testimonial_default.jpg'){
            $picture_location = 'public/uploads/testimonial_image/'.$custom_front->testimonial_image;
            unlink(base_path($picture_location));
        }

        // old get in touch block's background picture deleting
        if($custom_front->get_in_touch_image != 'get_in_touch_default.jpg'){
            $picture_location = 'public/uploads/get_in_touch_image/'.$custom_front->get_in_touch_image;
            unlink(base_path($picture_location));
        }

        return redirect()->route('front_customize_index')->with('customized_removed', 'You have removed old fronend customization successgully.');
    }


    /**
     * download old cv
     *
     * @param  mixed $id
     * @return void
     */
    function download_old_cv($id){
        // file download 
        return Storage::download(CustomFrontend::findOrFail($id)->cv);
    }


    function front_customize_to_theme_light($id){
        CustomFrontend::findOrFail($id)->update([
            'portfolio_theme' => 1,
        ]);
        return redirect()->route('home')->with('theme_changed', 'You have changed your portfolio websites theme to light.');
    }

    function front_customize_to_theme_dark($id){
        CustomFrontend::findOrFail($id)->update([
            'portfolio_theme' => 2,
        ]);
        return redirect()->route('home')->with('theme_changed', 'You have changed your portfolio websites theme to dark.');
    }
}
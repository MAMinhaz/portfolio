<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomFrontend;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomFrontendController extends Controller
{
    /**
     * front customize index
     * @return void
     */
    function front_customize_index(){
        return view('admin.customize_frontend.index',[
            'custom_f' => CustomFrontend::latest()->get(),
        ]);
    }


    /**
     * front customize create post
     * @param  mixed $request
     * @return void
     */
    function front_customize_create_post(Request $request){
        // input validation
        $request->validate([
            "job_title" => ['string', 'required'],
            "mockup_image" => ['image', 'required'],
            "hire_me_image" => ['image', 'required'],
            "testimonial_image" => ['image', 'required'],
            "get_in_touch_image" => ['image', 'required'],
        ]);

        $count = CustomFrontend::all();

        // duplicate information validation
        if(count($count) >= 1) {
            return back()->with('customized_before', 'You have customized your frontend before. To Customized it again delete it first and try again..');
        }

        elseif(count($count) == 0){

            // error variable
            if($request->hasFile('mockup_image')){
                if($request->hasFile('hire_me_image')){
                    if($request->hasFile('testimonial_image')){
                        if($request->hasFile('get_in_touch_image')){

                            // data upload
                            $custom_front_id = CustomFrontend::insertGetId([
                                "job_title" => $request->job_title,
                                "addedby" => Auth::id(),
                                "created_at" => now(),
                            ]);

                            // mock-up image upload
                            $uploaded_picture = $request->file('mockup_image');
                            $picture_name = "mock_up_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                            $picture_location = 'public/uploads/mockup_image/'.$picture_name;
                            Image::make($uploaded_picture)->save(base_path($picture_location));
                            CustomFrontend::find($custom_front_id)->update([
                                'mockup_image' => $picture_name,
                                'updated_at' => now(),
                            ]);

                            // hire me image upload
                            $uploaded_picture = $request->file('hire_me_image');
                            $picture_name = "hire_me_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                            $picture_location = 'public/uploads/hire_me_image/'.$picture_name;
                            Image::make($uploaded_picture)->save(base_path($picture_location));
                            CustomFrontend::find($custom_front_id)->update([
                                'hire_me_image' => $picture_name,
                                'updated_at' => now(),
                            ]);

                            // testimonial image upload
                            $uploaded_picture = $request->file('testimonial_image');
                            $picture_name = "testimonial_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                            $picture_location = 'public/uploads/testimonial_image/'.$picture_name;
                            Image::make($uploaded_picture)->save(base_path($picture_location));
                            CustomFrontend::find($custom_front_id)->update([
                                'testimonial_image' => $picture_name,
                                'updated_at' => now(),
                            ]);

                            // get in touch testimonial image upload
                            $uploaded_picture = $request->file('get_in_touch_image');
                            $picture_name = "get_in_touch_image_".$custom_front_id.".".$uploaded_picture->getClientOriginalExtension();
                            $picture_location = 'public/uploads/get_in_touch_image/'.$picture_name;
                            Image::make($uploaded_picture)->save(base_path($picture_location));
                            CustomFrontend::find($custom_front_id)->update([
                                'get_in_touch_image' => $picture_name,
                                'updated_at' => now(),
                            ]);

                            // customized completed
                            return redirect()->route('front_customize_index')->with('front_customized', 'You successfullyl customized your portfolio website.');
                        }

                        else {
                            return back()->with('get_in_touch_not_selected', 'You did not select your get in touch sections background picture.');
                        }
                    }

                    else{
                        return back()->with('testimonial_not_selected', 'You did not select your testimonial sections background picture.');
                    }
                }

                else{
                    return back()->with('hire_me_not_selected', 'You did not select your hire-me sections background picture.');
                }
            }

            else {
                return back()->with('mock_up_not_selected', 'You did not select your mock-up picture.');
            }
        }
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

        // old mock-up background picture deleting
        $picture_location = 'public/uploads/mockup_image/'.$custom_front->mockup_image;
        unlink(base_path($picture_location));

        // old hire me block's background picture deleting
        $picture_location = 'public/uploads/hire_me_image/'.$custom_front->hire_me_image;
        unlink(base_path($picture_location));

        // old testimonial block's background picture deleting
        $picture_location = 'public/uploads/testimonial_image/'.$custom_front->testimonial_image;
        unlink(base_path($picture_location));

        // old get in touch block's background picture deleting
        $picture_location = 'public/uploads/get_in_touch_image/'.$custom_front->get_in_touch_image;
        unlink(base_path($picture_location));

        return redirect()->route('front_customize_index')->with('customized_removed', 'You have removed old fronend customization successgully.');
    }
}
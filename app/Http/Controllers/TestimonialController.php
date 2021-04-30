<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
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
     * testimonial index page
     *
     * @return void
     */
    function testimonial_index(){
        $company = Companies::all();
        $c_count = Companies::all()->count();
        return view('admin.testimonial.index', [
            "testimonials" => Testimonial::all(),
            "companies" => $company,
            "count" => $c_count,
        ]);
    }


    /**
     * testimonial create post
     *
     * @param  mixed $request
     * @return void
     */
    function testimonial_create_post(Request $request){
        // input validation
        $request->validate([
            "testimonial_given" => ['required','string'],
            "designation" => ['string', 'nullable'],
            "testimonial" => ['required', 'string'],
        ]);

        // data inserting
        $testimonial_id = Testimonial::insertGetId([
            "testimonial_given" => $request->testimonial_given,
            "designation" => $request->designation,
            "testimonial" => $request->testimonial,
            "show_status" => 1,
            "created_at" => now(),
        ]);

        // testimonial writer image upload
        if ($request->hasFile('testimonial_image')){
            $uploaded_picture = $request->file('testimonial_image');
            $picture_name = "testimonial_image_".$testimonial_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/testimonial/testimonial_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Testimonial::findOrFail($testimonial_id)->update([
                'testimonial_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_add_done', 'Your have added a new testimonial for your testimonials');
    }


    /**
     * edit testimonial
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_edit($id){
        // view testimonial edit page
        return view('admin.testimonial.testimonial.edit', [
            'testimonials' => Testimonial::findOrFail($id),
        ]);
    }


    /**
     * testimonial edit post
     *
     * @param  mixed $request
     * @return void
     */
    function testimonial_edit_post(Request $request){
        // input validation
        $request->validate([
            "testimonial_given" => ['required','string'],
            "designation" => ['string', 'nullable'],
            "testimonial" => ['required', 'string'],
        ]);

        // data updating
        Testimonial::findOrFail($request->value)->update([
            "testimonial_given" => $request->testimonial_given,
            "designation" => $request->designation,
            "testimonial" => $request->testimonial,
            "updated_at" => now(),
        ]);

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_edit_done', 'Your have edited an existing testimonial from your testimonials');
    }


    /**
     * show testimonial
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_show($id){
        // data updating
        Testimonial::findOrFail($id)->update([
            "show_status" => 2,
            "updated_at" => now(),
        ]);

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_show_done', 'Your have showed a testimonial for your testimonials');
    }


    /**
     * hide testimonial
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_hide($id){
        // data updating
        Testimonial::findOrFail($id)->update([
            "show_status" => 1,
            "updated_at" => now(),
        ]);

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_hide_done', 'Your have hide a testimonial for your testimonials');
    }


    /**
     * testimonial hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_hard_delete($id){
        // testimonial datas to delete
        $testimonial = Testimonial::findOrFail($id);

        // testimonila deleting
        $testimonial->forceDelete();

        // testimonial image deleting
        if($testimonial->testimonial_image != 'testimonial_image_default.jpg'){
            $testimonial_picture_location = 'public/uploads/testimonial/testimonial_image/'.$testimonial->testimonial_image;
            unlink(base_path($testimonial_picture_location));
        }

        // redirecting to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_deleted', 'Your have deleted an existing testimonia for your portfolio ');
    }


    /**
     * testimonial companies create post
     *
     * @param  mixed $request
     * @return void
     */
    function testimonial_companies_create_post(Request $request){
        // input validation
        $request->validate([
            "company_name" => ['string', 'required', 'unique:companies,company_name'],
            "company_logo" => ['image', 'required'],
        ]);

        // inserting data
        $company_id = Companies::insertGetId([
            "company_name" => $request->company_name,
            "created_at" => now(),
        ]);

        // company logo image upload
        if ($request->hasFile('company_logo')) {
            $uploaded_picture = $request->file('company_logo');
            $picture_name = "company_logo_".$company_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/company_logo/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Companies::findOrFail($company_id)->update([
                'company_logo' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('company_added', 'You have added a new company for your testimonial..');
    }


    /**
     * edit testimonial companies
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_companies_edit($id){
        // view companies edit page
        return view('admin.testimonial.companies.edit', [
            'companies' => Companies::findOrFail($id),
        ]);
    }


    /**
     * testimonial companies edit post
     *
     * @param  mixed $request
     * @return void
     */
    function testimonial_companies_edit_post(Request $request){
        // selected company's data
        $company = Companies::findOrFail($request->value);

        // input validation
        $request->validate([
            "company_name" => ['string', 'nullable'],
            "company_logo" => ['image', 'nullable'],
        ]);

        // data updating
        $company->update([
            "company_name" => $request->company_name,
            "updated_at" => now(),
        ]);

        if ($request->hasFile('company_logo')) {
            // company old image deleting
            if($company->company_logo != 'company_logo_default.jpg'){
                $company_logo_location = 'public/uploads/company_logo/'.$company->company_logo;
                unlink(base_path($company_logo_location));
            }

            // company new logo image upload
            $uploaded_picture = $request->file('company_logo');
            $picture_name = "company_logo_".$company->id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/company_logo/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Companies::findOrFail($company->id)->update([
                'company_logo' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('company_edited', 'You have edited an existing company for your testimonial..');
    }


    /**
     * testimonial companies hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_companies_hard_delete($id){
        // companies datas to delete
        $company = Companies::findOrFail($id);

        // company data deleting
        $company->forceDelete();

        // company logo image deleting
        if($company->company_logo != 'company_logo_default.jpg'){
            $company_logo_location = 'public/uploads/company_logo/'.$company->company_logo;
            unlink(base_path($company_logo_location));
        }

        // redirecting to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_company_deleted', 'Your have deleted an existing company that you worked with from your testimonial.');
    }


    
    /**
     * testimonial companies show
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_companies_show($id){
        // data updating
        Companies::findOrFail($id)->update([
            "show_status" => 2,
            "updated_at" => now(),
        ]);

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_companies_show_done', 'Your have showed a company that you worked with for your testimonials');
    }


    
    /**
     * testimonial companies hide
     *
     * @param  mixed $id
     * @return void
     */
    function testimonial_companies_hide($id){
        // data updating
        Companies::findOrFail($id)->update([
            "show_status" => 1,
            "updated_at" => now(),
        ]);

        // redirected to testimonial index page
        return redirect()->route('testimonial_index')->with('testimonial_companies_hidden_done', 'Your have hidden a company that you worked with for your testimonials');
    }
}

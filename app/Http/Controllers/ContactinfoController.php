<?php

namespace App\Http\Controllers;

use App\Models\Sociallink;
use App\Models\Contactinfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactinfoController extends Controller
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
     * frontend contact info index page
     * @return void
     */
    function f_contactinfo_index(){
        // frontend contact info index page
        return view('admin.contactinfo.index', [
            'contactinfo' => Contactinfo::latest()->get(),
            'sociallink' => Sociallink::latest()->get(),
        ]);
    }


    /**
     * f contact info create post
     * @param  mixed $request
     * @return void
     */
    function f_contactinfo_create_post(Request $request){
        // counting previously added column for limit validation
        $count = count(Contactinfo::all());

        if($count < 3){
            // input validation
            $request->validate([
                'email' => ['required', 'email'],
                'cell_number' => ['required', 'integer'],
                'address' => ['required', 'string'],
            ]);

            // data inserting
            Contactinfo::insert([
                'email' => $request->email,
                'cell_number' => $request->cell_number,
                'address' => $request->address,
                'created_at' => now(),
            ]);

            return back()->with('contact_info_added', 'Congratulations, you have added new contact information.');
        }

        else{
            return back()->with('contact_add_limit', 'You cannot add your contact information more that three times. Either you can edit previous one or remove previous one and try again to add new.');
        }
    }


    /**
     * frontend contact info edit
     * @param  mixed $id
     * @return void
     */
    function f_contactinfo_edit($id){
        // view editing page
        return view('admin.contactinfo.contactinfo.edit',[
            'contactinfo' => Contactinfo::findOrFail($id),
        ]);
    }


    /**
     * frontend contact info edit post
     * @param  mixed $request
     * @return void
     */
    function f_contactinfo_edit_post(Request $request){
        // input validation
        $request->validate([
            'email' => ['email'],
            'cell_number' => ['integer'],
            'address' => ['string'],
        ]);

        // data updating
        Contactinfo::findOrFail($request->value)->update([
            'email' => $request->email,
            'cell_number' => $request->cell_number,
            'address' => $request->address,
            'updated_at' => now(),
        ]);

        return redirect()->route('f_contactinfo_index')->with('contact_info_edited', 'Congratulations, you have edited an existing contact information.');
    }


    /**
     * frontend contact info hard delete
     * @param  mixed $id
     * @return void
     */
    function f_contactinfo_hard_delete($id){
        // contact info deleting
        Contactinfo::findOrFail($id)->forceDelete();
        return redirect()->route('f_contactinfo_index')->with('contact_info_deleted', 'You have deleted an existing contact information.');
    }


    /**
     * hiding frontend contact info
     * @param  mixed $id
     * @return void
     */
    function f_contactinfo_hide($id){
        // data updating
        Contactinfo::findOrFail($id)->update([
            'show_status' => 2,
            'updated_at' => now(),
        ]);

        return redirect()->route('f_contactinfo_index')->with('contact_info_hidden', 'You have hidden an existing contact information.');
    }


    /**
     * showing frontend contact info
     * @param  mixed $id
     * @return void
     */
    function f_contactinfo_show($id){
        // data updating
        Contactinfo::findOrFail($id)->update([
            'show_status' => 1,
            'updated_at' => now(),
        ]);

        return redirect()->route('f_contactinfo_index')->with('contact_info_shown', 'You have shown an existing contact information.');
    }


    /**
     * frontend social links create post
     * @param  mixed $request
     * @return void
     */
    function f_links_create_post(Request $request){
        // counting previously added column for limit validation
        $count = count(Sociallink::all());

        if($count < 6){
            // input validation
            $request->validate([
                'link_name' => ['alpha_spaces', 'required'],
                'link' => ['required', 'url'],
            ]);

            // data inserting
            Sociallink::insert([
                'link_name' => Str::title($request->link_name),
                'link' => $request->link,
                'created_at' => now(),
            ]);

            return redirect()->route('f_contactinfo_index')->with('link_added', 'Congrats, You have added new social link for contact.');
        }

        else{
            return redirect()->route('f_contactinfo_index')->with('link_add_limit', 'You cannot add more that 7 social link for your contact section.');
        }
    }


    /**
     * frontend social links edit
     * @param  mixed $id
     * @return void
     */
    function f_links_edit($id){
        return view('admin.contactinfo.social_links.edit',[
            'link' => Sociallink::findOrFail($id),
        ]);
    }


    /**
     * frontend social links edit post
     * @param  mixed $request
     * @return void
     */
    function f_links_edit_post(Request $request){
        // input validation
        $request->validate([
            'link_name' => ['alpha_spaces', 'required'],
            'link' => ['required', 'url'],
        ]);

        // data updating
        Sociallink::findOrFail($request->value)->update([
                'link_name' => $request->link_name,
                'link' => $request->link,
                'updated_at' => now(),
        ]);

        return redirect()->route('f_contactinfo_index')->with('link_edited', 'You have edited an existing social link for your contact section.');
    }


    /**
     * frontend social links hard delete
     * @param  mixed $id
     * @return void
     */
    function f_links_hard_delete($id){
        // social link deleting
        Sociallink::findOrFail($id)->forceDelete();
        return redirect()->route('f_contactinfo_index')->with('link_deleted', 'You have deleted an existing social link.');
    }


    /**
     * hiding frontend social link
     * @param  mixed $id
     * @return void
     */
    function f_link_hide($id){
        // data updating
        Sociallink::findOrFail($id)->update([
            'show_status' => 2,
            'updated_at' => now(),
        ]);

        return redirect()->route('f_contactinfo_index')->with('link_hidden', 'You have hidden an existing social link.');
    }


    /**
     * showing frontend social link
     * @param  mixed $id
     * @return void
     */
    function f_link_show($id){
        // data updating
        Sociallink::findOrFail($id)->update([
            'show_status' => 1,
            'updated_at' => now(),
        ]);

        return redirect()->route('f_contactinfo_index')->with('link_shown', 'You have shown an existing social link.');
    }
}
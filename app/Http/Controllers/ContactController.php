<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * contact details index page
     *
     * @return void
     */
    function contact_index(){
        // show contact index page
        return view('admin.contact.index', [
            'contacts' => Contact::all(),
        ]);
    }


    /**
     * contact create post
     *
     * @param  mixed $request
     * @return void
     */
    function contact_create_post(Request $request){
        // input validation
        $request->validate([
            "contact_name" => ['alpha_spaces', 'required'],
            "contact_email" => ['email', 'required'],
            "contact_subject" => ['string'],
            "contact_message" => ['string'],
        ]);

        // data inserting
        $contact_id = Contact::insertGetId([
            "contact_name" => $request->contact_name,
            "contact_email" => $request->contact_email,
            "contact_subject" => $request->contact_subject,
            "contact_message" => $request->contact_message,
            "created_at" => now(),
        ]);

        // file upload
        if($request->hasFile('contact_attachment')){
            $path = $request->file('contact_attachment')->storeAs(
                'contact_attachment_upload', $contact_id.'.'.$request->file('contact_attachment')->getClientOriginalExtension(),
            );

            Contact::find($contact_id)->update([
                'contact_attachment' => $path,
                'updated_at' => now(),
            ]);
        }

        return back()->with('contact_created', 'Thanks for contacting us. We will let you know what you want.');
    }


    /**
     * contact details hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function contact_hard_delete($id){
        // data to be deleted
        $contact = Contact::findOrFail($id);

        // data deleted
        $contact->forceDelete();

        // file deleted
        Storage::delete($contact->contact_attachment);

        return redirect()->route('contact_index')->with('contact_deleted', 'You have successfully deleted a contact info.');
    }


    /**
     * contact attachment download
     *
     * @param  mixed $id
     * @return void
     */
    function contact_download($id){
    // file download 
    return Storage::download(Contact::findOrFail($id)->contact_attachment);
    }
}

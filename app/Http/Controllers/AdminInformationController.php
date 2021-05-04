<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordChanged;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminInformationController extends Controller
{
    /**
     * admin information index
     *
     * @return void
     */
    function admin_index(){
        return view('admin.admin_informations.index', [
            'users' => User::where('id', Auth::id())->get(),
        ]);
    }


    /**
     * admin information update post
     *
     * @param  mixed $request
     * @return void
     */
    function info_update_post(Request $request){
        $request->validate([
            'name' => ['alpha_spaces', 'nullable'],
            'email' => ['email', 'nullable'],
        ]);

        User::findOrFail(Auth::id())->update([
            'name' => Str::title($request->name),
            'email' => $request->email,
            'updated_at' => now(),
        ]);

        return back()->with('admin_general_info_changed', 'You have successfully changed your admin account information.');
    }


    /**
     * admin password update post
     *
     * @param  mixed $request
     * @return void
     */
    function password_update_post(Request $request){
        $request->validate([
            'password' => 'confirmed'
        ]);

        if(Hash::check($request->old_password, Auth::user()->password)){

            if ($request->old_password == $request->password) {
                return back()->with('error_reenter_old', 'You entered your old password. Please try a new password');
            }

            else {
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password),
                    'updated_at' => now(),
                ]);

                //Sending password changing notification email start 
                Mail::to(Auth::user()->email)->send(new PasswordChanged);
                return back()->with('password_change_success', 'Your password changed successfully');
            }
        }

        else{
            return back()->with('error_password_hash_unmatched', 'Your old password does not matched. Please try again..');
        }
    }
}
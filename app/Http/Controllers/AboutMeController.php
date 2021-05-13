<?php

namespace App\Http\Controllers;

use App\Models\AboutMeDes;
use Illuminate\Support\Str;
use App\Models\AboutMeSkill;
use Illuminate\Http\Request;
use App\Models\AboutMeMilestone;

class AboutMeController extends Controller
{
    /**
     * about me index page
     *
     * @return void
     */
    function index(){
        // index view page
        return view('admin.about_me.index',[
            'about_me_desc' => AboutMeDes::all(),
            'about_me_skills' => AboutMeSkill::all(),
            'about_me_mss' => AboutMeMilestone::all(),
            'about_me_desc' => AboutMeDes::all(),
            'about_me_des_count' => AboutMeDes::all()->count(),
            'about_me_ms_count' => AboutMeMilestone::all()->count(),
        ]);
    }


    /**
     * aboutme description create post
     *
     * @param  mixed $request
     * @return void
     */
    function aboutme_des_create_post(Request $request){
        // about me description duplicate validation
        if (AboutMeDes::all()->count() >= 1){
            return redirect()->route('aboutme')->with('aboutme_des_dup', 'You can not add a description to your portfolio'."'".'s about me section second time. You can edit the previous one.');
        }

        else {
            // about me description field blank validation
            if($request->input('about_me_des') == null){
                return redirect()->route('aboutme')->with('aboutme_des_blank', 'If you wish to add a description to your portfolio'."'".'s about me section then you cannot leave this field empty.');
            }

            else{
                // validating inputs
                $valid = $request->validate([
                    'about_me_des' => ['string'],
                ],
                $messages = [
                    'about_me_des.string' => 'Your about me sections description should be a string.',
                ]);

                // inserting data
                AboutMeDes::insert([
                    'about_me_des' => $request->about_me_des,
                    'created_at' => now(),
                ]);
                return redirect()->route('aboutme')->with('aboutme_des_added', 'You have added a description to your portfolio'."'".'s about me section.');
            }
        }
    }


    /**
     * aboutme description edit page
     *
     * @param  mixed $id
     * @return void
     */
    function aboutme_des_edit($id){
        // view edit page
        return view('admin.about_me.aboutme_des.edit', [
            'aboutme_des' => AboutMeDes::findOrFail($id),
        ]);
    }


    /**
     * aboutme description edit post
     *
     * @param  mixed $request
     * @return void
     */
    function aboutme_des_edit_post(Request $request){
        // validating inputs
        $valid = $request->validate([
            'about_me_des' => ['string'],
        ],
        
        $messages = [
            'about_me_des.string' => 'Your about me sections description should be a string.',
        ]);

        // editing data start
        AboutMeDes::findOrFail($request->input('value'))->update([
            'about_me_des' => $request->about_me_des,
            'updated_at' => now(),
        ]);
        return redirect()->route('aboutme')->with('aboutme_des_edited', 'You have edited a description from your portfolio'."'".'s about me section.');
    }


    /**
     * aboutme description hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function aboutme_des_hard_delete($id){
        // Deleting data with flash meddage start
        AboutMeDes::findOrFail($id)->forceDelete();
        return redirect()->route('aboutme')->with('aboutme_des_deleted', 'You have deleted a description from your portfolio'."'".'s about me section.');
    }


    /**
     * aboutme skills create post
     *
     * @param  mixed $request
     * @return void
     */
    function aboutme_skills_create_post(Request $request){
        // about me skill percent field blank validation start
        if ($request->input('skill_percent') == null){
            return redirect()->route('aboutme')->with('aboutme_skill_blank_percent', 'If you wish to add skill percent to your portfolio'."'".'s about me section then you cannot leave this field empty.');
        }

        // about me skill name field blank validation start
        elseif($request->input('skill_name') == null){
            return redirect()->route('aboutme')->with('aboutme_skill_blank_name', 'If you wish to add a skill name to your portfolio'."'".'s about me section then you cannot leave this field empty.');
        }

        else{
            // validating inputs
            $valid = $request->validate([
                'skill_name' => ['alpha_spaces'],
                'skill_percent' => ['integer'],
            ],
            $messages = [
                'skill_percent.integer' => 'Your about me sections skill percent must be number.',
            ]);

            // inserting data
            AboutMeSkill::insert([
                'skill_name' => Str::title($request->skill_name),
                'skill_percent' => $request->skill_percent,
                'created_at' => now(),
            ]);
            return redirect()->route('aboutme')->with('aboutme_skill_added', 'You have added a skill to your portfolio'."'".'s about me section.');
        }
    }


    /**
     * aboutme skill edit
     *
     * @param  mixed $id
     * @return void
     */
    function aboutme_skill_edit($id){
        // view edit page start
        return view('admin.about_me.aboutme_skill.edit', [
            'aboutme_skills' => AboutMeSkill::findOrFail($id),
        ]);
    }


    /**
     * aboutme skill edit post
     *
     * @param  mixed $request
     * @return void
     */
    function aboutme_skill_edit_post(Request $request){
        // validating inputs
        $request->validate([
            'skill_name' => ['alpha_spaces'],
            'skill_percent' => ['integer'],
        ],
        $messages = [
            'skill_percent.integer' => 'Your about me sections skill percent must be number.',
        ]);

        // updating data
        AboutMeSkill::findOrFail($request->input('value'))->update([
            'skill_name' => Str::title($request->skill_name),
            'skill_percent' => $request->skill_percent,
            'updated_at' => now(),
        ]);
        return redirect()->route('aboutme')->with('aboutme_skill_edited', 'You have edited a skill from your portfolio'."'".'s about me section.');
    }


    /**
     * aboutme skill hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function aboutme_skill_hard_delete($id){
        // Deleting data with flash message start
        AboutMeSkill::findOrFail($id)->forceDelete();
        return redirect()->route('aboutme')->with('aboutme_skill_deleted', 'You have deleted a skill from your portfolio'."'".'s about me section.');
    }


    /**
     * aboutme milestone create post
     *
     * @param  mixed $request
     * @return void
     */
    function aboutme_ms_create_post(Request $request){
        // about me milestone limit validation start
        if (AboutMeMilestone::all()->count() == 4){
            return redirect()->route('aboutme')->with('aboutme_ms_limit_4', 'You can not add more than 4 milestone to your portfolio'."'".'s about me section second time. You can edit the previous one or remove it..');
        }

        else{
            // about me milestone field blank validation start
            if ($request->input('milestone_name') == null) {
                return redirect()->route('aboutme')->with('aboutme_ms_blank_name', 'If you wish to add milestone name to your portfolio'."'".'s about me section then you cannot leave this field empty.');
            }

            // about me milestone field blank validation end
            elseif($request->input('milestone_digit') == null) {
                return redirect()->route('aboutme')->with('aboutme_ms_blank_digit', 'If you wish to add milestone digit to your portfolio'."'".'s about me section then you cannot leave this field empty.');
            }

            else{
                // validating inputs
                $request->validate([
                    'milestone_name' => ['alpha_spaces'],
                    'milestone_digit' => ['integer'],
                ],
                $messages = [
                    'milestone_digit.integer' => 'Your about me sections milestone digits should be number or digits.',
                    'milestone_digit.alpha_spaces' => 'Your about me sections milestone name can contain letter and spaces only.',
                ]);

                // inserting data
                AboutMeMilestone::insert([
                    'milestone_name' => Str::title($request->milestone_name),
                    'milestone_digit' => $request->milestone_digit,
                    'created_at' => now(),
                ]);
                return redirect()->route('aboutme')->with('aboutme_ms_added', 'You have added a milestone to your portfolio'."'".'s about me section.');
            }
        }
    }


    /**
     * aboutme milestone edit
     *
     * @param  mixed $id
     * @return void
     */
    function aboutme_ms_edit($id){
        // view edit page start
        return view('admin.about_me.aboutme_ms.edit', [
            'aboutme_ms' => AboutMeMilestone::findOrFail($id),
        ]);
    }


    /**
     * aboutme milestone edit post
     *
     * @param  mixed $request
     * @return void
     */
    function aboutme_ms_edit_post(Request $request){
        // validating inputs
        $request->validate([
            'milestone_name' => ['alpha_spaces'],
            'milestone_digit' => ['integer'],
        ],
        $messages = [
            'milestone_digit.integer' => 'Your about me sections milestone digits should be number or digits.',
            'milestone_digit.alpha_spaces' => 'Your about me sections milestone name can contain letter and spaces only.',
        ]);

        // updating data
        AboutMeMilestone::findOrFail($request->input('value'))->update([
            'milestone_name' => Str::title($request->milestone_name),
            'milestone_digit' => $request->milestone_digit,
            'updated_at' => now(),
        ]);
        // updating data
        return redirect()->route('aboutme')->with('aboutme_milestone_edited', 'You have edited an existing milestone from your portfolio'."'".'s about me section.');
    }


    /**
     * aboutme milestone hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function aboutme_ms_hard_delete ($id){
        // Deleting data with flash message start
        AboutMeMilestone::findOrFail($id)->forceDelete();
        return redirect()->route('aboutme')->with('aboutme_ms_deleted', 'You have deleted a milestone from your portfolio'."'".'s about me section.');
    }
}

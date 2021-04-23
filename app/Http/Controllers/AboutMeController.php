<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AboutMeDes;
use Illuminate\Support\Str;
use App\Models\AboutMeSkill;
use Illuminate\Http\Request;
use App\Models\AboutMeMilestone;
use Illuminate\Support\Facades\Auth;

class AboutMeController extends Controller
{
    function index(){
        // index view page start
        return view('admin.about_me.index',[
            'about_me_desc' => AboutMeDes::all(),
            'about_me_skills' => AboutMeSkill::all(),
            'about_me_mss' => AboutMeMilestone::all(),
        ]);
        // index view page end
    }

    function aboutme_des_create_post(Request $request){
        // about me description duplicate validation start
        if (AboutMeDes::all()->count() >= 1){
            return redirect()->route('aboutme')->with('aboutme_des_dup', 'You can not add a description to your portfolio'."'".'s about me section second time. You can edit the previous one.');
        }
        // about me description duplicate validation end

        else {
            // about me description field blank validation start
            if ($request->input('about_me_des') == null) {
                return redirect()->route('aboutme')->with('aboutme_des_blank', 'If you wish to add a description to your portfolio'."'".'s about me section then you cannot leave this field empty.');
            }
            // about me description field blank validation end

            else{
                // validating inputs
                $valid = $request->validate([
                    'about_me_des' => ['string'],
                ],
                $messages = [
                    'about_me_des.string' => 'Your about me sections description should be a string.',
                ]);
                // validating inputs

                // inserting data
                AboutMeDes::insert([
                    'about_me_des' => Str::title($request->about_me_des),
                    'created_at' => Carbon::now(),
                ]);
                // inserting data
                return redirect()->route('aboutme')->with('aboutme_des_added', 'You have added a description to your portfolio'."'".'s about me section.');
            }
        }
    }

    function aboutme_des_edit($id){
        // view edit page start
        return view('admin.about_me.aboutme_des.edit', [
            'aboutme_des' => AboutMeDes::findOrFail($id),
        ]);
        // view edit page end
    }

    function aboutme_des_edit_post(Request $request){
        // validating inputs
        $valid = $request->validate([
            'about_me_des' => ['string'],
        ],
        
        $messages = [
            'about_me_des.string' => 'Your about me sections description should be a string.',
        ]);
        // validating inputs

        // editing data start
        AboutMeDes::findOrFail($request->input('value'))->update([
            'about_me_des' => Str::title($request->about_me_des),
            'updated_at' => Carbon::now(),
        ]);
        // editing data end
        return redirect()->route('aboutme')->with('aboutme_des_edited', 'You have edited a description from your portfolio'."'".'s about me section.');
    }

    function aboutme_des_hard_delete($id){
        // Deleting data with flash meddage start
        AboutMeDes::findOrFail($id)->forceDelete();
        return redirect()->route('aboutme')->with('aboutme_des_deleted', 'You have deleted a description from your portfolio'."'".'s about me section.');
        // Deleting data with flash meddage end
    }

    function aboutme_skills_create_post(Request $request){
        // about me skill percent field blank validation start
        if ($request->input('skill_percent') == null) {
            return redirect()->route('aboutme')->with('aboutme_skill_blank_percent', 'If you wish to add skill percent to your portfolio'."'".'s about me section then you cannot leave this field empty.');
        }
        // about me skill percent field blank validation end

        // about me skill name field blank validation start
        elseif($request->input('skill_name') == null) {
            return redirect()->route('aboutme')->with('aboutme_skill_blank_name', 'If you wish to add a skill name to your portfolio'."'".'s about me section then you cannot leave this field empty.');
        }
        // about me skill name field blank validation end

        else{
            // validating inputs
            $valid = $request->validate([
                'skill_name' => ['alpha_spaces'],
                'skill_percent' => ['integer'],
            ],
            $messages = [
                'skill_percent.integer' => 'Your about me sections skill percent must be number.',
            ]);
            // validating inputs

            // inserting data
            AboutMeSkill::insert([
                'skill_name' => Str::title($request->skill_name),
                'skill_percent' => $request->skill_percent,
                'created_at' => Carbon::now(),
            ]);
            // inserting data
            return redirect()->route('aboutme')->with('aboutme_skill_added', 'You have added a skill to your portfolio'."'".'s about me section.');
        }
    }

    function aboutme_skill_edit($id){
        // view edit page start
        return view('admin.about_me.aboutme_skill.edit', [
            'aboutme_skills' => AboutMeSkill::findOrFail($id),
        ]);
        // view edit page end
    }

    function aboutme_skill_edit_post(Request $request){
        // validating inputs
        $request->validate([
            'skill_name' => ['alpha_spaces'],
            'skill_percent' => ['integer'],
        ],
        $messages = [
            'skill_percent.integer' => 'Your about me sections skill percent must be number.',
        ]);
        // validating inputs

        // updating data
        AboutMeSkill::findOrFail($request->input('value'))->update([
            'skill_name' => Str::title($request->skill_name),
            'skill_percent' => $request->skill_percent,
            'updated_at' => Carbon::now(),
        ]);
        // updating data
        return redirect()->route('aboutme')->with('aboutme_skill_edited', 'You have edited a skill from your portfolio'."'".'s about me section.');
    }

    function aboutme_skill_hard_delete($id){
        // Deleting data with flash message start
        AboutMeSkill::findOrFail($id)->forceDelete();
        return redirect()->route('aboutme')->with('aboutme_skill_deleted', 'You have deleted a skill from your portfolio'."'".'s about me section.');
        // Deleting data with flash message end
    }

    function aboutme_ms_create_post(Request $request){
        // about me milestone limit validation start
        if (AboutMeMilestone::all()->count() == 4){
            return redirect()->route('aboutme')->with('aboutme_ms_limit_4', 'You can not add more than 4 milestone to your portfolio'."'".'s about me section second time. You can edit the previous one or remove it..');
        }
        // about me milestone limit validation end
        else{
            // about me milestone field blank validation start
            if ($request->input('milestone_name') == null) {
                return redirect()->route('aboutme')->with('aboutme_ms_blank_name', 'If you wish to add milestone name to your portfolio'."'".'s about me section then you cannot leave this field empty.');
            }
            // about me milestone field blank validation end

            // about me milestone field blank validation end
            elseif($request->input('milestone_digit') == null) {
                return redirect()->route('aboutme')->with('aboutme_ms_blank_digit', 'If you wish to add milestone digit to your portfolio'."'".'s about me section then you cannot leave this field empty.');
            }
            // about me milestone field blank validation end

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
                // validating inputs

                // inserting data
                AboutMeMilestone::insert([
                    'milestone_name' => Str::title($request->milestone_name),
                    'milestone_digit' => $request->milestone_digit,
                    'created_at' => Carbon::now(),
                ]);
                // inserting data
                return redirect()->route('aboutme')->with('aboutme_ms_added', 'You have added a milestone to your portfolio'."'".'s about me section.');
            }
        }
    }

    function aboutme_ms_edit($id){
        // view edit page start
        return view('admin.about_me.aboutme_ms.edit', [
            'aboutme_ms' => AboutMeMilestone::findOrFail($id),
        ]);
        // view edit page end
    }

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
        // validating inputs

        // updating data
        AboutMeMilestone::findOrFail($request->input('value'))->update([
            'milestone_name' => Str::title($request->milestone_name),
            'milestone_digit' => $request->milestone_digit,
            'updated_at' => Carbon::now(),
        ]);
        // updating data
        return redirect()->route('aboutme')->with('aboutme_milestone_edited', 'You have edited an existing milestone from your portfolio'."'".'s about me section.');
    }

    function aboutme_ms_hard_delete ($id){
        // Deleting data with flash message start
        AboutMeMilestone::findOrFail($id)->forceDelete();
        return redirect()->route('aboutme')->with('aboutme_ms_deleted', 'You have deleted a milestone from your portfolio'."'".'s about me section.');
        // Deleting data with flash message end
    }
}

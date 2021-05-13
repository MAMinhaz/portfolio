<?php 

use App\Models\Blog;
use App\Models\Contactinfo;
use App\Models\CustomFrontend;

    function file_ext_name($file_name){
        $name = explode('.', $file_name);
        return $name[1];
    }

    function file_name($file_name){
        $f_name = explode('/', $file_name);
        return $f_name[1];
    }

    function siteTitle(){
        foreach (CustomFrontend::get('site_name') as $name) {
            echo $name->site_name;
        }
    }

    function jobTitle(){
        foreach (CustomFrontend::get('job_title') as $job_title) {
            echo $job_title->job_title;
        }
    }

    function mockUpImage(){
        foreach (CustomFrontend::get('mockup_image') as $mockup_image) {
            echo $mockup_image->mockup_image;
        }
    }

    function hireMeImage(){
        foreach (CustomFrontend::get('hire_me_image') as $hire_me_image) {
            echo $hire_me_image->hire_me_image;
        }
    }

    function testimonialImage(){
        foreach (CustomFrontend::get('testimonial_image') as $testimonial_image) {
            echo $testimonial_image->testimonial_image;
        }
    }

    function getInTouchImage(){
        foreach (CustomFrontend::get('get_in_touch_image') as $get_in_touch_image) {
            echo $get_in_touch_image->get_in_touch_image;
        }
    }

    function logo(){
        foreach (CustomFrontend::get('portfolio_logo') as $name) {
            echo $name->portfolio_logo;
        }
    }

    function everyCategoryCount($id){
        echo $category_counted = Blog::where('category_id', $id)->count();
    }

    function checkEvenOrOdd($value){
        if($value % 2 == 0){
            $evenOrOdd = 1;
        }

        else{
            $evenOrOdd = 0;
        }
    }
?>
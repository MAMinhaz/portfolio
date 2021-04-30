<?php 

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

    function logo(){
        foreach (CustomFrontend::get('portfolio_logo') as $name) {
            echo $name->portfolio_logo;
        }
    }
?>
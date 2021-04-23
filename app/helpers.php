<?php 

    function users(){
        return App\Models\User::all();
    }

    function portfolio_cats(){
        return App\Models\PortfoCategory::all();
    }

    function file_ext_name($file_name){
        $name = explode('.', $file_name);
        return $name[1];
    }

    function file_name($file_name){
        $f_name = explode('/', $file_name);
        return $f_name[1];
    }
?>
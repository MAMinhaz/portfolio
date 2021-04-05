<?php 

function users(){
    return App\Models\User::all();
}

function portfolio_cats(){
    return App\Models\PortfoCategory::all();
}

?>
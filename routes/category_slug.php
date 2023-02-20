<?php

use App\Models\Category;

$categoryR = Category::where('slug',$slug)->first();
    $categories =  Category::query()->withCount('jobs')->get();
    $cat = array();
    foreach($categories as $category){
    array_push($cat, ['name'=> $category->name, 'jobs'=>$category->jobs_count, 'slug'=>$category->slug]);
    }

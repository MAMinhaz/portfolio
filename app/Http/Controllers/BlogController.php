<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog_category;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * blog category index
     *
     * @return void
     */
    function blog_cats_index(){
        // blog category index page
        return view('admin.blog.index', [
            'blog_cats' => Blog_category::all(),
        ]);
    }


    /**
     * blog category create post
     *
     * @param  mixed $request
     * @return void
     */
    function blog_cats_create_post(Request $request){
        // input validatation
        $request->validate([
            'category_name' => ['required', 'string',]
        ]);

        // data inserting
        Blog_category::insert([
            'category_name' => $request->category_name,
            'blog_id' => 1,
            'addedby' => Auth::id(),
            'created_at' => now(),
        ]);
        return back()->with('blog_cat_added', 'Congratulation You have added a new category for your blog posts.');
    }


    /**
     * blog category edit
     *
     * @param  mixed $id
     * @return void
     */
    function blog_cat_edit($id){
        // blog category edit page
        return view('admin.blog.blog_category.edit', [
            'blog_category' => Blog_category::findOrFail($id),
        ]);
    }


    /**
     * blog category edit post
     *
     * @param  mixed $request
     * @return void
     */
    function blog_cat_edit_post(Request $request){
        // input validation
        $request->validate([
            'category_name' => ['required', 'string',]
        ]);

        // blog category updating
        Blog_category::findOrFail($request->value)->update([
            'category_name' => $request->category_name,
            'updated_at' => now(),
        ]);
        return redirect()->route('blog_cats_index')->with('blog_cats_edited', 'You have edited an existing blog category');
    }


    /**
     * blog category hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function blog_cats_hard_delete($id){
        // blog category deleted
        Blog_category::findOrFail($id)->forceDelete();
        return redirect()->route('blog_cats_index')->with('blog_cats_deleted', 'You have deleted an existing blog category');
    }
}

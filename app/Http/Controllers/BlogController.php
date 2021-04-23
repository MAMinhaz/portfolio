<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Blog_category;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class BlogController extends Controller
{
    /**
     * blog category index
     *
     * @return void
     */
    function blog_cats_index(){
        // blog category index page
        return view('admin.blog.blog_category.index', [
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
            'category_name' => Str::title($request->category_name),
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
            'category_name' => Str::title($request->category_name),
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


    /**
     * blog index page
     *
     * @return void
     */
    function blog_index(){
        return view('admin.blog.blog.index', [
            'blogs' => Blog::latest()->get(),
        ]);
    }


    /**
     * create blog post
     *
     * @return void
     */
    function blog_post_create(){
        // return Blog_category::all();
        return view('admin.blog.blog.create', [
            'blog_cats' => Blog_category::latest()->get(),
        ]);
    }

    
    /**
     * blog post create post
     *
     * @param  mixed $request
     * @return void
     */
    function blog_post_create_post(Request $request){
        // input validation
        $request->validate([
            "title" => ['required', 'string'],
            "category_id" => ['required', 'integer'],
            "description" => ['required', 'string'],
            "blog_thumbnail_image" => ['image'],
        ]);

        // blog post insert
        $blog_id = Blog::insertGetId([
            "title" => Str::title($request->title),
            "category_id" => $request->category_id,
            "description" => $request->description,
            "created_at" => now(),
        ]);

        // blog thumbnail image upload
        if ($request->hasFile('blog_thumbnail_image')) {
            $uploaded_picture = $request->file('blog_thumbnail_image');
            $picture_name = "blog_thumbnail_image-".$blog_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/blog/blog_thumbnail_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Blog::find($blog_id)->update([
                'blog_thumbnail_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('blog_index')->with('blog_added', 'Congratulations You have added a new blog post');
    }

    
    /**
     * preview blog post
     *
     * @param  mixed $id
     * @return void
     */
    function blog_post_preview($id){
        return view('admin.blog.preview',[
            "blog" => Blog::findOrFail($id),
            "description" => clean(Blog::findOrFail($id)->description),
        ]);
    }


    /**
     * blog post edit
     *
     * @param  mixed $id
     * @return void
     */
    function blog_post_edit($id){
        return view('admin.blog.blog.edit', [
            "blog_data" => Blog::findOrFail($id),
            'blog_cats' => Blog_category::latest()->get(),
        ]);
    }

    
    /**
     * blog post edit post
     *
     * @param  mixed $request
     * @return void
     */
    function blog_post_edit_post(Request $request){
        // input validation
        $request->validate([
            "title" => ['string'],
            "category_id" => ['integer'],
            "description" => ['string'],
            "blog_thumbnail_image" => ['nullable', 'image'],
        ]);

        // blog post editing
        Blog::findOrFail($request->value)->update([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "updated_at" => now(),
        ]);

        // blog thumbnail image upload
        if ($request->hasFile('blog_thumbnail_image')) {
            $uploaded_picture = $request->file('blog_thumbnail_image');
            $picture_name = "blog_thumbnail_image-".$blog_id.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/blog/blog_thumbnail_image/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));
            Blog::find($blog_id)->update([
                'blog_thumbnail_image' => $picture_name,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('blog_index')->with('blog_edited', 'You have edited an existing blog post');
    }

    
    /**
     * blog post hard delete
     *
     * @param  mixed $id
     * @return void
     */
    function blog_post_hard_delete($id){
        // blog data
        $Blog = Blog::findOrFail($id);

        // blog data deleted
        $Blog->forceDelete();

        // blog thumbnail picture deleting
        if($Blog->thumbnail_image != 'blog_thumbnail_image.jpg'){
            $picture_location = 'public/uploads/blog/blog_thumbnail_image/'.$Blog->blog_thumbnail_image;
            unlink(base_path($picture_location));
        }

        return redirect()->route('blog_index')->with('blog_deleted', 'You have deleted an existing blog post');
    }
}

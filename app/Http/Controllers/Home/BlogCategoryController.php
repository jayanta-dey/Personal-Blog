<?php

namespace App\Http\Controllers\Home;
use App\Models\BlogCategory;
use Carbon\Carbon;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $category = BlogCategory::latest()->get();
        return view('admin\blog_Category\all_blog_category', compact('category'));
    }



    public function AddBlogCategory()
    {
        return view('admin\blog_Category\add_blog_category');
    }

    public function StoreBlogCategory(Request $request)
    {
        $request->validate([
            'blog_category_name' => 'required',
            
        ],[
            'blog_category_name' => 'Please Enter Blog Category Name.',
            
        ]);
     
        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'created_at' => Carbon::now(),
        ]);
        
            
            $notification = array(
                'message' => 'Blog Category Inserted Successfully',
                'alert-type' => 'success'
            );
           return redirect()->back()->with($notification);
    



    }
}




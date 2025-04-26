<?php

namespace App\Http\Controllers\Home;
use App\Models\BlogCategory;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $category = BlogCategory::latest()->get();
        return view('admin\blog_Category\all_blog_category', compact('category'));
    }
}

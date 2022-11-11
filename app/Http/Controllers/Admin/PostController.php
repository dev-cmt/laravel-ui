<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;        //use model
use App\Models\Subcategory;     //use model
use Illuminate\Support\Str;     //use slug
use DB;  

class PostController extends Controller
{
    public function index()
    {
        //-------Eloquent ORM
        $subcategory=Subcategory::all();
        return view('admin.subcategory.index',compact('subcategory'));
    }
    //=====_________  Create  ________=====//
    public function create()
    {
        //-------Eloquent ORM
        $category=Category::all();
        return view('admin.post.create',compact('category'));
    }
}

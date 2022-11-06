<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;//use data recipe
use App\Models\Category;    //use model
use App\Models\Subcategory; //use model
use Illuminate\Support\Str; //use slug
use DB;

class SubcategoryController extends Controller
{
    public function subcategory_index()
    {
        //-------Eloquent ORM (3)
        $subcategory=Subcategory::all();
        return view('admin.subcategory.index',compact('subcategory'));
    }
    public function subcategory_create()
    {
        //-------Eloquent ORM (3)
        $category=Category::all();
        return view('admin.subcategory.create',compact('category'));
    }
    public function subcategory_store(Request $request)
    {
        $validated=$request -> validate([
            'categories_id'=> 'required',
            'subcategory_name'=> 'required|unique:subcategories|max:255',
        ]);

        // //-------Eloquent ORM (3)
        $subcategory= new Subcategory();
        $subcategory->categories_id=$request->categories_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        // $subcategory=array(
        //     'categories_id'=> $request->categories_id,
        //     'subcategory_name'=> $request->subcategory_name,
        //     'subcategory_slug'=> Str::of($request->subcategory_name)->slug('-'),
        // );
        // DB::table('subcategories')->insert($subcategory);
        
        $notification=array('messege'=>'SEO Setting Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}

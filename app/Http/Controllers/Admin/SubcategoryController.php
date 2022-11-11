<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    //use data recipe
use App\Models\Category;        //use model
use App\Models\Subcategory;     //use model
use Illuminate\Support\Str;     //use slug
use DB;                         //use database

class SubcategoryController extends Controller
{
    public function subcategory_index()
    {
        //-------Eloquent ORM
        $subcategory=Subcategory::all();
        return view('admin.subcategory.index',compact('subcategory'));
    }
    //=====_________  Create  ________=====//
    public function subcategory_create()
    {
        //-------Eloquent ORM
        $category=Category::all();
        return view('admin.subcategory.create',compact('category'));
    }
    public function subcategory_store(Request $request)
    {
        $validated=$request -> validate([
            'categories_id'=> 'required',
            'subcategory_name'=> 'required|unique:subcategories|max:255',
        ]);

        //-------Eloquent ORM
        $subcategory= new Subcategory();
        $subcategory->categories_id=$request->categories_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        
        $notification=array('messege'=>'SEO Setting Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    //=====_________  Edit  ________=====//
    public function subcategory_edit($id)
    {
        //-------Eloquent ORM 
        $category=Category::all();
        $data=Subcategory::find($id);

        return view('admin.subcategory.edit',compact('category','data'));
    }
    public function subcategory_update(Request $request, $id)
    {
        //-------Eloquent ORM
        $subcategory=Subcategory::find($id);

        $subcategory->categories_id=$request->categories_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        return redirect()->route('subcategory.index');
    }
    

    //=====_________  Delete  ________=====//
    public function Subcategory_destroy($id)
    {
         //-------Eloquent ORM
         Subcategory::destroy($id);

         $notification=array('messege'=>'Sub Category Delete successfully!','alert-type'=>'success');
         return redirect()->back()->with($notification);
    }
}

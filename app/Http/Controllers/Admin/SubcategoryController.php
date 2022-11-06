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

        $notification=array('messege'=>'Sub Category Add Successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function subcategory_edit($id)
    {
        $category=Category::all();
        $data=Subcategory::find($id);

        return view('admin.subcategory.edit',compact('category','data'));
    }
    public function subcategory_update(Request $request, $id)
    {
        // //-------Eloquent ORM (3)
        $subcategory= Subcategory::find($id);
        $subcategory->categories_id=$request->categories_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification=array('messege'=>'Updated successfully!','alert-type'=>'success');
        return redirect()->route('subcategory.index')->with($notification);
    }
    public function subcategory_destroy($id)
    {
        //-------Eloquent ORM (3)
        Category::destroy($id);

        $notification=array('messege'=>'Delete successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Category;       //use model
use App\Models\Subcategory;    //use model
use Illuminate\Support\Str;    //use slug
use DB;                        //use database

class SubcategoryController extends Controller
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
        return view('admin.subcategory.create',compact('category'));
    }
    public function store(Request $request)
    {
        $validated=$request -> validate([
            'category_id'=> 'required',
            'subcategory_name'=> 'required|unique:subcategories|max:255',
        ]);

        //-------Eloquent ORM
        $subcategory= new Subcategory();
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        
        $notification=array('messege'=>'Sub category save successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    //=====_________  Edit  ________=====//
    public function edit($id)
    {
        //-------Eloquent ORM 
        $category=Category::all();
        $data=Subcategory::find($id);

        return view('admin.subcategory.edit',compact('category','data'));
    }
    public function update(Request $request, $id)
    {
        //-------Eloquent ORM
        $subcategory=Subcategory::find($id);

        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification=array('messege'=>'Sub category updated successfully!','alert-type'=>'success');
        return redirect()->route('subcategory.index')->with($notification);
    }
    

    //=====_________  Delete  ________=====//
    public function destroy($id)
    {
         //-------Eloquent ORM
         Subcategory::destroy($id);

         $notification=array('messege'=>'Sub Category Delete successfully!','alert-type'=>'success');
         return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        //-------Queary Builder (1)
        // $category=DB::table('categories')->get();

        //-------Eloquent ORM (3)
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }
    //=====_________  Create  ________=====//
    public function create()
    {
        return view('admin.category.create');
    }
    
    public function store(Request $request)
    {
        $validated=$request -> validate([
            'category_name'=> 'required|unique:categories|max:255',
        ]);

        //-------Queary Builder (1)
        // $category=new Category();
        // $category=insert(
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // );

        //-------Queary Builder (2)
        // $category=array(
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // );
        // DB::table('categories')->insert($data);
        // return redirect()->back()->with('success','Successfully inserted!');
        

        //-------Eloquent ORM (3)
        $category= new Category();
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();
        
        $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    //=====_________  Edit  ________=====//
    public function edit($id)
    {
        //-------Queary Builder
        // $category=DB::table('categories')->where('id',$id)->first();

        //-------Eloquent
        $category =Category::find($id);

        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        //-------Queary Builder (1)
        // $category=Category::find($id);
        // $category=update([
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // ]);

        //-------Eloquent ORM (2)
        $category=Category::find($id);
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();

        $notification=array('messege'=>'Sub category updated successfully!','alert-type'=>'success');
        return redirect()->route('category.index')->with($notification);
    }
    public function destroy($id)
    {
        //-------Queary Builder (1)
        // DB::table('categories')->where('id',$id)->delete();

        //-------Eloquent ORM (2)
        // $category=Category::find($id);
        // $category->delete();

        //-------Eloquent ORM (3)
        Category::destroy($id);

        $notification=array('messege'=>'Category Delete successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}

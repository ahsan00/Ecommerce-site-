<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Image;
use File;

class CategoryController extends Controller
{
  public function manageproduct()
  {
    // code...
    $category=category::orderBy('id','desc')->get();
    return view('admin.pages.category.index')->with('category',$category);
  }
  public function create()
  {
    // code...
    $main_category=category::orderBy('name','desc')->where('parent_id',NULL)->get();
    return view('admin.pages.category.create')->with('maincategory',$main_category);

  }
public function delete($id)
{
  $category=category::find($id);
  if(!is_null($category))
  {
//if it is parent category delete all of it sub category_id
   if($category->parent_id==null)
   {
$sub_category=category::orderBy('name','desc')->where('parent_id',$category->id)->get();
foreach ($sub_category as $sub) {
  // code...
  if(File::exists('images/category/'.$sub->image))
  {
  File::delete('images/category/'.$sub->image);

  }
  $sub->delete();

}

   }
//delete category_id
if(File::exists('images/category/'.$category->image))
{
File::delete('images/category/'.$category->image);

}
  $category->delete();

  }
  return redirect()->route('admin.category');

  // code...
}
public function productedit($id)
{
  $maincategory=category::orderBy('name','desc')->where('parent_id',NULL)->get();
  $category=category::find($id);
//  return view('admin.pages.category.edit')->with('maincategory','category',$main_category,  $category);
 return view('admin.pages.category.edit',compact('category','maincategory'));
  // code...
}
public function update(Request $request,$id)
{
  $this->validate($request,[
  'name'=>'required|string',
  'description'=>'required',
  'category_image'=>'nullable|image'
  ]);

  $category=category::find($id);
  $category->name=$request->name;
  $category->description=$request->description;
  $category->parent_id=$request->parent_id;

if(File::exists('images/category/'.$category->image))
{
File::delete('images/category/'.$category->image);

}

    $image=$request->file('category_image');
    $img=time() .'.'.$image->getClientOriginalExtension();
    $location=public_path('images/category/'.$img);
    Image::make($image)->save($location);
    $category->image=$img;

  $category->save();

      return redirect()->route('admin.category');
  // code...
}


  public function store(Request $request)
  {
    $this->validate($request,[
    'name'=>'required|string',
    'description'=>'required',
    'category_image'=>'nullable|image'
    ]);

    $category=new category();
    $category->name=$request->name;
    $category->description=$request->description;
    $category->parent_id=$request->parent_id;

      $image=$request->file('category_image');
      $img=time() .'.'.$image->getClientOriginalExtension();
      $location=public_path('images/category/'.$img);
      Image::make($image)->save($location);
      $category->image=$img;

    $category->save();

        return redirect()->route('admin.category');


    // code...
  }

    //
}

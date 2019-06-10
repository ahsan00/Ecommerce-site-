<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use Image;
use File;

class BrandController extends Controller
{
  public function manageproduct()
  {
    // code...
    $brand=brand::orderBy('id','desc')->get();
    return view('admin.pages.brand.index')->with('brand',$brand);
  }
  public function create()
  {
    // code...

    return view('admin.pages.brand.create');

  }
public function delete($id)
{
  $brand=brand::find($id);
  if(!is_null($brand))
  {
//if it is parent brand delete all of it sub brand_i

//delete brand_id
if(File::exists('images/brand/'.$brand->image))
{
File::delete('images/brand/'.$brand->image);

}
  $brand->delete();

  }
  return redirect()->route('admin.brand');

  // code...
}
public function productedit($id)
{

  $brand=brand::find($id);
//  return view('admin.pages.brand.edit')->with('mainbrand','brand',$main_brand,  $brand);
 return view('admin.pages.brand.edit',compact('brand'));
  // code...
}
public function update(Request $request,$id)
{
  $this->validate($request,[
  'name'=>'required|string',
  'description'=>'required',
  'brand_image'=>'nullable|image'
  ]);

  $brand=brand::find($id);
  $brand->name=$request->name;
  $brand->description=$request->description;


if(File::exists('images/brand/'.$brand->image))
{
File::delete('images/brand/'.$brand->image);

}

    $image=$request->file('brand_image');
    $img=time() .'.'.$image->getClientOriginalExtension();
    $location=public_path('images/brand/'.$img);
    Image::make($image)->save($location);
    $brand->image=$img;

  $brand->save();

      return redirect()->route('admin.brand');
  // code...
}


  public function store(Request $request)
  {
    $this->validate($request,[
    'name'=>'required|string',
    'description'=>'required',
    'brand_image'=>'nullable|image'
    ]);

    $brand=new brand();
    $brand->name=$request->name;
    $brand->description=$request->description;


      $image=$request->file('brand_image');
      $img=time() .'.'.$image->getClientOriginalExtension();
      $location=public_path('images/brand/'.$img);
      Image::make($image)->save($location);
      $brand->image=$img;

    $brand->save();

        return redirect()->route('admin.brand');


    // code...
  }

    //
}

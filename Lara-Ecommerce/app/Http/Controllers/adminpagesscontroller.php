<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Image;
use App\productimage;
class adminpagesscontroller extends Controller
{
  public function index()
  {
    return view('admin.pages.index');
    // code...
  }
  public function create()
  {
    return view('admin.pages.products.create');
    // code...
  }
  public function delete($id)
  {
    $product=product::find($id);
    if(!is_null($product))
    {
     $product->delete();

    }
  return redirect()->route('admin.products');
    // code...
  }
  public function manageproduct()
  {
    $product=product::orderBy('id','desc')->get();
    return view('admin.pages.products.index')->with('products',$product);
    // code...
  }
  public function productedit($id)
  {
    $product=product::find($id);
    return view('admin.pages.products.edit')->with('products',$product);
    // code...
  }
  public function update(Request $request,$id)
  {

    $this->validate($request,[
    'title'=>'required|string',
    'description'=>'required',
    'price'=>'required|numeric',
    'quantity'=>'required|numeric'
    ]);


    $product=product::find($id);
    $product->title=$request->title;
    $product->description=$request->description;
    $product->slug=str_slug($request->title);
    $product->price=$request->price;
    $product->quantity=$request->quantity;
    $product->category_id=$request->category_id;
    $product->brand_id=$request->brand_id;
    $product->admin_id=1;
    $product->save();
//insert image into product_image

/**{
  $image=$request->file('product_image');
  $img=time() .'.'.$image->getClientOriginalExtension();
  $location=public_path('images/product/'.$img);
  Image::make($image)->save($location);
  $product_image=new productimage();
  $product_image->product_id=$product->id;
  $product_image->image=$img;
  $product_image->save();


}
*/



    return redirect()->route('admin.products');

    // code...
    // code...
    // code...
    // code...
    // code...
  }

  public function store(Request $request)
  {

    $this->validate($request,[
    'title'=>'required|string',
    'description'=>'required',
    'price'=>'required|numeric',
    'quantity'=>'required|numeric'
    ]);



    $product=new product();
    $product->title=$request->title;
    $product->description=$request->description;
    $product->slug=str_slug($request->title);
    $product->price=$request->price;
    $product->quantity=$request->quantity;
    $product->category_id=$request->category_id;
    $product->brand_id=$request->brand_id;
    $product->admin_id=1;
    $product->save();
//insert image into product_image

/**{
  $image=$request->file('product_image');
  $img=time() .'.'.$image->getClientOriginalExtension();
  $location=public_path('images/product/'.$img);
  Image::make($image)->save($location);
  $product_image=new productimage();
  $product_image->product_id=$product->id;
  $product_image->image=$img;
  $product_image->save();


}
*/

if(count($request->product_image)>0)
{
foreach ($request->product_image as $image) {
//  $image=$request->file('product_image');
  $img=time() .'.'.$image->getClientOriginalExtension();
  $location=public_path('images/product/'.$img);
  Image::make($image)->save($location);
  $product_image=new productimage();
  $product_image->product_id=$product->id;
  $product_image->image=$img;
  $product_image->save();
  // code...
}



}







    return redirect()->route('admin.product.create');

    // code...
    // code...
    // code...
    // code...
    // code...
  }
    //
}

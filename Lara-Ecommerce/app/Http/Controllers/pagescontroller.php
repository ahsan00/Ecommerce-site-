<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class pagescontroller extends Controller
{
  public function index()
  {
    $product=product::orderBy('id','desc')->get();
    return view('pages.index')->with('products',$product);
    // code...
  }
  public function search(Request $request)
  {
    $search=$request->search;

    $products=product::orWhere('title','like','%'.$search.'%')
    ->orWhere('description','like','%'.$search.'%')
    ->orWhere('price','like','%'.$search.'%')
    ->orWhere('quantity','like','%'.$search.'%')
    ->orderBy('id','desc')
    ->get();

    return view('pages.product.search',compact('search','products'));
    // code...
  }
  public function contact()
  {
    return view('pages.contact');
    // code...
  }
public function show($slug)
{
    $product=product::where('slug',$slug)->first();

    if(!is_null($product))
{
    return view('pages.product.show',compact('product'));

    }

  // code...
}

  public function products()
  {
    $product=product::orderBy('id','desc')->get();
    return view('pages.product.index')->with('products',$product);
    // code...
  }
    //
}

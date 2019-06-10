<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use App\order;
use Auth;

class cartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pages.cart');
        //
    }
    public function show(Request $request)
    {
      $this->validate($request,[
      'product_id'=>'required'],
      [
        'product_id.required'=>'please give a product'

      ]);


      if(Auth::check())
      {
        $cart=cart::where('user_id',Auth::id())
        ->where('product_id',$request->product_id)
        ->first();
      }
      else {
        $cart=cart::where('ip_address',request()->ip())
        ->where('product_id',$request->product_id)
        ->first();

      }
    if(!is_null($cart))
    {
      $cart->increment('product_quantity');
    }
    else {


    $cart=new cart();

      if(Auth::check())
      {
        $cart->user_id=Auth::id();
      }
      $cart->ip_address=request()->ip();
      $cart->product_id=$request->product_id;
      $cart->save();

    }
    session()->flash('sucess','product has Added to cart');
    return back();

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd('test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $cart=cart::find($id);
      if(!is_null($cart))
      {
        $cart->product_quantity=$request->product_quantity;
        $cart->save();

      }

      return back();

    }
    public function delete(Request $request, $id)
    {
      $cart=cart::find($id);
      if(!is_null($cart))
      {

        $cart->delete();

      }

      return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

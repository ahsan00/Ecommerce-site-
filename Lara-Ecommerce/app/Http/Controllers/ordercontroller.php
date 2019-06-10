<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\paymentmethod;
use App\order;
use Auth;
class ordercontroller extends Controller
{
  public function index()
  {
    $payment= paymentmethod::orderBy('priority','asc')->get();
    return view('pages.checkout',compact('payment'));
    // code...
  }
  public function store(Request $request)
  {
    $this->validate($request,[
    'name'=>'required',
    'phone_no'=>'required',
    'shipping_address'=>'required'


    ]);
    $order=new order();
    if($request->paymentmethods_id!='cashin')
    {
     if($request->transaction_id==NULL)
     {
       session()->flash('Error!!','enter transaction_id');
       return back();
     }

    }
      $order->name=$request->name;
      $order->email=$request->email;
      $order->phone_no=$request->phone_no;
      $order->shipping_address=$request->shipping_address;
      
      if(Auth::check())
      {
        $order->user_id=Auth::id();
      }
      $order->save();
      session()->flash('Error!!','order placed sucees fully');
      return redirect()->route('index');



    // code...
  }
    //
}

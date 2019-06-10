<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class cart extends Model
{
  public $fillable=[
   'user_id',
   'product_id',
   'order_id',
   'product_quantity',
   'ip_address'
 ];
 public function user()
 {
   return $this->belongsTo(User::class);
   // code...
 }
 public function order()
 {
   return $this->belongsTo(order::class);
   // code...
 }
 public function product()
 {
   return $this->belongsTo(product::class);
   // code...
 }
 /**
** no of totalcart item;
 */
 public static  function totalitem()
 {
   if(Auth::check())
   {
     $cart=cart::orwhere('user_id',Auth::id())
     ->orwhere('ip_address',request()->ip())
     ->get();

   }
   else {
     $cart=cart::orwhere('ip_address',request()->ip())->get();
   }
   $total_item=0;
   foreach ($cart as $cart) {
     $total_item+=$cart->product_quantity;
     // code...
   }
   return $total_item;

   // code...
 }

//total carts
 public static  function totalcart()
 {
   if(Auth::check())
   {
     $cart=cart::orwhere('user_id',Auth::id())
     ->orwhere('ip_address',request()->ip())
     ->get();

   }
   else {
     $cart=cart::orwhere('ip_address',request()->ip())->get();
   }

   return $cart;

   // code...
 }



















    //
}

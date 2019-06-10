<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $fillable=[
     'user_id',
     'ip_address',
     'name',
     'phone_no',
     'shipping_address',
     'email',
     'message',
     'is_paid',
     'is_complete',
     'is_seenbyadmin',
   ];
   public function user()
   {
     return $this->belongsTo(User::class);
     // code...
   }
   public function cart()
   {
     return $this->belongsTo(order::class);
     // code...
   }
}

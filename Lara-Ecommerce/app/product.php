<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    public function images()
    {
      return $this->hasMany('App\productimage');
      // code...
    }
   public function category()
   {
     return $this->belongsTo(category::class);
     // code...
   }
   public function brand()
   {
     return $this->belongsTo(brand::class);
     // code...
   }




}

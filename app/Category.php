<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable=['name','isActive','isSize','isColor','parent_id','slug'];

  protected $dates = ['deleted_at'];

  public function children() {
   return $this->hasMany(self::class, 'parent_id','id');
 }

   public function parent()
   {
     //
     return $this->belongsTo(self::class,'parent_id');
   }
   // public function colours()
   // {
   //   // wiele do wiele
   //   return $this->belongsToMany(Colour::class);
   // }
   public function sizes()
   {
     // wiele do wiele
     return $this->belongsToMany(Size::class);
   }

   public function items()
   {
     return $this->hasMany(Item::class);
   }
}

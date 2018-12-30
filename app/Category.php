<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable=['name','isActive','isSize','isColor','parent_id','slug'];

  protected $dates = ['deleted_at'];

  public function children() {
   //
   return $this->hasMany(self::class, 'parent_id','id');
 }

   public function parent()
   {
     //
     return $this->belongsTo(self::class,'parent_id');
   }
   public function colour()
   {
     return $this->belongsToMany(Colour::class);
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  protected $fillable=['name','desc'];

  protected $dates = ['deleted_at'];

  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }

  public function items()
  {
    return $this->hasMany(Item::class);
  }

}

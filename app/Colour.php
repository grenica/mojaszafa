<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
  protected $fillable=['name','code'];

  protected $dates = ['deleted_at'];

  public function colour()
  {
    return $this->belongsToMany(Category::class);
  }

}

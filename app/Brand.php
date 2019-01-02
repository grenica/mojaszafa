<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $fillable=['name'];

  protected $dates = ['deleted_at'];

  public function items()
  {
    return $this->hasMany(Item::class);
  }
}

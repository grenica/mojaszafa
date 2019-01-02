<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
  protected $fillable=['name'];

  protected $dates = ['deleted_at'];

  public function items()
  {
    return $this->hasMany(Item::class);
  }
}

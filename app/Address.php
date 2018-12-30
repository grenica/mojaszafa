<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable=['user_id','city','district','region_id','desc','image'];

  protected $dates = ['deleted_at'];

  public function user() {
    return $this -> belongsTo(User::class);
}
public function region() {
  //return $this -> hasMany(Region::class);
  return $this -> belongsTo(Region::class);
}

}

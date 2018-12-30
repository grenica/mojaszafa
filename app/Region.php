<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  protected $fillable=['region'];

  protected $dates = ['deleted_at'];

//   public function users() {
//     return $this -> belongsTo(User::class);
// }
  public function address() {
    //return $this -> belongsTo(Address::class);
    return $this -> hasMany(Address::class);
}

}

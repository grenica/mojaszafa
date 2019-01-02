<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable=['desc1','desc2','brand_id','condition_id','category_id',
  'size_id','colour_id','amount','exchange','ispaid'
];

  protected $dates = ['deleted_at'];

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }
  public function condition()
  {
    return $this->belongsTo(Condition::class);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function size()
  {
    return $this->belongsTo(Size::class);
  }
  public function colour()
  {
    return $this->belongsTo(Colour::class);
  }
}

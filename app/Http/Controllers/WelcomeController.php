<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class WelcomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $category = Category::where('parent_id',0)->where('isActive',true)->get();
      return view('welcome',compact('category'));
  }
}

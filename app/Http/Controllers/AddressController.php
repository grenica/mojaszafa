<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Region;
use Illuminate\Http\Request;
use Auth;

class AddressController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $address = Address::where('user_id',Auth::user()->id)->first();//firstOrFail();
      $category = Category::where('parent_id',0)->where('isActive',true)->get();
      //dd($user);
    return view('site.address.index',compact('category','address'));

  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $regions = Region::pluck('region','id');
      $category = Category::where('parent_id',0)->where('isActive',true)->get();
        return view('site.address.create',compact('category','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user1= Auth::user()->id;
    //  dd($user1);
      $user = Address::where('user_id',$user1)->first();//firstOrFail();
      if (empty($user)) {
        $adres = new Address;
        $adres->user_id=$user1;
        $adres->city= $request->city;
        $adres->district = $request->district;
        $adres->desc = $request->desc;
        $adres->region_id=$request->region_id;
        $adres->image = null;
        $adres->save();
      }
      //dd($user);
    //  echo empty($user) ? 'pusty' : 'nie pusty!';
    return redirect()->route('home');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
      $category = Category::where('parent_id',0)->where('isActive',true)->get();
      $regions = Region::pluck('region','id');
      return view('site.address.edit',compact('regions','category','address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}

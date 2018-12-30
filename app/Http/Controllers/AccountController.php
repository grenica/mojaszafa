<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Address;
use App\Category;
use App\User;
use Illuminate\Support\Str;

class AccountController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $category=$this->getcat();
        return view('site.account.index',compact('category','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request);
      $request->validate([
          'image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048' //max rozmiar 2MB
      ]);
      $user = Auth::user();

      if($request->hasFile('image')){
         $file = $request->file('image');
         $filename = 'user-'. $user->id.'-' . time() . '.' . $file->getClientOriginalExtension();
       //  $resize = Image::make($file)->resize(300, 300);
       // save to storage/app/photos as the new $filename
       //  $path = $file->storeAs('photo', $filename);
         $path = $request->file('image')->store('images','public');  //zapis pliku do storage publicznego
       }

      if (!empty($user->address)) {
       // echo 'Nie pusty';
       $addr = $user->address;
       $addr->desc=$request->desc;
       $addr->image=$path;
       $addr->save();
       $request->session()->flash('status', 'Profil został zaktualizowany');
      } else {
       // nie mam rekordu w Address i go dodaje
       $addr = new Address;
       $addr->user_id = $user->id;
       $addr->city='';
       $addr->desc=$request->desc;
       $addr->image=$path;
       $addr->save();
       $request->session()->flash('status', 'Profil został zaktualizowany, nie zapomnij uzupełnić twoją lokalizację!');
      }
      return redirect()->route('settings.account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $addr = Address::find($id);
      $addr->desc = $request->desc;
      
      if($request->hasFile('image')){
         $file = $request->file('image');
         $filename = 'user-'. $user->id.'-' . time() . '.' . $file->getClientOriginalExtension();
         $path = $request->file('image')->store('images','public');  //zapis pliku do storage publicznego

         $addr->image=$path;
       }
        $addr->save();

        $request->session()->flash('status', 'Profil został zmieniony !!!');
        return redirect()->route('settings.account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function getcat() {
      $category = Category::where('parent_id',0)->where('isActive',true)->get();
      return $category;
    }
}

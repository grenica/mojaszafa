<?php

namespace App\Http\Controllers\Admin;

use App\Colour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColourController extends Controller
{
  public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $colour = Colour::all();
      return view('admin.color.index')->with('colour',$colour);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $size = Colour::create($request->all());
      $request->session()->flash('success', 'Zapisano nowy rekord!');
      return redirect()->route('admin.color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function show(Colour $colour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function edit(Colour $colour)
    {
      echo $colour;
      //return view('admin.color.edit')->with('colour',$colour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colour $colour)
    {
      $colour->name = $request->name;
      $colour->save();
      $request->session()->flash('success', 'Zmodyfikawano rekord!');
      return redirect()->route('admin.color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colour $colour)
    {
      $colour->delete();
      $request->session()->flash('success', 'Rekord został usuniety !');
      return redirect()->route('admin.colour.index');
    }
}

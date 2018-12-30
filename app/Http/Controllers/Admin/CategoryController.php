<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Colour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
      $category = Category::where('parent_id','=',0)->get();
      return view('admin.category.index')->with('category',$category);
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
    public function addsub(Request $request)
    {
      $slug = str_slug($request->name,'_');
      $request->merge(['slug'=> $slug]);
      $category = Category::create($request->all());
    //  $parent_id = $request->parent_id;
        $request->session()->flash('success', 'Zapisano nowy rekord!');
        return redirect()->route('admin.categories.show',['category'=>$category->parent_id]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $slug = str_slug($request->name,'_');
      $request->merge(['parent_id' => 0,'slug'=> $slug]);
    //  dd($request->all());
      $category = Category::create($request->all());
        $request->session()->flash('success', 'Zapisano nowy rekord!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      $colours = Colour::all();
        return view('admin.category.show')->with('category',$category)->with('colours',$colours);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $category->name = $request->name;
      $category->isActive = $request->isActive;
      $category->isSize = $request->isSize;
      $category->isColor = $request->isColor;
      $category->slug = str_slug($request->name,'_');
      $category->save();
      $request->session()->flash('success', 'Zmodyfikawano rekord!');
      return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Category $category)
    {
      $category->delete();
      $request->session()->flash('success', 'Rekord został usuniety !');
      return redirect()->route('admin.categories.index');
    }
}

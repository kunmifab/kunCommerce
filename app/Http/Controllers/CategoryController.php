<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth.admin')->only(['create', 'store', 'destroy']);
    }

    public function index()
    {
        //
        $categories = Category::all();
        return view('category.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'string|required|max:255',
            'image' => 'image|required|mimes:png,jpg,jpeg'
        ]);

        $category = new Category();
        $image_path = $request->file('image')->storePublicly('categories');
        move_uploaded_file($image_path, public_path('categories'));
        $category->image_path = $image_path;
        $category->name = Str::title($request->name);
        $category->slug = Str::slug($request->name . ' ' . Str::random(3));
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $category = Category::where('slug', $slug)->firstOrFail();

        $catProducts = Product::where('category_id', $category->id)->get();

        return view('category.show', ['category'=> $category, 'catProducts' => $catProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

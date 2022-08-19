<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $products = Product::all();
        return view('product.index', ['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $currencies = Currency::all();
        return view('product.create', ['categories'=> $categories, 'currencies'=> $currencies]);
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
            'price' => 'integer|required|min:400',
            'description' => 'string|required|nullable',
            'quantity' => 'integer|required|max:255'
        ]);

        $auth_user = auth()->user();
        $category = Category::where('slug',$request->category_slug)->firstOrFail();
        $currency = Currency::where('id',$request->currency)->firstOrFail();

        $product = new Product();
        $image_path_1 = $request->file('image1')->storePublicly('products');
        move_uploaded_file($image_path_1, public_path('products'));
        $product->image_path_1 = $image_path_1;

        if($request->image2 != null){
            $image_path_2 = $request->file('image2')->storePublicly('products');
            move_uploaded_file($image_path_2, public_path('products'));
            $product->image_path_2 = $image_path_2;
        }
        if($request->image3 != null){
            $image_path_3 = $request->file('image3')->storePublicly('products');
            move_uploaded_file($image_path_3, public_path('products'));
            $product->image_path_3 = $image_path_3;
        }
        if($request->image4 != null){
            $image_path_4 = $request->file('image4')->storePublicly('products');
            move_uploaded_file($image_path_4, public_path('products'));
            $product->image_path_4 = $image_path_4;
        }

        $product->name = Str::title($request->name);
        $product->slug = Str::slug($request->name. ' ' . Str::random(3));
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->category()->associate($category);
        $product->currency()->associate($currency);
        $product->user()->associate($auth_user);
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Product::where('slug', $slug)->firstOrFail();
        $product_id = $product->id;

        $reviews = Review::where('product_id', $product_id)->get();

        return view('product.show', ['product' => $product, 'reviews'=>$reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $categories = Category::all();
        $currencies = Currency::all();
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.edit', ['product' => $product, 'categories'=>$categories, 'currencies'=>$currencies]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'string|required|max:255',
            'price' => 'integer|required|min:400',
            'description' => 'string|required|nullable',
            'quantity' => 'integer|required|max:255'
        ]);

        $auth_user = auth()->user();
        $category = Category::where('slug',$request->category_slug)->firstOrFail();
        $currency = Currency::where('id',$request->currency)->firstOrFail();

        $product = Product::findOrFail($id);

        if($request->image1 != null){
            Storage::delete($product->image_path_1);
            $image_path_1 = $request->file('image1')->storePublicly('products');
            move_uploaded_file($image_path_1, public_path('products'));
            $product->image_path_1 = $image_path_1;
        }


        if($request->image2 != null){
            Storage::delete($product->image_path_2);
            if($product->image_path_2 != null){

                $image_path_2 = $request->file('image2')->storePublicly('products');
                move_uploaded_file($image_path_2, public_path('products'));
                $product->image_path_2 = $image_path_2;
            }
        }

        if($request->image3 != null){
            Storage::delete($product->image_path_3);
            if($product->image_path_3 != null){
                $image_path_3 = $request->file('image3')->storePublicly('products');
                move_uploaded_file($image_path_3, public_path('products'));
                $product->image_path_3 = $image_path_3;
            }
        }

        if($request->image4 != null){
                Storage::delete($product->image_path_4);
            if($product->image_path_4 != null){

                $image_path_4 = $request->file('image4')->storePublicly('products');
                move_uploaded_file($image_path_4, public_path('products'));
                $product->image_path_4 = $image_path_4;
            }
        }



        $product->name = Str::title($request->name);
        $product->slug = Str::slug($request->name. ' ' . Str::random(3));
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->category()->associate($category);
        $product->currency()->associate($currency);
        $product->user()->associate($auth_user);
        $product->save();

        return redirect()->route('product.show', ['slug'=> $product->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $product = Product::findOrFail($id);
        Storage::delete($product->image_path_1);
        if($product->image_path_2 != null){
            Storage::delete($product->image_path_2);
        }
        if($product->image_path_3 != null){
            Storage::delete($product->image_path_3);
        }
        if($product->image_path_4 != null){
            Storage::delete($product->image_path_4);
        }
        $product->delete();

        return redirect()->route('product.index');
    }

    public function customer_create($slug)
    {
        //
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.customer-details', ['product'=>$product]);
    }

    public function customer_update(Request $request, $id)
    {
        //
        $request->validate([
            'phone_num' => 'required|numeric',
            'address_1' => 'required',
            'address_2' => 'nullable|string'
        ]);

        $auth_user = auth()->user()->id;

        $user = User::findOrFail($auth_user);
        $product = Product::findOrFail($id);




        $user->phone_num = $request->phone_num;
        $user->address_1 = $request->address_1;


        if($request->address_2 != null){
            $user->address_2 = $request->address_2;
        }

        $user->save();

        return redirect()->route('product.customer-payment', ['slug'=> $product->slug]);
    }

    public function customer_payment($slug)
    {
        //



        return view('product.payment');
    }

  

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index() {

        return view('cart.index');
    }

    public function store(Request $request) {

        $request -> validate([
            'quantity' => 'numeric|required',
        ]);

        if(! Cart::get( $request->id)){

            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'VAT 10%',
                'type' => 'tax',
                'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => '+10%',
                'attributes' => array( // attributes field is optional
                    'description' => 'Value added tax'
                )
            ));

            Cart::condition($condition);

        Cart::add($request->id, $request->name, $request->price, $request->quantity)->associate(Product::class);

            // $request->id, $request->name, 1, $request->price, $request->image_path_1);

        } else{
            Cart::update($request->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
              ));
        }




        return redirect()->route('cart.index')->with('success-message', 'Item    has been added to the cart successfully');

    }

    public function destroy($id) {
        Cart::remove($id);
        Cart::clearItemConditions($id);

        return back()->with('success-message', 'Item has been removed!');
    }
}

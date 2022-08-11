<?php

namespace App\Http\Controllers;

use App\Models\Escrow;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Exception;
use Cartalyst\Stripe\Stripe;
use Cart;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->check()){
          return view('checkout');
        }else{
            return redirect()->route('login');
        }

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
        //

        $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'email|required',
            'state' => 'string|required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required|integer',
            'name_on_card' => 'required',
            'postalcode' => 'integer|required'
        ]);

        try{


            $stripe = new \Stripe\StripeClient(
                'sk_test_51LLx8nDOwLY9DGTMoJqVbI3N7tiO8kfPxNPbnV7s9eI3kntZ4bRw7Q6e0T6LRIvyscqiCe65GwqONuwTrxuM9C8C00BKhMAqv3'
              );
            $stripe->charges->create([
                'amount' => Cart::getTotal() * 100,
                'currency' => 'NGN',
                'source' => $request->stripeToken,
                'description' => 'Order',
                // 'receipt_email' => $request->email,
                'metadata' => [
                    // 'contents' => $contents,
                    // 'quantity' => Cart::instance('default')->count(),
                    // 'discount' => collect(session()->get('coupon'))->toJson(),
                ],
            ]);

             // insert into order table and order product table
            $this->addToOrdersTables($request, null);

            // minus quantity from products table when successful
            foreach(Cart::getContent() as $item){
                $product = Product::where('id', $item->model->id)->firstOrFail();
                $product->quantity = ($product->quantity - $item->quantity);
                $product->save();
            }


            //insert into transactions table
            foreach(Cart::getContent() as $item){
                $transaction = new Transaction();
                $transaction->buyer_id = auth()->user()->id;
                $transaction->seller_id = $item->model->user_id;
                $transaction->product_id = $item->model->id;
                $transaction->quantity = $item->quantity;
                $transaction->amount = Cart::getTotal();
                $transaction->save();
            }

           // insert into escrow table
           $newOrder = Order::orderBy('id', 'desc')->first();
            $escrow = new Escrow();
            $escrow->order()->associate($newOrder->id);
            $escrow->amount = Cart::getTotal();
            $escrow->save();


            Cart::clear();
            return redirect()->route('confirmation.index')->with('success-message', 'Thank you! Your payment has been successfully accepted!');
        }catch(\Stripe\Exception\CardException $e){
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error!' . $e->getMessage());
        }
    }

    protected function addToOrdersTables($request, $error) {
                    // insert into order table when it is successful

                    $order = new Order();
                    $order->billing_email = $request->email;
                    $order->billing_name = Str::title($request->name);
                    $order->billing_address = $request->address;
                    $order->billing_city = $request->city;
                    $order->billing_state = Str::title($request->state);
                    $order->billing_postalcode = $request->postalcode;
                    $order->billing_phone = $request->phone;
                    $order->billing_name_on_card = $request->name_on_card;
                    $order->error = $error;
                    $order->billing_subtotal = Cart::getSubTotal();
                    $order->billing_total = Cart::getTotal();
                    $order->user()->associate(auth()->user());
                    foreach(Cart::getContent() as $item){
                        $product_id = $item->model->id;
                    }
                    $order->product()->associate($product_id);
                    $order->save();

                    // insert into order_product table


                    foreach(Cart::getContent() as $item){
                        $orderProduct = new OrderProduct();
                        $orderProduct->order_id = $order->id;
                        $orderProduct->product_id = $item->model->id;
                        $orderProduct->quantity = $item->quantity;
                        $orderProduct->save();
                    }
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
        //



        Cart::update($id, ['quantity' => ['relative' => false,
                                   'value' => $qty
                                 ]
            ]);
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
}

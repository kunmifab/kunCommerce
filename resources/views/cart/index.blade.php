@extends('layouts.app')
@section('title', 'Cart')

@section('content')

<div class="mt-2">
    @if (session()->has('success-message'))
     <div class="alert alert-success mt-2">
     {{session()->get('success-message')}}
     </div>

    @endif

    @if (count($errors) > 0))
     <div class="alert alert-danger mt-2">
     <ul>
         @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
         @endforeach
     </ul>
     </div>

    @endif

    @if (Cart::getContent()->count() > 0)


    <h3 class=" mb-2 mt-2">{{Cart::getContent()->count()}} item(s) in shopping cart</h3>

    <hr class="w-75">

    <div class="container">
            <div class="row">

                @foreach (Cart::getContent() as $item)
                    <div class="col-4">
                       <a href="{{route('product.show', ['slug'=> $item->model->slug])}}"><img src="{{asset($item->model->image_path_1)}}" alt="{{$item->name}}" width="70px"></a>
                    </div>
                    <div class="col-3">
                        <a href="{{route('product.show', ['slug'=> $item->model->slug])}}"><p>{{$item->name}}</p></a>
                    </div>
                    <div class="col-2">
                        <p>{{$item->model->currency->sign}}{{number_format($item->model->price)}}</p>
                        <form action="{{route('cart.destroy', ['id'=>$item->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-muted">Remove</button>
                        </form>
                    </div>
                    <div class="col-2">
                        <small class="text-muted">Quantity: <span class="h5">{{$item->quantity}}</span></small>
                    </div>

                    <hr class="w-100">
                @endforeach


            </div>
    </div>
</div>
<div class="container">
    <div class="row bg-success text-white" >
        <div class="col-7">
            <p>Shipping within Nigeria is free for now, we love you at KunCommerce. We want to give you the best always!</p>
        </div>
        <div class="col-5">
            <p>Subtotal: ₦{{number_format(Cart::getSubTotal())}}</p>
            <p>Tax(10%): ₦{{number_format(Cart::getCondition('VAT 10%')->getCalculatedValue(Cart::getSubTotal()))}}</p>
            <p>Total: ₦{{number_format(Cart::getTotal())}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a href="{{route('product.index')}}" class="btn border">Continue Shopping</a>
        </div>
        <div>
            <a href="{{route('checkout.index')}}" class="btn border">Proceed to Checkout</a>
        </div>
    </div>
    <br>
</div>
@else
<h3 class=" mb-2 mt-2">No item(s) in shopping cart</h3>
<a href="{{route('product.index')}}" class="btn border">Continue Shopping</a>
@endif



@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

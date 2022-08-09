@extends('layouts.app')
@section('title', 'Product')

@section('content')

<a href="{{route('product.index')}}"><i class="fas fa-arrow-left"></i>Back</a>
        <div class="card">
            <h2 class="card-title text-center">{{$product->name}}</h2>
            <img class=" card-img-top" src="{{asset($product->image_path_1)}}" alt="{{$product->name}}">
            <div class="card-body">

              <p class="card-text">{{$product->description}}</p>
              <p class="text-muted">Price: <span class="h3">{{number_format($product->price)}}</span></p>
              <p class="text-muted">Quantity: There are <span class="h3"> {{$product->quantity}}</span> pieces left</p>



              <div class="row">

                  <div class="col">
                      <p><small>Category: <span><a href="">{{$product->category->name}}</a></span></small></p>

                  </div>
                  <div class="col">
                      <p><small>Seller: <span>{{$product->user->name}}</span></small></p>

                  </div>
              </div>


            </div>
          </div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

@extends('layouts.app')
@section('title', 'Welcome')

@section('content')

@if (!auth()->check())
    <div class="text-center">
        <h5>You want to sell your products on KunCommerce?? Click <a href="{{route('seller.register')}}">Here</a> to register</h5>
    </div>
@endif


<div class="container">
    <div class="row pt-2">
        <div class="col-3">
            <h6>All Categories</h6>
            @foreach ($categories as $category)
            <a href="{{route('category.show', ['slug' => $category->slug])}}">{{$category->name}}</a>
            <hr>
            @endforeach

        </div>
        <div class="col-9">
                {{-- for card deck --}}
<div class="card-deck">

    @foreach ($randomCategories as $category)
      <div class="card text-center" >
          <img class="card-img-top" src="{{asset($category->image_path)}}" class="w-25" alt="Card image">
          <h4>{{$category->name}}</h4>
      </div>
    @endforeach


</div>
<br>

{{-- for carousel --}}


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
      @foreach ($randomProducts as $product)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
      @endforeach

  </ol>
  <div class="carousel-inner">
      @foreach ($products as $product)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <a href="{{route('product.show', ['slug'=> $product->slug])}}">
              <img class="d-block w-100" src="{{asset($product->image_path_1)}}" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                  <h5>{{$product->name}}</h5>
                  <p>...</p>
              </div>
          </a>

      </div>
      @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        </div>
    </div>
</div>
<hr>
<br>
<div class="container">
    <h5>Products You can buy</h5>
    <div class="row">

        @foreach ($randomProducts as $product)
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" title="{{$product->slug}}" src="{{asset($product->image_path_1)}}" alt="{{$product->name}}">
                    <div class="card-body text-center">
                        <h4 class="card-title"><a href="{{route('product.show', ['slug'=> $product->slug])}}" class="">{{$product->name}}</a></h4>
                        <h5>{{$product->currency->sign .' '. number_format($product->price)}}</h5>
                    </div>
                </div>
            </div>
    @endforeach

    </div>
</div>

@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
<div class="container">
<div class="container p-4">
    <h4>Search Result(s) for {{$searchword}}...</h4>
</div>

<div class="row">
    <div class="col">

    </div>
    <div class="col"></div>
</div>
@if ($searchProducts->isNotEmpty())
<div class="p-3">
    <h5>Products</h5>
</div>
@foreach ($searchProducts as $product)
<div class="container">
    <div class="row">

        @foreach ($searchProducts as $product)
            <div class="col">
                <div class="card" style="width:400px">
                    <img class="card-img-top" title="{{$product->slug}}" src="{{asset($product->image_path_1)}}" alt="{{$product->name}}">
                    <div class="card-body text-center">
                    <h4 class="card-title"><a href="{{route('product.show', ['slug' => $product->slug])}}" class="">{{$product->name}}</a></h4>
                    <h5>{{$product->currency->sign .' '. number_format($product->price)}}</h5>
                    </div>
                </div>
            </div>
    @endforeach

    </div>
</div>
</div>
@endforeach
@else
<div>No search result</div>
@endif

@if ($searchCategories->isNotEmpty())
<div class="p-3">
    <h5>Categories</h5>
</div>
@foreach ($searchCategories as $category)

<div class="container">
    <div class="row">

        @foreach ($searchCategories as $category)
            <div class="col">
                <div class="card" style="width:400px">
                    <img class="card-img-top" title="{{$category->slug}}" src="{{asset($category->image_path)}}" alt="{{$category->name}}">
                    <div class="card-body text-center">
                    <h4 class="card-title"><a href="{{route('category.show', ['slug' => $category->slug])}}" class="">{{$category->name}}</a></h4>
                    </div>
                </div>
            </div>
    @endforeach

    </div>
</div>
</div>
@endforeach
@endif



</div>
@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

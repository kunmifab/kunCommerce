@extends('layouts.app')
@section('title', 'Products')

@section('content')

<div class="mt-2">
    <h2 class="text-center mb-2 mt-2">All Products</h2>
    <hr class="w-75">
    @if (auth()->check())
        <h4>Create a new product <a href="{{route('product.create')}}">Here</a></h4>
    @endif

    <div class="container">
            <div class="row">

                @foreach ($products as $product)
                    <div class="col">
                        <div class="card" style="width:400px">
                            <img class="card-img-top" title="{{$product->slug}}" src="{{asset($product->image_path_1)}}" alt="{{$product->name}}">

                            {{-- for rating --}}
                            <div class="text-center mt-2 mb-2">
                            @if ($product->reviews->count() > 0)
                            @php
                                $avgrating = 0;
                                $avgrating = $avgrating + round($product->reviews->sum('star_rating')/$product->reviews->count());
                            @endphp
                            @for ($i=1;$i<=5;$i++)
                            @if ($i<=$avgrating)
                            <i class="fa fa-star text-warning"></i>
                            @else
                            <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                            @endif

                            @endfor
                            <p>{{$product->reviews->count()}} review(s)</p>
                            @else
                            <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                            <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                            <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                            <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                            <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                            <span>No review Yet</span>
                            @endif

                            </div>

                            {{-- end of rating --}}

                            <div class="card-body text-center">
                            <h4 class="card-title"><a href="{{route('product.show', ['slug'=> $product->slug])}}" class="">{{$product->name}}</a></h4>
                            </div>
                        </div>
                    </div>
            @endforeach

            </div>
    </div>
</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

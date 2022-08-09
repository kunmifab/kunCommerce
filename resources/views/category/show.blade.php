@extends('layouts.app')
@section('title', 'Category')

@section('content')

<a href="{{route('category.index')}}"><i class="fas fa-arrow-left"></i>Back</a>
<div class="card text-center">
    <div class="row">
        <div class="col">
            <img width="150px"  title="{{$category->slug}}" src="{{asset($category->image_path)}}" alt="{{$category->name}}">
        </div>
        <div class="col">
            <h4 class="card-title">{{$category->name}}</h4>
        </div>
    </div>
</div>


<div class="container p-4">
    <div class="row">

        @foreach ($catProducts as $catProduct)
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" title="{{$catProduct->slug}}" src="{{asset($catProduct->image_path_1)}}" alt="{{$catProduct->name}}">
                    <div class="card-body text-center">
                        <h4 class="card-title"><a href="{{route('product.show', ['slug'=> $catProduct->slug])}}" class="">{{$catProduct->name}}</a></h4>
                        <h5>{{$catProduct->currency->sign .' '. number_format($catProduct->price)}}</h5>
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

@extends('layouts.app')
@section('title', 'Categories')

@section('content')



{{-- <div class="card-deck">

        @foreach ($categories as $category)
        <div class="card" style="width:400px">
            <img class="card-img-top" src="{{asset($category->image_path)}}" alt="{{$category->name}}">
            <div class="card-body text-center">
              <a href="#" class="btn btn-primary">{{$category->name}}</a>
            </div>
          </div>

         @endforeach


</div> --}}

<div class="mt-2">
    <h2 class="text-center mb-2 mt-2">All Categories</h2>
    <hr class="w-75">
    @if (auth()->check())
    @if (auth()->user()->role->id == 1)
    <h4>Create a new category <a href="{{route('category.create')}}">Here</a></h4>
    @endif
    @endif


    <div class="container">
            <div class="row">

                @foreach ($categories as $category)
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




@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

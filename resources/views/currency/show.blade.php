@extends('layouts.app')
@section('title', 'Category')

@section('content')

<a href="{{route('category.index')}}"><i class="fas fa-arrow-left"></i>Back</a>
<div class="card text-center">
    <img class="w-75"  title="{{$category->slug}}" src="{{asset($category->image_path)}}" alt="{{$category->name}}">
    <div class="card-body text-center">
    <h4 class="card-title">{{$category->name}}</h4>
    </div>
</div>

@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

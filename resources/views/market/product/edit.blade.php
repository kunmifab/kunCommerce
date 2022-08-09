@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')

<div class="p-5">
    <h2 class="text-center">Edit Product - {{$product->name}}</h2>
        <form action="{{route('product.update', ['id'=> $product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" id="name" type="text" class="form-control" value="{{$product->name}}">
            </div>
            @error('name')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="price">Price:</label>
                <input name="price" id="price" type="text" class="form-control" value="{{$product->price}}">
            </div>
            @error('price')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$product->description}}</textarea>
            </div>
            @error('description')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category_slug" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->slug}}" @if ($category->slug == $product->category->slug)
                        {{'selected'}}
                    @endif>{{$category->name}} </option>
                    @endforeach
                </select>
            </div>
            @error('category')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="currency">Currency:</label>
                <select name="currency" id="currency" class="form-control">
                    @foreach ($currencies as $currency)
                    <option value="{{$currency->id}}"@if ($currency->id == $product->currency->id)
                        {{'selected'}}
                    @endif>{{$currency->name}} - {{$currency->abbr}} </option>
                    @endforeach
                </select>
            </div>
            @error('currency')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="image">Image 1:</label>
                <input name="image1" id="image" type="file"  class="form-control" accept="image.jpg,image.jpeg,image.png">
            </div>
            @error('image')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="image">Image 2:</label>
                <input name="image2" id="image" type="file"  class="form-control" accept="image.jpg,image.jpeg,image.png">
            </div>
            @error('image')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="image">Image 3:</label>
                <input name="image3" id="image" type="file"  class="form-control" accept="image.jpg,image.jpeg,image.png">
            </div>
            @error('image')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="image">Image 4:</label>
                <input name="image4" id="image" type="file"  class="form-control" accept="image.jpg,image.jpeg,image.png">
            </div>
            @error('image')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input name="quantity" id="quantity" type="text" class="form-control" value="{{$product->quantity}}">
            </div>
            @error('quantity')
            <span style="color: red">{{ $message }}
            @enderror

            <div>
                <button class="btn border">Edit</button>
            </div>
        </form>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

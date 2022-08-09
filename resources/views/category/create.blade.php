@extends('layouts.app')
@section('title', 'Create Category')

@section('content')

<div class="p-5">
    <h2 class="text-center">Create Category</h2>
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" id="name" type="text" class="form-control">
            </div>
            @error('name')
            <span style="color: red">{{ $message }}
            @enderror


            <div class="form-group">
                <label for="image">Image:</label>
                <input name="image" id="image" type="file"  class="form-control" accept="image.jpg,image.jpeg,image.png">
            </div>
            @error('image')
            <span style="color: red">{{ $message }}
            @enderror

            <div>
                <button class="btn border">Create</button>
            </div>
        </form>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

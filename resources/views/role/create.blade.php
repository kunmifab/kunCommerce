@extends('layouts.app')
@section('title', 'Create Role')

@section('content')

<div class="p-5">
    <h2 class="text-center">Create Role</h2>
        <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" id="name" type="text" class="form-control">
            </div>
            @error('name')
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

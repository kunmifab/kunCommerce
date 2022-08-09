@extends('layouts.app')
@section('title', 'Create Currency')

@section('content')

<div class="p-5">
    <h2 class="text-center">Create Currency</h2>
        <form action="{{route('currency.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Currency Name:</label>
                <input name="name" id="name" type="text" class="form-control">
            </div>
            @error('name')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="sign">Sign:</label>
                <input name="sign" id="sign" type="text" placeholder="e.g $" class="form-control">
            </div>
            @error('sign')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="abbr">Abbr:</label>
                <input name="abbr" id="abbr" type="text" placeholder="e.g USD" class="form-control">
            </div>
            @error('abbr')
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

@extends('layouts.app')
@section('title', 'Edit Profile')

@section('content')

<div class="p-5">
    <h2 class="text-center">Edit Profile Details</h2>
        <form action="{{route('profile.update', ['id' => auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="firstname">Firstname:</label>
                        <input name="firstname" id="firstname" type="text" class="form-control" value="{{auth()->user()->firstname}}" disabled>
                    </div>
                    @error('firstname')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lastname">Lastname:</label>
                        <input name="lastname" id="lastname" type="text" class="form-control" value="{{auth()->user()->lastname}}" disabled>
                    </div>
                    @error('lastname')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input name="username" id="username" type="text" class="form-control" value="{{auth()->user()->username}}" disabled>
                    </div>
                    @error('username')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" id="email" type="email" class="form-control" value="{{auth()->user()->email}}" disabled>
                    </div>
                    @error('email')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="phone_num">Phone Number:</label>
                        <input name="phone_num" id="phone_num" type="text" class="form-control" value="{{auth()->user()->phone_num}}">
                    </div>
                    @error('phone_num')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
                @if (auth()->user()->website != null)
                    <div class="col">
                        <div class="form-group">
                            <label for="website">Website:</label>
                            <input name="website" id="website" type="website" class="form-control" value="{{auth()->user()->website}}">
                        </div>
                        @error('website')
                        <span style="color: red">{{ $message }}
                        @enderror
                    </div>
                @endif

            </div>

            <div class="form-group">
                <label for="address_1">Address 1:</label>
                <textarea name="address_1" id="address_1" cols="30" rows="5" class="form-control">{{auth()->user()->address_1}}</textarea>
            </div>
            @error('address_1')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="address_2">Address 2:</label>
                <textarea name="address_2" id="address_2" cols="30" rows="5" class="form-control">@if (auth()->user()->address_2 != null)
                {{auth()->user()->address_2}}
                @endif</textarea>
            </div>
            @error('address_2')
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

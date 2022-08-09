@extends('layouts.app')
@section('title', 'Register Seller')

@section('content')

<x-auth-card  class="d-flex justify-content-center ">
    <x-slot name="logo" class="mt-3">
        <a href="/" class="d-flex justify-content-center pt-4">
            <img src="{{asset('images/logo.PNG')}}"  alt="" class="w-25">
        </a>
    </x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf

 <!-- FirstName -->
 <div>
    <x-label class="form-group" for="firstname" :value="__('Firstname')" />

    <x-input id="firstname" class="form-control" type="text" name="firstname" :value="old('firstname')" required autofocus />
</div>

<!-- LastName -->
<div>
    <x-label class="form-group" for="lastname" :value="__('Lastname')" />

    <x-input id="lastname" class="form-control" type="text" name="lastname" :value="old('lastname')" required autofocus />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label class="form-group" for="email" :value="__('Email')" />

    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
</div>

<!-- Username Address -->
<div class="mt-4">
    <x-label class="form-group" for="username" :value="__('Username')" />

    <x-input id="username" class="form-control" type="text" name="username" :value="old('username')" required />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label class="form-group" for="password" :value="__('Password')" />

    <x-input id="password" class="form-control"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label class="form-group" for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="form-control"
                    type="password"
                    name="password_confirmation" required />
</div>

<div class="form-group">
    <input type="hidden" value="{{$role->id}}" name="role_id">
</div>


        <div class="d-flex justify-content-center mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ml-4 bg-secondary">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>

</x-auth-card>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection


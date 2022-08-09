@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="p-5">
    <h2 class="text-center">Personal Details</h2>
        <p> Firstname: <span class="h5">{{auth()->user()->firstname}}</span></p>
        <p> Lastname: <span class="h5">{{auth()->user()->lastname}}</span></p>
        <p> Username: <span class="h5">{{auth()->user()->username}}</span></p>
        <p> Email: <span class="h5">{{auth()->user()->email}}</span></p>
        <p> Address 1: <span class="h5">{{auth()->user()->address_1}}</span></p>
        <p> Address 2: <span class="h5">{{auth()->user()->address_2}}</span></p>
        <p> Phone Number: <span class="h5">{{auth()->user()->phone_num}}</span></p>
        <a href="" class="btn border">Edit Profile</a>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

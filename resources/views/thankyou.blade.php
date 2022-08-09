@extends('layouts.app')
@section('title', 'Thank You')

@section('content')

<div class="text-center d-flex-center p-4">
    @if (session()->has('success-message'))
    <div class="alert alert-success mt-2">
    {{session()->get('success-message')}}
    </div>

   @endif

   @if (count($errors) > 0))
    <div class="alert alert-danger mt-2">
    <ul>
        @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>

   @endif
    <a href="{{url('/')}}" class="btn border">Homepage</a>
    <br>

</div>

@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

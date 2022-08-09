@extends('layouts.app')
@section('title', 'Transactions')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="container p-3">
    <div class="bg-dark text-white m-4 p-3">
            <div class="text-center">
                    <h3>All Transactions</h3>
            </div>
            <br>
            @foreach ($transactions as $transaction)

            <div class="row">
                <div class="col text-center">
                    <img src="{{asset($transaction->product->image_path_1)}}" alt="{{$transaction->product->name}}" width="100px">
                </div>
                <div class="col text-center">
                    <p><a href="{{route('product.show', ['slug'=> $transaction->product->slug])}}">{{$transaction->product->name}}</a></p>
                    <p>{{$transaction->product->currency->sign}}{{number_format($transaction->product->price)}}</p>
                    <p>{{$transaction->product->user->firstname.' '.$transaction->product->user->lastname}}</p>
                </div>
                <div class="col">
                    <p><small>Date:</small> {{$transaction->created_at}}</p>
                </div>
                <div class="col">
                    <a href="{{route('review.show', ['slug'=> $transaction->product->slug])}}" class="btn border text-white">Write Review</a>
                </div>
            </div>
            <br>
            <hr class="bg-white">
            <br>

            @endforeach
    </div>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

@extends('layouts.app')
@section('title', 'Create Product')

@section('content')

<div class="p-5">
    <h2 class="text-center">Create Product</h2>
        <form action="{{route('order.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" id="product-group">
                <label for="plan">Select Plan:</label>
                <select name="plan" id="plan" type="text" class="form-control">
                    @foreach ($plans as $plan)
                    <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('plan')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group" id="cc-group">
                <label for="number">Credit Card Number:</label>
                <input name="number" id="number" type="number" class="form-control" maxlength="16">
            </div>
            @error('number')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group" id="ccv-group">
                <label for="cvc">CVC (3 or 4 digit number):</label>
                <input name="cvc" id="cvc" type="number" class="form-control" maxlength="4">
            </div>
            @error('cvc')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group" id="month-group">
                <label for="month">Select Month:</label>
                <input name="month" id="month" type="number" class="form-control">
            </div>
            @error('month')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group" id="ccv-group">
                <label for="year">Select Year:</label>
                <input name="year" id="year" type="number" class="form-control">
            </div>
            @error('year')
            <span style="color: red">{{ $message }}
            @enderror


            <div>
                <button>Submit</button>
            </div>
        </form>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

@extends('layouts.app')
@section('title', 'Create Customer Details')

@section('content')

<div class="p-5">
    <h2 class="text-center">Fill Seller's Details</h2>
        <form action="{{route('market.seller-update', ['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="phone_num">Phone Number:</label>
                <input name="phone_num" id="phone_num" type="text" class="form-control">
            </div>
            @error('phone_num')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="address_1">Address:</label>
                <textarea name="address_1" class="form-control" id="address_1" cols="20" rows="5"></textarea>
            </div>
            @error('address_1')
            <span style="color: red">{{ $message }}
            @enderror


            <div>
                <button class="btn border">Submit</button>
            </div>
        </form>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

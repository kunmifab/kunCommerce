@extends('layouts.app')
@section('title', 'Create Customer Details')

@section('content')

<div class="p-5">
    <h2 class="text-center">Fill Customer's Credentials</h2>
        <form action="{{route('product.customer-update', ['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
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
                <label for="address_1">Address 1:</label>
                <textarea name="address_1" class="form-control" id="address_1" cols="20" rows="5"></textarea>
            </div>
            @error('address_1')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="address_2">Address 2(optional):</label>
                <textarea name="address_2" class="form-control" id="address_2" cols="20" rows="5"></textarea>
            </div>
            @error('address_2')
            <span style="color: red">{{ $message }}
            @enderror



            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <span class="btn border" onclick="decNumber()" id="minus"><i class="fas fa-minus"></i></span><input name="quantity" data-id="{{$product->quantity}}" id="quantity" type="number" value="0"><span class="btn border" onclick="incNumber()" id="plus"><i class="fas fa-plus"></i></span>
            </div>
            @error('quantity')
            <span style="color: red">{{ $message }}
            @enderror

            <div>
                <button class="btn border">Submit</button>
            </div>
        </form>

</div>

<script>
    const input = document.getElementById('quantity');
    const max = input.getAttribute('data-id');


 function incNumber (){
     if(input.value < 10){
        input.value++;
     }else if (input.value = 10){
        input.value = 0;
     }

     console.log(input.value);
 }

 function decNumber (){
     if(input.value > 0){
        input.value--;
     }else if (input.value == 0){
        input.value = max;
     }

     console.log(input.value);
 }







</script>

@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

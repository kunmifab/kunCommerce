@extends('layouts.app')
@section('title', 'Product')

@section('content')

<a href="{{route('product.index')}}"><i class="fas fa-arrow-left"></i>Back</a>
        <div class="card">
            <h2 class="card-title text-center">{{$product->name}}</h2>
            <img class=" card-img-top" src="{{asset($product->image_path_1)}}" alt="{{$product->name}}">
            @if ($product->image_path_2 !=null)
            <img class="" width="70px" src="{{asset($product->image_path_2)}}" alt="{{$product->name}}">
            @endif

            <div class="card-body">



              <p class="card-text">{{$product->description}}</p>
              <p class="text-muted">Price: <span class="h3">{{$product->currency->sign}}{{number_format($product->price)}}</span></p>
              <p class="text-muted">Quantity: There are <span class="h3"> {{$product->quantity}}</span> pieces left</p>




              <div class="row">

                  <div class="col">
                      <p><small>Category: <span><a href="">{{$product->category->name}}</a></span></small></p>

                  </div>
                  <div class="col">
                      <p><small>Seller: <span>{{$product->user->name}}</span></small></p>

                  </div>
              </div>

            <div class="row">
                <div class="col">
                    <a class="btn border" href="{{route('product.customer-details', ['slug'=>$product->slug])}}">Buy</a>
                </div>
                <div class="col">
                    <a href="{{route('product.edit', ['slug' => $product->slug])}}" class="btn border">Edit</a>
                </div>
                <div class="col">
                    <button class="btn border" onclick="deleteProduct(this)" data-id="{{$product->id}}">Delete</button>
                </div>

            </div>
          </div>



<form action="" id="deleteProduct" method="POST">
    @csrf
    @method('DELETE')
</form>

<script>

    const deleteProduct = (e) =>{
       const isConfirmed = confirm('Are you sure you want to delete this product?');
        if(!isConfirmed){
            return;
        }else{
            let id = e.getAttribute('data-id');
            const deleteProduct = document.getElementById('deleteProduct');
            deleteProduct.setAttribute('action', `/product/${id}`);
            deleteProduct.submit();
            deleteProduct.setAttribute('action', '');
        }
    }

</script>
@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

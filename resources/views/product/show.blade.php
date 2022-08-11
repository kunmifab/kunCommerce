@extends('layouts.app')
@section('title', 'Product')

@section('content')

<div class="mb-5">
<a href="{{route('product.index')}}"><i class="fas fa-arrow-left"></i>Back</a>
        <div class="card">
            <h2 class="card-title text-center">{{$product->name}}</h2>
            <br>
            <div class="row">
                <div class="col-6">
                    <img class="w-100" src="{{asset($product->image_path_1)}}" alt="{{$product->name}}">
                </div>
                <div class="col-6">
            @if ($product->image_path_2 !=null)
                        <img class="" width="70px" src="{{asset($product->image_path_2)}}" alt="{{$product->name}}">
                        @endif
                        <div>
                            <p class="card-text">{{$product->description}}</p>
                        </div>
                        <br>
                        <div>
                           <div class="row">
                                <div class="col">
                                    <p class="text-muted">Price: <span class="h3">{{$product->currency->sign}}{{number_format($product->price)}}</span>   </p>
                                </div>
                                <div class="col">
                                    <p class="text-muted">Quantity: There are <span class="h3"> {{$product->quantity}}</span> pieces left</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col">
                                    <p><small>Category: <span><a href="">{{$product->category->name}}</a></span></small></p>

                                </div>
                                <div class="col">
                                    <p><small>Seller: <span>{{$product->user->firstname.' '.$product->user->lastname}}</span></small></p>
                                </div>
                            </div>
                        </div>

                                                    {{-- for rating --}}
                                                    <div class="mt-4 mb-2">
                                                        @if ($product->reviews->count() > 0)
                                                        @php
                                                            $avgrating = 0;
                                                            $avgrating = $avgrating + round($product->reviews->sum('star_rating')/$product->reviews->count());
                                                        @endphp
                                                        @for ($i=1;$i<=5;$i++)
                                                        @if ($i<=$avgrating)
                                                        <i class="fa fa-star text-warning"></i>
                                                        @else
                                                        <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                                                        @endif

                                                        @endfor
                                                        <p>{{$product->reviews->count()}} review(s)</p>
                                                        @else
                                                        <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                                                        <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                                                        <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                                                        <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                                                        <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                                                        <span>No review Yet</span>
                                                        @endif

                                                        </div>

                                                        {{-- end of rating --}}
                </div>

            </div>



            <div class="card-body">

            <div class="row">

                <div class="col">
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <input type="hidden" name="slug" value="{{$product->slug}}">
                        <input type="hidden" name="image_path_1" value="{{$product->image_path_1}}">
                        <label for="quantity">Quantity To be Bought:</label>
                        <input type="text" name="quantity" id="quantity" value="1" max="{{$product->quantity}}" placeholder="only {{$product->quantity}} piece left" >
                        @error('quantity')
                        <span style="color: red">{{ $message }}
                        @enderror
                        <button class="btn border">Add To Cart</button>
                    </form>
                    {{-- <a class="btn border" href="{{route('product.customer-details', ['slug'=>$product->slug])}}">Add To Cart</a> --}}
                </div>

                @if (auth()->check())
                    @if (auth()->user()->id == $product->user_id)
                    <div class="col">
                        <a href="{{route('product.edit', ['slug' => $product->slug])}}" class="btn border">Edit</a>
                    </div>
                    @endif
                @endif


                @if (auth()->check())
                    @if (auth()->user()->id == $product->user_id || auth()->user()->role->id == 1)
                    <div class="col">
                        <button class="btn border" onclick="deleteProduct(this)" data-id="{{$product->id}}">Delete</button>
                    </div>
                    @endif
                @endif



            </div>
          </div>
          <br>

          {{-- for reviews --}}
          <div class="container text-white">
            <div class=" bg-dark p-3">
                <div class="btn-group btn-group-lg" style="width: 100%">
                    <button type="button" id="review-btn" class="btn bg-white text-dark">Reviews <i class="	fa fa-angle-double-down"></i></button>
                </div>

                <div id="reviews" class="d-none">
                <hr class="w-50 bg-white">
                <br>
                @foreach ($reviews as $review)

              <div class="row">
                  <div class="col-2">
                      <i class="fas fa-comments fa-2x"></i>
                  </div>
                  <div class="col-10">
                      <p>{{$review->comment}}</p>
                     {{-- for rating view --}}
                     <div class="mt-2 mb-2">
                       @if ($product->reviews->count() > 0)
                       @php
                           $avgrating = 0;
                           $avgrating = $avgrating + round($review->star_rating);
                       @endphp
                       @for ($i=1;$i<=5;$i++)
                       @if ($i<=$avgrating)
                       <i class="fa fa-star text-warning"></i>
                       @else
                       <i class="fa fa-star starchange" style="color: rgb(194, 188, 188)"></i>
                       @endif

                       @endfor

                       @endif

                       </div>

                       {{-- end of rating view--}}
                      <div class="row">
                        <div class="col">
                            <p><small>Username: {{$review->user->username}}</a></small></p>
                        </div>
                        <div class="col">
                            <p><small>Name: <span>{{$review->user->firstname.' '.$review->user->lastname}}</span></small></p>
                        </div>
                        <div class="col">
                            <p><small>Email: <span>{{$review->user->email}}</span></small></p>
                        </div>
                      </div>
                  </div>
              </div>
              <hr class="bg-white">
              @endforeach
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

</div>
@endsection

@section('css')

@endsection

@section('scripts')
 <script>
     $("#review-btn").click(function(){
  $("#reviews").toggle(800);
  $("#reviews").removeClass("d-none");

});
 </script>
 @endsection

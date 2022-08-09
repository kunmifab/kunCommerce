@extends('layouts.app')
@section('title', 'Review')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="container p-3">
    <div class="bg-dark text-white m-4 p-3">
            <div class="text-center">
                    <h3>Review For {{$product->name}}</h3>
            </div>
            <br>
            <div class="m-2">
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset($product->image_path_1)}}" alt="{{$product->name}}" class="w-75">
                    </div>
                    <div class="col-9">
                        <form action="{{route('review.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Please leave a review for us to make ourselves better for you!"></textarea>
                            </div>
                            @error('comment')
                            <span style="color: red">{{ $message }}
                            @enderror
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="form-group">
                                <button class="btn border text-white">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </div>

</div>


@endsection

@section('css')

@endsection

@section('scripts')

 @endsection


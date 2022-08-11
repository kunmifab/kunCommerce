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
                                <textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Please leave a review for us to make ourselves better for you and make sure you give it the appropriate star rating!"></textarea>
                            </div>
                            @error('comment')
                            <span style="color: red">{{ $message }}
                            @enderror


                            {{-- for rating checkbox --}}
                            <div class="rating">
                                <input type="radio" id="star1" name="rating" value="5" />
                                <label class="star" for="star1" title="Awesome" aria-hidden="true"></label>
                                <input type="radio" id="star2" name="rating" value="4" />
                                <label class="star" for="star2" title="Great" aria-hidden="true"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                 <input type="radio" id="star4" name="rating" value="2" />
                                <label class="star" for="star4" title="Good" aria-hidden="true"></label>
                                <input type="radio" id="star5" name="rating" value="1" />
                                <label class="star" for="star5" title="Bad" aria-hidden="true"></label>
                              </div>
                              @error('rating')
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
<style>

.rating {
  margin-top: 40px;
  border: none;
}

.rating > label {
  color: #90A0A3;
  float: right;
}

.rating > label:before {
  margin: 5px;
  font-size: 2em;
  font-family: FontAwesome;
  content: "☆";
  display: inline-block;
}

.rating > input {
  display: none;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #F79426;
}

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {
  color: #FECE31;
}
</style>

@endsection

@section('scripts')
<script>
    $('.star-input').click(function() {
        $('').attr('checked',true);
//   $(this).parent()[0].reset();
//   var prevStars = $(this).prevAll();
//   var nextStars = $(this).nextAll();
//   prevStars.attr('checked',true);
//   nextStars.attr('checked',false);
//   $(this).attr('checked',true);
});

$('.star-input-label').on('mouseover',function() {
  var prevStars = $(this).prevAll();
  prevStars.addClass('hovered');
});
$('.star-input-label').on('mouseout',function(){
  var prevStars = $(this).prevAll();
  prevStars.removeClass('hovered');
})
</script>
 @endsection


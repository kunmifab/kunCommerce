@extends('layouts.app')
@section('title', 'Checkout')
@section('css')
<script src="https://js.stripe/v3/"></script>

<style>
    .StripeElement {
  background-color: white;
  padding: 16px 16px;
  border: 1px solid #ccc;

}

.StripeElement--focus {
  // box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

#card-errors {
  color: #fa755a;
}

:disabled {
    cursor: not-allowed;
    background-color: black
}
</style>
@endsection

@section('content')
@if (session()->has('success-message'))
<div class="alert alert-success mt-2">
{{session()->get('success-message')}}
</div>

@endif

@if (count($errors) > 0)
<div class="alert alert-danger mt-2">
<ul>
    @foreach ($errors->all() as $error)
       <li>{{$error}}</li>
    @endforeach
</ul>
</div>

@endif
<div class="row pt-3 pb-3">

    <div class="col-7">
        <h5>Billing Details</h5>
        <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" class="form-control" value="{{old('email')}}" required>
            </div>
            @error('email')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" type="text" class="form-control" value="{{old('name')}}" required>
            </div>
            @error('name')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="address">Address</label>
                <input name="address" id="address" type="text" class="form-control" value="{{old('address')}}" required>
            </div>
            @error('address')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input name="city" id="city" type="text" class="form-control" value="{{old('city')}}" required>
                    </div>
                    @error('city')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input name="state" id="state" type="text" class="form-control" value="{{old('state')}}" required>
                    </div>
                    @error('state')
                    <span style="color: red">{{ $message }}
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" id="phone" type="text" class="form-control" value="{{old('phone')}}" required>
            </div>
            @error('phone')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="postalcode">Postal Code</label>
                <input name="postalcode" id="postalcode" type="text" class="form-control" value="{{old('postalcode')}}" required>
            </div>
            @error('postalcode')
            <span style="color: red">{{ $message }}
            @enderror


            <h5>Payment Details</h5>

            <div class="form-group">
                <label for="name_on_card">Name On Card</label>
                <input name="name_on_card" id="name_on_card" type="text" class="form-control" value="{{old('name_on_card')}}" required>
            </div>
            @error('name_on_card')
            <span style="color: red">{{ $message }}
            @enderror

            <div class="form-group">
                <label for="card-element">
                  Credit or debit card
                </label>
                <div id="card-element">
                  <!-- a Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors -->
                <div id="card-errors" role="alert"></div>
            </div>


            <div class="form-group">
                <button class="btn border bg-success text-white form-control" id="complete-order">Complete Order</button>
            </div>
        </form>
        {{-- end form --}}
    </div>
    <div class="col-5">
        <h5>Your Order</h5>
        @foreach (Cart::getContent() as $item)


        <div class="row">
            <div class="col">
                <a href="{{route('product.show', ['slug'=> $item->model->slug])}}"><img src="{{asset($item->model->image_path_1)}}" alt="{{$item->name}}" width="55px"></a>
            </div>
            <div class="col">
                <a href="{{route('product.show', ['slug'=> $item->model->slug])}}"><p>{{$item->name}}</p></a>
                <p><small>{{$item->model->currency->sign}}{{number_format($item->model->price)}}</small></p>
            </div>
            <div class="col">
                <small>Qty: <span class="h5">{{$item->quantity}}</span></small>
            </div>
        </div>

        <hr>
        @endforeach

        <div class="row pl-3">
            <div class="col">
                <p>Subtotal</p>
                <p>Tax 10%</p>
                <h6 >Total</h6>
            </div>
            <div class="col">
                <p>₦{{number_format(Cart::getSubTotal())}}</p>
                <p>₦{{number_format(Cart::getCondition('VAT 10%')->getCalculatedValue(Cart::getSubTotal()))}}</p>
                <h6>₦{{number_format(Cart::getTotal())}}</h6>
            </div>
        </div>
        <hr>
    </div>
</div>

@endsection



@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>



        // Create a Stripe client
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        // Create an instance of Elements
        var elements = stripe.elements();console.log('djdsj');
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
          base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        };
        // Create an instance of the card Element
        var card = elements.create('card', {
            style: style,
            hidePostalCode: true
        });

        var cardElement = document.getElementById('card-element');
       // Add an instance of the card Element into the `card-element` <div>
        card.mount(cardElement);


    // Handle real-time validation errors from the card Element.

    card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  //disable button when it is clicked once
  document.getElementById('complete-order').disabled = true;
  var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('state').value,
                address_zip: document.getElementById('postalcode').value
              }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;

      //enable the submit button because there is an error
      document.getElementById('complete-order').disabled = false;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});


// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


// for the quantity

const input = document.getElementById('quantity');
    const max = input.getAttribute('data-id');


 function incNumber (){
     if(input.value < max){
        input.value++;
     }else if (input.value == max){
        input.value = 1;
     }

     console.log(input.value);
 }

 function decNumber (){
     if(input.value > 1){
        input.value--;
     }else if (input.value == 1){
        input.value = max;
     }

     console.log(input.value);
 }




</script>

 @endsection

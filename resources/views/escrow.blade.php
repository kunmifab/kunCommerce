@extends('layouts.app')
@section('title', 'Escrows')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="container p-3">
    <div class="bg-dark text-white m-4 p-3">
            <div class="text-center">
                    <h3>Escrow Account</h3>
            </div>
            <div>
               <p><small>Total Amount Held In Escrow:</small> ₦{{number_format($escrows_received->sum('amount'))}}</p>
               <p><small>Total Amount Paid:</small> ₦{{number_format($escrows_sent->sum('amount'))}}</p>
            </div>
            <br>
            <div class="btn-group btn-group-lg" role="group" style="width: 100%">
                <button type="button" id="received-btn" class="btn btn-warning">Received</button>
                <button type="button" id="sent-btn" class="btn btn-success">Sent</button>
            </div>

            {{-- for money held in escrow sent --}}
            <div id="received" class="mt-4">
                @if ($escrows_received->isEmpty())
                <div class="text-center">
                    <h6>All money has been sent to the corresponding seller!</h6>
                </div>
                @else
                @foreach ($escrows_received as $escrow)

                    <div class="row">
                        <div class="col text-center">
                            <img src="{{asset($escrow->order->product->image_path_1)}}" alt="{{$escrow->order->product->name}}" width="100px">
                        </div>
                        <div class="col text-center">
                            <p><a href="{{route('product.show', ['slug'=> $escrow->order->product->slug])}}">{{$escrow->order->product->name}}</a></p>
                            <p>{{$escrow->order->product->currency->sign}}{{number_format($escrow->order->billing_total)}}</p>
                            <p>{{$escrow->order->product->user->firstname.' '.$escrow->order->product->user->lastname}}</p>
                        </div>
                        <div class="col">
                            <p><small>Date:</small> {{$escrow->order->created_at}}</p>
                        </div>
                        <div class="col">
                            <form action="{{route('wallet.update', ['id'=> $escrow->order->product->user->wallet->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="amount" value="{{$escrow->order->billing_total}}">
                                <input type="hidden" name="order_id" value="{{$escrow->order->id}}">
                                <button type="submit" class="btn border text-white"  onclick= "javascript: return confirm('Are you sure you want to pay {{$escrow->order->product->user->firstname.' '.$escrow->order->product->user->lastname}} the sum of {{$escrow->order->product->currency->sign.''.number_format($escrow->order->billing_total)}} for the sale of the product {{$escrow->order->product->name}}?') ">Send to Seller</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr class="bg-white">
                    <br>

                @endforeach
                @endif

            </div>

            {{-- for money held in escrow sent --}}
            <div id="sent" class="d-none mt-4">
                @if ($escrows_sent->isEmpty())
                <div class="text-center">
                    <h6>No amount has been sent to the corresponding seller so far!</h6>
                </div>
                @else
                @foreach ($escrows_sent as $escrow)

                <div class="row">
                    <div class="col-1">
                        <p class="badge-success rounded-pill text-center p-2">Sent</p>
                    </div>
                    <div class="col text-center">
                        <img src="{{asset($escrow->order->product->image_path_1)}}" alt="{{$escrow->order->product->name}}" width="100px">
                    </div>
                    <div class="col text-center">
                        <p><a href="{{route('product.show', ['slug'=> $escrow->order->product->slug])}}">{{$escrow->order->product->name}}</a></p>
                        <p>{{$escrow->order->product->currency->sign}}{{number_format($escrow->order->billing_total)}}</p>
                        <p>{{$escrow->order->product->user->firstname.' '.$escrow->order->product->user->lastname}}</p>
                    </div>
                    <div class="col">
                        <p><small>Date:</small> {{$escrow->order->created_at}}</p>
                        <p><small>Paid at:</small> {{$escrow->paid_at}}</p>
                    </div>

                </div>
                <br>
                <hr class="bg-white">
                <br>

                @endforeach
                @endif

                </div>

    </div>

</div>


@endsection

@section('css')
<style>
    .btn .active {
        background-color: white;
        color: blue;
    }
</style>
@endsection

@section('scripts')

<script>

    // to toggle received and sent
    $("#received-btn").click(function(){
  $("#sent").hide();
  $("#received").show();
});

    $("#sent-btn").click(function(){
        $("#sent").removeClass('d-none');
  $("#received").hide();
  $("#sent").show();
});

</script>

 @endsection

@extends('layouts.app')
@section('title', 'Notifications')

@section('content')

<div class="container p-3" >
    <div class="bg-dark text-white m-4 p-3">
            <div class="text-center" >
                    <h3>All Notifications</h3>
            </div>
            <br>

            @foreach ($notifications as $notification)
            <div class="row p-3" @if($notification->status == 'new') style="background-color: rgb(73, 58, 58)" @endif>
                @if ($notification->type == "Review")
                <div class="col-2 text-center">
                    <p>Review <span><i class="fas fa-comment fa-2x"></i></span></p>
                </div>
                @endif
                @if ($notification->type == "Order")
                <div class="col-2 text-center">
                    <p>Order <span><i class="fas fa-shopping-cart fa-2x"></i></span></p>
                </div>
                @endif
                @if ($notification->type == "User")
                <div class="col-2 text-center">
                    <p>User <span><i class="fas fa-address-book fa-2x"></i></span></p>
                </div>
                @endif
                @if ($notification->type == "Product")
                <div class="col-2 text-center">
                    <p><span><img src="{{asset($notification->product->image_path_1)}}" alt="" width="50px"></span></p>
                </div>
                @endif

                <div class="col">
                    <p>{{$notification->content}}</p>
                </div>
                @if ($notification->type == "Review")
                <div class="col">
                    <p>{{$notification->review->comment}}</p>
                </div>
                @endif
                @if ($notification->type == "Order")
                <div class="col">
                    <p>{{$notification->order->product->name}}</p>
                </div>
                @endif
                @if ($notification->type == "Product")
                <div class="col">
                    <p>{{$notification->product->name}}</p>
                </div>
                @endif
                @if ($notification->type == "User")
                <div class="col">
                    <p>{{$notification->user->username}}</p>
                </div>
                @endif

            </div>
            <hr class="bg-white">
            <br>

            @endforeach
    </div>

</div>

<form action="{{route('notification.update')}}" id="notificationForm" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" value="seen">
</form>

@endsection

@section('css')

@endsection
<script>


//     function onScrollSubmit() {
//         const notificationForm = document.getElementById('notificationForm');
// 	notificationForm.submit();

//
// }
const onScrollSubmit = (e) =>{
    const notificationForm = document.getElementById('notificationForm');
 	notificationForm.submit();
      
    }

</script>
@section('scripts')

 @endsection

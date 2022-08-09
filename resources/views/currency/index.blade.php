@extends('layouts.app')
@section('title', 'Currencies')

@section('content')



{{-- <div class="card-deck">

        @foreach ($categories as $category)
        <div class="card" style="width:400px">
            <img class="card-img-top" src="{{asset($category->image_path)}}" alt="{{$category->name}}">
            <div class="card-body text-center">
              <a href="#" class="btn btn-primary">{{$category->name}}</a>
            </div>
          </div>

         @endforeach


</div> --}}

<h4>Click <a href="{{route('currency.create')}}">HERE</a> to create a new currency</h4>



<table class="table table-border">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Sign</th>
            <th>Currency Name</th>
            <th>Abbreviation</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($currencies as $currency)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$currency->sign}}</td>
            <td>{{$currency->name}}</td>
            <td>{{$currency->abbr}}</td>
        </tr>
        @endforeach

    </tbody>
</table>




@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

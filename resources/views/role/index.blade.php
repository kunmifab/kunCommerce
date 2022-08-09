@extends('layouts.app')
@section('title', 'Roles')

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

<h4>Click <a href="{{route('role.create')}}">HERE</a> to create a new role</h4>
<table class="table table-border">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Role ID</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->id}}</td>
        </tr>
        @endforeach

    </tbody>
</table>





@endsection

@section('css')

@endsection

@section('scripts')

 @endsection

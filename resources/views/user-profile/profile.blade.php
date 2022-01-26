@extends('app.master')

@section('title')


    User profile page
@endsection

@section('content')
    <div class="container">
        <div class="card" style="width: 25rem;">
            <h1>{{$user->email}}</h1>
            <div class="card-header">
                {{$user->name}}
            </div>
            <img class="card-img-top" src="{{asset('storage/app/public/user-images/aKD69boTyCrXFo4Hwa2QbDCS7PCoaKpiMa0GquVj.png')}}" alt="Card image cap" width="50">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <form action="{{route('userEditProfile')}}">
                    <button class="btn btn-warning">Edit User Data</button>
                </form>

            </div>
        </div>
    </div>

@endsection

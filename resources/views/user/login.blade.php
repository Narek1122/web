@extends('app.master')

@section('title')
    Login page
@endsection

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <form class="card" action="{{route('signIn')}}" method="POST">
                        @csrf
                        <h5 class="card-title fw-400">Sign In</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password" name="password">
                            </div>
                            <button class="btn btn-block btn-bold btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
                @include('message')
            </div>
        </div>
    </div>
@endsection

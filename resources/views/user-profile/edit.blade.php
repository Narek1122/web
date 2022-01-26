@extends('app.master')

@section('title')


    User edit profile page
@endsection

@section('content')
    <form method="POST" action="{{route('userEditProfileData')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div id="app">
                <div class="d-flex flex-row mt-2 mb-2 align-items-center gap-2">
                    <label>Name:</label>
                    <input class="form-control" type="text" ref="first_name" :disabled="!isEditing" :class="{view: !isEditing}" :value="user.firstName" name="name">
                </div>
                <div class="d-flex flex-row mt-2 mb-2 align-items-center gap-2">
                    <label for="exampleFormControlFile1">Profile Image</label>
                    <input name="profile_image" type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div>
                    <button class="btn btn-primary">Save</button>
                    <a class="btn btn-primary" href="{{route('userProfile')}}">Profile</a>
                </div>
             </div>
        </div>
    </form>

@endsection

@extends('layouts.layout')
@section('title', 'Profile')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
@endsection
@section('content')
<form action="{{ URL('edit/profile') }}" method="POST" enctype="multipart/form-data">

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            firstName
                            <input class="form-control" type="text" name="firstName" value="{!! $user['firstName'] !!}">
                        </div>
                        <div class="col mr-4">
                            lastName
                            <input class="form-control" type="text" name="lastName" value="{!! $user['lastName'] !!}">
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mt-4 mr-4">
                            <textarea class="form-control" name="address" cols="15" rows="4">{{ $user['address'] }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success h-20 shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            Username
                            <input class="form-control" type="text" name="username" value="{!! $user['username'] !!}">
                        </div>
                        <div class="col mr-4">
                            Email
                            <input class="form-control" type="email" name="email" value="{!! $user['email'] !!}" disabled>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            BirthDate
                            <input class="form-control" type="date" name="birthdate" value="{!! $user['birthdate'] !!}">
                        </div>
                        <div class="col mr-4">
                            Gender
                            <select class="form-control" name="gender">
                                <option value="">เลือก</option>
                                @foreach ($gender as $genders)
                                    @if($user['genderName']==$genders->genderName)
                                        <option value="{!! $genders->genderID !!}" selected>{{ $genders->genderName }}</option>
                                    @else
                                        <option value="{!! $genders->genderID !!}">{{ $genders->genderName }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            Image Profile
                            <input class="form-control" type="file" name="image" onchange="imageProfile(this)">
                        </div>
                        <div class="col mr-4">
                            @if($user['imagePath']==null)
                                <img class="img-profile rectangle mt-2" src="{{ URL('img/man-user.png') }}" id="img-demo">
                            @else
                                <img class="img-profile rectangle mt-2" width="50" src="{{ URL('/') }}/{!! $user['imagePath'] !!}" id="img-demo">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4" style="text-align: center;">
            @csrf
            <button class="btn btn-primary" type="submit"> Save </button>
        </div>
    </div>

</form>
@endsection
<script>
function imageProfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-demo')
                .attr('src', e.target.result)
                .width(50)
                .height(50);
            };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
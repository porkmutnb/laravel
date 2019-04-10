@extends('layouts.layout')
@section('title', 'NearBy')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">NearBy</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow py-2" onclick="gotoPage('station')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <img class="img-profile rectangle mt-2" src="{{ URL('img/nearby/station.jpg') }}">
                        </div>
                        <div class="col mr-4">
                            <h2> View Station </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow py-2" onclick="gotoPage('school')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <img class="img-profile rectangle mt-2" src="{{ URL('img/nearby/school.png') }}">
                        </div>
                        <div class="col mr-4">
                            <h2> View School </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-warning shadow py-2" onclick="gotoPage('province')">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <img class="img-profile rectangle mt-2" src="{{ URL('img/nearby/province.png') }}">
                        </div>
                        <div class="col mr-4">
                            <h2> View Province </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
function gotoPage(keyword) {
    window.location.href = "{{ URL('nearby') }}/"+keyword;
}
</script>
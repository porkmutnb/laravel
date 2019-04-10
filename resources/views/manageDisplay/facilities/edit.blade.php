@extends('layouts.layout')
@section('title', 'Facilities')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Edit Facilities</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> {{ $facilitie['facilitieName'] }} </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>FacilitiesID</th>
                      <th>FacilitiesName</th>
                      <th>FacilitiesImage</th>
                      <th>  </th>
                    </tr>
                  </thead>
                    <form action="{{ URL('facilities/edit') }}" method="POST" enctype="multipart/form-data">
                        <tbody >
                            <tr>
                                <td>
                                    facilitieID 
                                    <input class="form-control" type="hidden" name="facilitieId" value="{!! $facilitie['facilitieID'] !!}" >
                                    <input class="form-control" type="text" name="facilitieId" value="{!! $facilitie['facilitieID'] !!}" disabled > 
                                </td>
                                <td>
                                    facilitieName
                                    <input class="form-control" type="text" name="facilitieName" value="{!! $facilitie['facilitieName'] !!}">
                                </td>
                                <td>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-8 mr-4">
                                            facilitieImage
                                            <input class="form-control" type="file" onchange="imageEditFacilitie(this)" name="facilitieImage" >
                                        </div>
                                        <div class="col-md-2 mr-4">
                                            @if($facilitie['facilitieImage']==""||$facilitie['facilitieImage']==null)
                                                <img class="img-profile rectangle mt-2" width="50" src="{{ URL('img/not-found.png') }}" id="img-demo-edit"> 
                                            @else
                                                <img class="img-profile rectangle mt-2" width="50" src="{{ URL('/') }}/{!! $facilitie['facilitieImage'] !!}" id="img-demo-edit"> 
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary"> Save </button>
                                    <a class="btn btn-danger" onclick="formDelete({!! $facilitie['facilitieID'] !!})"> Delete </a>
                                </td>
                            </tr>
                            @if(isset($error))
                              <tr>
                                  <td colspan="4">
                                      <p style="text-align: center; color: red;"> {{ $error }} </p>
                                  </td>
                              </tr>
                            @endif
                        </tbody>
                        @csrf
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function imageEditFacilitie(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-demo-edit')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function formDelete(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found facilitieID');
  }else{
    if (confirm('Are you sure Delete this facilitie??')) {
      window.location.href = "{{ URL('facilities/delete') }}?id="+key;
    }
  }
}
</script>
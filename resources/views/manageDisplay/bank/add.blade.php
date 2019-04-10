@extends('layouts.layout')
@section('title', 'Bank')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Bank</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Bank</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>bankAccountID</th>
                      <th>bankAccountName</th>
                      <th>bankAccountImage</th>
                      <th>  </th>
                    </tr>
                  </thead>
                    <form action="{{ URL('bank/add') }}" method="POST" enctype="multipart/form-data">
                        <tbody >
                            <tr>
                                <td> <input class="form-control" type="hidden" name="bankAccountID" > </td>
                                <td>
                                    bankAccountName
                                    <input class="form-control" type="text" name="bankAccountName" >
                                </td>
                                <td>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-8 mr-4">
                                            bankAccountImage
                                            <input class="form-control" type="file" onchange="imageAddBank(this)" name="bankAccountImage" >
                                        </div>
                                        <div class="col-md-2 mr-4">
                                            <img class="img-profile rectangle mt-2" width="50" src="{{ URL('img/not-found.png') }}" id="img-demo-add"> 
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary"> Save </button>
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
function imageAddBank(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-demo-add')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
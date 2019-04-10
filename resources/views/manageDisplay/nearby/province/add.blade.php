@extends('layouts.layout')
@section('title', 'Gender')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Province - NearBy</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Province - NearBy</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>provinceID</th>
                        <th>provinceName</th>
                        <th>amphurName</th>
                        <th>districtName</th>
                        <th>  </th>
                    </tr>
                  </thead>
                    <form action="{{ URL('nearby/province/add') }}" method="POST" enctype="multipart/form-data">
                        <tbody >
                            <tr>
                                <td> </td>
                                <td>
                                    provinceName
                                    <input class="form-control" type="text" name="provinceName" >
                                </td>
                                <td>
                                    amphurName
                                    <input class="form-control" type="text" name="amphurName" >
                                </td>
                                <td>
                                    districtName
                                    <input class="form-control" type="text" name="districtName" >
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
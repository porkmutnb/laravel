@extends('layouts.layout')
@section('title', 'Station')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Station - NearBy</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Station - NearBy</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>StationID</th>
                        <th>StationHead</th>
                        <th>StationName</th>
                        <th>  </th>
                    </tr>
                  </thead>
                    <form action="{{ URL('nearby/station/add') }}" method="POST" enctype="multipart/form-data">
                        <tbody >
                            <tr>
                                <td> </td>
                                <td>
                                    StationHead
                                    <select class="form-control" name="stationHead" >
                                        <option value="">---เลือก---</option>
                                        <option value="BTS">BTS</option>
                                        <option value="MRT">MRT</option>
                                        <option value="MRTA">MRTA</option>
                                    </select>
                                </td>
                                <td>
                                    StationName
                                    <input class="form-control" type="text" name="stationName" >
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
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
                <h6 class="m-0 font-weight-bold text-primary">Edit {{ $station['stationHead'] }}{{ $school['stationName'] }}</h6>
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
                    <form action="{{ URL('nearby/station/edit') }}" method="POST" enctype="multipart/form-data">
                        <tbody >
                            <tr>
                                <td> 
                                    <input type="hidden" name="stationID" value="{!! $station['stationID'] !!}">
                                    <input type="hidden" name="stationID" value="{!! $station['stationID'] !!}" disabled>
                                </td>
                                <td>
                                    StationHead
                                    <select class="form-control" name="schoolHead" >
                                        <option value="">---เลือก---</option>
                                        @if($station['stationHead']=="BTS")
                                            <option value="BTS" selected>BTS</option>
                                        @else
                                            <option value="BTS">BTS</option>
                                        @endif
                                        @if($station['stationHead']=="MRT")
                                            <option value="MRT" selected>MRT</option>
                                        @else
                                            <option value="MRT">MRT</option>
                                        @endif
                                        @if($station['stationHead']=="MRTA")
                                            <option value="MRTA" selected>MRTA</option>
                                        @else
                                            <option value="MRTA">MRTA</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    StationName
                                    <input class="form-control" type="text" name="stationName" value="{!! $station['stationName'] !!}">
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
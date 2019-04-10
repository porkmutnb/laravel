<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use File;

use DB;

use App\Station;

use App\School;

use App\Province;

use App\Amphur;

use App\District;

use App\Bank;

use App\Gender;

use App\Facilities;

class ManageDisplayController extends Controller
{
    public function facilities() {
        $facilities = DB::table('tbl_facilities')->paginate(10);
        return view('manageDisplay/facilities/facilities',['facilities'=>$facilities]);
    } 

    public function formFacilities($type) {
        $input = Input::all();
        switch ($type) {
            case 'add':
                return view('manageDisplay/facilities/add');
                break;
            case 'edit':
                if (empty($input['id'])||$input['id']==""||$input['id']==null) {
                    abort(404);
                }else{
                    $facilitie = Facilities::where('facilitieID','=',$input['id'])->first();
                    return view('manageDisplay/facilities/edit',['facilitie'=>$facilitie]);
                }
                break;
            case 'delete':
                if (empty($input['id'])||$input['id']==""||$input['id']==null) {
                    return Redirect::to('facilities');
                }else{
                    $queryfacilitie = Facilities::where('facilitieID','=',$input['id'])->first();
                    File::delete($queryfacilitie['facilitieImage']);
                    Facilities::where('facilitieID','=',$input['id'])->delete();
                    return Redirect::to('facilities');
                }
                break;
            default:
                abort(404);
                break;
        }
    }

    public function manageFacilities($type, Request $request) {
        $input = Input::all();
        switch ($type) {
            case 'add':
                if($input['facilitieName']==null||$input['facilitieImage']==null) {
                    return Redirect::to('facilites/add')->withError('Please enter data in field');
                }
                $newfacilitie = new Facilities;
                $newfacilitie->facilitieName = $input['facilitieName'];
                $directory = 'data-image/facilities';
                if(!File::exists($directory)) {
                    File::makeDirectory($directory);
                }
                $filename = $request->file('facilitieImage')->getClientOriginalName();
                $request->file('facilitieImage')->move($directory, $filename);
                $newfacilitie->facilitieImage = $directory."/".$request->file('facilitieImage')->getClientOriginalName();
                $newfacilitie->save();
                return Redirect::to('facilities');
                break;
            case 'edit':
                if($input['facilitieName']==null) {
                    return Redirect::to('facilites/edit?id='.$input['facilitieId'])->withError('Please enter data in field');
                }
                $editfacilitie = Facilities::where('facilitieID','=',$input['facilitieId'])->first();
                $editfacilitie->facilitieName = $input['facilitieName'];
                if(!empty($input['facilitieImage'])) {
                    File::delete($editfacilitie['facilitieImage']);
                    $directory = 'data-image/facilities';
                    $filename = $request->file('facilitieImage')->getClientOriginalName();
                    $request->file('facilitieImage')->move($directory, $filename);
                    $editfacilitie->facilitieImage = $directory."/".$request->file('facilitieImage')->getClientOriginalName();
                }
                $editfacilitie->save();
                return Redirect::to('facilities');
                break;
            default:
                abort(404);
                break;
        }
    }

    public function bank() {
        $bank = DB::table('tbl_bank_account')->paginate(10);
        return view('manageDisplay/bank/bank',['banks'=>$bank]);
    }
    
    public function formBank($type) {
        $input = Input::all();
        switch ($type) {
            case 'add':
                return view('manageDisplay/bank/add');
                break;
            case 'edit':
                if (empty($input['id'])||$input['id']==""||$input['id']==null) {
                    abort(404);
                }else{
                    $bank = Bank::where('bankAccountID','=',$input['id'])->first();
                    return view('manageDisplay/bank/edit',['bank'=>$bank]);
                }
                break;
            case 'delete':
                if (empty($input['id'])||$input['id']==""||$input['id']==null) {
                    return Redirect::to('bank');
                }else{
                    $querybank = Bank::where('bankAccountID','=',$input['id'])->first();
                    File::delete(substr($querybank['bankAccountImage'], 0, strrpos($querybank['bankAccountImage'], "/")));
                    File::deleteDirectory(substr($querybank['bankAccountImage'], 0, strrpos($querybank['bankAccountImage'], "/")));
                    Bank::where('bankAccountID','=',$input['id'])->delete();
                    return Redirect::to('bank');
                }
                break;
            default:
                abort(404);
                break;
        }
    }

    public function manageBank($type, Request $request) {
        $input = Input::all();
        switch ($type) {
            case 'add':
                if($input['bankAccountName']==null||$input['bankAccountImage']==null) {
                    return Redirect::to('bank/add')->withError('Please enter data in field');
                }
                $newbank = new Bank;
                $newbank->bankAccountName = $input['bankAccountName'];
                $random = app('App\Http\Controllers\HelperController')->RandomString(10);
                $directory = 'data-image/bank/'.$random;
                if(!File::exists($directory)) {
                    File::makeDirectory($directory);
                }
                $filename = $request->file('bankAccountImage')->getClientOriginalName();
                $request->file('bankAccountImage')->move($directory, $filename);
                $newbank->bankAccountImage = $directory."/".$request->file('bankAccountImage')->getClientOriginalName();
                $newbank->save();
                return Redirect::to('bank');
                break;
            case 'edit':
                if($input['bankAccountName']==null) {
                    return Redirect::to('bank/edit?id='.$input['bankAccountID'])->withError('Please enter data in field');
                }
                $editbank = Bank::where('bankAccountID','=',$input['bankAccountID'])->first();
                $editbank->bankAccountName = $input['bankAccountName'];
                if(!empty($input['bankAccountImage'])) {
                    File::delete($editfacilitie['bankAccountImage']);
                    $random = app('App\Http\Controllers\HelperController')->RandomString(10);
                    $directory = 'data-image/bank/'.$random;
                    $filename = $request->file('bankAccountImage')->getClientOriginalName();
                    $request->file('bankAccountImage')->move($directory, $filename);
                    $editbank->bankAccountImage = $directory."/".$request->file('bankAccountImage')->getClientOriginalName();
                }
                $editbank->save();
                return Redirect::to('bank');
                break;
            default:
                abort(404);
                break;
        }
    }

    public function gender() {
        $gender = DB::table('tbl_gender')->paginate(10);
        return view('manageDisplay/gender/gender',['genders'=>$gender]);
    } 

    public function formGender($type) {
        $input = Input::all();
        switch ($type) {
            case 'add':
                return view('manageDisplay/gender/add');
                break;
            case 'edit':
                if (empty($input['id'])||$input['id']==""||$input['id']==null) {
                    abort(404);
                }else{
                    $gender = Gender::where('genderID','=',$input['id'])->first();
                    return view('manageDisplay/gender/edit',['gender'=>$gender]);
                }
                break;
            case 'delete':
                Gender::where('genderID','=',$input['id'])->delete();
                return Redirect::to('gender');
                break;
            default:
                abort(404);
                break;
        }
    }

    public function manageGender($type, Request $request) {
        $input = Input::all();
        switch ($type) {
            case 'add':
                if($input['genderName']==null) {
                    return Redirect::to('gender/add')->withError('Please enter data in field');
                }
                $newgender = new Gender;
                $newgender->genderName = $input['genderName'];
                $newgender->save();
                return Redirect::to('gender');
                break;
            case 'edit':
                if($input['genderName']==null) {
                    return Redirect::to('gender/edit?id='.$input['genderName'])->withError('Please enter data in field');
                }
                $editgender = Gender::where('genderID','=',$input['genderID'])->first();
                $editgender->genderName = $input['genderName'];
                $editgender->save();
                return Redirect::to('gender');
                break;
            default:
                abort(404);
                break;
        }
    }

    public function nearby() {
        return view('manageDisplay/nearby/nearby');
    }
    
    public function formNearby($type) {
        switch ($type) {
            case 'station':
                $station = DB::table('tbl_station')->paginate(10);
                return view('manageDisplay/nearby/station/station',['stations'=>$station]);
                break;
            case 'school':
                $school = DB::table('tbl_school')->paginate(10);
                return view('manageDisplay/nearby/school/school',['schools'=>$school]);
                break;
            case 'province':
                $province = DB::table('tbl_province')
                                ->join('tbl_amphur','tbl_amphur.provinceID','=','tbl_province.provinceID')
                                ->join('tbl_district','tbl_district.provinceID','=','tbl_province.provinceID')
                                ->select(DB::raw('
                                                    tbl_province.provinceID, tbl_province.provinceName, 
                                                    tbl_amphur.amphurID, tbl_amphur.amphurName, 
                                                    tbl_district.districtID, tbl_district.districtName
                                                ')
                                        )
                                ->paginate(10);
                return view('manageDisplay/nearby/province/province',['provinces'=>$province]);
                break;
            default:
                abort(404);
                break;
        }
    }

    public function formNearbyMethod($type, $method) {
        $input = Input::all();
        switch ($type) {
            case 'station':
                switch ($method) {
                    case 'add':
                        return view('manageDisplay/nearby/station/add');
                        break;
                    case 'edit':
                        $station = Station::where('stationID','=',$input['id'])->first();
                        return view('manageDisplay/nearby/station/edit',['station'=>$station]);
                        break;
                    case 'delete':
                        Station::where('stationID','=',$input['id'])->delete();
                        return Redirect::to('nearby/station');
                        break;
                    default:
                        abort(404);
                        break;
                }
                break;
            case 'school':
                switch ($method) {
                    case 'add':
                        return view('manageDisplay/nearby/school/add');
                        break;
                    case 'edit':
                        $school = School::where('schoolID','=',$input['id'])->first();
                        return view('manageDisplay/nearby/school/edit',['school'=>$school]);
                        break;
                    case 'delete':
                        School::where('schoolID','=',$input['id'])->delete();
                        return Redirect::to('nearby/school');
                        break;
                    default:
                        abort(404);
                        break;
                }
                break;
            case 'province':
                switch ($method) {
                    case 'add':
                        return view('manageDisplay/nearby/province/add');
                        break;
                    case 'edit':
                        $province = Province::join('tbl_amphur','tbl_amphur.provinceID','=','tbl_province.provinceID')
                        ->join('tbl_district','tbl_district.provinceID','=','tbl_province.provinceID')
                        ->select(DB::raw('
                                            tbl_province.provinceID, tbl_province.provinceName, 
                                            tbl_amphur.amphurID, tbl_amphur.amphurName, 
                                            tbl_district.districtID, tbl_district.districtName
                                        ')
                                )
                        ->where(function ($query) use ($input) {
                            $query->where('tbl_province.provinceID', '=', $input['proId'])
                                  ->where('tbl_district.districtID', '=', $input['disId'])
                                  ->where('tbl_amphur.amphurID', '=', $input['ampId']);
                        })
                        ->first();
                        return view('manageDisplay/nearby/province/edit',['province'=>$province]);
                        break;
                    case 'delete':
                        Province::where('provinceID','=',$input['proId'])->delete();
                        District::where('districtID','=',$input['disId'])->delete();
                        Amphur::where('amphurID','=',$input['ampId'])->delete();
                        return Redirect::to('nearby/province');
                        break;
                    default:
                        abort(404);
                        break;
                }
                break;
            default:
                abort(404);
                break;
        }
    }

    public function manageNearbyMethod($type, $method) {
        $input = Input::all();
        switch ($type) {
            case 'station':
                switch ($method) {
                    case 'add':
                        if($input['stationHead']==null||$input['stationName']==null) {
                            return Redirect::to('nearby/station/add')->withError('Please enter data in field');
                        }
                        $newstation = new Station;
                        $newstation->stationHead = $input['stationHead'];
                        $newstation->stationName = $input['stationName'];
                        $newstation->save();
                        return Redirect::to('nearby/station');
                        break;
                    case 'edit':
                        if($input['stationHead']==null||$input['stationName']==null) {
                            return Redirect::to('nearby/station/edit?id='.$input['stationID'])->withError('Please enter data in field');
                        }
                        $editstation = Station::where('stationID','=',$input['stationID'])->first();
                        $editstation->stationHead = $input['stationHead'];
                        $editstation->stationName = $input['stationName'];
                        $editstation->save();
                        break;
                    default:
                        abort(404);
                        break;
                }
                break;
            case 'school':
                switch ($method) {
                    case 'add':
                        if($input['schoolHead']==null||$input['schoolName']==null) {
                            return Redirect::to('nearby/school/add')->withError('Please enter data in field');
                        }
                        $newschool = new School;
                        $newschool->schoolHead = $input['schoolHead'];
                        $newschool->schoolName = $input['schoolName'];
                        $newschool->save();
                        return Redirect::to('nearby/school');
                        break;
                    case 'edit':
                        if($input['schoolHead']==null||$input['schoolName']==null) {
                            return Redirect::to('nearby/school/edit?id='.$input['schoolID'])->withError('Please enter data in field');
                        }
                        $editschool = School::where('schoolID','=',$input['schoolID'])->first();
                        $editschool->schoolHead = $input['schoolHead'];
                        $editschool->schoolName = $input['schoolName'];
                        $editschool->save();
                        return Redirect::to('nearby/school');
                        break;
                    default:
                        abort(404);
                        break;
                }
                break;
            case 'province':
                switch ($method) {
                    case 'add':
                        if($input['provinceName']==null||$input['amphurName']==null||$input['districtName']==null) {
                            return Redirect::to('nearby/province/add')->withError('Please enter data in field');
                        }
                        $newprovince = new Province;
                        $newprovince->provinceName = $input['provinceName'];
                        $newprovince->save();
                        $newdistrict = new District;
                        $newdistrict->districtName = $input['districtName'];
                        $newdistrict->save();
                        $newamphur = new Amphur;
                        $newamphur->districtName = $input['amphurName'];
                        $newamphur->save();
                        $editProvince = Province::where('provinceName','=',$input['provinceName'])->first();
                        $editDistrict = District::where('districtName','=',$input['districtName'])->first();
                        $editDistrict->amphurID = $editAmphur['amphurID'];
                        $editDistrict->provinceID = $editProvince['provinceID'];
                        $editDistrict->save();
                        $editAmphur = Amphur::where('amphurName','=',$input['amphurName'])->first();
                        $editAmphur->provinceID = $editProvince['provinceID'];
                        $editAmphur->save();
                        return Redirect::to('nearby/province');
                        break;
                    case 'edit':
                        if($input['provinceName']==null||$input['amphurName']==null||$input['districtName']==null) {
                            return Redirect::to('nearby/province/edit?proId='.$input['provinceID'].'&disId='.$input['districtID'].'&ampId='.$input['amphurID'])->withError('Please enter data in field');
                        }
                        $editProvince = Province::where('provinceID','=',$input['provinceID'])->first();
                        $editProvince->provinceName = $input['provinceName'];
                        $editProvince->save();
                        $editDistrict = District::where('districtID','=',$input['districtID'])->first();
                        $editDistrict->districtName = $input['districtName'];
                        $editDistrict->save();
                        $editAmphur = Amphur::where('amphurID','=',$input['amphurID'])->first();
                        $editAmphur->amphurName = $input['amphurName'];
                        $editAmphur->save();
                        return Redirect::to('nearby/province');
                        break;
                    default:
                        abort(404);
                        break;
                }
                break;
            default:
                abort(404);
                break;
        }
    }
}

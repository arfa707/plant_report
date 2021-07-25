<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistrationHeader;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
      $getVariance = RegistrationHeader::orderBy('date', 'desc')->take(25)->get();
      $variance = collect($getVariance)->sortBy('date')->pluck('Variance');
      $getUcl = RegistrationHeader::orderBy('date', 'desc')->take(25)->get();
      $ucl = collect($getUcl)->sortBy('date')->pluck('UCL');
      $getLcl = RegistrationHeader::orderBy('date', 'desc')->take(25)->get();
      $lcl = collect($getLcl)->sortBy('date')->pluck('LCL');
      
      if($request->plant){
        $getVariance = RegistrationHeader::where('plant_id', $request->plant)->orderBy('date', 'desc')->take(25)->get();
        $variance = collect($getVariance)->sortBy('date')->pluck('Variance');
        $getUcl = RegistrationHeader::where('plant_id', $request->plant)->orderBy('date', 'desc')->take(25)->get();
        $ucl = collect($getUcl)->sortBy('date')->pluck('UCL');
        $getLcl = RegistrationHeader::where('plant_id', $request->plant)->orderBy('date', 'desc')->take(25)->get();
        $lcl = collect($getLcl)->sortBy('date')->pluck('LCL');
      }
      $reg_header = new RegistrationHeader;
      $plants = $reg_header->groupBy('plant_id')->pluck('plant_id');
      $tipe_barang =  $reg_header->groupBy('NAMA_BARANG')->pluck('NAMA_BARANG');
      
      return view('admin.dashboard.index')
        ->with('tipe_barang', $tipe_barang)
        ->with('plants', $plants)
        ->with('ucl',json_encode($ucl,JSON_NUMERIC_CHECK))
        ->with('lcl',json_encode($lcl,JSON_NUMERIC_CHECK))
        ->with('variance',json_encode( $variance,JSON_NUMERIC_CHECK));
    }
    public function post_filter(Request $request)
    {
      $data = $request->d;
      $reg_header = new RegistrationHeader;
      return $reg_header->where('plant_id',$data[1]['value'])
                        ->where('NAMA_BARANG',$data[2]['value'])
                        ->whereDate('date', '>=', $data[3]['start'])
                        ->whereDate('date', '<=',$data[3]['end'])
                        ->get();
    }




    
}
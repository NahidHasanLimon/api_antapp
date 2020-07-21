<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use JWTAuth;
use App\User;
use App\AttendanceLog;
use App\Attendance;
use Carbon\Carbon;
use DateTime;

class NewAttendanceController extends Controller
{
  public function GetAttendancedaily($user_id,$date)
  {

$attendance_data=Attendance::where('user_id',$user_id)->where('attendance_date',$date)->where('is_approved_s',1)->select('attendance_date','check_in','check_out','status')->get();

  $checkIn = $attendance_data[0]->check_in;
  $checkOut = $attendance_data[0]->check_out;
  $status =$attendance_data[0]->status;

  $d1 = new  DateTime($checkIn);
  $d2 = new DateTime($checkOut);
  $Diff = $d1->diff($d2)->h . 'h: ' . $d1->diff($d2)->i. 'm: ' . $d1->diff($d2)->s. 's:';

       return response()->json([

                            'success'=>true,
                            'total_duration'=>$Diff,
                            'initialInTime'=>$checkIn,
                            'lastOutTime'=>$checkOut,
                            'status'=>$status,
                            'attendance_data'=>$attendance_data,
                            'duration'=>$Diff,
                        ],200);






  }
}

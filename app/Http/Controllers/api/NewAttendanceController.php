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
  public static function CalculateTime($times) {
          $all_seconds = 0;
          foreach ($times as $time) {
            list($hour, $minute, $second) = explode(':', $time);
            $all_seconds += $hour * 3600;
            $all_seconds += $minute * 60; $all_seconds += $second;

        }


        $total_minutes = floor($all_seconds/60); $seconds = $all_seconds % 60;  $hours = floor($total_minutes / 60); $minutes = $total_minutes % 60;


        return sprintf('%02d:%02d:%02d', $hours, $minutes,$seconds);
  }

  public function GetAttendancedaily($user_id,$date)
  {
    try{
      $attendance_data=Attendance::where('user_id',$user_id)->wheredate('attendance_date',$date)->where('is_approved_s',1)->select('attendance_date','check_in','check_out','status')->get();
    
      foreach($attendance_data as $attendance) {
        $check_in = new DateTime($attendance->check_in);
        $check_out = new DateTime($attendance->check_out);
        $timeDiff = $check_in->diff($check_out);
        $AttandanceArr = [
          'inTime' => $attendance->check_in,
          'outTime' => $attendance->check_out,
          'duration' => $timeDiff->h . 'h:' . $timeDiff->i . 'm',
        ];
  
        $timeArr[] = $timeDiff->h . ':' . $timeDiff->i . ':' . $timeDiff->s;
        $attenDanceData[] = $AttandanceArr;
      }
  
    $checkIn = $attendance_data[0]->check_in;
    $checkOut = $attendance_data[0]->check_out;
    $status =$attendance_data[0]->status;
  
    // $d1 = new  DateTime($checkIn);
    // $d2 = new DateTime($checkOut); 
    // $Diff = $d1->diff($d2)->h . 'h: ' . $d1->diff($d2)->i. 'm: ' . $d1->diff($d2)->s. 's:';
    $TotalDurationSum = self::CalculateTime($timeArr);
  
  
         return response()->json([
  
                              'success'=>true,
                              'total_duration'=> $TotalDurationSum,
                              'initialInTime'=>$checkIn,
                              'lastOutTime'=>$checkOut,
                              'status'=>$status,
                              'attendance_data'=>$attenDanceData,
                          ],200);
    }catch(\Exception $e){
      return response()->json(['success'=>false,'total_duration'=>null,'attendance_date'=>null ],400);
    }
  

  }

  public function GetAttendanceMonthly($user_id,$start_date,$end_date)
  {
   try{
    $attendance_data=Attendance::where('user_id',$user_id)->whereBetween('attendance_date',[$start_date,$end_date])->where('is_approved_s',1)->select('attendance_date','check_in','check_out','status')->get();
   
    foreach($attendance_data as $attendance){
          $check_in= new DateTime($attendance->check_in);
          $check_out= new DateTime($attendance->check_out);
          $timeDiff = $check_in->diff($check_out);
          $AttandanceArr = [
           'attendance_date'=>$attendance->attendance_date,
           'inTime' => $attendance->check_in,
           'outTime' => $attendance->check_out,
           'status' =>$attendance->status,
           'duration' => $timeDiff->h . 'h:' . $timeDiff->i . 'm:' .$timeDiff->s. 's:' ,
         ];
   
         $timeArr[] = $timeDiff->h . ':' . $timeDiff->i . ':' . $timeDiff->s;
         $attenDanceData[] = $AttandanceArr;
    }
     return response()->json([

       'success'=>true,
       'attendance_data'=>$attenDanceData,
   ],200);
    
   }catch (\Exception $e) {
    return response()->json(['sucess'=>false , 'attendance_data'=>null],400);
}
    
  
  }
}

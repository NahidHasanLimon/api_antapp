@extends('layouts.admin')
@section('pagePluginStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
@endsection
@section('pageLevelStyle')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
<!-- start main conten -->
@section('mainContent')
	@php
			$todayDateTime = Carbon\Carbon::now();
			if (!is_null($todaysAttendance)){
				if(!is_null($todaysAttendance->check_in)){
				$inTime=$todaysAttendance->check_in;
				}else{
						$inTime=null;
				}
				if(!is_null($todaysAttendance->check_out)){
				$outTime=$todaysAttendance->check_out;			
				}else{
				 $outTime=null;
				}
		 }else{
			 	$inTime=null;
	 			$outTime=null;
		 }
		 // dd($outTime);
		@endphp
		@php
		// dd($last_row);
			if(!is_null($last_row) && isset($last_row) && !empty($last_row)){
				$last_status=$last_row->check_out;
				$inTime=$last_row->check_in;
				$outTime=$last_row->check_out;
				$last_checked_dateTime=$last_row->attendance_date;
			}else{
				$last_status='';
				$last_checked_dateTime='';
				$inTime=null;
	 			$outTime=null;
			}
		@endphp

<div class="row">
<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<input type="hidden" name="" data-check_in_time="{{$inTime}}"data-check_out_time="{{$outTime}}" data- id="in_out_value">
		
		<input type="hidden" name="last_checked_dateTime_btn" id="last_checked_dateTime_btn" value="{{$last_checked_dateTime}}">

		{{-- <button id="last_status_btn" value="{{$last_status}}">{{$last_status}}</button>
		<button id="last_checked_dateTime_btn" value="{{$last_checked_dateTime}}">{{$last_checked_dateTime}}</button> --}}
                <div class="card-body">
                  <h4 class="card-title">Today</h4>
                  <p class="card-description">
                    <h4 class="card-title">{{$todayDateTime->format('l,F d, Y, h:i A')}}</h4>
                  </p>
                  <div class="container">
					<button type="submit" class="btn btn-info btn-lg"  name="check_in" id="check_in_btn">
					<i class="fa fa-sign-in"></i>Check In</button>
				<button type="submit" class="btn btn-warning btn-lg"  name="check_out" id="check_out_btn">
					<i class="fa fa-sign-out"></i>Check Out</button>
				</div>
                </div>
              </div>
           </div>
	<div class="col-12 grid-margin stretch-card">
	
		<div class="card">
			<div class="card-body">
			 <span id="display_checked_status"></span><br>	
			<span id="display_checked_in"> </span><br>
			<span id="display_checked_out"> </span>
				<div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
              <h4 class="card-title">Attendance History</h4>
             
              <div class="table-responsive">
              	<table class="table table-striped">
              		<thead>
              			<th>Date</th>
              			<th>In</th>
              			<th>Out</th>
              			<th>Duration</th>
              			
              		</thead>
              		<tbody>
              		@foreach ($attendances as $attendance)
              			<tr>
              				<td>{{$attendance->Date_Human}}</td>
              				<td>{{$attendance->InTime_Human}}</td>
              				<td>{{$attendance->OutTime_Human}}</td>
              				<td>{{$attendance->Duration_Human}}</td>
              				
              			</tr>
              		@endforeach
              			
              		</tbody>
              		
              	</table>
		            
              </div>
            </div>
		</div>
	</div>
</div>

@endsection
<!-- end main conten -->


<!-- Start of js plugin -->
@section('pagePluginScript')

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
  @section('pageLevelScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript">
		  var config = {
        routes: {
          attendance_check_in: "{!! route('attendance.check_in') !!}",
          attendance_check_out: "{!! route('attendance.check_out') !!}",
          attendance_today: "{!! route('attendance.today') !!}",
        }
    };

		 $( document ).ready(function() {
		 	    function button_change(){

		 	 var check_in_time = $("#in_out_value").data('check_in_time');
		 	 var check_out_time = $("#in_out_value").data('check_out_time');
const timeString12hr_cin = new Date('1970-01-01T' + check_in_time + 'Z')
  .toLocaleTimeString({},
    {timeZone:'UTC',hour12:true,hour:'numeric',minute:'numeric'}
  );
const timeString12hr_cout = new Date('1970-01-01T' + check_out_time + 'Z')
  .toLocaleTimeString({},
    {timeZone:'UTC',hour12:true,hour:'numeric',minute:'numeric'}
  );


		 	 console.log('From Beginning');
		 	 if((check_in_time==null || check_in_time =='') && (check_out_time==null || check_out_time=='')){
		 	 $('#check_out_btn').prop('disabled', true);
		 	 $('#check_in_btn').prop('disabled', false);
		 	 $('#display_checked_status').text('Please Check in for your todays Attendance');
		 	 console.log('Both Empty');
		 	 }
		 	 else if((check_in_time==null || check_in_time=='') && (check_out_time!=null || check_out_time!='')){
		 	 	 $('#check_in_btn').prop('disabled', false);
		 	 	 $('#check_out_btn').prop('disabled', true);
		 	 	console.log('check in time null but check out time not null');

		 	 }
		 	 else if((check_in_time!=null || check_in_time !='') && (check_out_time==null|| check_out_time=='')){
		 	 	console.log('check_in_time not empty but check_out_time empty ');
		 	 	$('#check_in_btn').prop('disabled', true);
		 	 	$('#check_out_btn').prop('disabled', false);
		 	 	$('#display_checked_status').empty().text('Checked In! Don"t Forget To Check Out!');

		 	 		 // $('#display_checked_in').empty();
		 	 		 $('#display_checked_out').empty();
		 	 		 $('#display_checked_in').empty().text('Last Checked In at: '+timeString12hr_cin);
		 	 } 
		 	 else if((check_in_time!=null || check_in_time!='') && (check_out_time!=null || check_out_time !='')){
		 	 	$('#check_in_btn').prop('disabled', false);
		 	 	$('#check_out_btn').prop('disabled', true);
		 	 	console.log(check_in_time);
		 	 	console.log('what is this');
		 	 	console.log(check_out_time);
		 	 	console.log('Both are Filled');
		 	 	 $('#display_checked_status').empty().text('Thank You For Your Attendance!Check In Again!');
		 	 	 $('#display_checked_in').empty().text('Last Checked In at: '+timeString12hr_cin);
		 	 	 $('#display_checked_out').empty().text('Last Checked Out at: '+timeString12hr_cout);
		 	 }
		 	}
		 	button_change();
		 	  //   $.ajax({
			   //  url:config.routes.attendance_today,
			   //  type: "get", 
			   //  success: function(data) {
			   //     // console.log(data);
			   //     if (data.attendance=="" || data.attendance== null ) {
			   //     	console.log('Fuck Your Country System');
			   //     		$("#check_in_btn").data('check_in_time',null);
						// $("#check_out_btn").data('check_out_time',null);
			   //     }else{
			   //     	$("#check_in_btn").data('check_in_time',data.attendance.check_in);
			   //     	if (data.attendance.check_in!=" ") {
			   //     	$("#check_out_btn").data('check_out_time',data.attendance.check_out);
			   //     	}
			   //     }
			   //     	button_change();
			   //  }
			   //  });
		 	  
		 	 

		    console.log( "ready!" );
	    	 $(document).on('click','#check_in_btn',function(e){
			    e.preventDefault();
			  //   var id = $(this).data('id');
			  //   var type ='show';
			  //   // alert(id);
			  if(confirm('Are You Sure to Check In ?')){
			      $.ajax({
			    url:config.routes.attendance_check_in,
			    type: "get", 
			    success: function(data) {
			      //  // console.log(data);
			       if (data.success==true) {
			       	$('#in_out_value').data('check_out_time','');
			       	$('#in_out_value').data('check_in_time',data.attendance.check_in);
			       	$("#last_checked_dateTime").val(data.attendance.attendance_date);
			      toastr.success('Checked In successfully');
			       	button_change();
			       }else{
			       	alert(data.message);
			       }    
			    }
			    });
			  }
			});	
		  $(document).on('click','#check_out_btn',function(e){
			    e.preventDefault();
			  if(confirm('Are You Sure to Check Out ?')){
			      $.ajax({
			    url:config.routes.attendance_check_out,
			    type: "get", 
			    success: function(data) {
			       console.log(data);
			       if (data.success==true) {
			       	// $("#last_status_btn").val('out');
			       	$('#in_out_value').data('check_out_time',data.attendance.check_out);
			       	$("#last_checked_dateTime").val(data.attendance.attendance_date);
			       	// $("#check_in_btn").data('check_in_time',data.attendance.check_in);
			      toastr.success('Checked out successfully');
			       	button_change();
			       }else{
			       	alert(data.message);
			       }
			      //  $(this).closest('tr').hide();    
			    }
			    });
			  }
			});
		});
 	</script>
  @endsection
  <!-- End custom js for this page-->
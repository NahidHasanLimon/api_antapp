@extends('layouts.admin')
@section('pagePluginStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}" />
<link rel="stylesheet" href="{{asset('backend/vendors/select2/select2.min.css')}}">

@endsection
@section('pageLevelStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  @endsection
<!-- start main content -->
@section('mainContent')

<div class="row">
	<div class="col-12 grid-margin stretch-card">
	<div class="card">
                <div class="card-body">

                	 <h4 class="card-title text-center">Approve Attendance</h4>
                	 <div class="unapproved_dates_div pb-2">
                	 	@if(!is_null($unapproved_dates))
                	 	<ul class="list-group list-group-horizontal-xl">
                	 		@foreach ($unapproved_dates as $unapproved_date)
                	 			<li class="list-group-item" ><a class="unapproved_date_c" href="" data-unapproved_date="{{Carbon\Carbon::parse($unapproved_date->attendance_date)->format('d/m/Y')}}">{{Carbon\Carbon::parse($unapproved_date->attendance_date)->format('d/m/Y')}}</a></li>
                	 		@endforeach
						</ul>
						@endif	            	 	
                	 </div>
                	 <h4 class="card-title">Choose a Date</h4>
                	<div class="col-sm-8">
                		 <div class="form-group row">
                	 	<div class="col-sm-5 float-center">
                  		{{-- <input type='date' class='form-control lefton' id="choose_date"  name="choose_date" placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false' value="{{Carbon\Carbon::today()->toDateString()}}"> --}}
        @php
        	 $todayDate=Carbon\Carbon::today()->format('d/m/Y');
        	 // $SearchDate= Carbon::createFromFormat('Y-m-d', $request->SearchDate)->format('d/m/Y');
        @endphp
                  		 <input type="text" name="choose_date" id="choose_date" class="form-control" data-date-format="dd/mm/yyyy"  data-provide="datepicker" required="" value="{{$todayDate}}">
              			</div>
              			<div class="col-sm-3">
              				<button type="button" class="btn btn-outline-success btn-fw float-right approveAttendance" name="search_by_date_button" id="search_by_date_button"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
              			</div>
                	 </div>
                		
                	</div>
                  	
                  </div>
              </div>
           </div>
@if (!is_null($attendances) || !empty($attendances))
<div class="col-12 grid-margin stretch-card">
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="selected_date_display">Display Attendance Date: {{Carbon\Carbon::today()->format('l,F d, Y')}}</h4>
                  <span class="text-danger" id="empty_attendance_message"></span>
                 <div class="form">
                 	<form id="approve_attendance_form" name="approve_attendance_form">
                 		@csrf
                 		<input type="hidden" name="hidden_attendance_date" id="hidden_attendance_date" value="{{$todayDate}}">
                 		
                 		<div class="table-responsive" id="attendance_table_div">
                 			<table class="table" id="attendance_table">
                 				<thead>
                 					<th>Name</th>
                 					<th>Checked In</th>
                 					<th>Checked Out</th>
                 					<th>Status</th>
                 				</thead>
                 				<tbody>
                 					@foreach ($attendances as $attendance)
                 						<tr>
                 							<input type="hidden" name="hidden_user_id[]"  value="{{$attendance->user_id}}">
                 							<input type="hidden" name="hidden_entry_ids[]"  value="{{$attendance->id}}">
                 							<td>
                 								{{$attendance->user->first_name.' '.$attendance->user->middle_name.' '.$attendance->user->last_name}}
                 							</td>
                 							<td>
              								<input type="time" pattern="\d{1,2}:\d{2}([ap]m)?" class="form-control" name="check_in[]" class="time_element" pattern="\d{1,2}:\d{2}([ap]m)?" value="{{$attendance->check_in}}" />
                 							</td>
                 							<td>
                 								<input type="time" class="form-control" name="check_out[]" class="time_element" value="{{$attendance->check_out}}" />
                 							</td>
                 							<td class="text-uppercase">
                 								{{$attendance->status}}
                 							</td>
                 						</tr>
                 					@endforeach
                 				</tbody>
                 				
                 			</table>
                 			
                 		</div>
                 		@if (!is_null($attendances) || !$attendances->isEmpty() || $items->isNotEmpty())
                 		
                 			<button type="button" class="btn btn-outline-success btn-fw float-right approveAttendance" name="approve_attendance_submit_btn" id="approve_attendance_submit_btn"><i class="fa fa-paper-plane" aria-hidden="true"></i>Approve</button>
                 		@endif
                 	</form>
                 	
                 </div>
                </div>
              </div>
           </div>
           @endif
 	</div>
 @endsection
 {{-- end main content --}}
<!-- Start of js plugin -->
@section('pagePluginScript')
<script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
 <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
 <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
	var config = {
        routes: {
          approve_attendance_sa: "{!! route('attendance.approve.super') !!}",
          find_unapproved_attendance_sa: "{!! route('attendance.unapproved.super.find') !!}"

        }
    };
 $(document ).ready(function() {
		$('#choose_date').datepicker({
			format: "dd/mm/yyyy",
			autoclose: true
		 });
		function fill_attendance_table(attendance){
			$("#attendance_table > tbody:last-child").append("<tr><input type='hidden' name='hidden_user_id[]' value='"+attendance.user_id+"'><input type='hidden' name='hidden_entry_ids[]' value='"+attendance.id+"'><td>"+attendance.user.first_name+' '+attendance.user.middle_name+' '+attendance.user.last_name+"</td><td><input type='time' pattern='\d{1,2}:\d{2}([ap]m)?' class='form-control'  name='check_in[]' value='"+attendance.check_in+"' placeholder='Enter Skill Category'></td><td><input type='time' pattern='\d{1,2}:\d{2}([ap]m)?' class='form-control'  name='check_out[]' value='"+attendance.check_out+"' placeholder='Enter Check Out Time'></td><td>"+attendance.status+"</td></tr>");
		}
	 $(document).on('click','#search_by_date_button',function(e){
			    e.preventDefault();
			    var SearchDate = $('#choose_date').val();
			    $('#attendance_table > tbody').empty();
			    // console.log(SearchDate);
			      $.ajax({
			    url:config.routes.find_unapproved_attendance_sa,
			    type: "get",
			      data: {  
				    SearchDate: SearchDate
				},
			    success: function(data) {
			    	 if(data.attendances!=''){
			    	 	$('#attendance_table_div').show();
			    	 	$('#approve_attendance_submit_btn').prop('disabled', false);
			    	 	$('#approve_attendance_submit_btn').show();
			    	 	$('#empty_attendance_message').empty();
			    	 	$('#hidden_attendance_date').val(SearchDate);
			    	 	console.log(SearchDate);
			    	 	// var SearchedDisplaDate = new Date(SearchDate);
			    	 	// console.log(SearchedDisplaDate.toLocaleTimeString());

			    	 $('#selected_date_display').empty().text("Displayed Data For Attendance Date: "+SearchDate);
			    	 	
       $.each(data.attendances, function (i, attendance) {
       	console.log(attendance);
          		 fill_attendance_table(attendance);
            }); // end of each
				}else{
					$('#selected_date_display').empty();
					$('#empty_attendance_message').empty().text("Un Approved Attendance Not Available For This Date: "+SearchDate);
					$('#approve_attendance_submit_btn').hide();
					$('#attendance_table_div').hide();
				}
		    }
			    });
			
			});	

 $(document).on('click','.unapproved_date_c',function(e){
			    e.preventDefault();
			    var SearchDate = $(this).data('unapproved_date');
			    console.log(SearchDate);
			    $('#attendance_table > tbody').empty();
			    // console.log(SearchDate);
			      $.ajax({
			    url:config.routes.find_unapproved_attendance_sa,
			    type: "get",
			      data: {  
				    SearchDate: SearchDate
				},
			    success: function(data) {
			    	 if(data.attendances!=''){
			    	 	$('#attendance_table_div').show();
			    	 	$('#approve_attendance_submit_btn').prop('disabled', false);
			    	 	$('#approve_attendance_submit_btn').show();
			    	 	$('#empty_attendance_message').empty();
			    	 	$('#hidden_attendance_date').val(SearchDate);
			    	 	console.log(SearchDate);
			    	 	// var SearchedDisplaDate = new Date(SearchDate);
			    	 	// console.log(SearchedDisplaDate.toLocaleTimeString());

			    	 $('#selected_date_display').empty().text("Displayed Data For Attendance Date: "+SearchDate);
			    	 	
       $.each(data.attendances, function (i, attendance) {
       	console.log(attendance);
          		 fill_attendance_table(attendance);
            }); // end of each
				}else{
					$('#selected_date_display').empty();
					$('#empty_attendance_message').empty().text("Un Approved Attendance Not Available For This Date: "+SearchDate);
					$('#approve_attendance_submit_btn').hide();
					$('#attendance_table_div').hide();
				}
		    }
			    });
			
			});	




			 $(document).on('click','#approve_attendance_submit_btn',function(e){
			    e.preventDefault();
			    var choose_date = $(this).data('choose_date');

			 	if (choose_date!='' || choose_date !=null) {
			 		 if(confirm('Are You Sure to Approve ?')){
			      $.ajax({
			    url:config.routes.approve_attendance_sa,
			    type: "post",
			    data: new FormData(approve_attendance_form),
			      contentType: false,       // The content type used when sending data to the server.
			      cache: false,             // To unable request pages to be cached
			      processData:false,
			    success: function(data) {
			    	if (data.success==true) {
			    		$('#empty_attendance_message').empty().text("Attendance Approved");
			    		$('#approve_attendance_submit_btn').prop('disabled', true);
			    	}
			    }
			    });
			  }
			 	}
			});
 	});
 </script>
  @endsection
  <!-- End custom js for this page-->
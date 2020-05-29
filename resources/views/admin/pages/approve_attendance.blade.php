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
                	 	@php
                	 		// dd($unapproved_dates);
                	 	@endphp
                	 	@if(!is_null($unapproved_dates))
                	 	<ul class="list-group list-group-horizontal-xl" id="dateListParent">
                	 		@foreach ($unapproved_dates as $unapproved_date)
                	 			<li id="unapproved_date{{$unapproved_date}}" class="list-group-item unapproved_date_list"data-date_list="{{$unapproved_date}}" ><a class="unapproved_date_c" href=""data-unapproved_date="{{$unapproved_date}}">{{Carbon\Carbon::parse($unapproved_date)->format('d/m/Y')}}</a></li>
                	 		@endforeach
						</ul>
						@endif	            	 	
                	 </div>
                	 <h4 class="card-title">Choose a Date</h4>
                	<div class="col-sm-8">
                		 <div class="form-group row">
                	 	<div class="col-sm-5 float-center">
        @php
        	 $todayDate=Carbon\Carbon::today()->format('d/m/Y');
        @endphp
                	 </div>
                		
                	</div>
                  </div>
           </div>
       </div>
   </div>
@if (!is_null($attendances_details) || !empty($attendances_details))
<div class="col-12 grid-margin stretch-card">
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title" id="selected_date_display">Display Attendance Date: </h4>
                  <span class="text-danger" id="empty_attendance_message"></span>
                 <div class="form">
                 	<form id="approve_attendance_form" name="approve_attendance_form">
                 		@csrf
                 		<input type="hidden" name="hidden_attendance_date" id="hidden_attendance_date" value="">
                 		
                 		<div class="table-responsive" id="attendance_table_div">
                 			<table class="table table-striped" id="attendance_table">
                 				<thead>
                 					<th>Name</th>
                 					<th>Logs</th>
                 					<th>Checked In</th>
                 					<th>Checked Out</th>
                 					{{-- <th>Duration</th> --}}
                 					<th>D/S</th>
                 					<th>A/S</th>
                 				</thead>
                 				<tbody></tbody>
                 				
                 			</table>
                 		</div>
                 		@if (!is_null($attendances_details) || !$attendances_details->isEmpty() || $items->isNotEmpty())
                 		
                 			<button style="display:none;" type="button" class="btn btn-outline-success btn-fw btn-lg float-right approveAttendance hidden" name="approve_attendance_submit_btn" id="approve_attendance_submit_btn" ><i class="fa fa-paper-plane" aria-hidden="true"></i>Approve</button>
                 		@endif
                 	</form>
                 	
                 </div>
                </div>
              </div>
           </div>
           @endif
 	</div>
 	<!-- modal view -->
 <div class="modal fade" id="view_attendance_log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Log</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="table-responsive">
                                  	<table class="table table-striped" id="attendance_log_table">
                                  		<thead>
                                  			<th>Date</th>
                                  			<th>In Time</th>
                                  			<th>Out Time</th>
                                  			<th>Duration</th>
                                  		</thead>
                                  		<tbody></tbody>
                                  	</table>
                                  	
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
<!-- modal edit -->
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
          find_unapproved_attendance_sa: "{!! route('attendance.unapproved.super.find') !!}",
          find_attendance_log_single: "{!! route('attendance.log.single') !!}"
        }
    };
 $(document ).ready(function() {
		$('#choose_date').dataTable({
			format: "dd/mm/yyyy",
			autoclose: true
		 });
		 // $('#attendance_table').DataTable();
	var statusList = { 
          "": "Select an option", 
          "Meeting Late": "Meeting Late", 
          "Meeting Leave": "Meeting Leave",
              };
		function fill_attendance_table(attendance){
			// <td>"+attendance.Duration+"</td>
			 $rowno=$("#attendance_table tr").length;
             $rowno=$rowno+1;
			$("#attendance_table > tbody:last-child").append("<tr><input type='hidden' name='hidden_user_id[]' value='"+attendance.user_id+"'><input type='hidden' name='hidden_entry_ids[]' value='"+attendance.id+"'><td>"+attendance.Name+"</td><td><button type='button' class='see_more_log_btn'data-user_id_see_log='"+attendance.user_id+"' class='btn btn-outline-secondary btn-rounded btn-icon'><i class='ti-plus text-danger'></i></button></td><td><input type='time' pattern='\d{1,2}:\d{2}([ap]m)?' class='form-control'  name='check_in[]' value='"+attendance.InTime+"' placeholder='Enter Skill Category'></td><td><input type='time' pattern='\d{1,2}:\d{2}([ap]m)?' class='form-control'  name='check_out[]' value='"+attendance.OutTime+"' placeholder='Enter Check Out Time'></td><td>"+attendance.status_m+"</td><td><select class='form-control' name='status_admin[]' id='selectStatus"+$rowno+"'></select></td></tr>");
			  $.each(statusList, function(key, value){   
          $('#selectStatus'+$rowno)
               .append($("<option></option>")
                          .attr("value",key)
                          .text(value)); 
          });
		}
		function fill_attendance_log_table(attendance){
			console.log(attendance);
			$("#attendance_log_table > tbody:last-child").append("<tr><td>"+attendance.Date_Human+"</td><td>"+attendance.InTime_Human+"</td><td>"+attendance.OutTime_Human+"</td><td>"+attendance.Duration_Human+"</td></tr>");
		}
	 $(document).on('click','#search_by_date_button',function(e){
			    e.preventDefault();
			    var searchDate = $('#choose_date').val();
			    $('#attendance_table > tbody').empty();
			    // console.log(searchDate);
			      $.ajax({
			    url:config.routes.find_unapproved_attendance_sa,
			    type: "get",
			      data: {  
				    searchDate: searchDate
				},
			    success: function(data) {
			    	 if(data.attendances!=''){
			    	 	$('#attendance_table_div').show();
			    	 	$('#approve_attendance_submit_btn').prop('disabled', false);
			    	 	$('#approve_attendance_submit_btn').show();
			    	 	$('#empty_attendance_message').empty();
			    	 	$('#hidden_attendance_date').val(searchDate);
			    	 	console.log(searchDate);
			    	 	// var SearchedDisplaDate = new Date(searchDate);
			    	 	// console.log(SearchedDisplaDate.toLocaleTimeString());

			    	 $('#selected_date_display').empty().text("Displayed Data For Attendance Date: "+searchDate);
			    	 	
       $.each(data.attendances, function (i, attendance) {
       	console.log(attendance);
          		 fill_attendance_table(attendance);
            }); // end of each
				}else{
					$('#selected_date_display').empty();
					$('#empty_attendance_message').empty().text("Un Approved Attendance Not Available For This Date: "+searchDate);
					$('#approve_attendance_submit_btn').hide();
					$('#attendance_table_div').hide();
				}
		    }
			    });
			
			});	
 $(document).on('click','.see_more_log_btn',function(e){
			    e.preventDefault();
			    var user_id = $(this).data('user_id_see_log');
			    var attendance_date = $('#hidden_attendance_date').val();
			    console.log(user_id);
			    $('#attendance_log_table > tbody').empty();
			    // console.log(searchDate);
			      $.ajax({
			    url:config.routes.find_attendance_log_single,
			    type: "get",
			      data: {  
				    user_id: user_id,
				    attendance_date:attendance_date
				},
			    success: function(data) {
			    	 if(data.attendances!=''){
			    $.each(data.attendances, function (i, attendance) {
             	// console.log(attendance);
          		 fill_attendance_log_table(attendance);
            }); 
			     $('#view_attendance_log').modal('show');
		    }else if(data.success=false){
		    	console.log();
		    }
		}
			    });
			
			});	

 $(document).on('click','.unapproved_date_c',function(e){
			    e.preventDefault();
			    var searchDate = $(this).data('unapproved_date');
			    console.log(searchDate);
			    $('#attendance_table > tbody').empty();
			    // console.log(searchDate);
			      $.ajax({
			    url:config.routes.find_unapproved_attendance_sa,
			    type: "get",
			      data: {  
				    searchDate: searchDate
				},
			    success: function(data) {
			    	 if(data.attendances!=''){
			    	 	$('#attendance_table_div').show();
			    	 	$('#approve_attendance_submit_btn').prop('disabled', false);
			    	 	$('#approve_attendance_submit_btn').show();
			    	 	$('#empty_attendance_message').empty();
			    	 	$('#hidden_attendance_date').val(searchDate);
			    	 	console.log(searchDate);

			    	 $('#selected_date_display').empty().text("Displayed Data For Attendance Date: "+searchDate);
			    	 	
       $.each(data.attendances, function (i, attendance) {
       	console.log(attendance);
          		 fill_attendance_table(attendance);
            }); // end of each
				}else{
					$('#selected_date_display').empty();
					$('#empty_attendance_message').empty().text("Un Approved Attendance Not Available For This Date: "+searchDate);
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
			    		var hidden_attendance_date=$('#hidden_attendance_date').val();
			    		$('#unapproved_date'+hidden_attendance_date).hide();
			    		 toastr.success('Attendance Approved successFully');
			    	}else if (data.success==false) {
			    		 toastr.error('Attendance Allready Exist');
			    		console.log(data);
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
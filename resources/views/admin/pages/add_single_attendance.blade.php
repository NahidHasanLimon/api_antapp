@extends('layouts.admin')
@section('pagePluginStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
@endsection
@section('pageLevelStyle')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endsection
<!-- start main conten -->
@section('mainContent')
	

<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="container">
					<form method="post" name="single_attendance_form" id="single_attendance_form">
						@csrf
						<div class="table-responsive">
							<table class="tabel table tbl-boredered" id="singele_attendance_table">
								<thead>
									<th>Employee:</th>
									<th>Date</th>
									<th>Check In</th>
									<th>Check Out</th>
									<th>Status</th>
									<th>Actions</th>
								</thead>
								<tbody>
								{{-- <tr>
									
									<td>
										<select class="form-control" name="select_user" id="select_usere" required="">
											<option value="">Select an Employee First</option>
											@foreach ($usersList as $user)
											<option value="{{$user->id}}">{{$user->first_name.' '.$user->middle_name.' '.$user->last_name}}</option>
											@endforeach
										</select>
									</td>
							
									
									<td>
										<input type="text" class="form-control" name="choose_attendance_date" id="choose_attendance_date" class="form-control" data-date-format="dd/mm/yyyy"  data-provide="datepicker" required="" value="" required="">
									</td>
							
									
									<td>
										<input type="time" pattern="\d{1,2}:\d{2}([ap]m)?" class="form-control"  name="check_in"  placeholder='Enter check In' required="">
									</td>
								
									
									<td>
										<input type="time" pattern="\d{1,2}:\d{2}([ap]m)?" class="form-control"  name="check_out"  placeholder='Enter Enter Check Out' required="">
									</td>
								
									<td></td>
									
								</tr> --}}
							</tbody>
								
							</table>
							<td><input class="btn btn-inverse-success btn-fw float-right" type="submit" name="single_attendance_form_submit" id="single_attendance_form_submit_btn" required=""></td>
						</div>
					</form>
					<button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_attendance();"><i class="ti-plus"></i></button>	
					{{-- <td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_attendnace_last()><i class='ti-minus'></i></button></td> --}}
			</div>
				
				<div>
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
    <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
    	// make userList object
    var users = <?php echo json_encode($usersList, JSON_PRETTY_PRINT) ?>;
	var userList = {};
	for (var i = 0; i < users.length; i++)
    userList[users[i]['id']] = users[i]['FullName'];
console.log(userList);
// end of making user List Object
submit_button_display_change();
	function submit_button_display_change(){
		$row=$("#singele_attendance_table tbody>tr").length;
		if($row==0){
			$('#single_attendance_form_submit_btn').hide();
		}else{

			$('#single_attendance_form_submit_btn').show();
		}
	}

   function add_row_attendance()
{
	
	
 // $rowno=$("#singele_attendance_table tr").length;
 // $rowno=$("#singele_attendance_table tr").length;
 // $rowno=$rowno+1;
  $row_track_id = $('#singele_attendance_table tr:last').data('row_track');
  if($row_track_id==null){
  	$row_track_id=1;
  }else{
  	$row_track_id=$row_track_id+1;
  }
  // console.log($row_track_id);

 $("#singele_attendance_table > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_attendance"+$row_track_id+"'><td><select class='form-control' name='user[]' id='selectEmployee"+$row_track_id+"' required=''><option value=''>Select an employee</option></select></td><td><input type='date' class='form-control joinon' name='attendance_date[]' placeholder='Enter Attendance date EX:dd-mm-yy' aria-invalid='false' required=''><td><input type='time' pattern='\d{1,2}:\d{2}([ap]m)?'' class='form-control'  name='check_in[]'  placeholder='Enter check In' required=''></td><td><input type='time' pattern='\d{1,2}:\d{2}([ap]m)?' class='form-control'  name='check_out[]'  placeholder='Enter Enter Check Out' required=''></td><td><select class='form-control' name='status[]' id='selectStatus"+$row_track_id+"'><option value=''>Select an status</option></select></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_attendnace('row_attendance"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
    addListToAttendanceTable($row_track_id);
    submit_button_display_change();
} 
function delete_row_attendnace(row_track_id)
{
 $('#'+row_track_id).remove();
 submit_button_display_change();
}
// function delete_row_attendnace_last()
// {
//  $('#singele_attendance_table tbody>tr:last').remove();
// }
 function addListToAttendanceTable($row_track_id){

          $.each(statusList, function(key, value){   
                $('#selectStatus'+$row_track_id)
                     .append($("<option></option>")
                                .prop("value",key)
                                .text(value)); 
            });
            $.each(userList, function(key, value){   
                $('#selectEmployee'+$row_track_id)
                     .append($("<option></option>")
                                .prop("value",key)
                                .text(value)); 
        });
}
var statusList = { 
          "Meeting Late": "Meeting Late",
          "Meeting Leave": "Meeting Leave",
              }; 
    </script>
	<script type="text/javascript">
		  var config = {
        routes: {
          attendance_single_store: "{!! route('attendance.single.store') !!}",
        }
    };

$('#choose_attendance_date').datepicker({
			format: "dd/mm/yyyy",
			autoclose: true
		 });

		 $( document ).ready(function() {
						$(document).on('submit','#single_attendance_form', function(event){
						    event.preventDefault();
						    $.ajax({
						        url:config.routes.attendance_single_store,
						        method:"POST",
						        data:new FormData(this),
						        dataType:'JSON',
						        contentType: false,
						        cache: false,
						        processData: false,
						        success:function(data)
						        { 
						          console.log(data);
						          if(data.success==true){
						          	toastr.success('Attendance Inserted out successfully');
						          }else{
						          	toastr.error('Failed to Insert/Allready Exist');
						          }
						        
						        }
						    })
						 });
						});
 	</script>
  @endsection
  <!-- End custom js for this page-->
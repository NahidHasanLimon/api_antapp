@extends('layouts.admin')
@section('pagePluginStyle')
@endsection
@section('pageLevelStyle')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endsection
<!-- start main conten -->
@section('mainContent')
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
	              <div class="card">
	                <div class="card-body">
	                	<h6 class="text-center pb-2">Pending Approval List of User Information</h6>
	                <div class="table-responsive">
	                	<table class="table">
	                		@if ($users->isNotEmpty())
	                		
	                		<tbody>
	                		
	                			@foreach ($users as $user)
	                				<tr>
	                					<td>{{$user->first_name.' '. $user->middle_name. ' '.$user->last_name}}</td>
	                					<td><button data-id="{{$user->id}}" class="btn btn-outline-success btn-fw" id="view_employee_btn">View</button></td>
	                					<td><button data-id="{{$user->id}}" class="btn btn-outline-info btn-fw approve_profile_btn">Approve</button></td>
	                				</tr>
	                			@endforeach
	                		</tbody>
	                			@else {{'Pending Data Not Available'}}
	                		@endif
	                	</table>
	                </div>
	                </div>
	              </div>
	            </div>
	    <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                	<h6 class="text-center pb-2">Remarks</h6>
                <div class="table-responsive">
                	<form name="add_remarks_form" id="add_remarks_form" method="post">
                		@csrf
                	<table class="table border-less">
                		<tbody>
                			<tr>
                				<td>Select A User</td>
                				<td>
                			<select name="remark_receiver" id="remark_receiver" class="form-control">
                				<option value="">Select a User</option>
                					@foreach ($users as $user)
                						<option value="{{$user->id}}">{{$user->first_name.' '. $user->middle_name. ' '.$user->last_name}}</option>
                					@endforeach
                			</select>
                			</td>
                			</tr>
                      <tr>
                        <td> Subject</td>
                        <td>
                      <textarea name="remark_subject" id="remark_subject" class="form-control" ></textarea>
                          
                        </td>
                      </tr>
                			<tr>
                				<td> Description</td>
                				<td>
                			<textarea name="remark_description" id="remark_description" class="form-control" ></textarea>
                					
                				</td>
                			</tr>
                			<tr>
                				<td></td>
                				<td></td>
                				<td><button class="btn btn-outline-info btn-fw" id="remarks_submit_button" name="remarks_submit_btn">Submit</button></td>
                			</tr>
                		</tbody>
                	</table>
                </form>
                </div>
                </div>
              </div>
            </div>
        </div>
        {{-- view modal --}}
     <div class="modal fade  bd-example-modal-lg" id="view_employee_modal" name="view_employee_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Employee Information</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{-- <p>Modal body text goes here.</p> --}}
                          <div class="col-md-12 col-xl-12 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  {{-- <h4 class="card-title">Employee Information</h4> --}}
                  {{-- <p class="card-description">Employee Information</p> --}}
                  <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                     
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-personal_info-tab" data-toggle="pill" href="#pills-personal_info" role="tab" aria-controls="pills-personal_info" aria-selected="true">Personal Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Contact Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-financial-tab" data-toggle="pill" href="#pills-financial" role="tab" aria-controls="pills-contact" aria-selected="false">Financial Info</a>
                    </li> 
                    
                    <li class="nav-item">
                      <a class="nav-link " id="pills-educationalQualification-tab" data-toggle="pill" href="#pills-educationalQualification" role="tab" aria-controls="pills-educationalQualification" aria-selected="true">Educational Info</a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" id="pills-workExperience-tab" data-toggle="pill" href="#pills-workExperience" role="tab" aria-controls="pills-workExperience" aria-selected="true">Work Info</a>
                    </li>  
                    <li class="nav-item">
                      <a class="nav-link" id="pills-Skill-tab" data-toggle="pill" href="#pills-Skill" role="tab" aria-controls="pills-Skill" aria-selected="true">Skills</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    {{-- work experience --}}
                    <div class="tab-pane fade" id="pills-Skill" role="tabpanel" aria-labelledby="pills-Skill-tab">
                      <div class="table-responsive">
                        <table class="table table-striped" id="skill_view_table">
                                <thead >
                                  <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Applicability on Workspace</th>
                                    <th>Profeciency Level</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                    
                                </tbody>
                              </table>
                      </div>
                    </div>
                    {{-- end of workexperice --}} 
                    {{-- work experience --}}
                    <div class="tab-pane fade" id="pills-workExperience" role="tabpanel" aria-labelledby="pills-workExperience-tab">
                      <div class="table-responsive">
                        <table class="table table-striped" id="work_experience_view_table">
                                <thead >
                                  <tr>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Joined Date</th>
                                    <th>Left Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                      </div>
                    </div>
                    {{-- end of workexperice --}}  
                     {{--  Educational Qualification   --}}
                    <div class="tab-pane fade show" id="pills-educationalQualification" role="tabpanel" aria-labelledby="pills-educationalQualification-tab">
                      <div class="table-responsive">
                         <table class="table table-striped" id="educational_qualification_view_table">
                                <thead >
                                  <tr>
                                    <th>Degree</th>
                                    <th>Program/Group</th>
                                    <th>Institution</th>
                                    <th>GPA</th>
                                    <th>Major</th>
                                    <th>Minor</th>
                                    <th>Passing Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                      </div>
                    </div>
                    {{-- end of Educational Qualification  --}}
                    <div class="tab-pane fade show active" id="pills-personal_info" role="tabpanel" aria-labelledby="pills-personal_info-tab">
                      <div class="media">
                        <img class="mr-3 w-25   mb-2" src="https://via.placeholder.com/115x115" alt="sample image" id="photo_v">
                        <div class="media-body">
                             <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label ">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control font-weight-bold" name="first_name_v" id="first_name_v" disabled="" >
                          </div>
                        </div>
                      </div>
                     
                    </div>  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Gender</label>
                          <div class="col-sm-9">

                            <input type="text"  name="gender_v" id="gender_v" class="form-control text-uppercase" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input type="text"  name="dob_v" id="dob_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Blood Group</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control text-uppercase" name="blood_group_v" id="blood_group_v" disabled="" value="">
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Medical Condition</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="medical_condition_v" id="medical_condition_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                     
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Identification Type</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control text-uppercase" name="identification_type_v" id="identification_type_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-6 col-form-label">Identificaion Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="identification_number_v" id="identification_number_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                  

                         
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                     {{--  <div class="media">
                        <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/115x115" alt="sample image"> --}}
                        <div class="media-body">
                         <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile Number</label>
                          <div class="col-sm-9">
                            <input type="text"  name="mobile_number_v" id="mobile_number_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_v" id="email_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                    
                    </div> 
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Present Address</label>
                          <div class="col-sm-9">
                            <input type="text"  name="present_address_v" id="present_address_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Permanent Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="permanent_address_v" id="permanent_address_v" disabled="" value="limon">
                          </div>
                        </div>
                      </div>
                    
                    </div>   
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Contact Person</label>
                          <div class="col-sm-9">
                            <input type="text"  name="emergency_person_name_v" id="emergency_person_name_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Person Relation</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="emergency_relation_v" id="emergency_relation_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text"  name="emergency_number_v" id="emergency_number_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Facebook Username</label>
                          <div class="col-sm-9">
                            <input type="text"  name="fb_username_v" id="fb_username_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                    </div>    
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Discord ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="discord_id_v" id="discord_id_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                        </div>
                      {{-- </div> --}}
                    </div>
                    <div class="tab-pane fade" id="pills-financial" role="tabpanel" aria-labelledby="pills-financial-tab">
                    
                        <div class="media-body">
                           <h3> Bank Information</h3>
                          <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text"  name="personal_bank_name_v" id="personal_bank_name_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Account Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_bank_account_name_v" id="personal_bank_account_name_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                    </div>     
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Account number</label>
                          <div class="col-sm-9">
                            <input type="text"  name="personal_bank_account_number_v" id="personal_bank_account_number_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Branch Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_bank_branch_name_v" id="personal_bank_branch_name_v" disabled="" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Branch Routing Number</label>
                          <div class="col-sm-9">
                            <input type="text"  name="personal_bank_branch_routing_number_v" id="personal_bank_branch_routing_number_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                  
                    </div>
                    <h3> Bkash Information</h3>
                     <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bkash Account Number</label>
                          <div class="col-sm-9">
                            <input type="text"  name="bkash_account_number_v" id="bkash_account_number_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bkash Account Type</label>
                          <div class="col-sm-9">
                            <input type="text"  name="bkash_account_type_v" id="bkash_account_type_v" class="form-control" value="" disabled="">
                          </div>
                        </div>
                      </div>
                  
                    </div>
                        </div>
                     
                    </div> 
                 
                  </div>
                </div>
              </div>
            </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ends -->
  {{-- view modal --}}
@endsection
<!-- end main conten -->


<!-- Start of js plugin -->
@section('pagePluginScript')
	   <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
	<script type="text/javascript">
		  $('div[name=view_employee_modal]').on("hidden.bs.modal", function () {
        $('#view_employee_modal a:first').tab('show');
    });
       
  	$("#add_remarks_form").validate({
		    rules: {
		    remark_receiver: {
		        required: true,
		    }, 
		     remark_description: {
		        required: true,
		    }, 
        remark_subject: {
            required: true,
        },
		    },
		    messages: {
		    remark_receiver: {
		        required: "Select a Remark Receiver",
		    },
		    remark_description: {
		        required: "Description can not be empty",
		    }, 
        remark_subject: {
            required: "Subject can not be empty",
        },
		    },
		    errorPlacement: function(label, element) {
		    label.addClass('mt-2 text-danger');
		    label.insertAfter(element);
		    },
		    highlight: function(element, errorClass) {
		    $(element).parent().addClass('has-danger')
		    $(element).addClass('form-control-danger')
		    }
		});
		 var config = {
        routes: {
      user_show: "{!! route('user.show') !!}",
      profile_approve: "{!! route('profile.approve') !!}",
      profile_remarks_store: "{!! route('profile.remarks.store') !!}"
        }
    };
	</script>
 <script type="text/javascript">
 	$(document).on('click','.approve_profile_btn',function(e){
 		 e.preventDefault();
		    var id = $(this).data('id');
		     $('#work_experience_view_table > tbody').empty();
		     $('#educational_qualification_view_table > tbody').empty();
		     $('#skill_view_table > tbody').empty();
          var $this = $(this);
		    $.ajax({
		    url:config.routes.profile_approve,
		    type: "get", 
		    data: {  
		        id: id,
		    },
		    success: function(data){
          // $this.attr("disabled",true);
		    	// $this.prop("value", 'Enable Edit');
		    	if (data.success==true) {
		    	toastr.success('Approved successfully');
          $this.prop("disabled",true);
		    	}else{
		    	 toastr.error(data.message);
		    	}
		    }
		   });

 	});
 	$(document).on('submit','#add_remarks_form', function(e){
 		console.log("ApprovalButtonClicke");
 		 e.preventDefault();
		    var id = $(this).data('id');
		     $('#work_experience_view_table > tbody').empty();
		     $('#educational_qualification_view_table > tbody').empty();
		     $('#skill_view_table > tbody').empty();
		    $.ajax({
		    url:config.routes.profile_remarks_store,
	        method:"POST",
	        data:new FormData(this),
	        dataType:'JSON',
	        contentType: false,
	        cache: false,
	        processData: false,
		    success: function(data) {
		    	if (data.success==true) {
		    	toastr.success('Remark Send successfully');
		    	}else{
		    	 toastr.error(data.message);
		    	}
		    }
		   });

 	});
 	$(document).on('click','#view_employee_btn',function(e){
		    e.preventDefault();
		    var id = $(this).data('id');
		     $('#work_experience_view_table > tbody').empty();
		     $('#educational_qualification_view_table > tbody').empty();
		     $('#skill_view_table > tbody').empty();
		    $.ajax({
		    url:config.routes.user_show,
		    type: "get", 
		    data: {  
		        id: id,
		    },
		    success: function(data) {
		      $('#loading_loader').hide();
		        $('#view_employee_modal').modal('show');

		        $('#first_name_v').val(data.user.first_name+' '+data.user.middle_name+' '+data.user.last_name);
		        $('#identification_number_v').val(data.user.identification_number);
		        $('#identification_type_v').val(data.user.identification_type);
		        $('#mobile_number_v').val(data.user.mobile_number);
		        $('#permanent_address_v').val(data.user.permanent_address);
		        $('#present_address_v').val(data.user.present_address);
		        $('#gender_v').val(data.user.gender);
		        $('#blood_group_v').val(data.user.blood_group);
		        $('#medical_condition_v').val(data.user.medical_condition);
		        $('#dob_v').val(data.user.dob);

		        $('#email_v').val(data.user.email);
		        $('#emergency_person_name_v').val(data.user.emergency_person_name);
		        $('#emergency_relation_v').val(data.user.emergency_person_relation);
		        $('#emergency_number_v').val(data.user.emergency_number);
		        $('#discord_id_v').val(data.user.discord_id);
		        $('#fb_username_v').val(data.user.fb_username);
		        // $('#email_v').val(data.user.email);
		        // Financial Statements
		        if (data.user.user_information!='') {
		        if (data.user.user_information.financial_information!='') {
		         $('#personal_bank_name_v').val(data.user.user_information.financial_information.personal_bank_name);
		         $('#personal_bank_account_number_v').val(data.user.user_information.financial_information.personal_bank_account_number);
		         $('#personal_bank_account_name_v').val(data.user.user_information.financial_information.personal_bank_account_name);
		         $('#personal_bank_branch_name_v').val(data.user.user_information.financial_information.personal_bank_branch_name);
		         $('#personal_bank_branch_routing_number_v').val(data.user.user_information.financial_information.personal_bank_branch_routing_number);
		         $('#bkash_account_number_v').val(data.user.user_information.financial_information.bkash_account_number);
		         $('#bkash_account_type_v').val(data.user.user_information.financial_information.bkash_account_type);
		     }
		        // Financial Statements
		        $('#photo_v').attr("src", "images/users/"+data.user.photo);
		        // $('#designation_edit_form').find('#id').val(id);
		        // $('#designation_edit_form').find('#si').val(si);
		        var $radios = $('input:radio[name=gender]');
		    if($radios.is(':checked') === false) {
		        $radios.filter('[value='+data.user.gender+']').prop('checked', true);
		    }
		    // start whole user information
		     if (data.user.user_information!='') {
		    // start work experience view
		    if (data.user.user_information.work_experience!='') {
		     $.each(data.user.user_information.work_experience, function (i, experience) {
		           $("#work_experience_view_table > tbody:last-child").append("<tr><td>"+experience.title+"</td><td>"+experience.company+"</td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='"+experience.joinDate+"'></td><td><input type='date' class='form-control lefton'placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='"+experience.LeftDate+"'></td></tr>");        
		            });
		    }else{
		        $("#work_experience_view_table > tbody:last-child").append("<tr>No Work Experience</tr>");     
		    }
		     // end of work experience view
		     // start educational qualification view
		      if (data.user.user_information.educational_qualification!='') {
		     $.each(data.user.user_information.educational_qualification, function (i, qualification) {
		           $("#educational_qualification_view_table > tbody:last-child").append("<tr><td>"+qualification.degree+"</td><td>"+qualification.programOrGroup+"</td><td>"+qualification.institution+"</td><td>"+qualification.gpa+"</td><td>"+qualification.major+"</td><td>"+qualification.minor+"</td><td><input type='date' class='form-control lefton'  placeholder='Enter joinon date EX:dd-mm-yy' disabled aria-invalid='false'value='"+qualification.passingDate+"'></td></tr>");    
		            });
		    }else{
		        $("#educational_qualification_view_table > tbody:last-child").append("<tr>No Work Experience</tr>");     
		    }
		     // end educational qualification view 
		     // start employee skill view
		   if (data.user.user_information.skill!='') {
		     $.each(data.user.user_information.skill, function (i, skill) {
		           $("#skill_view_table > tbody:last-child").append("<tr><td>"+skill.category+"</td><td>"+skill.name+"</td><td>"+skill.workspace+"</td><td>"+skill.profeciency+"</td></tr>");  
		            });
		    }else{
		        $("#skill_view_table > tbody:last-child").append("<tr>No Work Experience</tr>");     
		    }
		     // end employee skill view 
		   }
		}
		     // end of whole user information 
		    }
		    // end of success 
		    });
});
 </script>
@endsection
  <!-- End custom js for this page-->
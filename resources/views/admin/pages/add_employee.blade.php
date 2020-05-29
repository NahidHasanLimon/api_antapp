@extends('layouts.admin')
@section('pagePluginStyle')
<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/ti-icons/css/themify-icons.css')}}">
   <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/select2/select2.min.css')}}">
 
    
  <!-- End plugin css for this page -->
@endsection
@section('pageLevelStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/dropify/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style type="text/css">
    .wizard > .steps .done a{
      background: #202021;
    }
    .wizard > .steps .current a{
       background: #898a92;
    }
    .w-25 {
     /* width: 15% !important;
      list-style: circle !important;*/
      /*border-radius: 50%;*/
  }
  .blockquote{
    padding: 0;
  }
  /*body.modal-open {
      overflow: hidden;
  }*/
  .modal .modal-dialog .modal-content .modal-body{
    padding: 3px 2px;
  }
  .modal .modal-dialog .modal-body .modal-body{
    padding: 3px 2px;
  }
  .wizard > .steps a{

  font-size: 0.675rem;
  }
  .wizard > .steps > ul > li {
      width: 14%;
    }
    /*for view*/
  .nav-pills .nav-link {
    border: 1px solid #c9ccd7;
    padding: .3rem .75rem;
  }
  .nav-pills-success .nav-link {
    color: #71c016;
  }
  ul, ol, dl {
    padding-left: 1rem;
    padding-right: 1rem;
    font-size: 1rem;
  }
  /*modal postion*/
  .modal .modal-dialog {
    margin-top: 10px;
  }
</style>
@endsection

@section('mainContent')
{{-- <div class="col-md-12 col-xl-12 grid-margin stretch-card" id="loading_loader" style="display: none;">
                      <div class="loader-demo-box">
                        <div class="jumping-dots-loader">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                    </div> --}}
{{-- plus button --}}
  <div class="row">
    <div class="col-12 grid-margin">
       <button type="button" class="btn btn-primary btn-lg btn-icon-text float-right"data-toggle="modal" data-target="#add_employee_modal" id="add_employee_btn">
                          <i class="ti-plus"></i>
                          Add Employee
                        </button>
    </div>
  </div>
  {{-- end of button row --}}
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
                    <li class="nav-item">
                      <a class="nav-link" id="pills-anthill-tab" data-toggle="pill" href="#pills-anthill" role="tab" aria-controls="pills-anthill" aria-selected="false">Anthill Info</a>
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
                    <div class="tab-pane fade" id="pills-anthill" role="tabpanel" aria-labelledby="pills-anthill-tab">
                      
                        <div class="media-body">
                          <p>
                              Coming Soon
                          </p>
                          
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
  {{-- add modal --}}
<div class="modal fade" id="add_employee_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{-- <p>Modal body text goes here.</p> --}}
                          {{-- FORM wizard --}}
                          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  {{-- <h4 class="card-title">jquery-steps wizard</h4> --}}
                  <form id="add_employee_form" action="#">
                    @csrf
                    <div>
                      
            

                      <h3>Personal Info</h3>
                      <section>
                        <h3>Personal Info</h3>
                         <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name" id="first_name" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Middle Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="middle_name" id="middle_name">
                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text"  name="last_name" id="last_name" class="form-control">
                          </div>
                        </div>
                      </div>
                      
                    </div>

                      <div class="row">
                         <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth *</label>
                          <div class="col-sm-9">
                            <input type="text" name="dob" id="dob" class="form-control" data-date-format="dd/mm/yyyy"  data-provide="datepicker" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender *</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="genderMale" value="male" checked="">
                                Male
                                {{-- <i class="icon-user-female"></i> --}}
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="genderFemale" value="female">
                                Female
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bood Group *</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="blood_group" name="blood_group" required="">
                              <option value="">Select a Blood Group</option>
                              <option value="a+" >A+</option>
                              <option value="b+" >B+</option>
                              <option value="0+" >O+</option>
                              <option value="ab+">AB+</option>
                              <option value="a-" >A-</option>
                              <option value="b-" >B-</option>
                              <option value="0-" >O-</option>
                              <option value="ab-" >AB-</option>
                            </select>
                          </div>
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Medical Condition</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="medical_condition" name="medical_condition" >
                          </div>
                        </div>
                      </div>
                    </div>        

                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Identification Type*</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="identification_type" name="identification_type" required="">
                              <option value="">Select Identification Type</option>
                              <option value="nid" >NID</option>
                              <option value="birth certificate" >Birth Certificate</option>
                              <option value="passport" >Passport</option>
                              <option value="driving license" >Driving License</option>
                             
                            </select>
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Identification No *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="identification_number" name="identification_number" required="">
                          </div>
                        </div>
                      </div>
                    </div>  
                       
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Choose Identification Photo *</label>
                          <div class="col-sm-9">
                            {{-- <input type="file" class="form-control" name="identification_photo" id="identification_photo" required> --}}
                            <input type="file" class="dropify"  name="identification_photo" id="identification_photo" required>
    {{-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> --}}
                          </div>
                        </div>
                          <blockquote class="blockquote float-right ml-3">Both the back and front side of the Identification should be included</blockquote>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Choose Employee's Photo *</label>
                          <div class="col-sm-6">
                            <input type="file" class="dropify"  name="photo" id="photo"  required>
    {{-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> --}}
                          </div>
                        </div>
                         <blockquote class="blockquote float-left"> Picture uploaded must be a square. and have a 1:1 ratio</blockquote>
                      </div>
                    
                    </div>  
                    
                      </section>
                      <h3>Contact Info</h3>
                      <section>
                        <h3>Contact Info</h3>
                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile Number *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email *</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" required="">
                          </div>
                        </div>
                      </div>
                    </div> 
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Present Address *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="present_address" name="present_address" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Permanent Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="permanent_address" id="permanent_address" >
                          </div>
                        </div>
                      </div>
                    </div>  
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Facebook Username *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="fb_username" name="fb_username" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Contact Person*</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="emergency_person_name" id="emergency_person_name" required="">
                          </div>
                        </div>
                      </div>
                    </div>  
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Person Relation*</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="emergency_relation" name="emergency_relation" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Contact Number*</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="emergency_number" name="emergency_number" required="">
                          </div>
                        </div>
                      </div>
                   
                    </div> 
                    <div class="row">
                      
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Discord ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="discord_id" id="discord_id">
                          </div>
                        </div>
                      </div>
                    </div>  
                      </section>
                     

                
                      <h3>Financial Info</h3>
                      <section>
                        <h3>Financial Info</h3>

                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_bank_name" name="personal_bank_name">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Account Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_bank_account_name" id="personal_bank_account_name">
                          </div>
                        </div>
                      </div>
                    </div>   
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Account Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_bank_account_number" name="personal_bank_account_number">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Branch Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_bank_branch_name" id="personal_bank_branch_name">
                          </div>
                        </div>
                      </div>
                    </div>  
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Branch Routing Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_bank_branch_routing_number" name="personal_bank_branch_routing_number">
                          </div>
                        </div>
                      </div>
                    </div> 
                    <h3>Bkash Info</h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bkash Account Numer</label>
                          <div class="col-sm-9">
                            
                            <input type="text" class="form-control" id="bkash_account_number" name="bkash_account_number">
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bkash Account Type</label>
                          <div class="col-sm-9">
                           <select class="form-control" name="bkash_account_type" id="bkash_account_type">
                              <option value="">Select an Account Type</option>
                              <option value="personal">Personal</option>
                              <option value="agent">Agent</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                      </section>
                       {{-- start of Skills --}}
                        <h3>Skills</h3>
                                    <section>
                                      <h3>Skills</h3>
                                         <div class="container">
                                          <div class="table-responsive">
                                            <table class="table table-striped" id="skill_table">
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
                                           <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_skill();">
                          <i class="ti-plus"></i></button>
                                            
                                          </div>
                                           
                                         </div>  
                                    </section>
                                    {{-- end of Skills --}}
                      {{-- start of educational qualification --}}
                        <h3>Educational Info</h3>
                                    <section>
                                      <h3>Educational Info</h3>
                                         <div class="container">
                                          <div class="table-responsive">
                                            <table class="table table-striped" id="educational_qualification_table">
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
                                           <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_eq();">
                          <i class="ti-plus"></i></button>
                                            
                                          </div>
                                           
                                         </div>  
                                    </section>
                                    {{-- end of educational qualification --}}
                      {{-- start of Work  Experience --}}
                        <h3>Work Info</h3>
                      <section>
                        <h3>Work Info</h3>
                              
                           <div class="container">
                            <div class="table-responsive">
                              <table class="table table-striped" id="work_experience_table">
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
                               {{-- <input type="button" onclick="add_row();" value="ADD ROW"> --}}
                           <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row();">
                          <i class="ti-plus"></i></button>
                            
                            </div>
                             
                           </div>  
                      </section>
                      {{-- end of Work Expereince --}}
                      <h3>Ant Hill Info</h3>
                      <section>
                        <h3>Ant Hill Info</h3>
                        <label>Coming Soon</label>
                      </section>
                     {{--  <h3>Finish</h3>
                      <section>
                        <h3>Finish</h3>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            I agree with the Terms and Conditions.
                          </label>
                        </div>
                      </section> --}}
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
                          {{-- FORM wizard --}}
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div> --}}
                      </div>
                    </div>
                  </div>
  {{-- add modal --}}
  {{-- edit modal --}}
<div class="modal fade" id="edit_employee_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  {{-- data-keyboard="false" data-backdrop="static" --}}
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{-- <p>Modal body text goes here.</p> --}}
                          {{-- FORM wizard --}}
                          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  {{-- <h4 class="card-title">jquery-steps wizard</h4> --}}
                  <form id="edit_employee_form" action="#">
                    @csrf
                    <input type="hidden" name="edit_user_id" id="edit_user_id">
                    <div>

                
                      <h3>Personal Info</h3>
                      <section>
                        <h3>Personal Info</h3>
                         <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name_edit" id="first_name_edit" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Middle Name</label>
                          <div class="col-sm-9">
                            <input type="text"  name="middle_name_edit" id="middle_name_edit" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text"  name="last_name_edit" id="last_name_edit" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">DOB *</label>
                          <div class="col-sm-9">
                           {{--  <input type="date" class="form-control" id="dob_edit" name="dob_edit" required=""> --}}
                             <input type="text" name="dob_edit" id="dob_edit" class="form-control" data-date-format="dd/mm/yyyy"  data-provide="datepicker" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender *</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender_edit" id="genderMale_edit" value="male">
                                Male
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender_edit" id="genderFemale_edit" value="female">
                                Female
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Blood Group *</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="blood_group_edit" name="blood_group_edit" required="">
                               <option value="">Select a Blood Group</option>
                              <option value="a+" >A+</option>
                              <option value="b+" >B+</option>
                              <option value="0+" >O+</option>
                              <option value="ab+">AB+</option>
                              <option value="a-" >A-</option>
                              <option value="b-" >B-</option>
                              <option value="0-" >O-</option>
                              <option value="ab-">AB-</option>
                            </select>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Medical Condition</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="medical_condition_edit" name="medical_condition_edit">
                          </div>
                        </div>
                      </div>
                    </div> 
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Identification Type*</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="identification_type_edit" name="identification_type_edit" required="">
                              <option value="">Select Identification Type</option>
                              <option value="nid" >NID</option>
                              <option value="birth certificate" >Birth Certificate</option>
                              <option value="passport" >Passport</option>
                              <option value="driving license" >Driving License</option>
                             
                            </select>
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Identification No *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="identification_number_edit" name="identification_number_edit" required="">
                          </div>
                        </div>
                      </div>
                    </div>
                       
                      <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Choose Identification Photo *</label>
                          <div class="col-sm-9">
                            {{-- <input type="file" class="form-control" name="identification_photo_edit" id="identification_photo_edit" required> --}}
                             <input type="file" class="dropify" name="identification_photo_edit" id="identification_photo_edit" data-default-file=""  />

    {{-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> --}}
                          </div>
                        </div>
                          <blockquote class="blockquote">Both the back and front side of the Identification hould be included</blockquote>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Choose Photo * </label>

                         
                         
                          <div class="col-sm-6">
                            {{-- <input type="file" class="form-control" name="photo_edit" id="photo_edit" required> --}}
                            <input type="file" class="dropify" name="photo_edit" id="photo_edit" data-default-file=""  />


    {{-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> --}}
                          </div>
                        </div>
                        <blockquote class="blockquote float-left"> Picture uploaded must be a square. and have a 1:1 ratio</blockquote>
                      </div>
                   
                    </div>  
                    

                     
                      </section>
                      <h3>Contact Info</h3>
                      <section>
                        <h3>Contact  Info</h3>
                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile No *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="mobile_number_edit" name="mobile_number_edit" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_edit" id="email_edit">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Present Address *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="present_address_edit" name="present_address_edit" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Permanent Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="permanent_address_edit" id="permanent_address_edit">
                          </div>
                        </div>
                      </div>
                    </div>    
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Facebook Username *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="fb_username_edit" name="fb_username_edit" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Person Name *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="emergency_person_name_edit" id="emergency_person_name_edit" required="">
                          </div>
                        </div>
                      </div>
                    </div>  
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Person Relation*</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="emergency_relation_edit" name="emergency_relation_edit" required="">
                          </div>
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Number*</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="emergency_number_edit" name="emergency_number_edit" required="">
                          </div>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Discord ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="discord_id_edit" id="discord_id_edit">
                          </div>
                        </div>
                      </div>
                    </div>  
                    
                      </section>
                      <h3>Financial Info</h3>
                      <section>
                        <h3>Financial Info</h3>

                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_bank_name_edit" name="personal_bank_name_edit">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Account Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_bank_account_name_edit" id="personal_bank_account_name_edit">
                          </div>
                        </div>
                      </div>
                    </div>   
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Account Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_bank_account_number_edit" name="personal_bank_account_number_edit">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Branch Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_bank_branch_name_edit" id="personal_bank_branch_name_edit">
                          </div>
                        </div>
                      </div>
                    </div>  
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Personal Bank Branch Routing Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="personal_bank_branch_routing_number_edit" name="personal_bank_branch_routing_number_edit">
                          </div>
                        </div>
                      </div>
                    </div> 
                    <h3>Bkash Information</h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bkash Account Numer</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="bkash_account_number_edit" name="bkash_account_number_edit">
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bkash Account Type</label>
                          <div class="col-sm-9">
                             <select class="form-control" name="bkash_account_type_edit" id="bkash_account_type_edit">
                              <option value="">Select an Account Type</option>
                              <option value="personal">Personal</option>
                              <option value="agent">Agent</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                      </section>
                               {{-- start of Work  Experience --}}
                        <h3>Skills</h3>
                      <section>
                        <h3>Skills</h3>
                              
                           <div class="container">
                            <div class="table-responsive">
                              <table class="table table-striped" id="skill_table_edit">
                                <thead >
                                  <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Applicability on Workspace</th>
                                    <th>Profeciency Level</th>
                                  </tr>
                                </thead>
                                <tbody id="skill_edit_tbody">
                                  
                                    
                                </tbody>
                              </table>
                            <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_skill_edit();"><i class="ti-plus"></i></button>
                            </div>
                            {{-- end of table responsive div --}}
                             
                           </div>  
                      </section>
                      {{-- end of Work Expereince --}}

                        {{-- start of educational qualification --}}
                        <h3>Educational Info</h3>
                                    <section>
                                      <h3>Educational Info</h3>
                                         <div class="container">
                                          <div class="table-responsive">
                                            <table class="table table-striped" id="educational_qualification_table_edit">
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
                                              <tbody id="educational_qualification_edit_tbody">
                                              </tbody>
                                            </table>
                                           <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_eq_edit();"><i class="ti-plus"></i></button>
                                          </div>
                                           
                                         </div>  
                                    </section>
                                    {{-- end of educational qualification --}}
                        {{-- start of Work  Experience --}}
                        <h3>Work Info</h3>
                      <section>
                        <h3>Work Info</h3>
                              
                           <div class="container">
                            <div class="table-responsive">
                              <table class="table table-striped" id="work_experience_table_edit">
                                <thead >
                                  <tr>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Joined Date</th>
                                    <th>Left Date</th>
                                  </tr>
                                </thead>
                                <tbody id="work_experience_edit_tbody">
                                  
                                    
                                </tbody>
                              </table>
                                <button type="button" class="btn btn-primary btn-sm btn-icon-text"onclick="add_row_we_edit();"><i class="ti-plus"></i></button>
                            </div>
                            {{-- end of table responsive div --}}
                             
                           </div>  
                      </section>
                      {{-- end of Work Expereince --}}
                      <h3>Ant Hill Info</h3>
                      <section>
                        <h3>Ant Hill  Info</h3>
                        <label>Coming Soon</label>
                      </section>
                     {{--  <h3>Finish</h3>
                      <section>
                        <h3>Finish</h3>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            I agree with the Terms and Conditions.
                          </label>
                        </div>
                      </section> --}}
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
                          {{-- FORM wizard --}}
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div> --}}
                      </div>
                    </div>
                  </div>
  {{-- edit modal --}}
   
 
{{-- table --}}
  <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                   {{-- <button type="button" class="btn btn-primary btn-lg btn-icon-text float-right"data-toggle="modal" data-target="#add_employee_modal"> <i class="ti-plus"></i>Add Employee</button> --}}
                  <h4 class="card-title">Employees</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                     {{--  <div class="alert alert-warning" role="alert">
                          <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                      </div> --}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="employee_list_table" class="table">
                          <thead>
                            <tr class="bg-dark text-white">
                                <th>Sl #</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                           @foreach ($users as $user)
                                    <tr class="unique_user{{$user->id}}" id="deleterownumber{{$user->id}}">
                                        <td>{{$loop->index +1}}</td>
                                        <td><img class="" src="/images/users/{{$user->photo}}"></td>
                            
                                {{-- <td>{{$user->first_name }}</td> --}}
                                <td>{!! $user->first_name.' '.$user->middle_name.' '.$user->last_name!!}</td>
                                <td>{{$user->mobile_number}}</td>
                                <td>{{$user->email}}</td>
                               
                               
                                <td>
                                  <button class="btn btn-dark view_employee_btn_class" data-id="{{$user->id}}" id="view_employee_btn" >
                                    <i class="ti-eye text-primary"></i>View
                                  </button> 
                                  <button class="btn btn-dark edit_employee_btn_class" data-id="{{$user->id}}"  id="edit_employee_btn">
                                    <i class="ti-edit text-primary"></i>Edit
                                  </button>
                                  <button class="btn btn-dark delete_employee_btn_class" data-id="{{$user->id}}" id="delete_employee_btn">
                                    <i class="ti-edit text-primary"></i>Delete
                                  </button>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
{{-- table --}}
  
@endsection

 <!-- plugin js for this page -->
@section('pagePluginScript')
{{-- <script src="{{asset('backend/vendors/jquery-steps/jquery.steps.min.js')}}"></script> --}}
<script src="{{asset('backend/vendors/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}">

</script>
 <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
     <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>

    <script src="{{asset('backend/js/select2.js')}}"></script>
   

 
  
</script>
  <!-- End plugin js for this page -->
  @endsection
  @section('pageLevelScript')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
       <script src="{{asset('backend/vendors/dropify/dropify.min.js')}}"></script>
   <!-- Custom js for this page-->
    
   <script>
    function add_row()
{
 $rowno=$("#work_experience_table tbody>tr").length;
 $rowno=$rowno+1;
 $("#work_experience_table > tbody:last-child").append("<tr id='row_we_add"+$rowno+"'><td><input type='text' class='form-control'  name='we_jobTitle[]' placeholder='Enter Name'></td><td><input type='text'  class='form-control' name='we_companyName[]' placeholder='Enter Company'></td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><input type='date' class='form-control lefton'  name='we_leftDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row('row_we_add"+$rowno+"')><i class='ti-minus'></i></button></td></tr>");
} 
function add_row_we_edit()
{
 // $rowno=$("#work_experience_table_edit tbody>tr").length;
 // $rowno=$rowno+1;
 $row_track_id = $('#work_experience_table_edit tbody>tr:last').data('row_track');
  if($row_track_id==null){
    $row_track_id=1;
  }else{
    $row_track_id=$row_track_id+1;
  }
 $("#work_experience_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_we_edit"+$row_track_id+"'><td><input type='text' class='form-control'  name='we_jobTitle[]' placeholder='Enter Name'></td><td><input type='text'  class='form-control' name='we_companyName[]' placeholder='Enter Company'></td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><input type='date' class='form-control lefton'  name='we_leftDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row('row_we_edit"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
} 
  function add_row_skill()
{

  $row_track_id = $('#skill_table tbody>tr:last').data('row_track');
  if($row_track_id==null){
    $row_track_id=1;
  }else{
    $row_track_id=$row_track_id+1;
  }
 $("#skill_table > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_sk_add"+$row_track_id+"'><td><input type='text' class='form-control'  name='sk_category[]' placeholder='Enter Skill Category'></td><td><input type='text' class='form-control'  name='sk_name[]' placeholder='Enter Skill Name'></td><td><select class='form-control' name='sk_workspace[]' id='selectApplicabilityWorkspace_sk"+$row_track_id+"'></select></td><td><select class='form-control' name='sk_profeciency[]' id='selectProfeciency_sk"+$row_track_id+"'></select></td><td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_skill('row_sk_add"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
      addListToSkill($row_track_id);

}
    function addListToSkill($rowno){
          $.each(applicabilityList, function(key, value){   
                $('#selectApplicabilityWorkspace_sk'+$rowno)
                     .append($("<option></option>")
                                .attr("value",key)
                                .text(value)); 
            });
            $.each(profeciencyLevelList, function(key, value){   
                $('#selectProfeciency_sk'+$rowno)
                     .append($("<option></option>")
                                .attr("value",key)
                                .text(value)); 
        });
}
function add_row_skill_edit()
{

  $row_track_id = $('#skill_table_edit tbody>tr:last').data('row_track');
  if($row_track_id==null){
    $row_track_id=1;
  }else{
    $row_track_id=$row_track_id+1;
  }
 $("#skill_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_sk_edit"+$row_track_id+"'><td><input type='text' class='form-control'  name='sk_category[]' placeholder='Enter Skill Category'></td><td><input type='text' class='form-control'  name='sk_name[]' placeholder='Enter Skill Name'></td><td><select class='form-control' name='sk_workspace[]' id='selectApplicabilityWorkspace_sk"+$row_track_id+"'></select></td><td><select class='form-control' name='sk_profeciency[]' id='selectProfeciency_sk"+$row_track_id+"'></select></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_skill('row_sk_edit"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
  addListToSkill($row_track_id);
} 
 
var degreeList = { 
          "": "Select an option", 
          "SSC": "SSC", 
          "A Level": "A Level",
          "Dakhil": "Dakhil",
          "HSC": "HSC",
          "Alim": "Alim",
          "BBA": "BBA",
          "BSC": "BSC",
          "Honours Equivalent": "Honours Equivalent",
          "Fazil": "Fazil",
          "MBA": "MBA",
          "MSC": "MSC",
          "Master's Equivalent": "Master's Equivalent",
          "Kamil": "Kamil",
          "Deploma": "Deploma",
              };
  var applicabilityList = { 
          "": "Select an option", 
          "YES": "YES", 
          "NO": "NO"
              }; 
  var  profeciencyLevelList = { 
          "": "Select an option", 
          "Beginner": "Beginner",
          "Intermediate": "Intermediate",
          "Advanced": "Advanced", 
              };
 // $rowno=0;
  function add_row_eq()
{
 
   $row_track_id = $('#educational_qualification_table tbody>tr:last').data('row_track');
  if($row_track_id==null){
    $row_track_id=1;
  }else{
    $row_track_id=$row_track_id+1;
  }
 $("#educational_qualification_table > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_eq_add"+$row_track_id+"'><td><select class='form-control' name='eq_degree[]' id='selectDegree_eq"+$row_track_id+"'></select></td><td><input type='text' class='form-control'  name='eq_programOrGroup[]' placeholder='Enter program Name'></td><td><input type='text'  class='form-control' name='eq_institution[]' placeholder='Enter Institution name'></td><td><input type='text'  class='form-control' name='eq_gpa[]' placeholder='Enter GPA '></td><td><input type='text'  class='form-control' name='eq_major[]' placeholder='Enter Major '></td><td><input type='text'  class='form-control' name='eq_minor[]' placeholder='Enter Minor '></td><td><input type='date' class='form-control joinon' name='eq_passingDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_eq('row_eq_add"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
       addDegreeListToEducational($row_track_id);
}  
 function add_row_eq_edit()
{

  $row_track_id = $('#educational_qualification_table_edit tbody>tr:last').data('row_track');
  if($row_track_id==null){
    $row_track_id=1;
  }else{
    $row_track_id=$row_track_id+1;
  }
 $("#educational_qualification_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_eq_edit"+$row_track_id+"'><td><select class='form-control' name='eq_degree[]' id='selectDegree_eq"+$row_track_id+"'></select></td><td><input type='text' class='form-control'  name='eq_programOrGroup[]' placeholder='Enter program Name'></td><td><input type='text'  class='form-control' name='eq_institution[]' placeholder='Enter Institution name'></td><td><input type='text'  class='form-control' name='eq_gpa[]' placeholder='Enter GPA '></td><td><input type='text'  class='form-control' name='eq_major[]' placeholder='Enter Major '></td><td><input type='text'  class='form-control' name='eq_minor[]' placeholder='Enter Minor '></td><td><input type='date' class='form-control joinon' name='eq_passingDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_eq('row_eq_edit"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
  addDegreeListToEducational($row_track_id);
}  
     function addDegreeListToEducational($rowno){
             $.each(degreeList, function(key, value){   
              $('#selectDegree_eq'+$rowno)
                   .append($("<option></option>")
                              .attr("value",key)
                              .text(value)); 
          });
      }
    function delete_row(rowno)
    {
     $('#'+rowno).remove();
    }
    function delete_row_eq(rowno)
    {
     $('#'+rowno).remove();
    }
    function delete_row_skill(rowno)
    {
     $('#'+rowno).remove();
    }
        
</script>

  <script type="text/javascript">
    var table_employee=$('#employee_list_table').DataTable({
                responsive: true
            });

// end of validation
   var config = {
        routes: {
          user_store: "{!! route('user.store') !!}",
          user_show: "{!! route('user.show') !!}",
          user_edit: "{!! route('user.edit') !!}",
          user_update: "{!! route('user.update') !!}",
          user_destroy: "{!! route('user.destroy') !!}",
        }
    };
    // end of route
    // document ready
      (function($) {
         "use strict";
         // on close start from first tab
         $('div[name=view_employee_modal]').on("hidden.bs.modal", function () {
        $('#view_employee_modal a:first').tab('show');
    });
           // on close start from first tab

        var validationForm = $("#add_employee_form");
      validationForm.valid({
        errorPlacement: function errorPlacement(error, element) {
          element.before(error);
        },
        rules: {
          email:
          {
            required:true,
          },
          first_name:
          {
            required:true,
          }, dob:
          {
            required:true,
          }, gender:
          {
            required:true,
          }, present_address:
          {
            required:true,
          },
         
        },
         messages: {
        email: {
            required: "Please enter your email ",
        },
        first_name: {
            required: "enter your first name",
        },
        },
      });
  validationForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
      validationForm.valid({
        ignore: [":disabled", ":hidden"]
      })
      return validationForm.valid();
    },
    onFinishing: function(event, currentIndex) {
      validationForm.valid({
        ignore: [':disabled']
      })
      return validationForm.valid();
    },
    onFinished: function(event, currentIndex) {
      // alert("Submitted!");
      // alert(validationForm);
           if( confirm('Want to Add Employee?')){
           $.ajax({
           url:config.routes.user_store, 
          type: "POST",           
          data: new FormData(add_employee_form), 
          contentType: false,      
          cache: false,            
          processData:false,
    beforeSend: function(){
     // $("#loading_loader").show();
   },
   complete: function(){
     // $("#loading_loader").hide();
   },       
          success: function(data)  
          {
           // $("#loading_loader").hide();
             console.log(data.user);
             if(data.user!=""){
               toastr.success('Employee Saved successfully');
               // location.reload();
              table_employee.row.add([
                '##',
               '<img id="theImg" src=images/users/'+data.user.photo+' />', 
                ''+data.user.first_name+'',
               ''+data.user.mobile_number+'',
               ''+data.user.email+'',
                '`<button id="view_employee_btn" class="btn btn-dark view_employee_btn_class" data-id='+data.user.id+'><i class="ti-eye text-primary"></i>View</button>``<button id="edit_employee_btn" class="bbtn btn-dark edit_employee_btn_class" data-id='+data.user.id+'><i class="ti-arrow-circle-right"></i>Edit</button>`<button id="delete_employee_btn" class="btn btn-dark delete_employee_btn_class" data-id='+data.user.id+'><i class="ti-arrow-circle-right"></i>Delete</button>`'


               ]);
              table_employee.draw();
               setTimeout(function() {$('#add_employee_modal').modal('hide');}, 1500);
               $("#add_employee_form").steps('reset');
               $('#add_employee_form').trigger('reset');
               // return validationForm.valid();
               validationForm.children("div").steps('reset');


             }else{
              toastr.error('Failed To Add Employee');
            
             }
            
            
          
          }, 
          error: function (request, status, error) {
        // alert(request.responseText);
        alert("Failed to Save ! Check Email and all Required Fields");
    }
          });
        }
    }
  });
  // end of add wizard

// edit form wizard
 
        var validationFormEdit = $("#edit_employee_form");
  validationFormEdit.valid({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      first_name:
      {
        required:true,
      }
     
    }
  });
  validationFormEdit.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
      validationFormEdit.valid({
        ignore: [":disabled", ":hidden"]
      })
      // console.log(validationFormEdit.children("div").steps("getCurrentIndex"));
      // console.log($("#edit_employee_form").children("div").steps("getCurrentIndex"));
      return validationFormEdit.valid();
    },
    onFinishing: function(event, currentIndex) {
      validationFormEdit.valid({
        ignore: [':disabled']
      })
      return validationFormEdit.valid();
    },
    onFinished: function(event, currentIndex) {
      // alert("Submitted!");
     if( confirm('Want to Update Employee?')){
         $.ajax({
           url:config.routes.user_update,
          type: "POST",             
          data: new FormData(edit_employee_form), 
          contentType: false,      
          cache: false,            
          processData:false, 
            beforeSend: function(){
     // $("#loading_loader").show();
   },
   complete: function(){
     // $("#loading_loader").hide();
   },        // To send DOMDocument or non processed data file it is set to false
          success: function(data)   // A function to be called if request succeeds
          {
             // $("#loading_loader").hide();
             console.log(data);
             // toastr.success('Employee updated successfully');
             if(data.user!="" ){
              // setTimeout(function() {$('#edit_employee_modal').modal('hide');}, 1500);
            // $('#edit_employee_form').trigger('reset');
                toastr.success('Employee Updated successfully');
                // location.reload();
             // location.reload(true);
             // return validationFormEdit.valid();
             }else{
               toastr.error('Employee Failed To Update');
             }
          
          },
    error: function (request, status, error) {
        // alert(request.responseText);
        alert("Failed to Save ! Check Email and all Required Fields");
    }
          });
       }
    }
  });
  // end of edit wizard

  
    // Delete
})(jQuery);
  </script>
  <script type="text/javascript">
    // view
    $(document).on('click','#view_employee_btn',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='show';
     $('#work_experience_view_table > tbody').empty();
     $('#educational_qualification_view_table > tbody').empty();
     $('#skill_view_table > tbody').empty();
    $.ajax({
    url:config.routes.user_show,
    type: "get", 
    data: {  
        id: id, 
        type:type,
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
        
         $('#personal_bank_name_v').val(data.user.user_information.financial_information.personal_bank_name);
         $('#personal_bank_account_number_v').val(data.user.user_information.financial_information.personal_bank_account_number);
         $('#personal_bank_account_name_v').val(data.user.user_information.financial_information.personal_bank_account_name);
         $('#personal_bank_branch_name_v').val(data.user.user_information.financial_information.personal_bank_branch_name);
         $('#personal_bank_branch_routing_number_v').val(data.user.user_information.financial_information.personal_bank_branch_routing_number);
         $('#bkash_account_number_v').val(data.user.user_information.financial_information.bkash_account_number);
         $('#bkash_account_type_v').val(data.user.user_information.financial_information.bkash_account_type);
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
     // end of whole user information 
    }
    // end of success 
    });
});
    // edit Button
      // view
//       $(function() {
//     console.log( "ready!" );
//     console.log($("#edit_employee_form").steps("getCurrentIndex"));
// });
 $(document).on('click','#add_employee_btn',function(e){
   $('#work_experience_table > tbody').empty();
   $('#educational_qualification_table > tbody').empty();
   $('#skill_table > tbody').empty();
 });
    $(document).on('click','#edit_employee_btn',function(e){
      // alert(validationForm);
       // validationForm.steps("reset");
       // validationFormEdit.steps("reset");
       // validationFormEdit.children("div").steps("reset")
         $('#work_experience_table_edit > tbody').empty();
         $('#educational_qualification_table_edit > tbody').empty();
         $('#skill_table_edit > tbody').empty();
         $("#edit_employee_form").children("div").steps("reset");
console.log($("#edit_employee_form").children("div").steps("reset"));
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.user_edit,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
        $('#loading_loader').hide();
        if(data.user!=null){
          $('#edit_employee_modal').modal('show');

        $('#edit_employee_form').find('#edit_user_id').val(data.user.id);
        $('#first_name_edit').val(data.user.first_name);
        $('#middle_name_edit').val(data.user.middle_name);
        $('#last_name_edit').val(data.user.last_name);
        $('#identification_number_edit').val(data.user.identification_number);
        $('#mobile_number_edit').val(data.user.mobile_number);
        $('#permanent_address_edit').val(data.user.permanent_address);
        $('#present_address_edit').val(data.user.present_address);
        $('#gender_edit').val(data.user.gender);
        $('#blood_group_edit').val(data.user.blood_group);
        $('#medical_condition_edit').val(data.user.medical_condition);

        $('#email_edit').val(data.user.email);
        $('#emergency_person_name_edit').val(data.user.emergency_person_name);
        $('#emergency_relation_edit').val(data.user.emergency_person_relation);
        $('#emergency_number_edit').val(data.user.emergency_number);
        $('#discord_id_edit').val(data.user.discord_id);
        $('#fb_username_edit').val(data.user.fb_username);
        // $('#email_edit').val(data.user.email);
         $('#identification_type_edit option[value="' + data.user.identification_type + '"]').prop('selected', true);
        // $('#photo_edit').attr("src", "images/users/"+data.user.photo);
        var photoUrl = "images/users/"+data.user.photo;
            var drEvent = $('#photo_edit').dropify(
            {
              defaultFile: photoUrl
            });
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = photoUrl;
            drEvent.destroy();
            drEvent.init();  
            // for nid
            var nidUrl = "images/users/identifications/"+data.user.identification_photo;
            var drEvent = $('#identification_photo_edit').dropify(
            {
              defaultFile: nidUrl
            });
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = nidUrl;
            drEvent.destroy();
            drEvent.init();
           var [year, month, day] = [...data.user.dob.split('-')]
           var formattedDate=day+'/'+month+'/'+year;
           $('#dob_edit').datepicker( 'setDate', formattedDate );
          var $radios = $('input:radio[name=gender_edit]');
      if($radios.is(':checked') === false) {
          $radios.filter('[value='+data.user.gender+']').prop('checked', true);
          }

        // Financial Statements
        if(data.user.user_information!=null){

          if(data.user.user_information.financial_information!=null){
             $('#personal_bank_name_edit').val(data.user.user_information.financial_information.personal_bank_name);
             $('#personal_bank_account_number_edit').val(data.user.user_information.financial_information.personal_bank_account_number);
             $('#personal_bank_account_name_edit').val(data.user.user_information.financial_information.personal_bank_account_name);
             $('#personal_bank_branch_name_edit').val(data.user.user_information.financial_information.personal_bank_branch_name);
             $('#personal_bank_branch_routing_number_edit').val(data.user.user_information.financial_information.personal_bank_branch_routing_number);
             $('#bkash_account_number_edit').val(data.user.user_information.financial_information.bkash_account_number);
             $('#bkash_account_type_edit').val(data.user.user_information.financial_information.bkash_account_type);
          }
       
        // Financial Statements
         

  // start of whole user information edit
        $row_track_id_experience = $('#work_experience_table_edit tbody>tr:last').data('row_track');
        if($row_track_id_experience==null){
              $row_track_id_experience=1;
            }else{
              $row_track_id_experience=$row_track_id_experience+1;
         }
         $row_track_id_qualification = $('#educational_qualification_table_edit tbody>tr:last').data('row_track');
        if($row_track_id_qualification==null){
              $row_track_id_qualification=1;
            }else{
              $row_track_id_qualification=$row_track_id_qualification+1;
         }

        $row_track_id_skill = $('#skill_table_edit tbody>tr:last').data('row_track');
        if($row_track_id_skill==null){
              $row_track_id_skill=1;
            }else{
              $row_track_id_skill=$row_track_id_skill+1;
         }
     // end of all row no
    // start work_experience
    if(data.user.user_information.work_experience!=''){
    $.each(data.user.user_information.work_experience, function (i, experience) {
           $("#work_experience_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id_experience+"' id='row_we_edit"+$row_track_id_experience+"'><td><input type='text' class='form-control'  name='we_jobTitle[]' placeholder='Enter Job Title' value='"+experience.title+"'></td><td><input type='text'  class='form-control' name='we_companyName[]' placeholder='Enter company' value='"+experience.company+"'></td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'value='"+experience.joinDate+"'></td><td><input type='date' class='form-control lefton'  name='we_leftDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'value='"+experience.LeftDate+"'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row('row_we_edit"+$row_track_id_experience+"')><i class='ti-minus'></i></button></td></tr>");
            $row_track_id_experience=$row_track_id_experience+1;

            });
  }
    // end of each
    // end work_experience
    // start educational qualification
    if(data.user.user_information.educational_qualification!=''){
    $.each(data.user.user_information.educational_qualification, function (i, qualification) {
          $("#educational_qualification_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id_qualification+"' id='row_eq_edit"+$row_track_id_qualification+"'><td><select class='form-control selectDegree_eq_edit_class' name='eq_degree[]' id='selectDegree_eq"+$row_track_id_qualification+"'></select></td><td><input type='text' class='form-control'  name='eq_programOrGroup[]' value='"+qualification.programOrGroup+"' placeholder='Enter program Name'></td><td><input type='text'  class='form-control' name='eq_institution[]'value='"+qualification.institution+"' placeholder='Enter Institution name'></td><td><input type='text'  class='form-control' name='eq_gpa[]'value='"+qualification.gpa+"' placeholder='Enter GPA '></td><td><input type='text'  class='form-control' name='eq_major[]' value='"+qualification.major+"'placeholder='Enter Major '></td><td><input type='text'  class='form-control' name='eq_minor[]' value='"+qualification.minor+"'placeholder='Enter Minor '></td><td><input type='date' class='form-control lefton'  name='eq_passingDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'value='"+qualification.passingDate+"'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_eq('row_eq_edit"+$row_track_id_qualification+"')><i class='ti-minus'></i></button></td></tr>");
            // end of each loop option
            addDegreeListToEducational($row_track_id_qualification);
          $('#selectDegree_eq'+$row_track_id_qualification).find('option:contains('+qualification.degree+')').prop("selected",true);
            $row_track_id_qualification=$row_track_id_qualification+1;
            });
    // end of main each loop
         }     

    // end  of educational qualification
        // start skill
    if(data.user.user_information.skill!=''){
       $.each(data.user.user_information.skill, function (i, skill) {
           $("#skill_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id_skill+"' id='row_sk_edit"+$row_track_id_skill+"'><td><input type='text' class='form-control'  name='sk_category[]' value='"+skill.category+"' placeholder='Enter Skill Category'></td><td><input type='text' class='form-control'  name='sk_name[]' value='"+skill.name+"' placeholder='Enter Skill Name'></td><td><select class='form-control' name='sk_workspace[]' id='selectApplicabilityWorkspace_sk"+$row_track_id_skill+"'></select></td><td><select class='form-control' name='sk_profeciency[]' id='selectProfeciency_sk"+$row_track_id_skill+"'></select></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_skill('row_sk_edit"+$row_track_id_skill+"')><i class='ti-minus'></i></button></td></tr>");
            addListToSkill($row_track_id_skill);

            $('#selectApplicabilityWorkspace_sk'+$row_track_id_skill).find('option:contains('+skill.workspace+')').prop("selected",true);
             $('#selectProfeciency_sk'+$row_track_id_skill).find('option:contains('+skill.profeciency+')').prop("selected",true);

            $row_track_id_skill=$row_track_id_skill+1;
            });
    // end of each
  }
    // end skill
  }
  // end of whole user information
}
// end of user

    }
    // end of success
    });
// end of ajax
});
// end of edit button click
    // edit
    // Delete
$('#employee_list_table tbody').on( 'click', '.delete_employee_btn_class', function (e) {
    e.preventDefault();
    var id = $(this).data('id');  
  if(confirm('Are You Sure to Delete ?')){
    // table_employee
    //     .row( $(this).parents('tr') )
    //     .remove()
    //     .draw();
      $.ajax({
    url:config.routes.user_destroy,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
      alert(table_employee);
       console.log(data);
      toastr.success('Employee Deleted successfully');
       table_employee.row( $(this).parents('tr') ).remove().draw();

    }
    });
  }
});
  </script>

  {{-- <script src="{{asset('backend/js/add-employee.js')}}"></script> --}}
  {{-- <script src="{{asset('backend/js/dropify.js')}}"></script> --}}
  <script type="text/javascript">
    (function($) {
  'use strict';
  //  $('#add_employee_modal').on('hidden', function() {
  //   clear()
  // });
  $('.dropify').dropify();
})(jQuery);
  </script>
{{-- <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"> --}}
  <!-- End custom js for this page-->
  @endsection
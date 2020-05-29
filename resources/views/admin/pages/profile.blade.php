@extends('layouts.admin')
@section('pagePluginStyle')
@endsection
{{--  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/css-stars.css')}}" /> --}}
@section('pageLevelStyle')
  <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/dropify/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style type="text/css">
  ul, ol, dl {
    padding-left: 1rem;
    /*font-size: 0.6rem;*/
}

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

  font-size: 0.775rem;
  }
  .wizard > .steps > ul > li {
      width: 16%;
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
  .tab-content{
  font-size: 0.785rem !important;
}
</style>
@endsection
<!-- start main conten -->
@section('mainContent')
		<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="border-bottom text-center pb-4">
                        <img src="https://via.placeholder.com/92x92" alt="profile" class="img-lg rounded-circle mb-3">
                        <div class="mb-3">
                          <h6>{{Auth::user()->first_name.''.' '.Auth::user()->middle_name.' '.Auth::user()->last_name}}</h6>
                          <div class="d-flex align-items-center">
                            
                          </div>
                        </div>
                        <p class="w-75 mx-auto mb-3">Designation</p>
                        <div class="d-flex justify-content-center">
                          {{-- <button class="btn btn-success mr-1">Edit Profile</button> --}}
                        </div>
                      </div>
                    
                      <div class="py-4">
                        <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                          <span class="float-right text-muted">
                            @if ($user->is_approved==0)
                              {{'Unapproved'}}
                            @else
                            {{'Approved'}}
                            @endif
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Mobile
                          </span>
                          <span class="float-right text-muted">
                           {{$user->mobile_number}}
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Email
                          </span>
                          <span class="float-right text-muted">
                           {{Auth::user()->email}}
                          </span>
                        </p>
                       
                      </div>
                      @if ($user->is_approved==0 && $remarks->isNotEmpty())
                        <div class="list-group p-2">
                          <a class="list-group-item list-group-item-action disabled">Remarks List</a>
                          @foreach ($remarks as $remark)
                           <a href="#" data-id="{{$remark->id}}" class="list-group-item list-group-item-action remarksList">
                            {{Str::limit($remark->description, $limit = 20, $end = '...') }}
                          </a>
                          @endforeach
                        </div>
                      @else
                      {{'No remarks'}}
                      @endif
                      @if ($user->is_approved==0)
                      <button class="btn btn-primary btn-block mb-2" id="edit_employee_btn">Edit Profile</button>
                      @endif
                    </div>
                    <div class="col-lg-9">
                      <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile</h4>
{{--                   <p class="card-description">Horizontal bootstrap tab</p> --}}
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false">Contact Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="financial-tab" data-toggle="tab" href="#financial-1" role="tab" aria-controls="financial-1" aria-selected="false">Financial Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="educational-tab" data-toggle="tab" href="#educational-1" role="tab" aria-controls="educational-1" aria-selected="false">Educational Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="work-tab" data-toggle="tab" href="#work-1" role="tab" aria-controls="work-1" aria-selected="false">Work Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill-1" role="tab" aria-controls="skill-1" aria-selected="false">Skills</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="profileTab">
                    <div class="tab-pane fade active show" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="media-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Name</label>
                            </div>
                             <div class="col-sm-6">
                              {{$user->first_name.' '.$user->middle_name.' '.$user->last_name}}
                            </div>
                          </div>
                          <hr>
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Date of Birth</label>
                            </div>
                             <div class="col-sm-6">
                              {{$user->dob}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Blood Group</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->blood_group}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Gender</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->gender}}
                            </div>
                          </div>
                          <hr>  
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Medical Condition</label>
                            </div>
                             <div class="col-sm-6">
                              {{$user->medical_condition}}
                            </div>
                          </div>
                          <hr> 
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Identification Type</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->identification_type}}
                            </div>
                          </div>
                          <hr> 
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Identification Number</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->identification_number}}
                            </div>
                          </div>
                          <hr> 
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Blood Group</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->blood_group}}
                            </div>
                          </div>
                          <hr> 
                             
                         
                        </div>
                      
                    </div>
                    <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                      <div class="media-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Mobile Number</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->mobile_number}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Personal Email</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->personal_email}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Present Address</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->present_address}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Permanent Address</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->permanent_address}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>FB Username</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->fb_username}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Emergency Contact Person</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->emergency_person_name}}
                            </div>
                          </div>
                          <hr> 
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Emergency Contact Person Relation</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->emergency_person_relation}}
                            </div>
                          </div>
                          <hr> 
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Emergency Contact Person Number</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->emergency_number}}
                            </div>
                          </div>
                          <hr>  
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Discord ID</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->discord_id}}
                            </div>
                          </div>
                          <hr>
                      </div>
                    </div>
                {{--     <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                      <div class="media-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Blood Group</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->blood_group}}
                            </div>
                          </div>
                          <hr>
                      </div>
                    </div> --}}
                     <div class="tab-pane fade" id="financial-1" role="tabpanel" aria-labelledby="financial-tab">
                        <div class="media-body">
                          @if(isset($user->user_information->financial_information))
                             <div class="row">
                            <div class="col-sm-6">
                              <label>Bank Name</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['personal_bank_name']}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Bank Account Name</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['personal_bank_account_name']}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Bank Account Number</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['personal_bank_account_number']}}
                            </div>
                          </div>
                          <hr> <div class="row">
                            <div class="col-sm-6">
                              <label>Bank Branch Name</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['personal_bank_branch_name']}}
                            </div>
                          </div>
                          <hr> 
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Bank Branch Routing Number</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['personal_bank_branch_routing_number']}}
                            </div>
                          </div>
                          <hr> 
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Bkash Account Number</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['bkash_account_number']}}
                            </div>
                          </div>
                          <hr>  
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Bkash Account Type</label>
                            </div>
                             <div class="col-sm-6 text-uppercase">
                              {{$user->user_information->financial_information['bkash_account_type']}}
                            </div>
                          </div>
                          @else
                          <h6>Financial Information Not Available </h6>
                          @endif
                         
                        </div>
                    </div>  
                    <div class="tab-pane fade" id="educational-1" role="tabpanel" aria-labelledby="educational-tab">
                      <div class="media-body">
                   @if(isset($user->user_information->educational_qualification))
                        <div class="table-responsive">
                           <table class="table">
                          <tr>
                            <th>Degree</th>
                            <th>Program/Group</th>
                            <th>Institution</th>
                            <th>GPA</th>
                            <th>Major</th>
                            <th>Minor</th>
                            <th>Passing Date</th>
                          </tr>
                          <tbody>
                          @foreach ($user->user_information->educational_qualification as $item)
                           <tr>
                             <td>{{$item['degree']}}</td>
                             <td>{{$item['programOrGroup']}}</td>
                             <td>{{$item['institution']}}</td>
                             <td>{{$item['gpa']}}</td>
                             <td>{{$item['major']}}</td>
                             <td>{{$item['minor']}}</td>
                             <td>{{$item['passingDate']}}</td>
                           </tr>
                          @endforeach
                          </tbody>
                          </table>
                          
                        </div>
                        @else
                          <h6>Educational Information Not Available</h6>
                        @endif
                      </div>
                    </div> 
                    <div class="tab-pane fade" id="work-1" role="tabpanel" aria-labelledby="work-tab">
                       <div class="media-body">
                   @if(isset($user->user_information->work_experience))
                        <div class="table-responsive">
                           <table class="table">
                          <tr>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Join Date</th>
                            <th>Left Date</th>
                          </tr>
                          <tbody>
                          @foreach ($user->user_information->work_experience as $item)
                           <tr>
                             <td>{{$item['title']}}</td>
                             <td>{{$item['company']}}</td>
                             <td>{{$item['joinDate']}}</td>
                             <td>{{$item['LeftDate']}}</td>
                           </tr>
                          @endforeach
                          </tbody>
                          </table>
                          
                        </div>
                        @else
                          <h6>Work Experience Not Available</h6>
                        @endif
                      </div>
                    </div>
                     <div class="tab-pane fade" id="skill-1" role="tabpanel" aria-labelledby="skill-tab">
                        <div class="media-body">
                   @if(isset($user->user_information->skill))
                        <div class="table-responsive">
                           <table class="table">
                          <tr>
                            <th>Category</th>
                            <th>Skill</th>
                            <th>Workspace</th>
                            <th>Profeciency</th>
                          </tr>
                          <tbody>
                          @foreach ($user->user_information->skill as $item)
                           <tr>
                             <td>{{$item['category']}}</td>
                             <td>{{$item['name']}}</td>
                             <td>{{$item['workspace']}}</td>
                             <td>{{$item['profeciency']}}</td>
                           </tr>
                          @endforeach
                          </tbody>
                          </table>
                          
                        </div>
                        @else
                          <h6>Skill Not Available</h6>
                        @endif
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
          {{-- edit modal --}}
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
                             <input type="file" class="dropify" name="identification_photo_edit" id="identification_photo_edit" data-default-file=""  />
                          </div>
                        </div>
                          <blockquote class="blockquote">Both the back and front side of the Identification hould be included</blockquote>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Choose Photo * </label>

                         
                         
                          <div class="col-sm-6">
                            <input type="file" class="dropify" name="photo_edit" id="photo_edit" data-default-file=""  />
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
                          <label class="col-sm-3 col-form-label">Personal Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="personal_email_edit" id="personal_email_edit">
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
          {{-- edit modal --}}
        {{-- view Remark modal --}}
        <div class="modal fade" id="remark_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Remark</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="card">
                            <div class="card-body">
                            <div class="row">
                              <div class="col-sm-4">Subject</div>
                              <div class="col-sm-8"><span id="remark_subject_m"></span></div>
                            </div> 
                            <div class="row">
                              <div class="col-sm-4">Description</div>
                              <div class="col-sm-8"><span id="remark_description_m"></span></div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        {{-- view Remark modal --}}
@endsection
<!-- end main content -->


<!-- Start of js plugin -->
@section('pagePluginScript')
<script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/vendors/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{asset('backend/vendors/jquery-steps/jquery.steps.js')}}"></script>
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/vendors/dropify/dropify.min.js')}}"></script>
<script type="text/javascript">
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
 function addDegreeListToEducational($rowno){
             $.each(degreeList, function(key, value){   
              $('#selectDegree_eq'+$rowno)
                   .append($("<option></option>")
                              .attr("value",key)
                              .text(value)); 
          });
      }
  function add_row_we_edit()
{
 $row_track_id = $('#work_experience_table_edit tbody>tr:last').data('row_track');
  if($row_track_id==null){
    $row_track_id=1;
  }else{
    $row_track_id=$row_track_id+1;
  }
 $("#work_experience_table_edit > tbody:last-child").append("<tr data-row_track='"+$row_track_id+"' id='row_we_edit"+$row_track_id+"'><td><input type='text' class='form-control'  name='we_jobTitle[]' placeholder='Enter Name'></td><td><input type='text'  class='form-control' name='we_companyName[]' placeholder='Enter Company'></td><td><input type='date' class='form-control joinon' name='we_joinedDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><input type='date' class='form-control lefton'  name='we_leftDate[]' placeholder='Enter joinon date EX:dd-mm-yy' aria-invalid='false'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row('row_we_edit"+$row_track_id+"')><i class='ti-minus'></i></button></td></tr>");
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
    var config = {
        routes: {
          profile_edit: "{!! route('profile.edit') !!}",
          profile_update: "{!! route('profile.update') !!}",
          remark_show: "{!! route('profile.remarks.show') !!}",
        }
    };
</script>
 <script type="text/javascript">
     var validationFormEdit = $("#edit_employee_form");
  validationFormEdit.valid({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      first_name:
      {
        required:true,
      },
       mobile_number_edit: {
        required: true,
        number: true
    },
     
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
           url:config.routes.profile_update,
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
   },        
          success: function(data)   
          {
             console.log(data);
            
             if(data.success!=false){
              
            // $('#edit_employee_form').trigger('reset');
                toastr.success('Employee Updated successfully');
               
             }else{
               toastr.error(data.message);
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
  // start of view remark
      $(document).on('click','.remarksList',function(e){
          e.preventDefault();
          var id= $(this).data('id');
           $.ajax({
          url:config.routes.remark_show,
           data: {  
            id: id,
          },
          type: "get", 
          success: function(data){
            if (data.success==true) {
              $('#remark_description_m').empty().text(data.remark.description);
            $('#remark_subject_m').empty().text(data.remark.subject);
            $('#remark_modal').modal('show');
          }else{
             toastr.error('Failed to Find Remark');
           }
          }
       });
          
        });
      // end of view remark
      $(document).on('click','#edit_employee_btn',function(e){
         $('#work_experience_table_edit > tbody').empty();
         $('#educational_qualification_table_edit > tbody').empty();
         $('#skill_table_edit > tbody').empty();
         $("#edit_employee_form").children("div").steps("reset");
      // console.log($("#edit_employee_form").children("div").steps("reset"));
          e.preventDefault();
          $.ajax({
          url:config.routes.profile_edit,
          type: "get", 
          success: function(data) {
              $('#loading_loader').hide();
              if(data.user!=null){
              $('#edit_employee_modal').modal('show');
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
              $('#personal_email_edit').val(data.user.personal_email);
              $('#emergency_person_name_edit').val(data.user.emergency_person_name);
              $('#emergency_relation_edit').val(data.user.emergency_person_relation);
              $('#emergency_number_edit').val(data.user.emergency_number);
              $('#discord_id_edit').val(data.user.discord_id);
              $('#fb_username_edit').val(data.user.fb_username);
               $('#identification_type_edit option[value="' + data.user.identification_type + '"]').prop('selected', true);
                  
                  console.log(data.user.photo);
                  if (data.user.photo==null || data.user.photo!='') {
                    console.log("Fucke me");
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
                  }
                   
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
                  $( '#dob_edit' ).datepicker( 'setDate', formattedDate );
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
</script>
@endsection
  <!-- End custom js for this page-->
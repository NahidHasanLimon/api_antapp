@extends('layouts.admin')
@section('pagePluginStyle')
<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('backend/vendors/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bars-1to10.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bars-horizontal.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bars-movie.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bars-pill.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bars-reversed.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bars-square.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/bootstrap-stars.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/css-stars.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/examples.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/fontawesome-stars-o.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/fontawesome-stars.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-asColorPicker/css/asColorPicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/x-editable/bootstrap-editable.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/dropify/dropify.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-file-upload/uploadfile.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/jquery-tags-input/jquery.tagsinput.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}">
  <!-- End plugin css for this page -->

@endsection
@section('mainContent')
<div class="col-12 grid-margin stretch-card">
            <!-- <div class="card">
              <div class="card-body">
                 <h4 class="card-title">Using X editable</h4>
                  <p class="card-description">
                   On Change Event
                  </p>
                 <form class="editable-form">
                   <label class="col-6 col-lg-4 col-form-label">Simple text field</label>
                        <div class="col-6 col-lg-8 d-flex align-items-center">
                          <a href="#" id="username" data-type="text" data-pk="1">awesome</a>
                        </div>
                 </form>
              </div>
            </div> -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="editable-form" id="editable-form">
                    <div class="form-group row">
                        <label class="col-6 col-lg-4 col-form-label">Text Box</label>
                        <div class="col-6 col-lg-8 d-flex align-items-center">
                          <a href="#" id="username_new" data-type="text" data-pk="1">awesome</a>
                        </div>
                      </div>
                 </form>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
	
@endsection

 <!-- plugin js for this page -->
@section('pagePluginScript')
  <script src="{{asset('backend/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
  <script src="{{asset('backend/vendors/jquery-asColor/jquery-asColor.min.js')}}"></script>
  <script src="{{asset('backend/vendors/jquery-asGradient/jquery-asGradient.min.js')}}"></script>
  <script src="{{asset('backend/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js')}}"></script>
  <script src="{{asset('backend/vendors/x-editable/bootstrap-editable.min.js')}}"></script>
  <script src="{{asset('backend/vendors/moment/moment.min.js')}}"></script>
  <script src="{{asset('backend/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}"></script>
  <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('backend/vendors/dropify/dropify.min.js')}}"></script>
  <script src="{{asset('backend/vendors/jquery-file-upload/jquery.uploadfile.min.js')}}"></script>
  <script src="{{asset('backend/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
  <script src="{{asset('backend/vendors/dropzone/dropzone.js')}}"></script>
  <script src="{{asset('backend/vendors/jquery.repeater/jquery.repeater.min.js')}}"></script>
  <script src="{{asset('backend/vendors/inputmask/jquery.inputmask.bundle.js')}}"></script>
  <!-- End plugin js for this page -->
  @endsection
  @section('pageLevelScript')
   <!-- Custom js for this page-->
  <script src="{{asset('backend/js/formpickers.js')}}"></script>
  <script src="{{asset('backend/js/form-addons.js')}}"></script>
  <script src="{{asset('backend/js/x-editable.js')}}"></script>
  <script src="{{asset('backend/js/dropify.js')}}"></script>
  <script src="{{asset('backend/js/dropzone.js')}}"></script>
  <script src="{{asset('backend/js/jquery-file-upload.js')}}"></script>
  <script src="{{asset('backend/js/formpickers.js')}}"></script>
  <script src="{{asset('backend/js/form-repeater.js')}}"></script>
  <script src="{{asset('backend/js/inputmask.js')}}"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
     
  </script>
  @endsection
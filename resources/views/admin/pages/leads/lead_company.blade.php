@extends('layouts.admin')
@section('pagePluginStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/select2/select2.min.css')}}">
       <link rel="stylesheet" href="{{asset('backend/vendors/dropify/dropify.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('pageLevelStyle')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
<!-- start main conten -->
@section('mainContent')
<!-- modal view -->
 <div class="modal fade" id="view_company_modal" tabindex="-1" role="dialog" aria-labelledby="viewcompanyModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="viewcompanyModalLabel">Company Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <h5 class="role-dec">company Name</h5> -->
                                  <h6 class="comn_name per_app text-center"><h6>
                                  	 <div class="card">
                                    <div class="card-body"> 
                                    <div class="card-title text-bold">
                                     Brand List
                                    </div>
                                     <div id="brand_list" class="list list-arrow">
                                    <ul class="list list-arrow"></ul>
                                  </div>
                                </div>
                              </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                     {{-- end of view modal --}}
    <!-- modal edit -->
  <div class="modal fade" id="edit_company_modal" tabindex="-1" role="dialog" aria-labelledby="edit_company_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_company_modalLabel">Edit Company</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="company_edit_form" id="company_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                            <label for="exampleInputName1">company Name</label>
                                            <input type="text" id="company_name_edit" name="company_name_edit" class="form-control" required>
                                           
                                            </div>
                                              <div class="row">
                                    <div class="col-md-8">
                                      <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Choose company Logo *</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="dropify"  name="company_logo_edit" id="company_logo_edit" >
                
                                        </div>
                                      </div>
                                       {{-- <blockquote class="blockquote float-left"> Picture uploaded must be a square. and have a 1:1 ratio</blockquote> --}}
                                    </div>
                                  </div>
                                                              
                                        </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                   <input type="hidden" id="id" name="id" class="form-control">
                                   <input type="hidden" id="si" class="form-control">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Cancel</button>
                                </div>
                               </form>
                              </div>
                            </div>
                          </div>
                  <!-- end of modal edit -->
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-pills nav-pills-info" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">company List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-creatindudtry" role="tab" aria-controls="pills-home" aria-selected="false">Create company</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-creatindudtry" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add company</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_company_form" id="add_company_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="company_name">company Name</label>
                                        <input id="company_name" class="form-control" name="company_name" type="text" placeholder="Enter  company Name..">
                                      </div>  
                                      <div class="row">
                                    <div class="col-md-8">
                                      <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Choose Company Logo *</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="dropify"  name="company_logo" id="company_logo"  required>
                
                                        </div>
                                      </div>
                                       {{-- <blockquote class="blockquote float-left"> Picture uploaded must be a square. and have a 1:1 ratio</blockquote> --}}
                                    </div>
                                  </div>                                    
                                      <input class="btn btn-primary" type="submit" value="Submit">
                                    </fieldset>
                                  </form>
                                </div>
                          </div>
                        </div>
                    </div>
                    </div>                  
                </div>
                <div class="tab-pane fade active show" id="pills-permissionlist" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>company List </div>
                      </div>
                        <div class="card-body">
                        
                         
                          <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="company_listing_table" class="table">
                                  <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Name</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="companyappend">
                                    @foreach ($companyList as $item)
                                    <tr class="unqcompany{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$item->lead_company_name}}</td>                                                                   
                                        <td>
                                        {{--     <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary companyshow commonbtn" data-toggle="modal" data-target="#view_company_modal"><i class="ti-arrow-circle-right"></i></button> --}}
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editcompany commonbtn" data-companyname="{{$item->lead_company_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_company_modal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text deletecompany commonbtn">
                                            <i class="icon-trash"></i>                                                       
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
            </div>
            </div>
        </div>
    </div>
@endsection
<!-- end main content -->


<!-- Start of js plugin -->
@section('pagePluginScript')
 <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    {{-- <script src="{{asset('backend/js/data-table.js')}}"></script> --}}
    <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/js/select2.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script src="{{asset('backend/vendors/dropify/dropify.min.js')}}"></script>
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
  @section('pageLevelScript')
 
 	<script type="text/javascript">

  $(function() {
  'use strict';
  $('.dropify').dropify();
    $('#company_listing_table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
   });

		  var config = {
        routes: {
          lead_company_store: "{!! route('lead.company.store') !!}",
          lead_company_delete: "{!! route('lead.company.destroy') !!}",
          lead_company_update: "{!! route('lead.company.update') !!}",
          lead_company_show: "{!! route('lead.company.show') !!}",
          lead_company_edit: "{!! route('lead.company.edit') !!}",
        }
    };
    $("#add_company_form").validate({
    rules: {
    company_name: {
        required: true,
    },
    },
    messages: {
    company_name: {
        required: "Please enter a name",
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
    $(document).on('submit','#add_company_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.lead_company_store,
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
     $("#loading_loader").show();
   },
   complete: function(){
     $("#loading_loader").hide();
   },
        success:function(data)
        { 
        	console.log(data);
          if(data.id!=""){
              // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
        //console.log(data);
            toastr.options = {
                    "debug": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "fadeIn": 300,
                    "fadeOut": 2000,
                    "timeOut": 2000,
                    "extendedTimeOut": 2000
                    };
                     // <button class="btn btn-outline-primary companyshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_company_modal"><i class="ti-arrow-circle-right"></i></button>
                     var rowCount = $('#company_listing_table >tbody >tr').length+1;
        $('#companyappend').append(`<tr class="unqcompany`+data.company.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.company.lead_company_name+` </td>                                                                             
            <td>
               
                <button type="button" class="btn btn-outline-success editcompany commonbtn" data-companyname="`+data.company.lead_company_name+`"  data-id="`+data.company.id+`" data-toggle="modal" data-target="#edit_company_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deletecompany commonbtn"  data-id="`+data.company.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('company was Created successfully');
        $('#add_company_form').trigger('reset');

          }else{
            alert("Failed to store");
          }
        },
          error: function(xhr, status, error) {
      alert("Failed to Save");
}
    })
});
    // end of add company
    $(document).on('click','.companyshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url:config.routes.lead_company_show,
    type: "get", 
    data: {  
        id: id, 
    },
    success: function(data) {
    	console.log(data);
        $('#brand_list .list').empty();
            $('#view_company_modal .comn_name').text(data.company.lead_company_name);
             if(data.company.brands.length!=0){
            let brands=[];
            $.each(data.company.brands,function(index, brand){
            // brands.push(dep.department_name);
              $('#brand_list .list').append(`<li class="per_app">`+brand.lead_brand_name+`</li>`);
            });
            // $('#view_company_modal .department-list').append(`<li class="per_app">`+brands+`</li>`);
           
        }else{
        	console.log('No Brand Available');
         $('#brand_list .list').append(`Brand Not Available`);
        }
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
    // edit company edit
       $(document).on('click','.editcompany',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.lead_company_edit,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
        console.log(data);
        $('#company_edit_form').find('#company_name_edit').val(data.company.lead_company_name);
          var photoUrl = "images/leads/companies/"+data.company.lead_company_logo;
      var drEvent = $('#company_logo_edit').dropify(
      {
        defaultFile: photoUrl
      });
      drEvent = drEvent.data('dropify');
      drEvent.resetPreview();
      drEvent.clearElement();
      drEvent.settings.defaultFile = photoUrl;
      drEvent.destroy();
      drEvent.init(); 
        $('#company_edit_form').find('#id').val(id);
        $('#company_edit_form').find('#si').val(si);
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
      // end edit company
    // update company
       $(document).on('submit','#company_edit_form',function(e){
    e.preventDefault();
    var si = $('#company_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.lead_company_update,
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(data)
    { 
    console.log(data);

    toastr.options = {
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 2000,
        "timeOut": 2000,
        "extendedTimeOut": 2000
    };
    // var username = data.username===null ? 'N/A':  data.username.name;
       if (data.company.id!="") {
         $('.unqcompany'+data.company.id).replaceWith(`<tr class="unqcompany`+data.company.id+`">
        <td>`+si+`</td>
        <td>`+data.company.lead_company_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary companyshow commonbtn" data-id="`+data.company.id+`" data-toggle="modal" data-target="#view_company_modal"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success editcompany commonbtn" data-companyname="`+data.company.lead_company_name+`"  data-id="`+data.company.id+`" data-toggle="modal" data-target="#edit_company_modal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text deletecompany commonbtn"  data-id="`+data.company.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('company was Updated successfully');
    setTimeout(function() {$('#edit_company_modal').modal('hide');}, 1500);
    $('#company_edit_form').trigger('reset');
    }else{
      alert("Failed To Update company");
    }
       },
        error: function(xhr, status, error) {
      alert("Failed to Update");
}
});
});
    // update company
    // start delete company
$(document).on('click','.deletecompany',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.lead_company_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
       if (data.company!="") {
         toastr.success('company was Deleted successfully');
       // location.reload();    
       $(this).closest('tr').hide();
     }else{
      alert("failed to delete");
     }
    },
    error: function(xhr, status, error) {
      alert("Failed to Delete");
}
    });
  }
});
    // end delete company
 </script>
 @endsection
 {{-- // end custom js for this page --}}
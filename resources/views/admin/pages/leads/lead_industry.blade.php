@extends('layouts.admin')
@section('pagePluginStyle')
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('pageLevelStyle')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
<!-- start main conten -->
@section('mainContent')
<!-- modal view -->
 <div class="modal fade" id="view_industry_modal" tabindex="-1" role="dialog" aria-labelledby="viewIndustryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="viewIndustryModalLabel">industry Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <h5 class="role-dec">industry Name</h5> -->
                                  <h6 class="comn_name per_app text-center"><h6>
                                  	 <div class="card">
                                    <div class="card-body"> 
                                    <div class="card-title text-bold">
                                     Sub Industry List
                                    </div>
                                     <div id="sub_industry_list" class="list list-arrow">
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
  <div class="modal fade" id="edit_industry_modal" tabindex="-1" role="dialog" aria-labelledby="edit_industry_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_industry_modalLabel">Edit Inudstry</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="industry_edit_form" id="industry_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                            <label for="exampleInputName1">industry Name</label>
                                            <input type="text" id="industry_name_edit" name="industry_name_edit" class="form-control" required>
                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                            </div>
                                                              
                                        </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">industry List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-creatindudtry" role="tab" aria-controls="pills-home" aria-selected="false">Create industry</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-creatindudtry" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add industry</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_industry_form" id="add_industry_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="industry_name">industry Name</label>
                                        <input id="industry_name" class="form-control" name="industry_name" type="text" placeholder="Enter  industry Name..">
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
                        <div class="preview"> <i class="icon-people"></i>industry List </div>
                      </div>
                        <div class="card-body">
                        
                         
                          <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="industry_listing_table" class="table">
                                  <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Name</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="industryappend">
                                    @foreach ($industryList as $item)
                                    <tr class="unqindustry{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$item->lead_industry_name}}</td>                                                                   
                                        <td>
                                            <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary industryshow commonbtn" data-toggle="modal" data-target="#view_industry_modal"><i class="ti-arrow-circle-right"></i></button>
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editindustry commonbtn" data-industryname="{{$item->lead_industry_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_industry_modal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text deleteindustry commonbtn">
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
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
  @section('pageLevelScript')
 
 	<script type="text/javascript">

  'use strict';
  $(function() {
    $('#industry_listing_table').DataTable({
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
          lead_industry_store: "{!! route('lead.industry.store') !!}",
          lead_industry_delete: "{!! route('lead.industry.destroy') !!}",
          lead_industry_update: "{!! route('lead.industry.update') !!}",
          lead_industry_show: "{!! route('lead.industry.show') !!}",
          lead_industry_edit: "{!! route('lead.industry.edit') !!}",
        }
    };
    $("#add_industry_form").validate({
    rules: {
    industry_name: {
        required: true,
    },
    },
    messages: {
    industry_name: {
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
    $(document).on('submit','#add_industry_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.lead_industry_store,
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
                     var rowCount = $('#industry_listing_table >tbody >tr').length+1;
        $('#industryappend').append(`<tr class="unqindustry`+data.industry.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.industry.lead_industry_name+` </td>                                                                             
            <td>
                <button class="btn btn-outline-primary industryshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_industry_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editindustry commonbtn" data-industryname="`+data.industry.lead_industry_name+`"  data-id="`+data.industry.id+`" data-toggle="modal" data-target="#edit_industry_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deleteindustry commonbtn"  data-id="`+data.industry.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('Industry was Created successfully');
        $('#add_industry_form').trigger('reset');

          }else{
            alert("Failed to store");
          }
        },
          error: function(xhr, status, error) {
      alert("Failed to Save");
}
    })
});
    // end of add industry
    $(document).on('click','.industryshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url:config.routes.lead_industry_show,
    type: "get", 
    data: {  
        id: id, 
    },
    success: function(data) {
    	console.log(data);
        $('#sub_industry_list .list').empty();
            $('#view_industry_modal .comn_name').text(data.industry.lead_industry_name);
             if(data.industry.sub_industries.length!=0){
            let sub_industries=[];
            $.each(data.industry.sub_industries,function(index, sub_industry){
            // sub_industries.push(dep.department_name);
              $('#sub_industry_list .list').append(`<li class="per_app">`+sub_industry.lead_sub_industry_name+`</li>`);
            });
            // $('#view_industry_modal .department-list').append(`<li class="per_app">`+sub_industries+`</li>`);
           
        }else{
        	console.log('No Sub Industry Available');
         $('#sub_industry_list .list').append(`Sub Industry Not Available`);
        }
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
    // edit industry edit
       $(document).on('click','.editindustry',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.lead_industry_edit,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
        console.log(data);
        $('#industry_edit_form').find('#industry_name_edit').val(data.industry.lead_industry_name);
        $('#industry_edit_form').find('#id').val(id);
        $('#industry_edit_form').find('#si').val(si);
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
      // end edit industry
    // update industry
       $(document).on('submit','#industry_edit_form',function(e){
    e.preventDefault();
    var si = $('#industry_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.lead_industry_update,
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
       if (data.industry.id!="") {
         $('.unqindustry'+data.industry.id).replaceWith(`<tr class="unqindustry`+data.industry.id+`">
        <td>`+si+`</td>
        <td>`+data.industry.lead_industry_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary industryshow commonbtn" data-id="`+data.industry.id+`" data-toggle="modal" data-target="#view_industry_modal"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success editindustry commonbtn" data-industryname="`+data.industry.lead_industry_name+`"  data-id="`+data.industry.id+`" data-toggle="modal" data-target="#edit_industry_modal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text deleteindustry commonbtn"  data-id="`+data.industry.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('industry was Updated successfully');
    setTimeout(function() {$('#edit_industry_modal').modal('hide');}, 1500);
    $('#industry_edit_form').trigger('reset');
    }else{
      alert("Failed To Update Industry");
    }
       },
        error: function(xhr, status, error) {
      alert("Failed to Update");
}
});
});
    // update industry
    // start delete industry
$(document).on('click','.deleteindustry',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.lead_industry_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
       if (data.industry!="") {
         toastr.success('Industry was Deleted successfully');
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
    // end delete industry
 </script>
 @endsection
 {{-- // end custom js for this page --}}
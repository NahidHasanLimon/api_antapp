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
 <div class="modal fade" id="view_sub_industry_modal" tabindex="-1" role="dialog" aria-labelledby="viewsub_industryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="viewsub_industryModalLabel">Sub Industry Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <h5 class="role-dec">sub_industry Name</h5> -->
                                  <h6 class="comn_name per_app text-center"><h6>
                                  	 <div class="card">
                                    <div class="card-body"> 
                                    <div class="card-title text-bold">
                                     industry List
                                    </div>
                                     <div id="industry_list" class="list list-arrow">
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
  <div class="modal fade" id="edit_sub_industry_modal" tabindex="-1" role="dialog" aria-labelledby="edit_sub_industry_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_sub_industry_modalLabel">Edit Sub Industry</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="sub_industry_edit_form" id="sub_industry_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                            <label for="exampleInputName1">Sub Industry Name</label>
                                            <input type="text" id="sub_industry_name_edit" name="sub_industry_name_edit" class="form-control" required>
                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                            </div> 
                                            <div class="form-group">
                                            <label for="exampleInputName1">industry Name</label>
                                             <select class="js-example-basic-single w-100 form-control sub_industry_industry_m " id="select_industry_edit" name="select_industry_edit" style="width: 100%">                                               
                                            </select>
                                            
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">Sub Industry List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-creatindudtry" role="tab" aria-controls="pills-home" aria-selected="false">Create Sub Industry</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-creatindudtry" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add Sub Industry</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_sub_industry_form" id="add_sub_industry_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="sub_industry_name">sub_industry Name</label>
                                        <input id="sub_industry_name" class="form-control" name="sub_industry_name" type="text" placeholder="Enter  sub_industry Name..">
                                      </div>
                                      <div class="form-group">
                                        <label for="sub_industry_name">industry</label>
                                         <select class="form-control" id="select_industry" name="select_industry">
                                        <option value="">Select a industry</option>
                                        @foreach ($industryList as $cItem)
                                          <option value="{{$cItem->id}}">{{$cItem->lead_industry_name}}</option>
                                        @endforeach
                                         
                                       </select>
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
                        <div class="preview"> <i class="icon-people"></i>sub_industry List </div>
                      </div>
                        <div class="card-body">
                        
                         
                          <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="sub_industry_listing_table" class="table">
                                  <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Name</th>                                   
                                        <th>industry</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="sub_industryappend">
                                    @foreach ($subIndustryList as $item)
                                    <tr class="unqsub_industry{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                                                                                        
                                        <td>{{$item->lead_sub_industry_name}}</td>                                                                   
                                        <td>{{$item->lead_industry->lead_industry_name}}</td>                                                                   
                                        <td>
                                            <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary sub_industryshow commonbtn" data-toggle="modal" data-target="#view_sub_industry_modal"><i class="ti-arrow-circle-right"></i></button>
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editsub_industry commonbtn" data-sub_industryname="{{$item->lead_sub_industry_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_sub_industry_modal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text deletesub_industry commonbtn">
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
    $('#sub_industry_listing_table').DataTable({
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
          lead_sub_industry_store: "{!! route('lead.subindustry.store') !!}",
          lead_sub_industry_delete: "{!! route('lead.subindustry.destroy') !!}",
          lead_sub_industry_update: "{!! route('lead.subindustry.update') !!}",
          lead_sub_industry_show: "{!! route('lead.subindustry.show') !!}",
          lead_sub_industry_edit: "{!! route('lead.subindustry.edit') !!}",
        }
    };
    $("#add_sub_industry_form").validate({
    rules: {
    sub_industry_name: {
        required: true,
    },
   select_industry: {
        required: true,
    },
    },
    messages: {
    sub_industry_name: {
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
 $("#sub_industry_edit_form").validate({
    rules: {
    sub_industry_name_edit: {
        required: true,
    },
   select_industry_edit: {
        required: true,
    },
    },
    messages: {
    sub_industry_name_edit: {
        required: "Please enter a name",
    }, 
    sub_industry_name_edit: {
        required: "Please Select a industry",
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
    $(document).on('submit','#add_sub_industry_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.lead_sub_industry_store,
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
                     var rowCount = $('#sub_industry_listing_table >tbody >tr').length+1;
        $('#sub_industryappend').append(`<tr class="unqsub_industry`+data.sub_industry.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.sub_industry.lead_sub_industry_name+` </td>                                                                            
             <td>`+data.sub_industry.lead_industry.lead_industry_name+` </td>                                                                             
            <td>
                <button class="btn btn-outline-primary sub_industryshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_sub_industry_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editsub_industry commonbtn" data-sub_industryname="`+data.sub_industry.lead_sub_industry_name+`"  data-id="`+data.sub_industry.id+`" data-toggle="modal" data-target="#edit_sub_industry_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deletesub_industry commonbtn"  data-id="`+data.sub_industry.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('sub_industry was Created successfully');
        $('#add_sub_industry_form').trigger('reset');

          }else{
            alert("Failed to store");
          }
        },
          error: function(xhr, status, error) {
      alert("Failed to Save");
}
    })
});
    // end of add sub_industry
    $(document).on('click','.sub_industryshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url:config.routes.lead_sub_industry_show,
    type: "get", 
    data: {  
        id: id, 
    },
    success: function(data) {
    	console.log(data);
        $('#industry_list .list').empty();
            $('#view_sub_industry_modal .comn_name').text(data.sub_industry.lead_sub_industry_name);
             if(data.sub_industry.lead_industry.length!=0){
            let sub_industrys=[];
            $.each(data.sub_industry.sub_industrys,function(index, sub_industry){
            // sub_industrys.push(dep.department_name);
              $('#industry_list .list').append(`<li class="per_app">`+sub_industry.lead_industry.lead_industry_name+`</li>`);
            });
            // $('#view_sub_industry_modal .department-list').append(`<li class="per_app">`+sub_industrys+`</li>`);
           
        }else{
        	console.log('No industry Available');
         $('#industry_list .list').append(`industry Not Available`);
        }
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
    // edit sub_industry edit
       $(document).on('click','.editsub_industry',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.lead_sub_industry_edit,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
        console.log(data);
        $('#sub_industry_edit_form').find('#sub_industry_name_edit').val(data.sub_industry.lead_sub_industry_name);
            $.each(data.industryList,function(index, industry){
            $('#sub_industry_edit_form .sub_industry_industry_m').append('<option value="'+industry.id +'">'+industry.lead_industry_name+'</option>');
            });
            $('#select_industry_edit option[value="' + data.sub_industry.lead_industry_id + '"]').prop('selected', true);
        $('#sub_industry_edit_form').find('#id').val(id);
        $('#sub_industry_edit_form').find('#si').val(si);
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
      // end edit sub_industry
    // update sub_industry
       $(document).on('submit','#sub_industry_edit_form',function(e){
    e.preventDefault();
    var si = $('#sub_industry_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.lead_sub_industry_update,
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
       if (data.sub_industry.id!="") {
         $('.unqsub_industry'+data.sub_industry.id).replaceWith(`<tr class="unqsub_industry`+data.sub_industry.id+`">
        <td>`+si+`</td>
        <td>`+data.sub_industry.lead_sub_industry_name+`</td> 
        <td>`+data.sub_industry.lead_industry.lead_industry_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary sub_industryshow commonbtn" data-id="`+data.sub_industry.id+`" data-toggle="modal" data-target="#view_sub_industry_modal"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success editsub_industry commonbtn" data-sub_industryname="`+data.sub_industry.lead_sub_industry_name+`"  data-id="`+data.sub_industry.id+`" data-toggle="modal" data-target="#edit_sub_industry_modal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text deletesub_industry commonbtn"  data-id="`+data.sub_industry.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('sub_industry was Updated successfully');
    setTimeout(function() {$('#edit_sub_industry_modal').modal('hide');}, 1500);
    $('#sub_industry_edit_form').trigger('reset');
    }else{
      alert("Failed To Update sub_industry");
    }
       },
        error: function(xhr, status, error) {
      alert("Failed to Update");
}
});
});
    // update sub_industry
    // start delete sub_industry
$(document).on('click','.deletesub_industry',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.lead_sub_industry_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
       if (data.sub_industry!="") {
         toastr.success('sub_industry was Deleted successfully');
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
    // end delete sub_industry
 </script>
 @endsection
 {{-- // end custom js for this page --}}
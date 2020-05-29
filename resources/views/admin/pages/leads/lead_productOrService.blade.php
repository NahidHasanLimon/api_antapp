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
 <div class="modal fade" id="view_product_service_modal" tabindex="-1" role="dialog" aria-labelledby="view_product_service_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="view_product_service_modalLabel">Product or Service Details</h5>
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
                                  <h5 class="modal-title" id="edit_sub_industry_modalLabel">Edit Product or Service</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="product_or_service_edit_form" id="product_or_service_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                            <label for="product_or_service_name_edit">Product or Service Name</label>
                                            <input type="text" id="product_or_service_name_edit" name="product_or_service_name_edit" class="form-control" required>
                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                            </div>
                                      <div class="form-group">
                                        <label class="col-form-label">Product or Service</label>
                                        <div class="form-group row">
                                          
                                          <div class="col-sm-4">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="is_product_or_service_edit" id="productRadio_edit" value="1">
                                                Product
                                              <i class="input-helper"></i></label>
                                            </div>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="is_product_or_service_edit" id="serviceRadio_edit" value="0">
                                                Service
                                              <i class="input-helper"></i></label>
                                            </div>
                                          </div>
                                       </div>
                                      </div> 
                                            <div class="form-group">
                                            <label for="exampleInputName1">Sub Industry</label>
                                             <select class="js-example-basic-single w-100 form-control sub_industry_industry_m " id="select_sub_industry_edit" name="select_sub_industry_edit" style="width: 100%">                                               
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-productServiceList" role="tab" aria-controls="pills-profile" aria-selected="true">Product or Service List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-creatindudtry" role="tab" aria-controls="pills-home" aria-selected="false">Create Product or Service</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-creatindudtry" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add Product or Service</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_product_service_form" id="add_product_service_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="product_or_service_name">Product or Service Name</label>
                                        <input id="product_or_service_name" class="form-control" name="product_or_service_name" type="text" placeholder="Enter  product or service Name..">
                                      </div>
                                   
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product or Service</label>
                                        <div class="col-sm-4">
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="is_product_or_service" id="productRadio" value="1">
                                              Product
                                            <i class="input-helper"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-sm-5">
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="is_product_or_service" id="serviceRadio" value="0">
                                              Service
                                            <i class="input-helper"></i></label>
                                          </div>
                                        </div>
                                     </div>
                                   
                                      <div class="form-group">
                                        <label for="sub_industry_name">sub industry</label>
                                         <select class="form-control" id="select_sub_industry" name="select_sub_industry">
                                        <option value="">Select a Product or Service</option>
                                        @foreach ($subIndustryList as $cItem)
                                          <option value="{{$cItem->id}}">{{$cItem->lead_sub_industry_name}}</option>
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
                <div class="tab-pane fade active show" id="pills-productServiceList" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Product or Service List </div>
                      </div>
                        <div class="card-body">
                        
                         
                          <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="product_service_listing_table" class="table">
                                  <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Name</th>                                   
                                        <th>Product Or Service</th>                                   
                                        <th>Sub Industry</th>                                   
                                        <th>Industry</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="product_serviceappend">
                                    @foreach ($productOrServiceList as $item)
                                    <tr class="unqproduct_service{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                                                                                        
                                        <td>{{$item->lead_product_or_service_name}}</td>                                                                 
                                        <td>{{ ($item->is_lead_product_or_service==1) ? "Product" : "Service" }}  </td>                                                                   
                                        <td>{{$item->lead_sub_industry->lead_sub_industry_name}}</td>                                                                   
                                        <td>{{$item->lead_sub_industry->lead_industry->lead_industry_name}}</td>                                                                   
                                        <td>
                                            <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary product_or_serviceshow commonbtn" data-toggle="modal" data-target="#view_product_service_modal"><i class="ti-arrow-circle-right"></i></button>
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success edit_productorservice commonbtn" data-sub_industryname="{{$item->lead_product_or_service_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_sub_industry_modal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text delete_productorservice commonbtn">
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
    $('#product_service_listing_table').DataTable({
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
          lead_product_or_service_store: "{!! route('lead.productorservice.store') !!}",
          lead_product_or_service_delete: "{!! route('lead.productorservice.destroy') !!}",
          lead_product_or_service_update: "{!! route('lead.productorservice.update') !!}",
          lead_product_or_service_show: "{!! route('lead.productorservice.show') !!}",
          lead_product_or_service_edit: "{!! route('lead.productorservice.edit') !!}",
        }
    };
    $("#add_product_service_form").validate({
    rules: {
    product_or_service_name: {
        required: true,
    },
   select_sub_industry: {
        required: true,
    },
    },
    messages: {
    product_or_service_name: {
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
 $("#product_or_service_edit_form").validate({
    rules: {
    product_or_service_name_edit: {
        required: true,
    },
     is_product_or_service_edit: {
        required: true,
    },
   select_sub_industry_edit: {
        required: true,
    },
    },
    messages: {
    product_or_service_name_edit: {
        required: "Please enter a name",
    }, 
    select_sub_industry_edit: {
        required: "Please Select a sub industry",
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
    $(document).on('submit','#add_product_service_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.lead_product_or_service_store,
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
        	console.log(data.product_or_service.lead_sub_industry);
          if(data.product_or_service.id!=""){

           var is_p_or_s = data.product_or_service.is_lead_product_or_service ==1 ? 'Product' : 'Service';
            toastr.options = {
                    "debug": false,
                    "positionClass": "toast-bottom-right",
                    "onclick": null,
                    "fadeIn": 300,
                    "fadeOut": 2000,
                    "timeOut": 2000,
                    "extendedTimeOut": 2000
                    };
                     var rowCount = $('#product_service_listing_table >tbody >tr').length+1;
        $('#product_serviceappend').append(`<tr class="unqproduct_service`+data.product_or_service.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.product_or_service.lead_product_or_service_name+` </td>
            <td>`+is_p_or_s+` </td>                                                                            
             <td>`+data.product_or_service.lead_sub_industry.lead_sub_industry_name+` </td>
             <td>`+data.product_or_service.lead_sub_industry.lead_industry.lead_industry_name+` </td>                                                                             
            <td>
                <button class="btn btn-outline-primary product_or_serviceshow commonbtn" data-id="`+data.product_or_service.id+`" data-toggle="modal" data-target="#view_product_service_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editproduct_or_service commonbtn" data-product_or_servicename="`+data.product_or_service.lead_product_or_service_name+`"  data-id="`+data.product_or_service.id+`" data-toggle="modal" data-target="#edit_product_or_service_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text delete_productorservice commonbtn"  data-id="`+data.product_or_service.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('product_or_service was Created successfully');
        $('#add_product_service_form').trigger('reset');

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
    $(document).on('click','.product_or_serviceshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url:config.routes.lead_product_or_service_show,
    type: "get", 
    data: {  
        id: id, 
    },
    success: function(data) {
    	console.log(data);
        $('#industry_list .list').empty();
            $('#view_product_service_modal .comn_name').text(data.sub_industry.lead_product_or_service_name);
             if(data.sub_industry.lead_industry.length!=0){
            let sub_industrys=[];
            $.each(data.sub_industry.sub_industrys,function(index, sub_industry){
            // sub_industrys.push(dep.department_name);
              $('#industry_list .list').append(`<li class="per_app">`+sub_industry.lead_industry.lead_industry_name+`</li>`);
            });
            // $('#view_product_service_modal .department-list').append(`<li class="per_app">`+sub_industrys+`</li>`);
           
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
       $(document).on('click','.edit_productorservice',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.lead_product_or_service_edit,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
        console.log(data);
        $('#product_or_service_edit_form').find('#product_or_service_name_edit').val(data.product_or_service.lead_product_or_service_name);
        if (data.product_or_service.is_lead_product_or_service==1) {
           $('#product_or_service_edit_form').find('#productRadio_edit').prop("checked", true);
        }else if (data.product_or_service.is_lead_product_or_service==0) {
           $('#product_or_service_edit_form').find('#serviceRadio_edit').prop("checked", true);
        }
         
            $.each(data.subIndustryList,function(index, subIndustry){
            $('#product_or_service_edit_form .sub_industry_industry_m').append('<option value="'+subIndustry.id +'">'+subIndustry.lead_sub_industry_name+'</option>');
            });
            $('#select_sub_industry_edit option[value="' + data.product_or_service.lead_sub_industry_id + '"]').prop('selected', true);
        $('#product_or_service_edit_form').find('#id').val(id);
        $('#product_or_service_edit_form').find('#si').val(si);
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
      // end edit sub_industry
    // update sub_industry
       $(document).on('submit','#product_or_service_edit_form',function(e){
    e.preventDefault();
    var si = $('#product_or_service_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.lead_product_or_service_update,
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
       if (data.product_or_service.id!="") {
          var is_p_or_s = data.product_or_service.is_lead_product_or_service ==1 ? 'Product' : 'Service';

         $('.unqproduct_service'+data.product_or_service.id).replaceWith(`<tr class="unqproduct_service`+data.product_or_service.id+`">
        <td>`+si+`</td>
        <td>`+data.product_or_service.lead_product_or_service_name+`</td> 
        <td>`+is_p_or_s+`</td> 
        <td>`+data.product_or_service.lead_sub_industry.lead_sub_industry_name+`</td>    
        <td>`+data.product_or_service.lead_sub_industry.lead_industry.lead_industry_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary product_or_serviceshow commonbtn" data-id="`+data.product_or_service.id+`" data-toggle="modal" data-target="#view_product_service_modal"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success edit_productorservice commonbtn" data-sub_industryname="`+data.product_or_service.lead_product_or_service_name+`"  data-id="`+data.product_or_service.id+`" data-toggle="modal" data-target="#edit_sub_industry_modal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text delete_productorservice commonbtn"  data-id="`+data.product_or_service.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('product_or_service was Updated successfully');
    setTimeout(function() {$('#edit_sub_industry_modal').modal('hide');}, 1500);
    $('#product_or_service_edit_form').trigger('reset');
    }else{
      alert("Failed To Update product_or_service");
    }
       },
        error: function(xhr, status, error) {
      alert("Failed to Update");
}
});
});
    // update sub_industry
    // start delete sub_industry
$(document).on('click','.delete_productorservice',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.lead_product_or_service_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
       if (data.product_or_service!="") {
         toastr.success('Deleted successfully');
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
    // end delete product_or_service
 </script>
 @endsection
 {{-- // end custom js for this page --}}
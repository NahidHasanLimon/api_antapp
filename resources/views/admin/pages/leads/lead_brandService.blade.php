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
 <div class="modal fade" id="view_brand_service_modal" tabindex="-1" role="dialog" aria-labelledby="viewbrand_serviceModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="viewbrand_serviceModalLabel">Sub Industry Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <h5 class="role-dec">brand_service Name</h5> -->
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
                     <!-- {{-- end of view modal --}} -->
    <!-- modal edit -->
  <div class="modal fade" id="edit_brand_service_modal" tabindex="-1" role="dialog" aria-labelledby="edit_brand_service_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_brand_service_modalLabel">Edit Sub Industry</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="brand_service_edit_form" id="brand_service_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                       <label for="brand_service_name">Brand</label>
                                        <!-- <select class="js-example-basic-single" name="select_brand" id="select_brand"> -->
                                      <select class="form-control" id="select_brand_edit" name="select_brand_edit" >
                                        <option value="">Select a brand</option>
                                        @foreach ($LeadBrandList as $b2Item)
                                          <option value="{{$b2Item->id}}">{{$b2Item->lead_brand_name}}</option>
                                        @endforeach
                                       </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="brand_service_name">Product or Service Type?</label>
                                       <select id="is_p_or_s_edit" class="form-control">
                                        <option value="">Select a Type</option>
                                         <option value="1">Product</option>
                                         <option value="0">Service</option>
                                       </select>
                                      </div> 

                                     <div class="form-group">
                                        <label for="brand_service_name">Select a product or service</label>
                                         <select id="select_product_or_service_edit" class="form-control selectproductserviceedit" name="select_product_or_service_edit" class="form-control">
                                              <option value="">Select Type First!</option>
                                             @foreach ($productOrServiceList as $psItem)
                                              <option value="{{$psItem->id}}">{{$psItem->lead_product_or_service_name}}</option>
                                             @endforeach

                                         </select>
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true"> Brand Service List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-creatindudtry" role="tab" aria-controls="pills-home" aria-selected="false">Create Brand Service</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-creatindudtry" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add  Brand Service</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_brand_service_form" id="add_brand_service_form">
                          	@csrf
                                    <fieldset>
                                      
                                      <div class="form-group">
                                        <label for="brand_service_name">Brand</label>
                                        <!-- <select class="js-example-basic-single" name="select_brand" id="select_brand"> -->
                                      <select class="form-control" id="select_brand" name="select_brand" >
                                        <option value="">Select a brand</option>
                                        @foreach ($LeadBrandList as $bItem)
                                          <option value="{{$bItem->id}}">{{$bItem->lead_brand_name}}</option>
                                        @endforeach
                                       </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="brand_service_name">Product or Service Type?</label>
                                       <select id="is_p_or_s" class="form-control">
                                        <option value="">Select a Type</option>
                                         <option value="1">Product</option>
                                         <option value="0">Service</option>
                                       </select>
                                      </div> 

                                     <div class="form-group">
                                        <label for="brand_service_name">Select a product or service</label>
                                         <select id="select_product_or_service" name="select_product_or_service" class="form-control">
                                            <option value="">Select Type First!</option>
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
                        <div class="preview"> <i class="icon-people"></i>Brand Service List </div>
                      </div>
                        <div class="card-body">
                        
                         
                          <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="brand_service_listing_table" class="table">
                                  <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>ProductOrService</th>                                   
                                        <th>Type</th>                                   
                                        <th>Brand</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="brand_serviceappend">
                                    @foreach ($brandServiceList as $item)
                                    <tr class="unqbrand_service{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                                                                                        
                                        <td>{{$item->lead_product_or_service->lead_product_or_service_name}}</td>                                                                   
                                         <td>{{ ($item->lead_product_or_service->is_lead_product_or_service==1) ? "Product" : "Service" }}  </td>                                                                    
                                        <td>{{$item->lead_brand->lead_brand_name}}</td>                                                                   
                                        <td>
                                            <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary brand_serviceshow commonbtn" data-toggle="modal" data-target="#view_brand_service_modal"><i class="ti-arrow-circle-right"></i></button>
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editbrand_service commonbtn" data-brand_servicename="{{$item->lead_brand_service_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_brand_service_modal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text deletebrand_service commonbtn">
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
 var config = {
        routes: {
          lead_brand_service_store: "{!! route('lead.brandservice.store') !!}",
          lead_brand_service_delete: "{!! route('lead.brandservice.destroy') !!}",
          lead_brand_service_update: "{!! route('lead.brandservice.update') !!}",
          lead_brand_service_show: "{!! route('lead.brandservice.show') !!}",
          lead_brand_service_edit: "{!! route('lead.brandservice.edit') !!}",

          find_product_or_service: "{!! route('lead.find_product_or_service') !!}",
        }
    };
  $(function() {
  'use strict';
 $('#is_p_or_s').on('change', function() {
            var is_p_or_s_id = $(this).val();
            if(is_p_or_s_id) {
                $.ajax({
                    url: config.routes.find_product_or_service,
                    type: "GET",
                    data: {id: is_p_or_s_id},
                    dataType: "json",
                    success:function(data) {
                      console.log(data);
                        $('select[name="select_product_or_service"]').empty();
                        $.each(data.productOrServiceList, function(key, prodSer) {
                            $('select[name="select_product_or_service"]').append('<option value="'+ prodSer.id +'">'+prodSer.lead_product_or_service_name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="select_product_or_service"]').empty();
                 $('select[name="select_product_or_service"]').append('<option value="">Select Type First</option>');
            }
        });
  $('#is_p_or_s_edit').on('change', function() {
            var is_p_or_s_id = $(this).val();
            if(is_p_or_s_id) {
                $.ajax({
                    url: config.routes.find_product_or_service,
                    type: "GET",
                    data: {id: is_p_or_s_id},
                    dataType: "json",
                    success:function(data) {
                      console.log(data);
                        $('select[name="select_product_or_service_edit"]').empty();
                        $.each(data.productOrServiceList, function(key, prodSer) {
                            $('select[name="select_product_or_service_edit"]').append('<option value="'+ prodSer.id +'">'+prodSer.lead_product_or_service_name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="select_product_or_service_edit"]').empty();
                 $('select[name="select_product_or_service_edit"]').append('<option value="">Select Type First</option>');
            }
        });
 // end of on change event

    $('#brand_service_listing_table').DataTable({
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

		 // end this document ready function
    $("#add_brand_service_form").validate({
    rules: {
    select_brand: {
        required: true,
    },
   select_product_or_service: {
        required: true,
    },
    },
    messages: {
    select_brand: {
        required: "Please Selecta Brand",
    },
    select_product_or_service: {
        required: "Please Select Product or Service",
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
 $("#brand_service_edit_form").validate({
    rules: {
    brand_service_name_edit: {
        required: true,
    },
   select_industry_edit: {
        required: true,
    },
    },
    messages: {
    brand_service_name_edit: {
        required: "Please enter a name",
    }, 
    brand_service_name_edit: {
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
    $(document).on('submit','#add_brand_service_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.lead_brand_service_store,
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
          if(data.brand_service.id!=""){
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
                     var rowCount = $('#brand_service_listing_table >tbody >tr').length+1;
           var ps = data.brand_service.lead_product_or_service.is_lead_product_or_service ==1 ? 'Product' : 'Service';
        $('#brand_serviceappend').append(`<tr class="unqbrand_service`+data.brand_service.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.brand_service.lead_product_or_service.lead_product_or_service_name+` </td>                                                                            
            <td>`+ps+` </td>                                                                            
             <td>`+data.brand_service.lead_brand.lead_brand_name+` </td>                                                                             
            <td>
                <button class="btn btn-outline-primary brand_serviceshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_brand_service_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editbrand_service commonbtn" data-brand_servicename="`+data.brand_service.lead_brand_service_name+`"  data-id="`+data.brand_service.id+`" data-toggle="modal" data-target="#edit_brand_service_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deletebrand_service commonbtn"  data-id="`+data.brand_service.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('brand_service was Created successfully');
        $('#add_brand_service_form').trigger('reset');

          }else{
            alert("Failed to store");
          }
        },
          error: function(xhr, status, error) {
      alert("Failed to Save");
}
    })
});
    // end of add brand_service
    $(document).on('click','.brand_serviceshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url:config.routes.lead_brand_service_show,
    type: "get", 
    data: {  
        id: id, 
    },
    success: function(data) {
    	console.log(data);
        $('#industry_list .list').empty();
            $('#view_brand_service_modal .comn_name').text(data.brand_service.lead_brand_service_name);
             if(data.brand_service.lead_industry.length!=0){
            let brand_services=[];
            $.each(data.brand_service.brand_services,function(index, brand_service){
            // brand_services.push(dep.department_name);
              $('#industry_list .list').append(`<li class="per_app">`+brand_service.lead_industry.lead_industry_name+`</li>`);
            });
            // $('#view_brand_service_modal .department-list').append(`<li class="per_app">`+brand_services+`</li>`);
           
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
    // edit brand_service edit
       $(document).on('click','.editbrand_service',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.lead_brand_service_edit,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
        console.log(data);
        $('#brand_service_edit_form').find('#brand_service_name_edit').val(data.brand_service.lead_brand_service_name);

           // $('select[name="select_product_or_service_edit"]').empty();
           //      $.each(data.productOrServiceList, function(key, pservice) {
           //          $('select[name="select_product_or_service_edit"]').append('<option value="'+ pservice.id +'">'+pservice.lead_product_or_service_name +'</option>');
           //      });

            $('#is_p_or_s_edit  option[value="' + data.brand_service.lead_product_or_service.is_lead_product_or_service + '"]').prop('selected', true);
            $('#select_brand_edit option[value="' + data.brand_service.lead_brand_id + '"]').prop('selected', true);
            $('#select_product_or_service_edit option[value="' + data.brand_service.lead_product_or_service_id + '"]').prop('selected', true);
        $('#brand_service_edit_form').find('#id').val(id);
        $('#brand_service_edit_form').find('#si').val(si);
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
      // end edit brand_service
    // update brand_service
       $(document).on('submit','#brand_service_edit_form',function(e){
    e.preventDefault();
    var si = $('#brand_service_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.lead_brand_service_update,
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
       if (data.brand_service.id!="") {
        var ps = data.brand_service.lead_product_or_service.is_lead_product_or_service ==1 ? 'Product' : 'Service';
         $('.unqbrand_service'+data.brand_service.id).replaceWith(`<tr class="unqbrand_service`+data.brand_service.id+`">
            <td>`+si+`</td>
            <td>`+data.brand_service.lead_product_or_service.lead_product_or_service_name+` </td>                                                                            
            <td>`+ps+` </td>                                                                            
             <td>`+data.brand_service.lead_brand.lead_brand_name+` </td>                                                                             
            <td>
                <button class="btn btn-outline-primary brand_serviceshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_brand_service_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editbrand_service commonbtn" data-brand_servicename="`+data.brand_service.lead_brand_service_name+`"  data-id="`+data.brand_service.id+`" data-toggle="modal" data-target="#edit_brand_service_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deletebrand_service commonbtn"  data-id="`+data.brand_service.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
    toastr.success('brand_service was Updated successfully');
    setTimeout(function() {$('#edit_brand_service_modal').modal('hide');}, 1500);
    $('#brand_service_edit_form').trigger('reset');
    }else{
      alert("Failed To Update brand_service");
    }
       },
        error: function(xhr, status, error) {
      alert("Failed to Update");
}
});
});
    // update brand_service
    // start delete brand_service
$(document).on('click','.deletebrand_service',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.lead_brand_service_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
       if (data.brand_service!="") {
         toastr.success('brand_service was Deleted successfully');
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
    // end delete brand_service
 </script>
 @endsection
 <!-- {{-- // end custom js for this page --}} -->
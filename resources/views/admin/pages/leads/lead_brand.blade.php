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
 <div class="modal fade" id="view_brand_modal" tabindex="-1" role="dialog" aria-labelledby="viewbrandModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="viewbrandModalLabel">Brand Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <h5 class="role-dec">brand Name</h5> -->
                                  <h6 class="comn_name per_app text-center"><h6>
                                  	 <div class="card">
                                    <div class="card-body"> 
                                    <div class="card-title text-bold">
                                     Product Service List
                                    </div>
                                     <div id="product_service_list" class="list list-arrow">
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
  <div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="edit_brand_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_brand_modalLabel">Edit Brand</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="brand_edit_form" id="brand_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="brand_name_edit">Brand Name</label>
                                            <input id="brand_name_edit" class="form-control" name="brand_name_edit" type="text" placeholder="Enter  brand Name..">
                                          </div> 
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="select_company_edit">Company</label>
                                              <select class="js-example-basic-single w-100 form-control brand_company_m " id="select_company_edit" name="select_company_edit" style="width: 100%">                                               
                                            </select>
                                        </div>
                                       </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="brand_website_edit">Brand Website</label>
                                            <input id="brand_website_edit" class="form-control" name="brand_website_edit" type="text" placeholder="Enter  brand Website url..">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="brand_facebook_edit">Brand Facebook</label>
                                            <input id="brand_facebook_edit" class="form-control" name="brand_facebook_edit" type="text" placeholder="Enter  brand facebook url..">
                                        </div> 
                                          </div>
                                      </div>   
                                       <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="brand_youtube_edit">Brand Youtube</label>
                                            <input id="brand_youtube_edit" class="form-control" name="brand_youtube_edit" type="text" placeholder="Enter  brand twitter url..">
                                         </div>
                                        </div>
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="brand_instagram_edit">Brand Instagram</label>
                                            <input id="brand_instagram_edit" class="form-control" name="brand_instagram_edit" type="text" placeholder="Enter  brand instagram url..">
                                         </div>
                                        </div>
                                      </div>     
                                      <div class="row">
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="brand_linkedin_edit">Brand LinkedIn</label>
                                            <input id="brand_linkedin_edit" class="form-control" name="brand_linkedin_edit" type="text" placeholder="Enter  brand linkedin url..">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="brand_comment_edit">Brand Comment</label>
                                            <input id="brand_comment_edit" class="form-control" name="brand_comment_edit" type="text" placeholder="Enter  brand linkedin url..">
                                         </div>
                                       </div>
                                      </div>
                                  <div class="row">
                                    <div class="col-md-8">
                                      <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Choose Brand Logo *</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="dropify"  name="brand_logo_edit" id="brand_logo_edit" >
                
                                        </div>
                                      </div>
                                       {{-- <blockquote class="blockquote float-left"> Picture uploaded must be a square. and have a 1:1 ratio</blockquote> --}}
                                    </div>
                                  </div>
                                        
                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                          
                                           
                                                              
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">brand List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-creatindudtry" role="tab" aria-controls="pills-home" aria-selected="false">Create brand</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-creatindudtry" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add Brand</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_brand_form" id="add_brand_form">
                          	@csrf
                                    <fieldset>
                                     
                                      <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="brand_name">Brand Name</label>
                                            <input id="brand_name" class="form-control" name="brand_name" type="text" placeholder="Enter  brand Name..">
                                          </div> 
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="brand_name">Company</label>
                                             <select class="form-control" id="select_company" name="select_company">
                                            <option value="">Select a Company</option>
                                            @foreach ($companyList as $cItem)
                                              <option value="{{$cItem->id}}">{{$cItem->lead_company_name}}</option>
                                            @endforeach
                                             
                                           </select>
                                        </div>
                                       </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="brand_website">Brand Website</label>
                                            <input id="brand_website" class="form-control" name="brand_website" type="text" placeholder="Enter  brand Website url..">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="brand_facebook">Brand Facebook</label>
                                            <input id="brand_facebook" class="form-control" name="brand_facebook" type="text" placeholder="Enter  brand facebook url..">
                                        </div> 
                                          </div>
                                      </div>   
                                       <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="brand_youtube">Brand Youtube</label>
                                            <input id="brand_youtube" class="form-control" name="brand_youtube" type="text" placeholder="Enter  brand twitter url..">
                                         </div>
                                        </div>
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="brand_instagram">Brand Instagram</label>
                                            <input id="brand_instagram" class="form-control" name="brand_instagram" type="text" placeholder="Enter  brand instagram url..">
                                         </div>
                                        </div>
                                      </div>     
                                      <div class="row">
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="brand_linkedin">Brand LinkedIn</label>
                                            <input id="brand_linkedin" class="form-control" name="brand_linkedin" type="text" placeholder="Enter  brand linkedin url..">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="brand_comment">Brand Comment</label>
                                            <input id="brand_comment" class="form-control" name="brand_comment" type="text" placeholder="Enter  brand linkedin url..">
                                         </div>
                                       </div>
                                      </div>
                                  <div class="row">
                                    <div class="col-md-8">
                                      <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Choose Brand Logo *</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="dropify"  name="brand_logo" id="brand_logo"  required>
                
                                        </div>
                                      </div>
                                       {{-- <blockquote class="blockquote float-left"> Picture uploaded must be a square. and have a 1:1 ratio</blockquote> --}}
                                    </div>
                                  </div>
                                      <input class="btn btn-success btn-lg float-right" type="submit" value="Submit">
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
                        <div class="preview"> <i class="icon-people"></i>Brand List </div>
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
                                        <th>company</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="brandappend">
                                    @foreach ($brandList as $item)
                                    <tr class="unqbrand{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                                                                                        
                                        <td>{{$item->lead_brand_name}}</td>                                                                   
                                        <td>{{$item->lead_company->lead_company_name}}</td>                                                                   
                                        <td>
                                            <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary brandshow commonbtn" data-toggle="modal" data-target="#view_brand_modal"><i class="ti-arrow-circle-right"></i></button>
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editbrand commonbtn" data-brandname="{{$item->lead_brand_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_brand_modal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text deletebrand commonbtn">
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
          lead_brand_store: "{!! route('lead.brand.store') !!}",
          lead_brand_delete: "{!! route('lead.brand.destroy') !!}",
          lead_brand_update: "{!! route('lead.brand.update') !!}",
          lead_brand_show: "{!! route('lead.brand.show') !!}",
          lead_brand_edit: "{!! route('lead.brand.edit') !!}",
        }
    };
    $("#add_brand_form").validate({
    rules: {
    brand_name: {
        required: true,
    },
    },
    messages: {
    brand_name: {
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
    $(document).on('submit','#add_brand_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.lead_brand_store,
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
                     var rowCount = $('#company_listing_table >tbody >tr').length+1;
        $('#brandappend').append(`<tr class="unqbrand`+data.brand.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.brand.lead_brand_name+` </td>
            <td>`+data.brand.lead_company.lead_company_name+`</td>                                                                             
            <td>
                <button class="btn btn-outline-primary brandshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_brand_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editbrand commonbtn" data-brandname="`+data.brand.lead_brand_name+`"  data-id="`+data.brand.id+`" data-toggle="modal" data-target="#edit_brand_modal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deletebrand commonbtn"  data-id="`+data.brand.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('brand was Created successfully');
        $('#add_brand_form').trigger('reset');

          }else{
            alert("Failed to store");
          }
        },
          error: function(xhr, status, error) {
      alert("Failed to Save");
}
    })
});
    // end of add brand
    $(document).on('click','.brandshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url:config.routes.lead_brand_show,
    type: "get", 
    data: {  
        id: id, 
    },
    success: function(data) {
    	// console.log(data.brand.brand_services);
        $('#product_service_list .list').empty();
            $('#view_brand_modal .comn_name').text(data.brand.lead_brand_name);
             if(data.brand.brand_services.length!=0){
            let brands=[];
            $.each(data.brand.brand_services,function(index, brand_service){
            // brands.push(dep.department_name);
            console.log(brand_service.lead_product_or_service.lead_product_or_service_name);
              $('#product_service_list .list').append(`<li class="per_app">`+brand_service.lead_product_or_service.lead_product_or_service_name+`</li>`);
            });
            // $('#view_brand_modal .department-list').append(`<li class="per_app">`+brands+`</li>`);
           
        }else{
        	console.log('No Product or Service');
         $('#product_service_list .list').append(`Product and Service Not Available`);
        }
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
    // edit brand edit
       $(document).on('click','.editbrand',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.lead_brand_edit,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
        console.log(data);
        $('#brand_edit_form').find('#brand_name_edit').val(data.brand.lead_brand_name);
        $('#brand_edit_form').find('#brand_website_edit').val(data.brand.lead_brand_website);
        $('#brand_edit_form').find('#brand_facebook_edit').val(data.brand.lead_brand_facebook);
        $('#brand_edit_form').find('#brand_instagram_edit').val(data.brand.lead_brand_instagram);
        $('#brand_edit_form').find('#brand_linkedin_edit').val(data.brand.lead_brand_linkedin);
        $('#brand_edit_form').find('#brand_youtube_edit').val(data.brand.lead_brand_youTube);
        $('#brand_edit_form').find('#brand_comment_edit').val(data.brand.lead_brand_comment);
            $.each(data.companyList,function(index, company){
            $('#brand_edit_form .brand_company_m').append('<option value="'+company.id +'">'+company.lead_company_name+'</option>');
            });
            $('#select_company_edit option[value="' + data.brand.lead_company_id + '"]').prop('selected', true);
      var photoUrl = "images/leads/brands/"+data.brand.lead_brand_logo;
      var drEvent = $('#brand_logo_edit').dropify(
      {
        defaultFile: photoUrl
      });
      drEvent = drEvent.data('dropify');
      drEvent.resetPreview();
      drEvent.clearElement();
      drEvent.settings.defaultFile = photoUrl;
      drEvent.destroy();
      drEvent.init(); 

        $('#brand_edit_form').find('#id').val(id);
        $('#brand_edit_form').find('#si').val(si);
    },
      error: function(xhr, status, error) {
      alert("Failed to Find");
}
    });
});
      // end edit brand
    // update brand
       $(document).on('submit','#brand_edit_form',function(e){
    e.preventDefault();
    var si = $('#brand_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.lead_brand_update,
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
       if (data.brand.id!="") {
         $('.unqbrand'+data.brand.id).replaceWith(`<tr class="unqbrand`+data.brand.id+`">
        <td>`+si+`</td>
        <td>`+data.brand.lead_brand_name+`</td> 
        <td>`+data.brand.lead_company.lead_company_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary brandshow commonbtn" data-id="`+data.brand.id+`" data-toggle="modal" data-target="#view_brand_modal"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success editbrand commonbtn" data-brandname="`+data.brand.lead_brand_name+`"  data-id="`+data.brand.id+`" data-toggle="modal" data-target="#edit_brand_modal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text deletebrand commonbtn"  data-id="`+data.brand.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('brand was Updated successfully');
    setTimeout(function() {$('#edit_brand_modal').modal('hide');}, 1500);
    $('#brand_edit_form').trigger('reset');
    }else{
      alert("Failed To Update brand");
    }
       },
        error: function(xhr, status, error) {
      alert("Failed to Update");
}
});
});
    // update brand
    // start delete brand
$(document).on('click','.deletebrand',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.lead_brand_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
       if (data.brand!="") {
         toastr.success('brand was Deleted successfully');
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
    // end delete brand
 </script>
 @endsection
 {{-- // end custom js for this page --}}
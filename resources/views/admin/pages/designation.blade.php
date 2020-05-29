@extends('layouts.admin')
@section('pagePluginStyle')
 <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/select2/select2.min.css')}}">

@endsection
@section('pageLevelStyle')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endsection

<!-- start main conten -->
@section('mainContent')
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Designation Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <!-- <h5 class="role-dec">company Name</h5> -->
                                  <h6 class="comn_name per_app text-center"><h6>
                                  	<h5 class="role-dec">Department List</h5>
                                  <span class="department-list"></span><br><br>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
<!-- modal edit -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Designation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="designation_edit_form" id="designation_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                     <div class="card-body">
                                          <div class="form-group">
                                            <label for="exampleInputName1">Designation Name</label>
                                            <input type="text" id="designation_name_modal" name="designation_name_modal" class="form-control" required>
                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputName1">Select a Department</label><br>
                                            <select class="js-example-basic-single w-100 form-control dept_company_m " id="select_sub_department_modal" name="select_sub_department_modal" style="width: 100%">                                               
                                            </select>                                               
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">Designation List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-createpermission" role="tab" aria-controls="pills-home" aria-selected="false">Create Designtion</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-createpermission" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add Designation</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                            	<!-- create / add submit form -->
                          <form method="post" name="add_designation_form" id="add_designation_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="designation_name">Designation Name</label>
                                        <input id="designation_name" class="form-control" name="designation_name" type="text" placeholder="Enter  company Name..">
                                      </div>  
                                       <div class="form-group">
                                        <label for="select_sub_department"> department</label>
                                       <select class="form-control" id="select_sub_department" name="select_sub_department">
                                        <option value="">Select a  department</option>
                                        @foreach ($subDepartmentList as $sItem)
                                          <option value="{{$sItem->id}}">{{$sItem->sub_department_name}}</option>
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
                        <div class="preview"> <i class="icon-people"></i>Designation List </div>
                      </div>
                        <div class="card-body">
                        
                         
                          <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                  <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Name</th>                                   
                                        <th>Department</th>                                   
                                        <th>Parent</th>                                   
                                        <th>Company</th>                                   
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="deisgnation_append">
                                    @foreach ($designationList as $item)
                                    <tr class="unqdesignation{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$item->designation_name}}</td>                                                                   
                                        <td>{{$item->sub_department->sub_department_name}}</td>                                                                   
                                        <td>{{$item->sub_department->department->department_name}}</td>                                                                   
                                        <td>{{$item->sub_department->department->company->company_name}}</td>                                                                   
                                        <td>
                                            {{-- <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary companyshow commonbtn" data-toggle="modal" data-target="#exampleModal1">View</button> --}}
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success edit_designation_btn commonbtn" data-designationname="{{$item->designation_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#exampleModal"><i class="icon-pencil"></i></button>
                                            <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text delete_designation_btn commonbtn">
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
<!-- end main conten -->


<!-- Start of js plugin -->
@section('pagePluginScript')
@section('pagePluginScript')
 <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/js/select2.js')}}"></script>
    <script src="{{asset('backend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection
@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
  @section('pageLevelScript')
  <script type="text/javascript">
    var config = {
        routes: {
          designation_store: "{!! route('designation.store') !!}",
          designation_delete: "{!! route('designation.destroy') !!}",
          designation_update: "{!! route('designation.update') !!}",
          designation_detail: "{!! route('designation.detail') !!}",
        }
    };
    $("#add_designation_form").validate({
    rules: {
    designation_name: {
        required: true,
    }, 
     select_sub_department: {
        required: true,
    },
    },
    messages: {
    designation_name: {
        required: "Please enter a name",
    },
    select_sub_department: {
        required: "Please select a department",
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
     $(document).on('submit','#add_designation_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.designation_store,
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        { 
         if(data.designation.id!=""){
           $('#add_designation_form').trigger('reset');
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
                     var rowCount = $('#order-listing >tbody >tr').length+1;
        $('#deisgnation_append').append(`<tr class="unqdesignation`+data.designation.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.designation.designation_name+` </td>                                                                             
            <td>`+data.designation.sub_department.sub_department_name+` </td>                                                                             
            <td>`+data.designation.sub_department.department.department_name+` </td>                                                                             
            <td>`+data.designation.sub_department.department.company.company_name+` </td>                                                                             
            <td>
             
                <button type="button" class="btn btn-outline-success edit_designation_btn commonbtn" data-designationname="`+data.designation.designation_name+`"  data-id="`+data.designation.id+`" data-toggle="modal" data-target="#exampleModal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text delete_designation_btn commonbtn"  data-id="`+data.designation.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('Company was Created successfully');
        $('#add_company_form').trigger('reset');

        }else{
        alert("Failed to Add");
      }
      }
    })
});
      $(document).on('click','.edit_designation_btn',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.designation_detail,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
        console.log(data);
         $('#designation_edit_form .dept_company_m').empty();
        $('#designation_edit_form').find('#designation_name_modal').val(data.designation.designation_name);   
            $.each(data.subDepartmentList,function(index, sub_department){
            $('#designation_edit_form .dept_company_m').append('<option value="'+sub_department.id +'">'+sub_department.sub_department_name+'</option>');
            });
            $('#select_sub_department_modal option[value="' + data.designation.sub_department_id + '"]').prop('selected', true);
        $('#designation_edit_form').find('#id').val(id);
        $('#designation_edit_form').find('#si').val(si);
    }
    });
});
       $(document).on('submit','#designation_edit_form',function(e){
    e.preventDefault();

    var si = $('#designation_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.designation_update,
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
    if(data.designation.id!=""){
    // var username = data.username===null ? 'N/A':  data.username.name;
        $('.unqdesignation'+data.designation.id).replaceWith(`<tr class="unqdesignation`+data.designation.id+`">
        <td>`+si+`</td>
        <td>`+data.designation.designation_name+`</td>
        <td>`+data.designation.sub_department.sub_department_name+`</td>
        <td>`+data.designation.sub_department.department.department_name+`</td>
        <td>`+data.designation.sub_department.department.company.company_name+`</td>                                                                               
        <td>
          
            <button type="button" class="btn btn-outline-success edit_designation_btn commonbtn" data-departmentname="`+data.designation.designation_name+`"  data-id="`+data.designation.id+`" data-toggle="modal" data-target="#exampleModal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text delete_designation_btn commonbtn"  data-id="`+data.designation.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('Designation was Updated successfully');
    setTimeout(function() {$('#exampleModal').modal('hide');}, 1500);
    $('#designation_edit_form').trigger('reset');
  }else{
    alert("Failed to update");
    }
  }
});
});
  $(document).on('click','.delete_designation_btn',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var type ='show';
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.designation_delete,
    type: "get", 
    data: {  
        id: id
    },
    success: function(data) {
       console.log(data);
        toastr.success('Designation was Deleted successfully');
       $(this).closest('tr').hide(); 
       location.reload();   
    }
    });
  }
});
  </script>
 
  @endsection
  <!-- End custom js for this page-->
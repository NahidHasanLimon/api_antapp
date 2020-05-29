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
{{-- start of view modal --}}
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Department Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h5 class="role-dec"></h5>
                                  <h6 class="comn_name per_app text-center text-bold"><h6>
                                   <div class="card">
                                    <div class="card-body"> 
                                    <div class="card-title text-bold">
                                     Designation List
                                    </div>
                                     <div id="designation_list_div" class="">
                                    <ul class="list list-star"></ul>
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

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="sub_department_edit_form" id="sub_department_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                            <label for="exampleInputName1">Department Name</label>
                                            <input type="text" id="sub_department_name_modal" name="sub_department_name_modal" class="form-control" required>
                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputName1">Company Name</label><br>
                                            <select class="js-example-basic-single w-100 form-control dept_company_m " id="select_department_modal" name="select_department_modal" style="width: 100%">                                               
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
                          {{-- end of edit modal --}}
      <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-pills nav-pills-info" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">Sub Department List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-createpermission" role="tab" aria-controls="pills-home" aria-selected="false">Create a SUB Department</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-createpermission" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add a Sub Department</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                          <form method="post" name="add_department_form" id="add_department_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="sub_department_name">Sub Deaprtment Name</label>
                                        <input id="sub_department_name" class="form-control" name="sub_department_name" type="text" placeholder="Write Department Name..">
                                      </div>    
                                     {{--  <div class="form-group">
                                        <label for="company">Company</label>
                                       <select class="form-control" id="company_id" name="company_id">
                                        <option value="">Select a Company</option>
                                        @foreach ($companyList as $cItem)
                                          <option value="{{$cItem->id}}">{{$cItem->company_name}}</option>
                                        @endforeach
                                         
                                       </select>
                                      </div>  --}}
                                       <div class="form-group">
                                        <label for="select_parent_department">Parent Department</label>
                                       <select class="form-control" id="select_parent_department" name="select_parent_department">
                                        <option value="">Select a Department</option>
                                        @foreach ($departmentList as $depItem)
                                          <option value="{{$depItem->id}}">{{$depItem->department_name}}</option>
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
                    <div class="preview"> <i class="icon-people"></i>Department List </div>
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
                                    <th>Parent Department</th>                                   
                                    <th>Company</th>                                       
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody id="sub_department_append">
                                @foreach ($sub_departmentList as $item)
                                <tr class="unqsub_department{{$item->id}}">
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$item->sub_department_name}}</td>
                                    <td>{{ $item->department->department_name ?? 'no department' }}</td>
                                    <td>{{ $item->department->company->company_name ?? 'no company' }}</td>
                                    <td>
                                        <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary departmentshow commonbtn" data-toggle="modal" data-target="#exampleModal1"><i class="ti-arrow-circle-right"></i></button>
                                        <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editdepartment  commonbtn" data-departmentname="{{$item->sub_department_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#exampleModal"><i class="icon-pencil"></i></button>
                                        <button type="button" data-id="{{$item->id}}" class="btn btn-outline-danger btn-icon-text deletedepartment commonbtn">
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
 <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
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
          sub_department_store: "{!! route('sub-department.store') !!}",
          sub_department_delete: "{!! route('sub-department.destroy') !!}",
          sub_department_update: "{!! route('sub-department.update') !!}",
          sub_department_detail: "{!! route('sub-department.detail') !!}",
        }
    };
    $("#add_department_form").validate({
    rules: {
    sub_department_name: {
        required: true,
    },
    select_parent_department: {
        required: true,
    },
    },
    messages: {
    sub_department_name: {
        required: "Please enter a name",
    },
    select_parent_department: {
        required: "Please Select a department as parent",
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

		$(document).on('submit','#add_department_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.sub_department_store,
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        { 
          console.log(data);
          // console.log(data.company.company_name);
        // console.log(data.company);
         
        // console.log( JSON.stringify(data) )
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
        $('#sub_department_append').append(`<tr class="unqsub_department`+data.id+`">
            <td>#</td>
            <td>`+data.sub_department_name+`</td>
            <td>`+data.department.department_name+`</td>                                                                     
            <td>`+data.department.company.company_name+`</td>                                                                     
            <td>
                <button class="btn btn-outline-primary departmentshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#exampleModal1"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editdepartment  commonbtn" data-departmentname="`+data.sub_department_name+`"  data-id="`+data.id+`" data-toggle="modal" data-target="#exampleModal"><i class="icon-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger btn-icon-text deletedepartment commonbtn"  data-id="`+data.id+`">
                <i class="icon-trash"></i>                                                       
                </button>
            </td>
        </tr>`);
        toastr.success('Department was Created successfully');
        $('#add_department_form').trigger('reset');
        }
    })
});
	 $(document).on('click','.departmentshow',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var type ='show';
    $.ajax({
    url:config.routes.sub_department_detail,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
      // console.log(data);
      console.log(data);
      // console.log(data.department.sub_departments);
        $('#designation_list_div .list').empty();
            $('#exampleModal1 .comn_name').text(data.SubDepartment.sub_department_name);
             if(data.SubDepartment.designations.length!=0){
            let SubDepartments=[];
            $.each(data.SubDepartment.designations,function(index, designation){
            // SubDepartments.push(designation.designation_name);
            $('#designation_list_div .list').append(`<li class="per_app">`+designation.designation_name+`</li>`);
            });
           
          }else{
             $('#designation_list_div .list').append(`Designation Not Available`);
          }
    }
    });
});
 $(document).on('click','.deletedepartment',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var type ='show';
    // alert(id);
  if(confirm('Are You Sure to Delete ?')){
      $.ajax({
    url:config.routes.sub_department_delete,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
       console.log(data);
      toastr.success('Sub Department Deleted successfully');
       $(this).closest('tr').hide();    
    }
    });
  }
});
 // start edit
 $(document).on('click','.editdepartment ',function(e){
    e.preventDefault();
    $('#sub_department_edit_form').trigger('reset');
    var id = $(this).data('id');
    alert(id);
    var name = $(this).data('departmentname');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.sub_department_detail,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
      console.log(data);
        console.log(data.companyList);
        $('#sub_department_edit_form .dept_company_m').empty();
        $('#sub_department_edit_form').find('#sub_department_name_modal').val(data.SubDepartment.sub_department_name);   
            $.each(data.departmentList,function(index, department){
            $('#sub_department_edit_form .dept_company_m').append('<option value="'+department.id +'">'+department.department_name+'</option>');
            });
            $('#select_department_modal option[value="' + data.SubDepartment.department_id + '"]').prop('selected', true);
        $('#sub_department_edit_form').find('#id').val(id);
        $('#sub_department_edit_form').find('#si').val(si);
    }
    });
});
 $(document).on('submit','#sub_department_edit_form',function(e){
    e.preventDefault();
    var si = $('#sub_department_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.sub_department_update,
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
        $('.unqsub_department'+data.SubDepartment.id).replaceWith(`<tr class="unqsub_department`+data.SubDepartment.id+`">
        <td>`+si+`</td>
        <td>`+data.SubDepartment.sub_department_name+`</td>
        <td>`+data.SubDepartment.department.department_name+`</td>
        <td>`+data.SubDepartment.department.company.company_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary departmentshow commonbtn" data-id="`+data.SubDepartment.id+`" data-toggle="modal" data-target="#exampleModal1"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success editdepartment commonbtn" data-departmentname="`+data.SubDepartment.sub_department_name+`"  data-id="`+data.SubDepartment.id+`" data-toggle="modal" data-target="#exampleModal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text deletedepartment commonbtn"  data-id="`+data.SubDepartment.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('Sub Department was Updated successfully');
    setTimeout(function() {$('#exampleModal').modal('hide');}, 1500);
    $('#sub_department_edit_form').trigger('reset');
    }
})
})
	</script>
 
@endsection
  <!-- End custom js for this page-->
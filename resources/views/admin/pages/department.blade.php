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
 <div class="modal fade" id="view_department_modal" tabindex="-1" role="dialog" aria-labelledby="edit_department_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_department_modalLabel">Department Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  {{-- <h5 class="role-dec">Department Name</h5> --}}
                                  <h6 class="comn_name per_app text-center mb-2"><h6>
                                  {{-- <h5 class="role-dec">Sub Department List</h5>
                                  <ul class="sub-department-list"></ul><br><br> --}}
                                  <div class="card">
                                    <div class="card-body"> 
                                    <div class="card-title text-bold">
                                      SUB Department List
                                    </div>
                                     <div id="sub_departments_list_div" class="">
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

 <div class="modal fade" id="edit_department_modal" tabindex="-1" role="dialog" aria-labelledby="edit_department_modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_department_modalLabel">Edit Department</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                               <form method="post" name="department_edit_form" id="department_edit_form">
                                @csrf
                                <div class="modal-body">
                                  <div class="col-12 grid-margin stretch-card">
                                      <div class="card-body">
                                          <div class="form-group">
                                            <label for="exampleInputName1">Department Name</label>
                                            <input type="text" id="department_name_modal" name="department_name_modal" class="form-control" required>

                                            <input type="hidden" id="id" name="id" class="form-control">
                                            <input type="hidden" id="si" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputName1">Company Name</label><br>
                                            <select class="js-example-basic-single w-100 form-control dept_company_m " id="select_company_modal" name="select_company_modal" style="width: 100%">                                               
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
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-permissionlist" role="tab" aria-controls="pills-profile" aria-selected="true">Department List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-createpermission" role="tab" aria-controls="pills-home" aria-selected="false">Create Department</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-createpermission" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-title">
                        <div class="preview"> <i class="icon-people"></i>Add Department</div>
                      </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                          <form method="post" name="add_department_form" id="add_department_form">
                          	@csrf
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="dep_name">Deaprtment Name</label>
                                        <input id="dep_name" class="form-control" name="dept_name" type="text" placeholder="Write Department Name..">
                                      </div>    
                                      <div class="form-group">
                                        <label for="company">Company</label>
                                       <select class="form-control" id="company_id" name="company_id">
                                        <option value="">Select a Company</option>
                                        @foreach ($companyList as $cItem)
                                          <option value="{{$cItem->id}}">{{$cItem->company_name}}</option>
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
                                        <th>Company</th>                                       
                                        <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="departmentappend">
                                    @foreach ($departmentList as $item)
                                    <tr class="unqdepartment{{$item->id}}">
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$item->department_name}}</td>
                                        <td>{{$item->company->company_name}}</td>
                                       {{--  <td>{{$item->name ? $item->name : 'N/A' }}</td>  --}}                                                                              
                                        <td>
                                            <button  data-id="{{$item->id}}" class="btn btn-lg btn-outline-primary departmentshow commonbtn" data-toggle="modal" data-target="#view_department_modal"><i class="ti-arrow-circle-right"></i></button>
                                            <button type="button" data-serial="{{$loop->index + 1}}" class="btn btn-outline-success editdepartment commonbtn" data-departmentname="{{$item->department_name}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#edit_department_modal"><i class="icon-pencil"></i></button>
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
          department_store: "{!! route('department.store') !!}",
          department_delete: "{!! route('department.destroy') !!}",
          department_update: "{!! route('department.update') !!}",
          department_detail: "{!! route('department.detail') !!}",
        }
    };
		$(document).on('submit','#add_department_form', function(event){
    event.preventDefault();
    $.ajax({
        url:config.routes.department_store,
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        { 
          console.log(data);
          console.log(data.company.company_name);
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
        $('#departmentappend').append(`<tr class="unqdepartment`+data.id+`">
            <td>`+rowCount+`</td>
            <td>`+data.department_name+`</td>                                                                     
            <td>`+data.company.company_name+`</td>                                                                     
            <td>
                <button class="btn btn-outline-primary departmentshow commonbtn" data-id="`+data.id+`" data-toggle="modal" data-target="#view_department_modal"><i class="ti-arrow-circle-right"></i></button>
                <button type="button" class="btn btn-outline-success editdepartment commonbtn" data-departmentname="`+data.department_name+`"  data-id="`+data.id+`" data-toggle="modal" data-target="#edit_department_modal"><i class="icon-pencil"></i></button>
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
    url:config.routes.department_detail,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
      console.log(data.department.sub_departments);
        $('#view_department_modal .sub-department-list').empty();
        $('#sub_departments_list_div .list').empty();
            $('#view_department_modal .comn_name').text(data.department.department_name);
             if(data.department.sub_departments.length!=0){
            let sub_departments=[];
            $.each(data.department.sub_departments,function(index, sub_dept){
            sub_departments.push(sub_dept.sub_department_name);
            $('#sub_departments_list_div .list').append('<li>'+sub_dept.sub_department_name+'</li>')
            });
            // $('#view_department_modal .sub-department-list').append(`<li class="per_app">`+sub_departments+`</li>`);
           
          }else{
             // $('#view_department_modal .sub-department-list').append(`Sub Department Not Available`);
             $('#sub_departments_list_div .list').append(`Sub Department Not Available`);
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
    url:config.routes.department_delete,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
       console.log(data);
      toastr.success('Department Deleted successfully');
       $(this).closest('tr').hide();    
    }
    });
  }
});
 // start edit
 $(document).on('click','.editdepartment',function(e){
    e.preventDefault();
     $('#department_edit_form').trigger('reset');
    var id = $(this).data('id');
    var name = $(this).data('departmentname');
    var si =  $(this).data('serial');
    var type ='edit';
    $.ajax({
    url:config.routes.department_detail,
    type: "get", 
    data: {  
        id: id, 
        type:type,
    },
    success: function(data) {
        console.log(data.companyList);
        $('#department_edit_form .dept_company_m').empty();
        $('#department_edit_form').find('#department_name_modal').val(data.department.department_name);   
            $.each(data.companyList,function(index, company){
            $('#department_edit_form .dept_company_m').append('<option value="'+company.id +'">'+company.company_name+'</option>');
            });
            $('#select_company_modal option[value="' + data.department.company_id + '"]').prop('selected', true);
        $('#department_edit_form').find('#id').val(id);
        $('#department_edit_form').find('#si').val(si);
    }
    });
});
 $(document).on('submit','#department_edit_form',function(e){
    e.preventDefault();
    var si = $('#department_edit_form').find('#si').val();
    $.ajax({
    url:config.routes.department_update,
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
        $('.unqdepartment'+data.department.id).replaceWith(`<tr class="unqdepartment`+data.department.id+`">
        <td>`+si+`</td>
        <td>`+data.department.department_name+`</td>
        <td>`+data.department.company.company_name+`</td>                                                                               
        <td>
            <button class="btn btn-outline-primary departmentshow commonbtn" data-id="`+data.department.id+`" data-toggle="modal" data-target="#view_department_modal"><i class="ti-arrow-circle-right"></i></button>
            <button type="button" class="btn btn-outline-success editdepartment commonbtn" data-departmentname="`+data.department.department_name+`"  data-id="`+data.department.id+`" data-toggle="modal" data-target="#edit_department_modal"><i class="icon-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger btn-icon-text deletedepartment commonbtn"  data-id="`+data.department.id+`">
            <i class="icon-trash"></i>                                                       
            </button>
        </td>
    </tr>`);
    toastr.success('Department was Updated successfully');
    setTimeout(function() {$('#edit_department_modal').modal('hide');}, 1500);
    $('#department_edit_form').trigger('reset');
    }
});
});
	</script>
 
@endsection
  <!-- End custom js for this page-->
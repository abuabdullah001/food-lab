@extends('Backend.master')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Title and Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">Cousine Manage</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                    <i class="ri-add-line"></i> Add Cousine
                </button>
            </div>

            <!-- Roles DataTable -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="rolesTable">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Cousine Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--  @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <!-- You can add Edit/Delete here -->
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach  --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add Role Modal -->
            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="createCousineForm">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addRoleModalLabel">Add New Cousine</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="roleName" class="form-label">Cousine Name</label>
                                    <input type="text" class="form-control" id="roleName" name="name" placeholder="Enter role name">
                                    @error('name')
                                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <a  class="btn btn-primary create">Create Cousine</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="modal fade" id="editCousineModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="editCousineForm">
                        @csrf

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Cousine</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="cousine_id" name="id" hidden>
                                    <label for="role_name" class="form-label">Cousine Name</label>

                                    <input type="text" class="form-control" id="cousine_name" name="editname">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <a  class="btn btn-primary update">Update Cousine</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>




   <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#rolesTable').DataTable({
            processing: true,
            serverSide: true,
             ajax:"{{ route('getCousines') }}",
             columns:[
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'name',name:'name'},
                {data:'action',name:'action',orderable:false,searchable:false},
             ]
        });
    });

    $(document).on('click','.editRoleBtn',function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
         $('#cousine_id').val(id);
         $('#cousine_name').val(name);
    })


// Create Cousine data
$(document).on('click', '.create', function (e) {
    e.preventDefault();

    let name = $('input[name="name"]').val().trim();
    $('input[name="name"]').next('.text-danger').remove();

    if (name === '') {
        $('input[name="name"]').after('<span class="text-danger d-block mt-1">Please enter cuisine name</span>');
        return;
    }

    let formData = new FormData($('#createCousineForm')[0]);
    $.ajaxSetup({
        headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: "{{ route('cousines.store') }}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#addRoleModal').trigger('reset');
            $('#addRoleModal').modal('hide');
            $('#rolesTable').DataTable().ajax.reload();
            toastr.success('Cousine updated successfully');
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.name) {
                    $('input[name="name"]').after('<span class="text-danger d-block mt-1">' + errors.name[0] + '</span>');
                }
            }
        }
    });
});

// Update Cousine data
$(document).on('click', '.update', function (e) {
    e.preventDefault();
     let name = $('input[name="editname"]').val().trim();
    $('input[name="editname"]').next('.text-danger').remove();

    if (name === '') {
        $('input[name="editname"]').after('<span class="text-danger d-block mt-1">Please enter cuisine name</span>');
        return;
    }

    let formData = new FormData($('#editCousineForm')[0]);
    $.ajaxSetup({
        headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: "{{ route('cousines.update') }}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          $('#editCousineForm').trigger('reset');
            $('#editCousineModal').modal('hide');
            $('#rolesTable').DataTable().ajax.reload();
            toastr.success('Cousine updated successfully');
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.name) {
                    $('input[name="name"]').after('<span class="text-danger d-block mt-1">' + errors.name[0] + '</span>');
                }
            }
        }
    });
});

// Delete Cousine data
$(document).on('click', '.delete', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    $.ajaxSetup({
        headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: "{{ route('cousines.destroy') }}",
        type: 'POST',
        data: { id: id },
        success: function (response) {
            if(response.status ===200){
            $('#rolesTable').DataTable().ajax.reload();
            toastr.success('Cousine deleted successfully');
            }
            else{
                toastr.error('Something went wrong');
            }
        }
        });
});
</script>
@endsection

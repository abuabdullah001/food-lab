@extends('Backend.master')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h2>Allergens CRUD</h2>
            <button id="createNew" class="btn btn-success mb-3">+ Add Allergen</button>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>Name</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ajaxModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form id="formData">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add/Edit Allergen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('allergens.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#createNew').click(function() {
        $('#id').val('');
        $('#name').val('');
        $('#ajaxModal').modal('show');
    });

    $('#formData').submit(function(e) {
        e.preventDefault();
        let id = $('#id').val();
        let url = id ? '{{ url("allergens/update") }}/' + id : '{{ route("allergens.store") }}';
        $.post(url, $(this).serialize(), function(data) {
            $('#ajaxModal').modal('hide');
            table.ajax.reload();
            alert(data.success);
        });
    });

    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get('{{ url("allergens/edit") }}/' + id, function(data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#ajaxModal').modal('show');
        });
    });

    $('body').on('click', '.delete', function() {
        if (confirm("Are you sure?")) {
            let id = $(this).data('id');
            $.ajax({
                type: "DELETE",
                url: '{{ url("allergens/delete") }}/' + id,
                success: function(data) {
                    table.ajax.reload();
                    alert(data.success);
                }
            });
        }
    });
</script>

@endsection
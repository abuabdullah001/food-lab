@extends('Backend.master')

@push('styles')
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS with Bootstrap 5 integration -->
<link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endpush

@section('content')
<div class="container-fluid" style="margin-top: 100px;">
    <h1 class="mb-4">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Add Product</a>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body">
                <h2>Bootstrap 5 DataTable Example</h2>
                <div class="table-responsive">
                    <table id="data" class="table table-bordered table-hover align-middle text-center w-100">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Slug</th>
                                <th>Product Description</th>
                                <th>Price</th>
                                <th>Cuisines ID</th>
                                <th>Ingredients</th>
                                <th>Pre Order</th>
                                <th>Always Avaialable</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        let table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },


                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'product_description',
                    name: 'product_description'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'cuisines_id',
                    name:  'cuisines_id',
                },

                {
                    data: 'ingredients',
                    name: 'ingredients'
                },
                {
                    data: 'pre_order',
                    name: 'pre_order'
                },
                {
                    data: 'always_avaialable',
                    name: 'always_avaialable'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],

        });


    });
</script>

@endpush
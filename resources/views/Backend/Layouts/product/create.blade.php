@extends('Backend.master')

@section('content')
<div class="container " style="margin-top: 100px;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0" style="color: white;">Add New Product</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-4">
                    <label for="product_name" class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" value="{{ old('product_name') }}" required>
                </div>

                <div class="mb-4">
                    <label for="slug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Unique slug, e.g. product-name" value="{{ old('slug') }}" required>
                </div>

                <div class="mb-4">
                    <label for="product_description" class="form-label fw-semibold">Description</label>
                    <textarea name="product_description" id="product_description" rows="4" class="form-control" placeholder="Write product description">{{ old('product_description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" placeholder="Enter price in USD" value="{{ old('price') }}" required>
                </div>

                <div class="mb-4">
                    <label for="cuisines_id" class="form-label fw-semibold">Cuisine <span class="text-danger">*</span></label>
                    <select name="cuisines_id" id="cuisines_id" class="form-select" required>
                        <option value="" disabled selected>Select cuisine</option>
                        @foreach($cuisines as $cuisine)
                            <option value="{{ $cuisine->id }}" {{ old('cuisines_id') == $cuisine->id ? 'selected' : '' }}>
                                {{ $cuisine->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="ingredients" class="form-label fw-semibold">Ingredients</label>
                    <textarea name="ingredients" id="ingredients" rows="3" class="form-control" placeholder="List product ingredients separated by commas">{{ old('ingredients') }}</textarea>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="pre_order" class="form-label fw-semibold">Pre Order</label>
                        <select name="pre_order" id="pre_order" class="form-select">
                            <option value="active" {{ old('pre_order') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="deactive" {{ old('pre_order') == 'deactive' ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="always_avaialable" class="form-label fw-semibold">Always Available</label>
                        <select name="always_avaialable" id="always_avaialable" class="form-select">
                            <option value="active" {{ old('always_avaialable') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="deactive" {{ old('always_avaialable') == 'deactive' ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label fw-semibold">Start Date</label>
                        <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="end_date" class="form-label fw-semibold">End Date</label>
                        <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-5">Save Product</button>
            </form>
        </div>
    </div>
</div>
@endsection

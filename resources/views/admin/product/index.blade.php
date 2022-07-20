@extends('layouts.main')

@section('container')

@if(session()->has('success'))

<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('delete'))

<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('delete') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h4 class="mt-3">Data Product</h4>
<div class="table-responsive col-lg-10 mt-4">
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3"> Create New Product</a>
    <table id="datatable" class="table table-striped table-sm" width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Product</th>
                <th scope="col">Harga</th>
                <th scope="col">Stock</th>
                <th scope="col">Desc</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>
</div>
<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display: none">
</form>
@endsection

@push('js')
<script>
    // AJAX DataTable
    var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        scrollX: true,
        ajax: {
            url: '{{ route('admin.data.product') }}',
        },
        dom: "Bfrtip",
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable : false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'stock',
                name: 'stock'
            },
            {
                data: 'desc',
                name: 'desc'
            },
            {
                data: 'aksi',
                name: 'aksi'
            }
        ]
    });
</script>
@endpush
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

<h4 class="mt-3">Data Order</h4>
<div class="table-responsive col-lg-10 mt-4">

    <a href="{{ route('customer.buy.create') }}" class="btn btn-primary mb-3"> New Order</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buys as $buy)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buy->product->name }}</td>
                <td>{{ \App\Utilities\Helpers::formatCurrency($buy->product->price, 'Rp.') }}</td>
                <td>{{ $buy->qty }}</td>
                <td>{{ \App\Utilities\Helpers::formatCurrency($buy->qty * $buy->price, 'Rp.') }}</td>

                @if($buy->status == 'accepted')
                <td><span class="badge bg-success">{{ $buy->status }}</span></td>
                <td><a href="{{ route('customer.buy.show', $buy->id) }}" class="badge bg-info"><i
                            class="bi bi-receipt"></i></a></td>
                @elseif($buy->status == 'order')
                <td><span class="badge bg-warning">{{ $buy->status }}</span></td>
                <td>
                    <form action=" {{ route('customer.buy.destroy', $buy->id) }} " method="post" class="d-inline">
                        @csrf
                        @method('delete')

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                class="bi bi-trash2-fill"></i></button>
                    </form>
                </td>
                @else
                <td><span class="badge bg-danger">{{ $buy->status }}</span></td>
                <td>
                    <form action=" {{ route('customer.buy.destroy', $buy->id) }} " method="post" class="d-inline">
                        @csrf
                        @method('delete')

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                class="bi bi-trash2-fill"></i></button>
                    </form>
                </td>
                @endif



            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $buys->links() }}
</div>
@endsection

{{-- @push('js')
<script>
    // AJAX DataTable
    var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        scrollX: true,
        ajax: {
            url: '{{ route('admin.data.buy') }}',
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
                data: 'qty',
                name: 'qty'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'aksi',
                name: 'aksi'
            }
        ]
    });
</script>
@endpush --}}
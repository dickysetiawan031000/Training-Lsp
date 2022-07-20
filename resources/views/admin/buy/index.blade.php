@extends('layouts.main')

@section('container')

@if(session()->has('accept'))

<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('accept') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('allreadyaccepted'))

<div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('allreadyaccepted') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('allreadyrejected'))

<div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('allreadyrejected') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('outofstock'))

<div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('outofstock') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('reject'))

<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('reject') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h4 class="mt-3">Data Order</h4>
<div class="table-responsive col-lg-10 mt-4">
    <table id="table1" class="table table-striped text-center" width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Stock</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buys as $buy)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buy->user->name }}</td>
                <td>{{ $buy->product->name }}</td>
                <td>{{ \App\Utilities\Helpers::formatCurrency($buy->price, 'Rp.') }}</td>
                <td>{{ $buy->qty }}</td>
                <td class="bg-secondary text-white">{{ $buy->product['stock'] }}</td>
                <td>{{ \App\Utilities\Helpers::formatCurrency($buy->qty * $buy->price, 'Rp.') }}</td>

                @if($buy->status == 'accepted')
                <td><span class="badge bg-success">{{ $buy->status }}</span></td>
                @elseif($buy->status == 'order')
                <td><span class="badge bg-warning">{{ $buy->status }}</span></td>
                @else
                <td><span class="badge bg-danger">{{ $buy->status }}</span></td>
                @endif
                <td>

                    <a href="{{ url('admin/buy/accepted', [$buy->id, $buy->product_id]) }}"
                        class="btn bg-success text-white" onclick="return confirm('Are you sure?')"><i
                            class="bi bi-check-lg"></i></a>

                    <a href="{{ url('admin/buy/rejected', [$buy->id, $buy->product_id]) }}"
                        class="btn bg-danger text-white" onclick="return confirm('Are you sure?')"><i
                            class="bi bi-x-lg"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>



    </table>
    {{ $buys->links() }}
</div>

@endsection

{{-- @push('js') --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
--}}

{{-- @push('js')
<script>
    AJAX DataTable
    var datatable = $('#table1').DataTable({
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
                name: 'users.name'
            },
            {
                data: 'namep',
                name: 'products.namep'
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
                data: 'stock',
                name: 'products.stock'
            },
            {
                data: 'total_price',
                name: 'total_price'
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
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
    <table id="table1" class="table table-striped text-center">
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
</div>
@endsection

@push('s')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function(){
        isi()
    })

    function isi(){
        $('#table1').DataTable({
            serverside : true,
            responseive : true,
            ajax : {
                url : "{{ route('admin.buy.index') }}"
            },
            columns : [
                {
                    "data" : null, "sortable" : false,
                    render : function(data, type, row, meta){
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {data : 'user->name', name: 'customer'},
                {data : 'product', name: 'product'},
                {data : 'price', name: 'price'},
                {data : 'qty', name: 'qty'},
                {data : 'stock', name: 'stock'},
                {data : 'totalprice', name: 'totalprice'},
                {data : 'status', name: 'status'},
                {data : 'action', name: 'action'},
            ]
        })
    }

</script>

@endpush
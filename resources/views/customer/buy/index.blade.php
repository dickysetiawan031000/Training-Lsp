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
                <td>{{ $buy->price }}</td>
                <td>{{ $buy->qty }}</td>
                <td>{{ $buy->qty * $buy->price }}</td>

                @if($buy->status == 'accepted')
                <td><span class="badge bg-success">{{ $buy->status }}</span></td>
                @else
                <td><span class="badge bg-danger">{{ $buy->status }}</span></td>
                @endif
                <td>
                    {{-- <a href="{{ route('customer.buy.edit', [$buy->id, $buy->product_id]) }}"
                        class="badge bg-warning"><i class="bi bi-pencil-square"></i></a> --}}
                    <form action=" {{ route('customer.buy.destroy', $buy->id) }} " method="post" class="d-inline">
                        @csrf
                        @method('delete')

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                class="bi bi-trash2-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
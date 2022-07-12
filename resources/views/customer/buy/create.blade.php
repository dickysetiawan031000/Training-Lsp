@extends('layouts.main')

@section('container')

<h4 class="mt-4"> Add New Order</h4>


<form action="{{ route('customer.buy.store') }}" method="post" class="mt-4 col-lg-6">
    @csrf

    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

    <div class="form-floating mb-3">
        <select class="form-select" id="product" aria-label="Floating label select example" name="product_id"
            onchange="price()">
            @foreach ($products as $product)
            @if(old('product_id')== $product->id)

            <option value="{{ $product->id }}" selected>{{ $product->name }}</option>

            @else
            <option value="{{ $product->id }}">{{ $product->name }}</option>

            @endif

            @endforeach
        </select>
        <label for="product">Products</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty">
        <label for="price">Qty</label>
    </div>

    {{-- <div class="form-floating mb-3">
        <input type="text" class="form-control" name="total" id="total" placeholder="Total">
        <label for="desc">Total</label>
    </div> --}}

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
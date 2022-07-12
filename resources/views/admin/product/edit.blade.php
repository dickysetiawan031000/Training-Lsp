@extends('layouts.main')

@section('container')

<h4 class="mt-4"> Edit Product</h4>


<form action="{{ route('admin.product.update', $product->id) }}" method="post" class="mt-4 col-lg-6">
    @csrf
    @method('put')
    <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control" id="name" placeholder="Product Name"
            value="{{ old('name', $product->name) }}">
        <label for="name">Product Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="price" id="price" placeholder="Price"
            value="{{ old('price', $product->price) }}">
        <label for="price">Price</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock"
            value="{{ old('stock', $product->stock) }}">
        <label for="stock">Qty</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="desc" id="desc" placeholder="Description"
            value="{{ old('desc', $product->desc) }}">
        <label for="desc">Desc</label>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection
@extends('admin.layouts.main')

@section('container')

<h4 class="mt-4"> Add Product</h4>


<form action="{{ route('admin.product.store') }}" method="post" class="mt-4 col-lg-6">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
        <label for="name">Product Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="price" id="price" placeholder="Price">
        <label for="price">Price</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="desc" id="desc" placeholder="Description">
        <label for="desc">Desc</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
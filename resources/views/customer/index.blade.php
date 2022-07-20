@extends('layouts.main')

@section('container')

{{-- <h4 class="mt-4"> Ini Index customer</h4> --}}

<div class="container">
    <div class=" d-flex flex-column mt-4">
        <div class="row px-1 mb-2 gap-5">
            <div class="col-lg-4 col-8" style="background-color:antiquewhite">
                <p>Total Order</p>
                <h2>{{ $orderCount }}</h2>
                <p class="text-end"><a href="{{ route('customer.buy.index') }}" class=""><i
                            class="bi bi-arrow-right text-black"></i></a>
                </p>
            </div>

        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="card col-lg-4" style="width: 25%">
            <div class="card-body">
                <h5 class="card-title">Total Order</h5>
                <h3 class="card-text"> {{ $orderCount }}</h3>
                <p class="text-end"><a href="{{ route('customer.buy.index') }}" class=""><i
                            class="bi bi-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>
</div> --}}


@endsection
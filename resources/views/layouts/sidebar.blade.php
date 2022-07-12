<ul class="list-unstyled ps-0">
    <li class="mb-1">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">


            @if(auth()->user()->role == '1')
            <li><a href="{{ route('admin.dashboard.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded mb-2 mt-4">Dashboard</a></li>

            <li><a href="{{ route('admin.product.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded mb-2">Product</a></li>
            <li><a href="{{ route('admin.buy.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded mb-2">Order</a>
            </li>
            @endif

            @if(auth()->user()->role == '2')
            <li><a href="{{ route('customer.dashboard.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded mb-2 mt-4">Dashboard</a></li>

            <li><a href="{{ route('customer.buy.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded mb-2">Order</a></li>
            @endif
        </ul>
    </li>
</ul>
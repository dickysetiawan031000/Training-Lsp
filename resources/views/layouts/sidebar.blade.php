<ul class="list-unstyled ps-0">
    <li class="mb-1">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
            <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded mb-2 mt-4">Dashboard</a></li>

            @if(auth()->user()->role == '1')

            <li><a href="{{ route('admin.product.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded">Product</a></li>
            @endif
        </ul>
    </li>
</ul>
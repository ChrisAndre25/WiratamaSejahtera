<x-app title="Products - Wiratama Sejahtera">
    <x-slot name="navbar"></x-slot>
    <div class="container mt-4 p-5">
        @include('include.search')
        <nav aria-label="breadcrumb bg-light">
            <ol class="breadcrumb pl-0 text-md-left">
              <li class="breadcrumb-item"><a href="{{ route('home')}}" class="text-decoration-none">Home</a></li>
              @if($category_name ?? '')
              <li class="breadcrumb-item"><a href="{{ route('products.index')}}" class="text-decoration-none">All Categories</a></li>
                @foreach($categories as $category)
                    @if($category->slug == $category_name)
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->category_name }}</li>
                    @endif
                @endforeach
              @else
              <li class="breadcrumb-item active" aria-current="page">All Products</li>
              @endif
            </ol>
        </nav>      
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-md-9">
                <div class="row d-flex align-items-center justify-content-center">
                @foreach($products as $key => $data)
                <div class="col-lg-4 p-2 col-md-4">
                    <a class="text-decoration-none text-reset" href="{{ route('product.show', $data->slug)}}">
                    <div class="card shadow-sm rounded border-top-0">
                        <div class="col-12 py-1">
                            <img class="rounded img-fluid card-img-top" src="/storage/img/products/{{ $data->image_1 }}">
                        </div>
                        <div class="card-body pt-2">
                            <h6 class="card-title text-muted mb-2">Product</h6>
                            <h6 class="card-title font-weight-light mb-1 text-truncate">{{ $data->product_name }}</h6>
                            <div class="col-4 p-0">
                                <img class="img-fluid" src="/storage/img/brands/{{ $data->brand_name }}.png" width="100">
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                </div>
                <div class="row d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
            <div class="col-lg-3 p-2 col-md-4">
                <div class="card-header rounded-top bg-red text-white font-weight-bold">Categories</div>
                <ul class="list-group rounded-bottom border-top-0">
                    <a href="{{ route('products.index')}}" class="text-decoration-none text-reset">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        All Categories
                        </li>
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('products.category_index', $category->slug )}}" class="text-decoration-none text-reset">
                        @if($category_name ?? '')
                            @if($category->slug == $category_name)
                            <li class="list-group-item d-flex justify-content-between align-items-center text-white bg-blue">
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            @endif
                        @else
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        @endif
                        {{ $category->category_name }}
                        <span class="badge badge-primary badge-pill">{{ $category->category_count }}</span>
                        </li>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <x-slot name="footer"></x-slot>
</x-app>
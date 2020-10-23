<x-app title="Products - Wiratama Sejahtera">
    <x-slot name="navbar"></x-slot>
    <div class="container mt-4 p-5">
        @include('include.search')
        <nav aria-label="breadcrumb bg-light">
            <ol class="breadcrumb pl-0 text-md-left">
              <li class="breadcrumb-item"><a href="{{ route('home')}}" class="text-decoration-none">Home</a></li>
              @if($brand_name ?? '')
                <li class="breadcrumb-item"><a href="{{ route('products.brands_index')}}" class="text-decoration-none">All Brands</a></li>
                @foreach($brands as $brand)
                    @if($brand->slug == $brand_name)
                    <li class="breadcrumb-item active" aria-current="page">{{ $brand->brand_name}}</li>
                    @endif
                @endforeach
              @else
              <li class="breadcrumb-item active" aria-current="page">All Brands</li>
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
                <div class="card-header rounded-top bg-red text-white font-weight-bold">Brands</div>
                <ul class="list-group rounded-bottom border-top-0">
                    <a href="{{ route('products.brands_index')}}" class="text-decoration-none text-reset">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        All Brands
                        </li>
                    </a>
                    @foreach($brands as $brand)
                    <a href="{{ route('products.brand_index', $brand->slug)}}" class="text-decoration-none text-reset">
                        @if($brand_name ?? '')
                            @if($brand->slug == $brand_name)
                            <li class="list-group-item d-flex justify-content-between align-items-center text-white bg-blue">
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            @endif
                        @else
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        @endif
                                <div class="col-12">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div class="col-4 ml-0 pl-0">
                                            <img class="img-fluid" src="/storage/img/brands/{{ $brand->brand_name }}.png" width="100">
                                        </div>
                                        <div class="col-8 ml-0 pl-0">
                                            {{ $brand->brand_name }}
                                        </div>
                                    </div>
                                </div>
                        </li>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <x-slot name="footer"></x-slot>
</x-app>
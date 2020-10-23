<x-app title="Products - Wiratama Sejahtera">
    <x-slot name="navbar"></x-slot>
    <div class="container mt-4 p-5">
        @include('include.search')
        <div class="bg-gray p-2 rounded">
           Search result for <span class="bg-white p-1 rounded font-weight-bold">{{ $search }}</span>
        </div>      
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-9">
                <div class="row d-flex align-items-center justify-content-center">
                @if(count($brands) > 0)
                @foreach($brands as $key => $data)
                <div class="col-lg-3 p-2 col-md-4">
                    <a class="text-decoration-none text-reset" href="{{ route('products.brand_index', $data->slug)}}">
                    <div class="card shadow-sm rounded border-top-0">
                        <div class="col-12 d-flex justify-content-center py-1">
                            <img class="img-fluid" src="/storage/img/{{ $data->brand_name }}.png">
                        </div>
                        <div class="card-body pt-2">
                            <h6 class="card-title text-muted mb-2">Brand</h6>
                            <h6 class="card-title font-weight-light mb-1 text-truncate">{{ $data->brand_name }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                @endif
                @if(count($products) > 0)
                @foreach($products as $key => $data)
                <div class="col-lg-3 p-2 col-md-4">
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
                <div class="row d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer"></x-slot>
</x-app>
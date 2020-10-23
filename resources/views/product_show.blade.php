<x-app title="{{ $product->product_name }} - {{ $product->brand_name}}">
    <x-slot name="navbar"></x-slot>
        <div class="container mt-4 p-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 p-2 col-md-8">
                    <div class="card shadow" style="border-radius: 10px">
                        <div class="card-body my-2">
                            <h2 class="main-title text-red font-weight-bold mb-2">{{ $product->product_name }}</h2>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <div class="col-lg-10 mb-2">
                                    @if($product->image_2 != NULL)
                                    <div class="owl-carousel owl-theme products-carousel">
                                        @if($product->image_1 != NULL)
                                        <div class="item">
                                            <img class="img-fluid" src="/storage/img/products/{{ $product->image_1 }}"/>
                                        </div>
                                        @endif
                                        @if($product->image_2 != NULL)
                                        <div class="item">
                                            <img class="img-fluid" src="/storage/img/products/{{ $product->image_2 }}"/>
                                        </div>
                                        @endif
                                        @if($product->image_3 != NULL)
                                        <div class="item">
                                            <img class="img-fluid" src="/storage/img/products/{{ $product->image_3 }}" />
                                        </div>
                                        @endif
                                    </div>
                                    @else
                                    <img class="img-fluid" src="/storage/img/products/{{ $product->image_1 }}"/>
                                    @endif
                                </div>
                            </div>
                            <div class="p-2">
                                <h5 class="font-weight-bold">Category</h4>
                                <h6 class="font-weight-light">{{ $product->category->category_name }}</h5>
                                <h5 class="font-weight-bold mb-1">Brand</h4>
                                <div class="col-5 p-0 mb-1">
                                <img class="img-fluid"src="/storage/img/brands/{{ $product->brand_name }}.png" width="100">
                                </div>
                                <p class="font-weight-bold h5">Product Description</p>
                                <p class="font-weight-light h6">{{ $product->desc }}</p>
                                <h5 class="font-weight-bold">Price</h4>
                                @if ($product->price != NULL)
                                <h6 class="font-weight-light">{{ number_format($product->price, 0, ',', '.') }}</h5>
                                @else
                                <a class="text-decoration-none text-dark font-weight-light h5" href="https://api.whatsapp.com/send?phone=6287737962053"><i class="fab fa-whatsapp text-success"></i> Call</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-2 col-md-4">
                    <div class="card shadow" style="border-radius: 10px">
                        <div class="card-header bg-red text-white font-weight-bold" style="border-radius:10px 10px 0px 0px;">More Products</div>
                            <div class="card-body my-2 pt-0">
                                @foreach($suggested_products as $key => $data)
                                <div class="col-12 pt-0">
                                    <a class="text-decoration-none text-reset" href="{{ route('product.show', $data->slug)}}">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-4 mr-0 pr-0">
                                                <img class="rounded img-fluid" src="/storage/img/products/{{ $data->image_1 }}">
                                            </div>
                                            <div class="col-8 ml-0 pr-0">
                                                <h5>{{ $data->product_name }}</h5>
                                                <div class="col-5 p-0">
                                                    <img class="img-fluid" src="/storage/img/brands/{{ $data->brand_name }}.png" width="100">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @if($key != (count($suggested_products)-1))
                                    <hr>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
    </div>
    <x-slot name="footer"></x-slot>
</x-app>
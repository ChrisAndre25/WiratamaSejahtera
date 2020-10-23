<x-app title="{{ $product->product_name }} - {{ $product->brand_name}}">
    <x-slot name="navbar"></x-slot>
        <div class="container mt-4 p-5">
            @include('include.search')
            <div class="row d-flex align-items-center justify-content-center mb-2">
                <div class="col-lg-5 mb-2">
                    @if($product->image_2 != NULL)
                    <div class="owl-carousel owl-theme products-carousel">
                        @if($product->image_1 != NULL)
                        <div class="item">
                            <img class="img-fluid rounded" src="/storage/img/products/{{ $product->image_1 }}"/>
                        </div>
                        @endif
                        @if($product->image_2 != NULL)
                        <div class="item">
                            <img class="img-fluid rounded" src="/storage/img/products/{{ $product->image_2 }}"/>
                        </div>
                        @endif
                        @if($product->image_3 != NULL)
                        <div class="item">
                            <img class="img-fluid rounded" src="/storage/img/products/{{ $product->image_3 }}" />
                        </div>
                        @endif
                    </div>
                    @else
                    <img class="img-fluid rounded" src="/storage/img/products/{{ $product->image_1 }}"/>
                    @endif
                </div>
                <div class="col-lg-7">
                    <h3 class="text-red font-weight-bold mb-2">{{ $product->product_name }}</h3>
                    <hr>
                    <div class="row">
                        <span class="col-md-4 font-weight-bold text-md-left text-gray">CATEGORY</span>
                        <span class="col-md-8">{{ $product->category->category_name }}</span>
                    </div>
                    <hr>
                    <div class="row">
                        <span class="col-md-4 font-weight-bold text-md-left text-gray">BRAND</span>
                        <div class="col-md-8">
                            <img class="img-fluid"src="/storage/img/brands/{{ $product->brand_name }}.png" width="100">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <span class="col-md-4 font-weight-bold text-md-left text-gray">PRICE</span>
                        <div class="col-md-8">
                            @if ($product->price != NULL)
                                <h6 class="font-weight-light">{{ number_format($product->price, 0, ',', '.') }}</h5>
                            @else
                            <a class="text-decoration-none text-dark font-weight-light h5" href="https://api.whatsapp.com/send?phone=6287737962053"><i class="fab fa-whatsapp text-success"></i> Call</a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <span class="col-md-4 font-weight-bold text-md-left text-gray">DESCRIPTION</span>
                    </div>
                    <div class="row col-md-12">
                        <p class="font-weight-light h6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit iusto quisquam molestias voluptates iure sunt culpa. Provident delectus, laudantium incidunt commodi molestiae qui doloribus facilis sunt libero ut architecto unde!</p>
                    </div>
                </div>
            </div>
            <div class="wow fadeIn animated" style="visibility: visible;">
            <h5 class="text-red font-weight-bold mb-2">More Products</h5>
            </div>
            <div class="row d-flex align-items-center justify-content-center mb-2">
                @foreach($suggested_products as $key => $data)
                <div class="col-lg-4 col-md-4" style="overflow:hidden;">
                    <div class="wow fadeInRight delay-1s animated" style="visibility: visible;">
                        <div class="card rounded mb-2">
                                <div class="card-body my-2">
                                        <a class="text-decoration-none text-reset" href="{{ route('product.show', $data->slug)}}">
                                            <div class="row d-flex justify-content-center align-items-center">
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
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    <x-slot name="footer"></x-slot>
</x-app>
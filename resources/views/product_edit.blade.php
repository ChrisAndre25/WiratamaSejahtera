<x-dashboard title="Product - Edit">
    <x-slot name="navbar"></x-slot>
    <div class="card my-3">
        <div class="card-header bg-red text-white font-weight-bold">Product - Edit</div>
        <div class="card-body">
            <form action="{{ action('ProductController@update', $product)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('UPDATE')
                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-left">{{ __('Category') }} <i class="fas fa-list-alt"></i></label>
                    <div class="col-md-8">
                        <select name="category" id="category" class="custom-select @error('category') is-invalid @enderror">
                            <option selected disabled>Choose</option>
                            @foreach ($categories as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $product->category_id ? 'selected' : '' }}> {{ $data->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_name"
                        class="col-md-4 col-form-label text-md-left">{{ __('Product Name') }} <i class="fab fa-product-hunt"></i></label>
                    <div class="col-md-8">
                        <input id="product_name" type="text"
                        class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product->product_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brand_name" class="col-md-4 col-form-label text-md-left">{{ __('Brand Name') }} <i class="fas fa-registered"></i></label>
                    <div class="col-md-8">
                        <select name="brand_name" id="brand_name" class="custom-select @error('brand') is-invalid @enderror">
                            <option selected disabled>Choose</option>
                            @foreach ($brands as $data)
                                <option value="{{ $data->brand_name }}" {{ $data->brand_name == $product->brand_name ? 'selected' : '' }}> {{ $data->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-left">{{ __('Price') }} <span class="font-weight-bold">Rp</span></label>
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                            </div>
                        <input type="text" name="price" id="price" class="form-control" aria-label="Amount (to the nearest rupiah)" value="{{ $product->price }}">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-md-4 col-form-label text-md-left">{{ __('Description') }} <i class="fas fa-align-justify"></i></label>

                    <div class="col-md-8">
                        <textarea name="desc" id="desc" cols="10" rows="4"
                            class="form-control @error('desc') is-invalid @enderror">{{$product->desc}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image_1"
                        class="col-md-4 col-form-label text-md-left pt-md-0">{{ __('Image 1') }} <i class="fas fa-image"></i></label>
                    <div class="col-md-8">
                        <div class="custom-file">
                            <input id="image_1" name="image_1" type="file"
                                class="custom-file-input @error('image_1') is-invalid @enderror" value="{{$product->image_1}}">
                            <label class="custom-file-label overflow-hidden" for="image_1">{{$product->image_1}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image_2"
                        class="col-md-4 col-form-label text-md-left pt-md-0">{{ __('Image 2') }} <i class="fas fa-image"></i></label>
                    <div class="col-md-8">
                        <div class="custom-file">
                            <input id="image_2" name="image_2" type="file"
                                class="custom-file-input @error('image_2') is-invalid @enderror" value="{{$product->image_2}}">
                            <label class="custom-file-label overflow-hidden" for="image_2">{{$product->image_2}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image_3"
                        class="col-md-4 col-form-label text-md-left pt-md-0">{{ __('Image 3') }} <i class="fas fa-image"></i></label>
                    <div class="col-md-8">
                        <div class="custom-file">
                            <input id="image_3" name="image_3" type="file"
                                class="custom-file-input @error('image_3') is-invalid @enderror" value="{{$product->image_3}}">
                            <label class="custom-file-label overflow-hidden" for="image_3">{{$product->image_3}}</label>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="form-group row mb-0 mt-2 text-center">
        <div class="col-md-12">
            @method('PUT')
            <button type="submit" class="btn btn-blue btn-block btn-lg font-weight-bolder">
                {{ __('SUBMIT') }}
            </button>
        </div>
    </div>
  </form>
</x-dashboard>

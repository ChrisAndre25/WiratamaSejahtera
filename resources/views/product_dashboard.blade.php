<x-dashboard title="Product - Dashboard">
    <x-slot name="navbar"></x-slot>
    <div class="mb-4 mt-3">
        <h1 class="text-red font-weight-bold text-center">Product Dashboard</h1>
    </div>
    <div class="mb-2 mt-3">
        <div class="btn-toolbar" role="toolbar"
        aria-label="Toolbar">
            <div class="btn-group mr-2" role="group" aria-label="Add Product">
                <a class="btn btn-info text-white btn-sm text-decoration-none" href="{{ route('product.add')}}">
                    <i class="fas fa-plus fa-fw mr-1"></i> Add Product
                </a>
            </div>
        </div>
    </div>
    <div class="card my-2">
      <div class="card-header bg-red text-white font-weight-bold">Visible ({{ count($visible_products) }})</div>
        <div class="card-body">
            @if(count($visible_products) > 0)
            <div class="table-responsive py-3">
                <table class="table table-sm table-bordered text-center" id="visibleProduct">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-nowrap">ID</th>
                            <th scope="col" class="text-nowrap">Category</th>
                            <th scope="col" class="text-nowrap">Name</th>
                            <th scope="col" class="text-nowrap">Brand</th>
                            <th scope="col" class="text-nowrap">Updated At</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visible_products as $key => $visible_product)
                        <tr>
                            <td class="align-middle">{{ $visible_product->id }}</td>
                            <td class="align-middle">{{ $visible_product->category->category_name }}</td>
                            <td class="align-middle">{{ $visible_product->product_name }}</td>
                            <td class="align-middle">{{ $visible_product->brand_name }}</td>
                            <td class="align-middle">{{ $visible_product->updated_at }}</td>
                            <td class="align-middle">
                                <div class="btn-toolbar flex-nowrap justify-content-center" role="toolbar"
                                    aria-label="Toolbar">
                                    <div class="btn-group mr-2" role="group" aria-label="link">
                                        <a class="btn btn-success btn-sm text-decoration-none" href="{{ route('product.edit', $visible_product->slug)}}" title="Edit">
                                            <i class="fas fa-edit fa-fw"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="link">
                                        <a class="btn btn-primary btn-sm text-decoration-none" href="{{ route('product.show', $visible_product->slug)}}" title="Show">
                                            <i class="fas fa-external-link-alt fa-fw"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="link">
                                        <a class="btn btn-warning btn-sm text-decoration-none" href="{{ route('product.hidden', $visible_product->slug)}}" title="Hide">
                                            <i class="fas fa-eye-slash fa-fw"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="link">
                                        <a class="btn btn-danger btn-sm text-decoration-none" href="{{ route('product.delete', $visible_product->slug)}}" title="Delete">
                                            <i class="fas fa-trash-alt fa-fw"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <span>No Data</span>
            @endif
        </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-header bg-red text-white font-weight-bold">Hidden ({{ count($hidden_products) }}) </div>
        <div class="card-body">
            @if(count($hidden_products) > 0)
            <div class="table-responsive py-3">
                <table class="table table-sm table-bordered text-center" id="hiddenProduct">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-nowrap">ID</th>
                            <th scope="col" class="text-nowrap">Category</th>
                            <th scope="col" class="text-nowrap">Name</th>
                            <th scope="col" class="text-nowrap">Brand</th>
                            <th scope="col" class="text-nowrap">Updated At</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hidden_products as $key => $hidden_product)
                        <tr>
                            <td class="align-middle">{{ $hidden_product->id }}</td>
                            <td class="align-middle">{{ $hidden_product->category->category_name }}</td>
                            <td class="align-middle">{{ $hidden_product->product_name }}</td>
                            <td class="align-middle">{{ $hidden_product->brand_name }}</td>
                            <td class="align-middle">{{ $hidden_product->updated_at }}</td>
                            <td class="align-middle">
                                <div class="btn-toolbar flex-nowrap justify-content-center" role="toolbar"
                                aria-label="Toolbar">
                                <div class="btn-group mr-2" role="group" aria-label="link">
                                    <a class="btn btn-success btn-sm text-decoration-none" href="{{ route('product.edit', $hidden_product->slug)}}" title="Edit">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="link">
                                    <a class="btn btn-primary btn-sm text-decoration-none" href="{{ route('product.show', $hidden_product->slug)}}" title="Show">
                                        <i class="fas fa-external-link-alt fa-fw"></i>
                                    </a>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="link">
                                    <a class="btn btn-primary btn-sm text-decoration-none" href="{{ route('product.visible', $hidden_product->slug)}}" title="Edit">
                                        <i class="fas fa-eye fa-fw"></i>
                                    </a>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="link">
                                    <a class="btn btn-danger btn-sm text-decoration-none" href="{{ route('product.delete', $hidden_product->slug)}}" title="Delete">
                                        <i class="fas fa-trash-alt fa-fw"></i>
                                    </a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <span>No Data</span>
                @endif
            </div>
        </div>
         <hr>
    <div class="card">
      <div class="card-header bg-red text-white font-weight-bold">Deleted ({{ count($deleted_products) }}) </div>
        <div class="card-body">
            @if(count($deleted_products) > 0)
            <div class="table-responsive py-3">
                <table class="table table-sm table-bordered text-center" id="deletedProduct">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-nowrap">ID</th>
                            <th scope="col" class="text-nowrap">Category</th>
                            <th scope="col" class="text-nowrap">Name</th>
                            <th scope="col" class="text-nowrap">Brand</th>
                            <th scope="col" class="text-nowrap">Updated At</th>
                            <th scope="col" class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deleted_products as $key => $deleted_product)
                        <tr>
                            <td class="align-middle">{{ $deleted_product->id }}</td>
                            <td class="align-middle">{{ $deleted_product->category->category_name }}</td>
                            <td class="align-middle">{{ $deleted_product->product_name }}</td>
                            <td class="align-middle">{{ $deleted_product->brand_name }}</td>
                            <td class="align-middle">{{ $deleted_product->updated_at }}</td>
                            <td class="align-middle">
                                <div class="btn-toolbar flex-nowrap justify-content-center" role="toolbar"
                                aria-label="Toolbar">
                                <div class="btn-group mr-2" role="group" aria-label="link">
                                    <a class="btn btn-primary btn-sm text-decoration-none" href="{{ route('product.restore', $deleted_product->slug)}}" title="Restore">
                                        <i class="fas fa-trash-restore-alt fa-fw"></i>
                                    </a>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="link">
                                    <a class="btn btn-danger btn-sm text-decoration-none" href="{{ route('product.destroy', $deleted_product->slug)}}" title="Destroy">
                                        <i class="fas fa-trash-alt fa-fw"></i>
                                    </a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <span>No Data</span>
                @endif
            </div>
        </div>
        <div class="card-columns card-dashboard my-2">
            <div class="card my-2">
                <div class="card-header bg-red text-white font-weight-bold">
                    Categories - ({{ count($categories) }})
                </div>
                    <div class="card-body">
                        <div class="table-responsive mb-2">
                            <table class="table table-sm table-striped" id="categoryList">
                                <thead>
                                    <tr>
                                      <th scope="col" class="text-nowrap">#</th>
                                      <th scope="col" class="text-nowrap">Name</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($categories as $key => $category)
                                      <tr>
                                        <td class="align-middle">{{ $key+1 }}</td>
                                        <td class="align-middle">{{ $category->category_name }}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                        </div>
                        <form method="POST" action="{{ action('ProductController@add_category')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="category_name" class="col-md-12 col-form-label text-md-left">{{ __('Add Category') }} <i class="fas fa-list-alt"></i></label>
                                <div class="col-md-10">
                                    <input type="text" id="category_name" name="category_name" class="form-control @error('category_name') is-invalid @enderror">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-plus fa-fw"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>  
            <div class="card my-2">
                <div class="card-header bg-red text-white font-weight-bold">
                    Brands - ({{ count($brands) }})
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped" id="brandList">
                                <thead>
                                    <tr>
                                      <th scope="col" class="text-nowrap">#</th>
                                      <th scope="col" class="text-nowrap">Name</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($brands as $key => $brands)
                                      <tr>
                                        <td class="align-middle">{{ $key+1 }}</td>
                                        <td class="align-middle">{{ $brands->brand_name }}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                        </div>
                        <form method="POST" action="{{ action('ProductController@add_brand')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="brand_name" class="col-md-12 col-form-label text-md-left">{{ __('Add Brand') }} <i class="fas fa-registered"></i></label>
                                <div class="col-md-10">
                                    <input type="text" id="brand_name" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-plus fa-fw"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>  
        </div>
    </div>
</x-dashboard>
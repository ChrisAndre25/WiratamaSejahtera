<div class="col-12 col-md-12 my-4">
    <div class="bg-white">
        <div class="row d-flex justify-content-start">
            <div class="col-lg-10 col-md-10 px-0 border">
            <form action="{{ action('ProductController@search') }}" method="POST">
                @csrf
                <input id="search" name="search" class="border-0 form-control rounded-0" placeholder="Products or brands">
            </div>
            <div class="col-lg-2 col-md-2 px-0">
                <button type="submit" class="btn btn-sm btn-blue btn-block py-2 px-2 rounded-0">
                    <i class="fas fa-search pb-2 font-weight-bold"></i> Search</button>
            </form>
            </div>
        </div>
    </div>
</div>
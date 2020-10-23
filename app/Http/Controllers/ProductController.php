<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function search(Request $request){

        $brands = DB::table('brands')->where('brand_name', 'like', '%'.request('search').'%')->get();

        $products = DB::table('products')->where([['product_name', 'like', '%'.request('search').'%'], ['is_shown', '1']])->paginate(15);
       
        $search  = request('search');

        if(count($products) > 0 || count($brands) > 0){
            return view('product_search', compact('products', 'brands', "search"));  
        }else{
            return redirect(route('products.index'))->with('error', 'No search results');
        }
    }



    public function show_dashboard(){

        $visible_products = Product::where('is_shown', '1')->orderByDesc('created_at')->get();
        $hidden_products = Product::where('is_shown', '0')->orderByDesc('created_at')->get();
        $deleted_products = Product::onlyTrashed()->orderByDesc('created_at')->get();
        $categories = Category::select('category_name')->get();
        $brands = Brand::select('brand_name')->get();
        return view('product_dashboard', compact('visible_products', 'hidden_products', 'deleted_products', 'categories', 'brands'));
    }

    public function add(){

        $categories = Category::select('id', 'category_name')->get();
        $brands = Brand::select('brand_name')->get();

        return view('product_add', compact('categories', 'brands'));

    }

    public function store(Request $request){

        request()->validate([
            'category' => 'required',
            'product_name' => 'required|string',
            'brand_name' => 'required',
            'price' => 'nullable|numeric',
            'desc' => 'nullable|string',
            'image_1' => 'required|image|mimes:jpg,png,jpeg|max:1999',
            'image_2' => 'nullable|image|mimes:jpg,png,jpeg|max:1999',
            'image_3' => 'nullable|image|mimes:jpg,png,jpeg|max:1999',
        ]);

        if($request->hasFile('image_1')){
            $extension = $request->file('image_1')->getClientOriginalExtension();
            $productOne = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_1_'.Carbon::now()->timestamp.'.'.$extension;
            $path = $request->file('image_1')->storeAs('public/img/products/', $productOne);
        }

        if($request->hasFile('image_2')){
            $extension = $request->file('image_2')->getClientOriginalExtension();
            $productTwo = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_2_'.Carbon::now()->timestamp.'.'.$extension;
            $path = $request->file('image_2')->storeAs('public/img/products/', $productTwo);
        }else{
            $productTwo = NULL;
        }

        if($request->hasFile('image_3')){
            $extension = $request->file('image_3')->getClientOriginalExtension();
            $productThree = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_3_'.Carbon::now()->timestamp.'.'.$extension;
            $path = $request->file('image_3')->storeAs('public/img/products/', $productThree);
        }
        else{
            $productThree = NULL;
        }

        Product::create([
            'category_id' => request('category'),
            'product_name' => request('product_name'),
            'brand_name' => request('brand_name'),
            'price' => request('price'),
            'desc' => request('desc'),
            'image_1' => $productOne,
            'image_2' => $productTwo,
            'image_3' => $productThree
        ]);

        return redirect(route('product.dashboard'))->with('success', 'Product Added');
    }

    public function edit(Product $product){

        return view('product_edit', [
            'product' => $product,
            'categories' => Category::select('id', 'category_name')->get(),
            'brands' => Brand::select('brand_name')->get(),
        ]);
    }

    public function update(Request $request, Product $product){
        request()->validate([
            'category' => 'required',
            'product_name' => 'required|string',
            'brand_name' => 'required',
            'price' => 'nullable|numeric',
            'desc' => 'nullable|string',
            'image_1' => 'nullable|image|mimes:jpg,png,jpeg|max:1999',
            'image_2' => 'nullable|image|mimes:jpg,png,jpeg|max:1999',
            'image_3' => 'nullable|image|mimes:jpg,png,jpeg|max:1999',
        ]);

        if($request->hasFile('image_1')){
            Storage::delete('public/img/products/'.$product->image_1);
            $extension = $request->file('image_1')->getClientOriginalExtension();
            $productOne = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_1_'.Carbon::now()->timestamp.'.'.$extension;
            $path = $request->file('image_1')->storeAs('public/img/products/', $productOne);
        }else if(!request('image_1') && (request('product_name') != $product->product_name || request('brand_name') != $product->brand_name)){

            $extension = pathinfo(public_path('storage/img/products/'.$product->image_1), PATHINFO_EXTENSION);
            $productOne = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_1_'.Carbon::now()->timestamp.'.'.$extension;
            Storage::copy(public_path('storage/img/products/'.$product->image_1), public_path('/storage/img/products/'.$productOne));
            Storage::delete(public_path('storage/img/products/'.$product->image_1));
        }else{
            $productOne = $product->image_1;
        }

        if($request->hasFile('image_2')){
            Storage::delete('public/img/products/'.$product->image_2);
            $extension = $request->file('image_2')->getClientOriginalExtension();
            $productTwo = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_2_'.Carbon::now()->timestamp.'.'.$extension;
            $path = $request->file('image_2')->storeAs('public/img/products/', $productTwo);
        }else if(!request('image_2') && (request('product_name') != $product->product_name || request('brand_name') != $product->brand_name)){
            $extension = pathinfo(public_path('storage/img/products/'.$product->image_2), PATHINFO_EXTENSION);
            $productTwo = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_2_'.Carbon::now()->timestamp.'.'.$extension;
            Storage::copy('public/img/products/'.$product->image_2, 'public/img/products/'.$productTwo);
            Storage::delete('public/img/products/'.$product->image_2);
        }else{
            $productTwo = $product->image_2;
        }

        if($request->hasFile('image_3')){
            Storage::delete('public/img/products/'.$product->image_3);
            $extension = $request->file('image_3')->getClientOriginalExtension();
            $productThree = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_3_'.Carbon::now()->timestamp.'.'.$extension;
            $path = $request->file('image_3')->storeAs('public/img/products/', $productThree);
        }else if(!request('image_3') && (request('product_name') != $product->product_name || request('brand_name') != $product->brand_name)){
            $extension = pathinfo(public_path('storage/img/products/'.$product->image_3), PATHINFO_EXTENSION);
            $productThree = strtoupper(request('product_name')).'_'.strtoupper(request('brand_name')).'_IMG_3_'.Carbon::now()->timestamp.'.'.$extension;
            Storage::copy('public/img/products/'.$product->image_3, 'public/img/products/'.$productThree);
            Storage::delete('public/img/products/'.$product->image_3);
        }else{
            $productThree = $product->image_3;
        }


        $product->update([
            'category_id' => request('category'),
            'product_name' => request('product_name'),
            'brand_name' => request('brand_name'),
            'price' => request('price'),
            'desc' => request('desc'),
            'image_1' => $productOne,
            'image_2' => $productTwo,
            'image_3' => $productThree
        ]);

        return redirect(route('product.dashboard'))->with('success', 'Product Updated');

    }

    public function visible(Product $product){

        $product->update([
            'is_shown' => '1'
        ]);

        return redirect(route('product.dashboard'))->with('success', 'Product Visible');
    }

    public function hidden(Product $product){

        $product->update([
            'is_shown' => '0'
        ]);

        return redirect(route('product.dashboard'))->with('success', 'Product Hidden');
    }

    public function delete(Product $product){

        $product->update([
            'is_shown' => '0'
        ]);
        $product->delete();

        return redirect(route('product.dashboard'))->with('success', 'Product Deleted');
    }

    public function restore($slug){

        Product::where('slug', $slug)->restore();

        return redirect(route('product.dashboard'))->with('success', 'Product Restored');
    }

    public function destroy($slug){

        Product::where('slug', $slug)->forceDelete();

        return redirect(route('product.dashboard'))->with('success', 'Product Permanently Deleted');
    }

    public function add_category(Request $request){
        
        request()->validate([
            'category_name' => 'required|string|unique:categories'
        ]);

        Category::create([
            'category_name' => request('category_name')
        ]);

        return redirect(route('product.dashboard'))->with('success', 'New Category Added');
    }

    public function add_brand(Request $request){
        request()->validate([
            'brand_name' => 'required|string|unique:brands'
        ]);

        Brand::create([
            'brand_name' => request('brand_name')
        ]);

        return redirect(route('product.dashboard'))->with('success', 'New Brand Added');
    }

    public function show(Product $product){
        $suggested_products = Product::whereNotIn('id', [$product->id])->inRandomOrder()->limit(3)->get();
        return view('product_show_1', compact('product', 'suggested_products'));
    }

    public function index(){
        $products = Product::where('is_shown', 1)->paginate(15);
        $categories = DB::table('categories')->select(DB::raw('categories.slug, category_name, count(category_id) as category_count'))
                                           ->join('products', 'products.category_id', '=', 'categories.id')
                                           ->where('is_shown', 1)
                                           ->groupBy('categories.slug', 'category_name')
                                           ->get();

        return view('product_index', compact('products', 'categories'));
    }

    public function category_index($category){
        $products = Product::where('is_shown', 1)->join('categories', 'categories.id', '=', 'products.category_id')
                                                 ->where('categories.slug', $category)
                                                 ->select('products.id', 'product_name', 'brand_name', 'image_1', 'products.slug')
                                                 ->paginate(15);
        $categories = DB::table('categories')->select(DB::raw('categories.slug, category_name, count(category_id) as category_count'))
                                           ->join('products', 'products.category_id', '=', 'categories.id')
                                           ->where('is_shown', 1)
                                           ->groupBy('categories.slug','category_name')
                                           ->get();
        $category_name = $category;

        return view('product_index', compact('products', 'categories', "category_name"));
    }

    public function brands_index(){
        $products = Product::where('is_shown', 1)->paginate(15);
        $brands = Brand::select('brand_name', 'slug')->get();

        return view('product_brand_index', compact('products', 'brands'));
    }

    public function brand_index($brand){
        $products = Product::where('is_shown', 1)->join('brands', 'brands.brand_name', 'products.brand_name')->where('brands.slug', $brand)->paginate(15);
        $brands = Brand::select('brand_name', 'slug')->get();
        $brand_name = $brand;

        return view('product_brand_index', compact('products', 'brands', "brand_name"));
    }
    
}

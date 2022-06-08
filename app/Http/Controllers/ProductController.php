<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        $this->checkPermission('product.access');
        $products = Product::with('productReviews')->latest()->paginate($this->itemPerPage);
        $this->putSL($products);
        return view('dashboard.product.index', compact('products'));
    }

    public function create()
    {
        $this->checkPermission('product.create');
        $productCategories= ProductCategory::get();
        return view('dashboard.product.create',compact('productCategories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $input=$request->validated();
        

        if($request->hasFile('image_one')) {
            $input['image_one']=uploadFile($request->file('image_one'), 'product');
        }
        if ($request->hasFile('image_two')) {
            $input['image_two'] = uploadFile($request->file('image_two'), 'product');
        }
        if ($request->hasFile('image_three')) {
            $input['image_three'] = uploadFile($request->file('image_three'), 'product');
        }
        if ($request->hasFile('image_four')) {
            $input['image_four'] = uploadFile($request->file('image_four'), 'product');
        }

         Product::create($input);
        return back()->with('success', 'Product Created Successfully.');
    }
    public function show(Product $product)
    {
        $categories = ProductCategory::all();
        return view('dashboard.product.view',compact('product','categories'));
    }

    public function edit(Product $product)
    {
       
       
        $product->load('productCategory');
        return view('dashboard.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
       
        $input=($request->validated());

        if ($request->hasFile('image')) {
            if (File::exists('storage/' . $product->image)) {
               
                File::delete('storage/' . $product->image);
            }
            
            $input['image'] = uploadFile($request->file('image'), 'product');
        }
        $product->update($input);

        return back()->with('success', 'Product Updated Successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->checkPermission('product.delete');
        $product->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}

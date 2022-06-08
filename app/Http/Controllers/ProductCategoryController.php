<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->checkPermission('productCategory.access');
        $productCategories = ProductCategory::paginate($this->itemPerPage);
        $this->putSL($productCategories);

        return response()->view('dashboard.productCategory.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->checkPermission('productCategory.create');
        return response()->view('dashboard.productCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->checkPermission('productCategory.create');

        $request->validate([
            'name'   => 'required|string|max:255|unique:product_categories',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg|max:512',
            'status' => ['required', Rule::in('0', '1')],
        ]);
        
        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = Rand() . '.' . $request->image->getClientOriginalExtension();
            $image_path = $request->image->storeAs('productCategory', $image_path, 'public');
        }

        ProductCategory::create([
            'name'  => $request->input('name'),
            'image' => $image_path,
        ]);
        return back()->with('success', 'Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductCategory $productCategory
     * @return Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $this->checkPermission('productCategory.edit');
        return response()->view('dashboard.productCategory.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProductCategory $productCategory
     * @return RedirectResponse
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $this->checkPermission('productCategory.edit');
        $request->validate([
            'name'   => 'required|string|max:255|unique:productCategories,id,' . $productCategory->id,
            'image'  => 'nullable|image|mimes:jpeg,png,jpg|max:512',
            'status' => ['required', Rule::in('0', '1')],
        ]);

        $image_path = $productCategory->image;
        if ($request->hasFile('image')) {
            if (File::exists('storage/' . $image_path)) {
                File::delete('storage/' . $image_path);
            }
            $image_path = Rand() . '.' . $request->image->getClientOriginalExtension();
            $image_path = $request->image->storeAs('productCategory', $image_path, 'public');
        }

        $productCategory->update([
            'name'   => $request->input('name'),
            'image'  => $image_path,
            'status' => $request->input('status'),
        ]);
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductCategory $productCategory
     * @return RedirectResponse
     */
    public function destroy(ProductCategory $productCategory)
    {
        $this->checkPermission('productCategory.delete');
        if ($productCategory->delete()) {
            if (File::exists('storage/' . $productCategory->image)) {
                File::delete('storage/' . $productCategory->image);
            }
            return back()->with('success', 'Item Deleted Successfully.');
        }
        return back()->with('error', 'Item Con\'t Delete.');
    }
}


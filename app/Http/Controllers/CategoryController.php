<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->checkPermission('category.access');
        $categories = Category::paginate($this->itemPerPage);
        $this->putSL($categories);
        return response()->view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->checkPermission('category.create');
        return response()->view('dashboard.category.create');
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
        $this->checkPermission('category.create');
        $request->validate([
            'name'   => 'required|string|max:255|unique:categories',
            
            'status' => ['required', Rule::in('0', '1')],
        ]);

      

        Category::create([
            'name'  => $request->input('name'),
            // 'image' => $image_path,
        ]);
        return back()->with('success', 'Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $this->checkPermission('category.edit');
        return response()->view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
       
        $request->validate([
            'name'   => 'required|string|max:255|unique:categories,id,' . $category->id,
            // 'image'  => 'nullable|image|mimes:jpeg,png,jpg|max:512',
            'status' => ['required', Rule::in('0', '1')],
        ]);

        // $image_path = $category->image;
        // if ($request->hasFile('image')) {
        //     if (File::exists('storage/' . $image_path)) {
        //         File::delete('storage/' . $image_path);
        //     }
        //     $image_path = Rand() . '.' . $request->image->getClientOriginalExtension();
        //     $image_path = $request->image->storeAs('category', $image_path, 'public');
        // }

        $category->update([
            'name'   => $request->input('name'),
            // 'image'  => $image_path,
            'status' => $request->input('status'),
        ]);
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        $this->checkPermission('category.delete');
        // if ($category->delete()) {
        //     if (File::exists('storage/' . $category->image)) {
        //         File::delete('storage/' . $category->image);
        //     }
        //     return back()->with('success', 'Item Deleted Successfully.');
        // }
        return back()->with('error', 'Item Con\'t Delete.');
    }
}

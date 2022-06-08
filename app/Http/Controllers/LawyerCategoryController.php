<?php

namespace App\Http\Controllers;

use App\Models\LawyerCategory;
use Illuminate\Http\Request;

class LawyerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = LawyerCategory::paginate(10);
        return view('dashboard.lawyer.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'  => 'required|string'
        ]);
        LawyerCategory::create($input);
        return back()->with('success', 'Lawyer Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LawyerCategory  $lawyerCategory
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LawyerCategory  $lawyerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(LawyerCategory $lawyerCategory)
    {
        return view('dashboard.lawyer.category_edit', compact('lawyerCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LawyerCategory  $lawyerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LawyerCategory $lawyerCategory)
    {
        $input = $request->validate([
            'name'  => 'required|string'
        ]);
        $lawyerCategory->update($input);
        return redirect()->route('lawyerCategory.index')->with('success', 'Lawyer Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LawyerCategory  $lawyerCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LawyerCategory $lawyerCategory)
    {
        $lawyerCategory->delete();
        return back()->with('success', 'Lawyer Category Deleted Successfully');
    }
}

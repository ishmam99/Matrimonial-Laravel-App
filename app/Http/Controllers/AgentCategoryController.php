<?php

namespace App\Http\Controllers;

use App\Models\AgentCategory;
use Illuminate\Http\Request;

class AgentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AgentCategory::paginate(10);
        return view('dashboard.agent.category',compact('categories'));
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
        AgentCategory::create($input);
        return back()->with('success','Agent Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgentCategory  $agentCategory
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgentCategory  $agentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AgentCategory $agentCategory)
    {
        return view('dashboard.agent.category_edit',compact('agentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgentCategory  $agentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgentCategory $agentCategory)
    {
       
       $input = $request->validate([
            'name'  => 'required|string'
        ]);
        $agentCategory->update($input);
        return redirect()->route('agentCategory.index')->with('success', 'Agent Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgentCategory  $agentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgentCategory $agentCategory)
    {
        $agentCategory->delete();
        return back()->with('success', 'Agent Category Deleted Successfully');
    }
}

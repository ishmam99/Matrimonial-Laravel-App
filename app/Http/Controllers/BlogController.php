<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
       
        return view('dashboard.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blog.create');
    }

    public function store(BlogRequest $request)
    {
        $validated=$request->validated();
        $validated['image'] = uploadFile($request->file('image'), 'blog');
        Blog::create($validated);

        return back()->with('success', 'Blog Created Successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $validated=$request->validated();

        if($request->hasFile('image')) {
            if (File::exists('storage/blog/' . $blog->image)) {
                File::delete('storage/blog/' . $blog->image);
            }
            $validated['image'] = uploadFile($request->file('image'), 'blog');
        }
        $blog->update($validated);
        return back()->with('success', 'Blog Updated Successfully.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}

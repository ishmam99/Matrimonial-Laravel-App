<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $this->checkPermission('notice.access');

        $notices = Notice::paginate($this->itemPerPage);
        $this->putSL($notices);
        return view('dashboard.notice.index', compact('notices'));
    }

    public function create()
    {
        $this->checkPermission('notice.create');

        return view('dashboard.notice.create');
    }

    public function store(Request $request)
    {
        $this->checkPermission('notice.create');

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ]);

        Notice::create($validated);

        return redirect()->route('notice.index')->with('success', 'Notice Created Successfully.');
    }

    public function edit(Notice $notice)
    {
        $this->checkPermission('notice.edit');

        return view('dashboard.notice.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $this->checkPermission('notice.edit');

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ]);

        $notice->update($validated);

        return redirect()->route('notice.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $this->checkPermission('notice.delete');

        $notice->delete();
        return back()->with('success', 'Notice deleted successfully.');
    }
}

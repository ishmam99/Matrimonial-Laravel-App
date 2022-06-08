<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $this->checkPermission('faq.create');

        session()->put('previousUrl', url()->previous());

        return view('dashboard.faq.create');
    }

    public function store(Request $request)
    {
        $this->checkPermission('faq.create');

        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255', Rule::unique('faqs')],
            'answer' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ]);

        Faq::create($validated);

        if (session()->has('previousUrl')) {
            return redirect(session()->get('previousUrl'))->with('success', "Faq information successfully saved.");
        }
        return back()->with('success', "Faq information successfully saved.");
    }

    public function edit(Faq $faq)
    {
        $this->checkPermission('faq.edit');

        session()->put('previousUrl', url()->previous());

        return view('dashboard.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $this->checkPermission('faq.edit');

        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255', Rule::unique('faqs')->ignore($faq)],
            'answer' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ]);

        $faq->update($validated);

        if (session()->has('previousUrl')) {
            return redirect(session()->get('previousUrl'))->with('success', "Faq information successfully saved.");
        }
        return back()->with('success', 'Faq information successfully updated.');
    }

    public function destroy(Faq $faq)
    {
        $this->checkPermission('faq.delete');

        $faq->delete();

        return back()->with('success', 'Faq successfully deleted.');
    }
}

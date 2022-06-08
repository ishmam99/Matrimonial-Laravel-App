<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ServicesController extends Controller
{
    public function index(): View
    {
      $this->checkPermission('service.access');
      $services = Service::all();
      return view('dashboard.services.index', compact('services'));
    }

    public function create(): View
    {
      $this->checkPermission('service.create');
      return view('dashboard.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
      $this->checkPermission('service.create');
      $request->validate([
        'icon' => ['required', 'image', 'max:512'],
        'name' => ['required', 'string', 'max:255'],
      //  'description' => ['required', 'string'],
        'url' => ['required', 'string'],
        'status' => ['required', 'boolean'],
      ]);

      Service::create([
        'name' => $request->input('name'),
      //   'description' => $request->input('description'),
        'url' => $request->input('url'),
        'status' => $request->input('status'),
      ])->addMediaFromRequest('icon')->toMediaCollection('icon');
      return back()->with('success', 'Service successfully added.');
    }

    public function edit(Service $service): View
    {
      $this->checkPermission('service.edit');
      return view('dashboard.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
      $this->checkPermission('service.edit');
      $request->validate([
        'icon' => ['nullable', 'image', 'max:512'],
        'name' => ['required', 'string', 'max:255'],
      //  'description' => ['required', 'string'],
        'url' => ['required', 'string'],
        'status' => ['required', 'boolean'],
      ]);
      $service->update([
        'name' => $request->input('name'),
      //  'description' => $request->input('description'),
        'url' => $request->input('url'),
        'status' => $request->input('status')
      ]);
      if ($request->hasFile('icon')) {
        $service->addMediaFromRequest('icon')->toMediaCollection('icon');
      }
      return back()->with('success', 'Service information successfully updated.');
    }

    public function destroy(Service $service): RedirectResponse
    {
      $this->checkPermission('service.delete');
      $service->delete();
      return back()->with('success', 'Service successfully deleted.');
    }
  }

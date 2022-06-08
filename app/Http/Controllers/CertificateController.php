<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'certificate_image' => ['nullable','image','mimes:jpeg,png,jpg','max:1024'],
            // 'status' => ['required', 'boolean'],
        ]);
        $validated['certificate_image'] = uploadFile($request->file('certificate_image'), 'certificate/certificate_image');
        Certificate::create([
            'certificate_image'=> $request->certificate_image,
            'status'=> $request->status,
            'user_id' => auth()->user()->id

        ]);


        return redirect()->back()->with('success', 'Certificate Submitted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $this->checkPermission('certificate.edit');

        $validated = $request->validate([
            'certificate_image' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $certificate->update([
            'certificate_image'  => $request->input('certificate_image'),
            'status'             => $request->input('status'),
        ]);

        return redirect()->route('certificate.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}

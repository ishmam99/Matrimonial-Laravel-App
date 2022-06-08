<?php

namespace App\Http\Controllers;

use App\Http\Resources\CertificateResource;
use App\Models\MarraigeCertificate;
use Illuminate\Http\Request;

class MarraigeCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = MarraigeCertificate::where('user_id',auth()->id())->get();
        return $this->apiResponseResourceCollection(200,'Certificates',CertificateResource::collection($certificates));
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
            'marraige_image' => ['nullable','image','mimes:jpeg,png,jpg','max:1024'],
            'status' => ['required', 'boolean'],
        ]);
        $validated['marraige_image'] = uploadFile($request->file('marraige_image'), 'marraigeCertificate/marraige_image');
        MarraigeCertificate::create([
            'marraige_image'=> $request->marraige_image,
            'status'=> $request->status,
            'user_id' => auth()->user()->id

        ]);


        return $this->apiResponse(201,'Certificate Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarraigeCertificate  $marraigeCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(MarraigeCertificate $marraigeCertificate)
    {
        return $this->apiResponse(200, 'Certificates', CertificateResource::make($marraigeCertificate));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarraigeCertificate  $marraigeCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(MarraigeCertificate $marraigeCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarraigeCertificate  $marraigeCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarraigeCertificate $marraigeCertificate)
    {
       

        $validated = $request->validate([
            'marraige_certificate' => ['required', 'string'],
        ]);

        $marraigeCertificate->update([
            'marraige_certificate'=> $request->marraige_certificate,

        ]);


        return $this->apiResponse(201, 'Certificate Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarraigeCertificate  $marraigeCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarraigeCertificate $marraigeCertificate)
    {
        //
    }
}

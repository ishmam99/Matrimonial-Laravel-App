@extends('layouts.dashboard')

@section('content')
    <div class="d-flex flex-row">
        <!--begin::Aside-->

        <!--end::Aside-->

        <div class="flex-row-fluid ml-lg-8">
            <div class="card card-custom card-stretch">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Lawyer Case Information</h3>

                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-weight-bold mb-6">Case Info List</h5>

                        </div>

                        @foreach ($cases as $case)
                            <div class="col-4 ">
                                <div class="bg-white rounded shadow-sm p-5 mb-4 clearfix graph-star-rating">
                                    <h5 class="mb-0 mb-5 text-center">Case Info</h5>
                                    <div class="row ">
                                        <div class="col-12 text-center mb-5">
                                            <img style="height:50px; width:50px;" alt="Generic placeholder image"
                                                src="{{ setImage($case->profile->profile_photo, 'user') }}"
                                                class="mr-3 rounded-pill">
                                        </div>
                                        <div class="col-6">
                                            <h6>Client Name :</h6>
                                        </div>
                                        <div class="col-6 text-right">
                                            <h6> {{ $case->profile->name }}</h6>
                                        </div>
                                        <div class="col-6">

                                            <p>Phone :</p>
                                        </div>
                                        <div class="col-6 text-right">

                                            <p>{{ $case->profile->user->phone }}</p>
                                        </div>
                                        <div class="col-6">

                                            <p>Case Name :</p>
                                        </div>
                                        <div class="col-6 text-right">

                                            <p>{{ $case->name ? $case->name : 'N\A' }}</p>
                                        </div>
                                        <div class="col-6">

                                            <p>Status :</p>
                                        </div>
                                        <div class="col-6 text-right">

                                            <p>{{ $case->status }}</p>
                                        </div>
                                        <div class="col-6">

                                            <p>Fee :</p>
                                        </div>
                                        <div class="col-6 text-right">

                                            <p>{{ $case->fee }}</p>
                                        </div>
                                        <div class="col-12">

                                            <p>Details :</p>
                                        </div>
                                        <div class="col-12">
                                           
                                            <p>{{ $case->details }}</p>
                                        </div>
                                        <div class="col-12">

                                            <p>Attachment
                                                :</p>
                                        </div>
                                        <div class="col-12">

                                            <img height="120px" width="100%" src="{{ setImage($case->attachment) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
        <script>
            let avatar5 = new KTImageInput('user_image');
        </script>
        
    @endpush

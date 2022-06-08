@extends('layouts.dashboard')

@section('content')

    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    Edit FAQ
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ url(session()->get('previousUrl') ?? 'dashboard') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>
                    Back
                </a>
                <div class="btn-group">
                    <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>
                        Update Form
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Form-->
            <form class="form" id="kt_form" method="post" action="{{ route('faq.update', $faq->id) }}">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="my-5">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="question">Question&nbsp;<span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input name="question" id="question" value="{{ old('question', $faq->question) }}" class="form-control form-control-solid @error('question') is-invalid @enderror" type="text">
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="answer">Answer&nbsp;<span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <textarea name="answer" id="answer" rows="5"
                                        class="form-control form-control-solid @error('answer') is-invalid @enderror">{{ old('answer', $faq->answer) }}</textarea>
                                    @error('answer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="status">Status
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="hidden" value="0" name="status" />
                                    <span class="switch switch-icon">
                                        <label>
                                            <input type="checkbox" {{ old('status', $faq->status) ? 'checked' : null }} value="1" name="status" />
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>

@endsection

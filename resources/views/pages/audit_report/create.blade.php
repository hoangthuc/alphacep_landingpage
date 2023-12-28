@extends('layouts.master')

@section('title', 'Audit Report')

@section('content')
<form action="{{route('view.audit_report.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('audit_report_label.audit_report_add') }}</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('common.homepage') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('audit_report_label.audit_report') }}</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- row -->
    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        {{ trans('audit_report_label.audit_report_info') }}
                    </div>
                </div>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mx-4" role="alert">
                    {{ $error }}
                </div>
                @endforeach
                @endif


                <div class="card-body">
                    <div class="row gy-4">


                        <div class="col-sm-12">
                            <label for="company_office" class="form-label ">{{ trans('audit_report_label.company_office') }}</label>
                            <select class="form-control" data-trigger name="company_office_id" id="company_office">
                                <option value="">{{ trans('audit_report_label.choose_company_office') }}</option>
                                @foreach ($company_office as $item)
                                <option value="{{$item->company_office_id}}">ID: {{$item->company_office_id}} - Name: {{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- 
                        <div class="col-sm-12">
                            <label for="company" class="form-label ">{{ trans('audit_report_label.company') }}</label>
                            <select class="form-control" data-trigger name="company_id" id="company">
                                <option value="">{{ trans('audit_report_label.choose_company') }}</option>
                                @foreach ($company as $item)
                                <option value="{{$item->company_id}}">ID: {{$item->company_id}} - Name: {{$item->name}}</option>
                                @endforeach
                            </select>
                        </div> -->

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="audit_date" class="form-label">{{ trans('audit_report_label.audit_date') }}</label>
                            <input type="date" class="form-control" name="audit_date" id="audit_date" value="{{ old('audit_date') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="last_audit_date" class="form-label">{{ trans('audit_report_label.last_audit_date') }}</label>
                            <input type="date" class="form-control" name="last_audit_date" id="last_audit_date" value="{{ old('last_audit_date') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="next_audit_date" class="form-label">{{ trans('audit_report_label.next_audit_date') }}</label>
                            <input type="date" class="form-control" name="next_audit_date" id="next_audit_date" value="{{ old('next_audit_date') }}">
                        </div>

                        <div class="btn-list">
                            <button type="submit" class="btn btn-primary ">{{ trans('audit_report_common.submit') }}</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-1 -->
    <!-- row closed -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div></div>
        <div class="main-dashboard-header-right">
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div>
                    <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                        <i class="bi bi-save"></i>
                    </button>
                </div>
                <div>
                    <a href="{{route('view.project.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
                        <i class="bi bi-box-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection

@section('script-footer')
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

@endsection
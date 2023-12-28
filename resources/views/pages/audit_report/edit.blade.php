@extends('layouts.master')

@section('title', 'Audit Report')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('audit_report_label.audit_report_edit') }}</h4>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('common.homepage') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('audit_report_label.audit_report') }}</li>
            </ol>
        </nav>
    </div>
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
<!-- End Page Header -->

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card    pt-4">

            <div class="card-body">

                <div class="tab-content">

                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mx-2" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif

                    <form action="{{route('view.audit_report.update', ['id' => $model->audit_report_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                        @method('PUT')
                        @csrf
                        <div class="row gy-4">


                            <div class="col-sm-12">
                                <label for="company_office" class="form-label ">{{ trans('audit_report_label.company_office') }}</label>
                                <select class="form-control" data-trigger name="company_office_id" id="company_office">
                                    <option value="">{{ trans('audit_report_label.choose_company_office') }}</option>
                                    @foreach ($company_office as $item)
                                    <option value="{{$item->company_office_id}}" {{$item->company_office_id == $model->company_office_id ? 'selected' : ''}}>ID: {{$item->company_office_id}} - Name: {{$item->name}}</option>
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
                                <input type="date" class="form-control" name="audit_date" id="audit_date" value="{{ $model->audit_date }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="last_audit_date" class="form-label">{{ trans('audit_report_label.last_audit_date') }}</label>
                                <input type="date" class="form-control" name="last_audit_date" id="last_audit_date" value="{{ $model->last_audit_date }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="next_audit_date" class="form-label">{{ trans('audit_report_label.next_audit_date') }}</label>
                                <input type="date" class="form-control" name="next_audit_date" id="next_audit_date" value="{{ $model->next_audit_date }}">
                            </div>

                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary ">{{ trans('audit_report_common.submit') }}</button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
<!-- row -->


@endsection

@section('script-footer')
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>


@endsection
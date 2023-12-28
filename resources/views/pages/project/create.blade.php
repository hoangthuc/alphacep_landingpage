@extends('layouts.master')

@section('title', 'Project')

@section('content')
<form action="{{route('view.project.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('project.project_add') }}</h4>
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

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-4" role="alert">
        {{ $error }}
    </div>
    @endforeach
    @endif
    <!-- row -->
    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        {{ trans('project.project_info') }}
                    </div>
                </div>

                <div class="card-body">
                    <div class="row gy-4">

                        <div class="col-sm-12">
                            <label for="trainee_number" class="form-label required">{{ trans('project.trainee_number') }}</label>
                            <input type="number" class="form-control" name="trainee_number" id="trainee_number" value="{{ old('trainee_number') }}" placeholder="{{ trans('project.trainee_number') }}">
                        </div>

                        <div class="col-sm-12">
                            <label for="entry_date" class="form-label required">{{ trans('project.entry_date') }}</label>
                            <input type="date" class="form-control" name="entry_date" id="entry_date" value="{{ old('entry_date') }}" placeholder="{{ trans('project.entry_date') }}">
                        </div>

                        <div class="col-sm-12">
                            <label for="sending_agency_id" class="form-label ">{{ trans('project.sending_agency') }}</label>
                            <select class="form-control" data-trigger name="sending_agency_id" id="sending_agency_id">
                                <option value="">{{ trans('project.choose_sending_agency') }}</option>
                                @foreach ($sending_agency as $item)
                                <option value="{{$item->sending_agency_id}}">{{$item->sending_agency_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12">
                            <label for="company_id" class="form-label ">{{ trans('project.company') }}</label>
                            <select class="form-control" data-trigger name="company_id" id="company_id">
                                <option value="">{{ trans('project.choose_company') }}</option>
                                @foreach ($company as $item)
                                <option value="{{$item->company_id}}">{{$item->company_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="btn-list">
                            <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
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
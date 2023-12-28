@extends('layouts.master')

@section('title', 'Project')

@section('content')
<form action="{{route('view.project_work_task.store',['project_work_id' => $project_work->project_work_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('project_work_task.project_add') }}</h4>
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

    <!-- row -->
    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        {{ trans('project_work_task.project_info') }}
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

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="project_work_id" class="form-label">{{ trans('project_work_task.project_work_id') }}</label>
                            <input type="number" class="form-control" value="{{ $project_work->project_work_id }}" disabled>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="title" class="form-label">{{ trans('project_work_task.title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="seq_no" class="form-label">{{ trans('project_work_task.seq_no') }}</label>
                            <input type="number" class="form-control" name="seq_no" id="seq_no" value="{{ old('seq_no') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="person_id" class="form-label">{{ trans('project_work_task.person_id') }}</label>
                            <!-- Dropdown for person_id -->
                            <input type="number" class="form-control" name="person_id" id="person_id" value="{{ old('complete_user_id') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="complete_limit_date" class="form-label">{{ trans('project_work_task.complete_limit_date') }}</label>
                            <input type="date" class="form-control" name="complete_limit_date" id="complete_limit_date" value="{{ old('complete_limit_date') }}">
                        </div>

                        <div class=" col-sm-12">
                            <label for="content" class="form-label">{{ trans('project_work_task.content') }}</label>
                            <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="status" class="form-label">{{ trans('project_work_task.status') }}</label>
                            <!-- Dropdown for status -->
                            <select class="form-control" name="status" id="status">
                                <option value="0">{{ trans('project_work_task.incomplete') }}</option>
                                <option value="1">{{ trans('project_work_task.complete') }}</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="complete_date" class="form-label">{{ trans('project_work_task.complete_date') }}</label>
                            <input type="date" class="form-control" name="complete_date" id="complete_date" value="{{ old('complete_date') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="complete_user_id" class="form-label">{{ trans('project_work_task.complete_user_id') }}</label>
                            <input type="number" class="form-control" name="complete_user_id" id="complete_user_id" value="{{ old('complete_user_id') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="complete_user_name" class="form-label">{{ trans('project_work_task.complete_user_name') }}</label>
                            <input type="text" class="form-control" name="complete_user_name" id="complete_user_name" value="{{ old('complete_user_name') }}">
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
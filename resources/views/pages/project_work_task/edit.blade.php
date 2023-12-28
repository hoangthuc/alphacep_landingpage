@extends('layouts.master')

@section('title', 'Project Trainee')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('project_work_task.project_work_task_edit') }}</h4>
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
                    <div class="tab-pane active" id="project_work_task_info" role="project_work_task_info">

                        <form action="{{route('view.project_work_task.update', ['id' => $model->task_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf
                            <div class="row gy-4">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="project_work_id" class="form-label">{{ trans('project_work_task.project_work_id') }}</label>
                                    <input type="number" class="form-control" value="{{ $model->project_work_id }}" disabled>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="title" class="form-label">{{ trans('project_work_task.title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $model->title }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="seq_no" class="form-label">{{ trans('project_work_task.seq_no') }}</label>
                                    <input type="number" class="form-control" name="seq_no" id="seq_no" value="{{ $model->seq_no }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="person_id" class="form-label">{{ trans('project_work_task.person_id') }}</label>
                                    <!-- Dropdown for person_id -->
                                    <input type="number" class="form-control" name="person_id" id="person_id" value="{{ $model->complete_user_id }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="complete_limit_date" class="form-label">{{ trans('project_work_task.complete_limit_date') }}</label>
                                    <input type="date" class="form-control" name="complete_limit_date" id="complete_limit_date" value="{{ $model->complete_limit_date }}">
                                </div>

                                <div class=" col-sm-12">
                                    <label for="content" class="form-label">{{ trans('project_work_task.content') }}</label>
                                    <textarea class="form-control" name="content" id="content">{{ $model->content }}</textarea>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="status" class="form-label">{{ trans('project_work_task.status') }}</label>
                                    <!-- Dropdown for status -->
                                    <select class="form-control" name="status" id="status">
                                        <option value="0" {{ $model->status == '0' ? 'selected' : '' }}>{{ trans('project_work_task.incomplete') }}</option>
                                        <option value="1" {{ $model->status == '1' ? 'selected' : '' }}> {{ trans('project_work_task.complete') }}</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="complete_date" class="form-label">{{ trans('project_work_task.complete_date') }}</label>
                                    <input type="date" class="form-control" name="complete_date" id="complete_date" value="{{ $model->complete_date }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="complete_user_id" class="form-label">{{ trans('project_work_task.complete_user_id') }}</label>
                                    <input type="number" class="form-control" name="complete_user_id" id="complete_user_id" value="{{ $model->complete_user_id }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="complete_user_name" class="form-label">{{ trans('project_work_task.complete_user_name') }}</label>
                                    <input type="text" class="form-control" name="complete_user_name" id="complete_user_name" value="{{ $model->complete_user_name }}">
                                </div>


                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
                                </div>

                            </div>
                        </form>

                    </div>

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
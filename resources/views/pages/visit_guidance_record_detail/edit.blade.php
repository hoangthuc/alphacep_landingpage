@extends('layouts.master')

@section('title', 'Visit Guidance Record Detail')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('visit_guidance_record_detail.visit_record_detail_edit') }}</h4>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('common.homepage') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('visit_guidance_record_detail.visit_record_detail_edit') }}</li>
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

                    <form action="{{route('view.visit_guidance_record_detail.update', ['id' => $model->detail_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                        @method('PUT')
                        @csrf
                        <div class="row gy-4">


                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="visit_record_id" class="form-label">{{ trans('visit_guidance_record_detail.visit_record_id') }}</label>
                            <input type="number" class="form-control" name="visit_record_id" id="visit_record_id" value="{{ $model->visit_record_id }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="seq_no" class="form-label">{{ trans('visit_guidance_record_detail.seq_no') }}</label>
                            <input type="number" class="form-control" name="seq_no" id="seq_no" value="{{ $model->seq_no }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="visit_date" class="form-label">{{ trans('visit_guidance_record_detail.visit_date') }}</label>
                            <input type="date" class="form-control" name="visit_date" id="visit_date" value="{{ $model->visit_date }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="visit_time" class="form-label">{{ trans('visit_guidance_record_detail.visit_time') }}</label>
                            <input type="text" class="form-control" name="visit_time" id="visit_time" value="{{ $model->visit_time }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="reflect_div" class="form-label">{{ trans('visit_guidance_record_detail.reflect_div') }}</label>
                            <select class="form-control" name="reflect_div" id="reflect_div">
                                <option value="1" {{ $model->reflect_div == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ $model->reflect_div == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_progress" class="form-label">{{ trans('visit_guidance_record_detail.training_progress') }}</label>
                            <select class="form-control" name="training_progress" id="training_progress">
                                <option value="1" {{ $model->training_progress == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ $model->training_progress == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="life_attitude" class="form-label">{{ trans('visit_guidance_record_detail.life_attitude') }}</label>
                            <select class="form-control" name="life_attitude" id="life_attitude">
                                <option value="1" {{ $model->life_attitude == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ $model->life_attitude == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="discipline_violation" class="form-label">{{ trans('visit_guidance_record_detail.discipline_violation') }}</label>
                            <select class="form-control" name="discipline_violation" id="discipline_violation">
                                <option value="1" {{ $model->discipline_violation == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ $model->discipline_violation == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="note" class="form-label">{{ trans('visit_guidance_record_detail.note') }}</label>
                            <input type="text" class="form-control" name="note" id="note" value="{{ $model->note }}">
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
<!-- row -->


@endsection

@section('script-footer')
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>


@endsection
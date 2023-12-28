@extends('layouts.master')

@section('title', 'Trainee Relative')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('trainee_relative.trainee_relative_edit') }}</h4>
    </div>
    <div class="main-dashboard-header-right">
        <div class="d-flex my-xl-auto right-content align-items-center">
            <div>
                <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                    <i class="bi bi-save"></i>
                </button>
            </div>
            <div>
                <a href="{{route('view.trainee_relative.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
                    <i class="bi bi-box-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header -->

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger mx-2" role="alert">
    {{ $error }}
</div>
@endforeach
@endif
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card    pt-4">

            <div class="card-body">



                <div class="tab-pane active" id="trainee_relative" role="trainee_relative">

                    <form action="{{route('view.trainee_relative.update', ['id' => $model->relative_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                        @method('PUT')
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="relationship required" class="form-label">{{ trans('trainee_relative.relationship') }}</label>
                                <input type="text" class="form-control" name="relationship" id="relationship" value="{{ $model->relationship }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="name required" class="form-label">{{ trans('trainee_relative.name') }}</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="birthday" class="form-label">{{ trans('trainee_relative.birthday') }}</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" value="{{ $model->birthday }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="nationality" class="form-label">{{ trans('trainee_relative.nationality') }}</label>
                                <input type="text" class="form-control" name="nationality" id="nationality" value="{{ $model->nationality }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="live_together" class="form-label">{{ trans('trainee_relative.live_together') }}</label>
                                <select class="form-control" name="live_together" id="live_together">
                                    <option value="1" {{ $model->live_together == '1' ? 'selected' : '' }}>有</option>
                                    <option value="0" {{ $model->live_together == '0' ? 'selected' : '' }}>無</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="work_school_place" class="form-label">{{ trans('trainee_relative.work_school_place') }}</label>
                                <input type="text" class="form-control" name="work_school_place" id="work_school_place" value="{{ $model->work_school_place }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="mobile_tel" class="form-label">{{ trans('trainee_relative.mobile_tel') }}</label>
                                <input type="text" class="form-control" name="mobile_tel" id="mobile_tel" value="{{ $model->mobile_tel }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="residence_card_number" class="form-label">{{ trans('trainee_relative.residence_card_number') }}</label>
                                <input type="text" class="form-control" name="residence_card_number" id="residence_card_number" value="{{ $model->residence_card_number }}">
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
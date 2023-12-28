@extends('layouts.master')

@section('title', 'Working Hour')

@section('content')
<form action="{{route('view.working_hour.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('working_hour.working_hour_add') }}</h4>
        </div>
        <div class="main-dashboard-header-right">
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div>
                    <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                        <i class="bi bi-save"></i>
                    </button>
                </div>
                <div>
                    <a href="{{route('view.working_hour.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
                        {{ trans('working_hour.working_hour_info') }}
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
                            <label for="working_hour_from" class="form-label">{{ trans('working_hour.working_hour_from') }}</label>
                            <input type="text" class="form-control" name="working_hour_from" id="working_hour_from" value="{{ old('working_hour_from') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="working_hour_to" class="form-label">{{ trans('working_hour.working_hour_to') }}</label>
                            <input type="text" class="form-control" name="working_hour_to" id="working_hour_to" value="{{ old('working_hour_to') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_time_from" class="form-label">{{ trans('working_hour.rest_time_from') }}</label>
                            <input type="text" class="form-control" name="rest_time_from" id="rest_time_from" value="{{ old('rest_time_from') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_time_to" class="form-label">{{ trans('working_hour.rest_time_to') }}</label>
                            <input type="text" class="form-control" name="rest_time_to" id="rest_time_to" value="{{ old('rest_time_to') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_time_from_2" class="form-label">{{ trans('working_hour.rest_time_from_2') }}</label>
                            <input type="text" class="form-control" name="rest_time_from_2" id="rest_time_from_2" value="{{ old('rest_time_from_2') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_time_to_2" class="form-label">{{ trans('working_hour.rest_time_to_2') }}</label>
                            <input type="text" class="form-control" name="rest_time_to_2" id="rest_time_to_2" value="{{ old('rest_time_to_2') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_time_from_3" class="form-label">{{ trans('working_hour.rest_time_from_3') }}</label>
                            <input type="text" class="form-control" name="rest_time_from_3" id="rest_time_from_3" value="{{ old('rest_time_from_3') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_time_to_3" class="form-label">{{ trans('working_hour.rest_time_to_3') }}</label>
                            <input type="text" class="form-control" name="rest_time_to_3" id="rest_time_to_3" value="{{ old('rest_time_to_3') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="rest_hour" class="form-label">{{ trans('working_hour.rest_hour') }}</label>
                            <input type="text" class="form-control" name="rest_hour" id="rest_hour" value="{{ old('rest_hour') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="work_overtime" class="form-label">{{ trans('working_hour.work_overtime') }}</label>
                            <select class="form-control" name="work_overtime" id="work_overtime">
                                <option value="1" {{ old('work_overtime') == '1' ? 'selected' : '' }}>有</option>
                                <option value="0" {{ old('work_overtime') == '0' ? 'selected' : '' }}>無</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="holiday_plan" class="form-label">{{ trans('working_hour.holiday_plan') }}</label>
                            <input type="text" class="form-control" name="holiday_plan" id="holiday_plan" value="{{ old('holiday_plan') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="working_hour_comment" class="form-label">{{ trans('working_hour.working_hour_comment') }}</label>
                            <input type="text" class="form-control" name="working_hour_comment" id="working_hour_comment" value="{{ old('working_hour_comment') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="working_condition" class="form-label">{{ trans('working_hour.working_condition') }}</label>
                            <input type="text" class="form-control" name="working_condition" id="working_condition" value="{{ old('working_condition') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="yearly_give" class="form-label">{{ trans('working_hour.yearly_give') }}</label>
                            <input type="text" class="form-control" name="yearly_give" id="yearly_give" value="{{ old('yearly_give') }}">
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
                    <a href="{{route('view.working_hour.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
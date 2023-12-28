@extends('layouts.master')

@section('title', 'Visit Guidance Record Detail')

@section('content')
<form action="{{route('view.visit_guidance_record_detail.store',$visit_record_id)}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf 
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('visit_guidance_record_detail.visit_record_detail_add') }}</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('common.homepage') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('visit_guidance_record_detail.visit_record_detail') }}</li>
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
                        {{ trans('visit_guidance_record_detail.visit_record_detail_info') }}
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
                            <label for="seq_no" class="form-label">{{ trans('visit_guidance_record_detail.seq_no') }}</label>
                            <input type="number" class="form-control" name="seq_no" id="seq_no" value="{{ old('seq_no') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="visit_date" class="form-label">{{ trans('visit_guidance_record_detail.visit_date') }}</label>
                            <input type="date" class="form-control" name="visit_date" id="visit_date" value="{{ old('visit_date') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="visit_time" class="form-label">{{ trans('visit_guidance_record_detail.visit_time') }}</label>
                            <input type="text" class="form-control" name="visit_time" id="visit_time" value="{{ old('visit_time') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="reflect_div" class="form-label">{{ trans('visit_guidance_record_detail.reflect_div') }}</label>
                            <select class="form-control" name="reflect_div" id="reflect_div">
                                <option value="1" {{ old('reflect_div') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('reflect_div') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_progress" class="form-label">{{ trans('visit_guidance_record_detail.training_progress') }}</label>
                            <select class="form-control" name="training_progress" id="training_progress">
                                <option value="1" {{ old('training_progress') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('training_progress') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_level" class="form-label">{{ trans('visit_guidance_record_detail.training_level') }}</label>
                            <select class="form-control" name="training_level" id="training_level">
                                <option value="1" {{ old('training_level') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('training_level') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="time_allowcation" class="form-label">{{ trans('visit_guidance_record_detail.time_allowcation') }}</label>
                            <select class="form-control" name="time_allowcation" id="time_allowcation">
                                <option value="1" {{ old('time_allowcation') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('time_allowcation') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_attitube" class="form-label">{{ trans('visit_guidance_record_detail.training_attitube') }}</label>
                            <select class="form-control" name="training_attitube" id="training_attitube">
                                <option value="1" {{ old('training_attitube') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('training_attitube') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_willingness" class="form-label">{{ trans('visit_guidance_record_detail.training_willingness') }}</label>
                            <select class="form-control" name="training_willingness" id="training_willingness">
                                <option value="1" {{ old('training_willingness') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('training_willingness') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="japanese_understanding" class="form-label">{{ trans('visit_guidance_record_detail.japanese_understanding') }}</label>
                            <select class="form-control" name="japanese_understanding" id="japanese_understanding">
                                <option value="1" {{ old('japanese_understanding') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('japanese_understanding') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="life_attitude" class="form-label">{{ trans('visit_guidance_record_detail.life_attitude') }}</label>
                            <select class="form-control" name="life_attitude" id="life_attitude">
                                <option value="1" {{ old('life_attitude') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('life_attitude') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="discipline_violation" class="form-label">{{ trans('visit_guidance_record_detail.discipline_violation') }}</label>
                            <select class="form-control" name="discipline_violation" id="discipline_violation">
                                <option value="1" {{ old('discipline_violation') == '1' ? 'selected' : '' }}>〇</option>
                                <option value="0" {{ old('discipline_violation') == '0' ? 'selected' : '' }}>✕</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="note" class="form-label">{{ trans('visit_guidance_record_detail.note') }}</label>
                            <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}">
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


</form>
@endsection

@section('script-footer')
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

@endsection
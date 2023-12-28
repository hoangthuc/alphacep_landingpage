@extends('layouts.master')

@section('title', 'Trainee Relative')

@section('content')
<form action="{{route('view.trainee_relative.store',$trainee->trainee_id)}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('trainee_relative.trainee_relative_add') }}</h4>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- row -->
    <!-- Start:: row-1 -->


    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-2" role="alert">
        {{ $error }}
    </div>
    @endforeach
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        {{ trans('trainee_relative.trainee_relative_info') }}
                    </div>
                </div>


                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="relationship required" class="form-label">{{ trans('trainee_relative.relationship') }}</label>
                            <input type="text" class="form-control" name="relationship" id="relationship" value="{{ old('relationship') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="name required" class="form-label">{{ trans('trainee_relative.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="birthday" class="form-label">{{ trans('trainee_relative.birthday') }}</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" value="{{ old('birthday') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="nationality" class="form-label">{{ trans('trainee_relative.nationality') }}</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" value="{{ old('nationality') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="live_together" class="form-label">{{ trans('trainee_relative.live_together') }}</label>
                            <select class="form-control" name="live_together" id="live_together">
                                <option value="1" {{ old('live_together') == '1' ? 'selected' : '' }}>有</option>
                                <option value="0" {{ old('live_together') == '0' ? 'selected' : '' }}>無</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="work_school_place" class="form-label">{{ trans('trainee_relative.work_school_place') }}</label>
                            <input type="text" class="form-control" name="work_school_place" id="work_school_place" value="{{ old('work_school_place') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="mobile_tel" class="form-label">{{ trans('trainee_relative.mobile_tel') }}</label>
                            <input type="text" class="form-control" name="mobile_tel" id="mobile_tel" value="{{ old('mobile_tel') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="residence_card_number" class="form-label">{{ trans('trainee_relative.residence_card_number') }}</label>
                            <input type="text" class="form-control" name="residence_card_number" id="residence_card_number" value="{{ old('residence_card_number') }}">
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

</form>
@endsection

@section('script-footer')
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

@endsection
@extends('layouts.master')

@section('title', 'Company Staff')

@section('content')
<form action="{{route('view.company_staff.store',['company_office_id'=>$company_office->company_office_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('company_staff.company_staff_add') }}</h4>
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
                        {{ trans('company_staff.company_staff_info') }}
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
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name" class="form-label required">{{ trans('company_staff.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ trans('company_staff.name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name_kana" class="form-label  required">{{ trans('company_staff.name_kana') }}</label>
                            <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{ old('name_kana') }}" placeholder="{{ trans('company_staff.name_kana') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="birthday" class="form-label ">{{ trans('company_staff.birthday') }}</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" value="{{ old('birthday') }}" placeholder="{{ trans('company_staff.birthday') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="sex" class="form-label ">{{ trans('company_staff.sex') }}</label>
                            <select class="form-control" data-trigger name="sex" id="sex">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Others</option>
                            </select>
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="position" class="form-label ">{{ trans('company_staff.position') }}</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}" placeholder="{{ trans('company_staff.position') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="nationality" class="form-label ">{{ trans('company_staff.nationality') }}</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" value="{{ old('nationality') }}" placeholder="{{ trans('company_staff.nationality') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="tel" class="form-label ">{{ trans('company_staff.tel') }}</label>
                            <input type="text" class="form-control" name="tel" id="tel" max="10" min="10" value="{{ old('tel') }}" placeholder="{{ trans('company_staff.tel') }}">
                        </div>


                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="postcode" class="form-label">{{ trans('company_staff.postcode') }}</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="{{ trans('company_staff.postcode') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address1" class="form-label ">{{ trans('company_staff.address1') }}</label>
                            <input type="text" class="form-control" name="address1" id="address1" value="{{ old('address1') }}" placeholder="{{ trans('company_staff.address1') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address2" class="form-label ">{{ trans('company_staff.address2') }}</label>
                            <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" placeholder="{{ trans('company_staff.address2') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="mail" class="form-label">{{ trans('company_staff.mail') }}</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="{{ old('mail') }}" placeholder="{{ trans('company_staff.mail') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="assignment_date" class="form-label">{{ trans('company_staff.assignment_date') }}</label>
                            <input type="date" class="form-control" name="assignment_date" id="assignment_date" value="{{ old('assignment_date') }}" placeholder="{{ trans('company_staff.assignment_date') }}">
                        </div>


                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="certificate_submit" class="form-label ">{{ trans('company_staff.certificate_submit') }}</label>
                            <select class="form-control" data-trigger name="certificate_submit" id="certificate_submit">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="work_condition" class="form-label ">{{ trans('company_staff.work_condition') }}</label>
                            <select class="form-control" data-trigger name="work_condition" id="work_condition">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="  col-sm-12">
                            <label for="certificate" class="form-label">{{ trans('company_staff.certificate') }}</label>
                            <textarea class="form-control" name="certificate" id="certificate" placeholder="{{ trans('company_staff.certificate') }}">{{ old('certificate') }}</textarea>
                        </div>

                        <div class="  col-sm-12">
                            <label for="note" class="form-label">{{ trans('company_staff.note') }}</label>
                            <textarea class="form-control" name="note" id="note" placeholder="{{ trans('company_staff.note') }}">{{ old('note') }}</textarea>
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
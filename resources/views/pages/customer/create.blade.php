@extends('layouts.master')

@section('title', ' Customer')

@section('content')
<form action="{{route('view.customer.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('customer.customer_add') }}</h4>
            <p class="mb-0 text-muted">{{ trans('customer.customer_add_desc') }}</p>
        </div>
        <div class="main-dashboard-header-right">
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div>
                    <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                        <i class="bi bi-save"></i>
                    </button>
                </div>
                <div>
                    <a href="{{route('view.customer.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
                        <i class="bi bi-box-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- row -->
    <!-- Start:: row-1 -->

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-4" role="alert">
        {{ $error }}
    </div>
    @endforeach
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        <h4 class="mb-0">{{ trans('customer.account_info') }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row gy-4">
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name" class="form-label  required">{{ trans('customer.name') }}</label>
                            <input type="text" class="form-control" name="user_name" id="name" value="{{ old('user_name') }}" placeholder="{{ trans('customer.user_name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="email" class="form-label required">{{ trans('customer.email') }}</label>
                            <input type="email" class="form-control" name="user_email" id="email" value="{{ old('user_email') }}" placeholder="{{ trans('customer.user_email') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="password" class="form-label required">{{ trans('customer.password') }}</label>
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="{{ trans('customer.password') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="password_confirmation required" class="form-label">{{ trans('customer.password_confirmation') }}</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="{{ trans('customer.password_confirmation') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="phone" class="form-label required">{{ trans('customer.phone') }}</label>
                            <input type="phone" class="form-control" name="user_phone" id="phone" value="{{ old('phone') }}" placeholder="{{ trans('customer.user_phone') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address" class="form-label">{{ trans('customer.address') }}</label>
                            <input type="text" class="form-control" name="user_address" id="address" value="{{ old('address') }}" placeholder="{{ trans('customer.user_address') }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        <h4 class="mb-0">{{ trans('customer.customer_info') }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row gy-4">
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name" class="form-label required">{{ trans('customer.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ trans('customer.name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name_kana" class="form-label  required">{{ trans('customer.name_kana') }}</label>
                            <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{ old('name_kana') }}" placeholder="{{ trans('customer.name_kana') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="tel" class="form-label required">{{ trans('customer.tel') }}</label>
                            <input type="text" class="form-control" name="tel" id="tel" max="10" min="10" value="{{ old('tel') }}" placeholder="{{ trans('customer.tel') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="fax" class="form-label">{{ trans('customer.fax') }}</label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{ old('fax') }}" placeholder="{{ trans('customer.fax') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="postcode" class="form-label">{{ trans('customer.postcode') }}</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="{{ trans('customer.postcode') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address1" class="form-label">{{ trans('customer.address1') }}</label>
                            <input type="text" class="form-control" name="address1" id="address1" value="{{ old('address1') }}" placeholder="{{ trans('customer.address1') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address2" class="form-label">{{ trans('customer.address2') }}</label>
                            <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" placeholder="{{ trans('customer.address2') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="corporate_number" class="form-label">{{ trans('customer.corporate_number') }}</label>
                            <input type="text" class="form-control" name="corporate_number" id="corporate_number" value="{{ old('corporate_number') }}" placeholder="{{ trans('customer.corporate_number') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="office_area" class="form-label">{{ trans('customer.office_area') }}</label>
                            <input type="text" class="form-control" name="office_area" id="office_area" value="{{ old('office_area') }}" placeholder="{{ trans('customer.office_area') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="supervion_business_type" class="form-label">{{ trans('customer.supervion_business_type') }}</label>
                            <input type="text" class="form-control" name="supervion_business_type" id="supervion_business_type" value="{{ old('supervion_business_type') }}" placeholder="{{ trans('customer.supervion_business_type') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="supervion_license_number" class="form-label">{{ trans('customer.supervion_license_number') }}</label>
                            <input type="text" class="form-control" name="supervion_license_number" id="supervion_license_number" value="{{ old('supervion_license_number') }}" placeholder="{{ trans('customer.supervion_license_number') }}">
                        </div>



                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="external_audit" class="form-label">{{ trans('customer.external_audit') }}</label>
                            <input type="text" class="form-control" name="external_audit" id="external_audit" value="{{ old('external_audit') }}" placeholder="{{ trans('customer.external_audit') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="external_audit_person" class="form-label">{{ trans('customer.external_audit_person') }}</label>
                            <input type="text" class="form-control" name="external_audit_person" id="external_audit_person" value="{{ old('external_audit_person') }}" placeholder="{{ trans('customer.external_audit_person') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="external_officer" class="form-label">{{ trans('customer.external_officer') }}</label>
                            <input type="text" class="form-control" name="external_officer" id="external_officer" value="{{ old('external_officer') }}" placeholder="{{ trans('customer.external_officer') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="corporate_type" class="form-label">{{ trans('customer.corporate_type') }}</label>
                            <input type="text" class="form-control" name="corporate_type" id="corporate_type" value="{{ old('corporate_type') }}" placeholder="{{ trans('customer.corporate_type') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="identifying_code" class="form-label">{{ trans('customer.identifying_code') }}</label>
                            <input type="text" class="form-control" name="identifying_code" id="identifying_code" value="{{ old('identifying_code') }}" placeholder="{{ trans('customer.identifying_code') }}">
                        </div>



                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="permission_date" class="form-label">{{ trans('customer.permission_date') }}</label>
                            <input type="date" class="form-control" name="permission_date" id="permission_date" value="{{ old('permission_date') }}" placeholder="{{ trans('customer.permission_date') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="planning_period_from_date" class="form-label">{{ trans('customer.planning_period_from_date') }}</label>
                            <input type="date" class="form-control" name="planning_period_from_date" id="planning_period_from_date" value="{{ old('planning_period_from_date') }}" placeholder="{{ trans('customer.planning_period_from_date') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="planning_period_to_date" class="form-label">{{ trans('customer.planning_period_to_date') }}</label>
                            <input type="date" class="form-control" name="planning_period_to_date" id="planning_period_to_date" value="{{ old('planning_period_to_date') }}" placeholder="{{ trans('customer.planning_period_to_date') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="permission_valid_from_date" class="form-label">{{ trans('customer.permission_valid_from_date') }}</label>
                            <input type="date" class="form-control" name="permission_valid_from_date" id="permission_valid_from_date" value="{{ old('permission_valid_from_date') }}" placeholder="{{ trans('customer.permission_valid_from_date') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="permission_valid_to_date" class="form-label">{{ trans('customer.permission_valid_to_date') }}</label>
                            <input type="date" class="form-control" name="permission_valid_to_date" id="permission_valid_to_date" value="{{ old('permission_valid_to_date') }}" placeholder="{{ trans('customer.permission_valid_to_date') }}">
                        </div>

                        <div class="  col-sm-12">
                            <label for="overview" class="form-label">{{ trans('customer.overview') }}</label>
                            <textarea class="form-control" name="overview" id="overview" placeholder="{{ trans('customer.overview') }}">{{ old('overview') }}</textarea>
                        </div>

                        <div class="  col-sm-12">
                            <label for="jobs_comment" class="form-label">{{ trans('customer.jobs_comment') }}</label>
                            <textarea class="form-control" name="jobs_comment" id="jobs_comment" placeholder="{{ trans('customer.jobs_comment') }}">{{ old('jobs_comment') }}</textarea>
                        </div>


                        <div class="  col-sm-12">
                            <label for="note" class="form-label">{{ trans('customer.note') }}</label>
                            <textarea class="form-control" name="note" id="note" placeholder="{{ trans('customer.note') }}">{{ old('note') }}</textarea>
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
                    <a href="{{route('view.customer.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
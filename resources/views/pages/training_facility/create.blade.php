@extends('layouts.master')

@section('title', 'Training Facility')

@section('content')
<form action="{{route('view.training_facility.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('training_facility.training_facility_add') }}</h4>
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
                        {{ trans('training_facility.training_facility_info') }}
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
                            <label for="name" class="form-label required">{{ trans('training_facility.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ trans('training_facility.name') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="tel" class="form-label">{{ trans('training_facility.tel') }}</label>
                            <input type="text" class="form-control" name="tel" id="tel" value="{{ old('tel') }}" placeholder="{{ trans('training_facility.tel') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="postcode" class="form-label">{{ trans('training_facility.postcode') }}</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="{{ trans('training_facility.postcode') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="address1" class="form-label">{{ trans('training_facility.address1') }}</label>
                            <input type="text" class="form-control" name="address1" id="address1" value="{{ old('address1') }}" placeholder="{{ trans('training_facility.address1') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="address2" class="form-label">{{ trans('training_facility.address2') }}</label>
                            <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" placeholder="{{ trans('training_facility.address2') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="food_expense_payment" class="form-label">{{ trans('training_facility.food_expense_payment') }}</label>
                            <select class="form-select" name="food_expense_payment" id="food_expense_payment">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="food_expense_payment_detail" class="form-label">{{ trans('training_facility.food_expense_payment_detail') }}</label>
                            <input type="text" class="form-control" name="food_expense_payment_detail" id="food_expense_payment_detail" value="{{ old('food_expense_payment_detail') }}" placeholder="{{ trans('training_facility.food_expense_payment_detail') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="food_expense_trainee_charge" class="form-label">{{ trans('training_facility.food_expense_trainee_charge') }}</label>
                            <select class="form-select" name="food_expense_trainee_charge" id="food_expense_trainee_charge">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="food_expense_trainee_charge_detail" class="form-label">{{ trans('training_facility.food_expense_trainee_charge_detail') }}</label>
                            <input type="text" class="form-control" name="food_expense_trainee_charge_detail" id="food_expense_trainee_charge_detail" value="{{ old('food_expense_trainee_charge_detail') }}" placeholder="{{ trans('training_facility.food_expense_trainee_charge_detail') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="food_expense_comment" class="form-label">{{ trans('training_facility.food_expense_comment') }}</label>
                            <input type="text" class="form-control" name="food_expense_comment" id="food_expense_comment" value="{{ old('food_expense_comment') }}" placeholder="{{ trans('training_facility.food_expense_comment') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="house_cost_payment" class="form-label">{{ trans('training_facility.house_cost_payment') }}</label>
                            <select class="form-select" name="house_cost_payment" id="house_cost_payment">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="house_cost_payment_detail" class="form-label">{{ trans('training_facility.house_cost_payment_detail') }}</label>
                            <input type="text" class="form-control" name="house_cost_payment_detail" id="house_cost_payment_detail" value="{{ old('house_cost_payment_detail') }}" placeholder="{{ trans('training_facility.house_cost_payment_detail') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="house_cost_trainee_charge" class="form-label">{{ trans('training_facility.house_cost_trainee_charge') }}</label>
                            <select class="form-select" name="house_cost_trainee_charge" id="house_cost_trainee_charge">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="house_cost_trainee_charge_detail" class="form-label">{{ trans('training_facility.house_cost_trainee_charge_detail') }}</label>
                            <input type="text" class="form-control" name="house_cost_trainee_charge_detail" id="house_cost_trainee_charge_detail" value="{{ old('house_cost_trainee_charge_detail') }}" placeholder="{{ trans('training_facility.house_cost_trainee_charge_detail') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_form" class="form-label">{{ trans('training_facility.training_place_form') }}</label>
                            <select class="form-select" name="training_place_form" id="training_place_form">
                                <option value="01">Dormitory</option>
                                <option value="02">Rental House</option>
                                <option value="99">Other</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_form_detail" class="form-label">{{ trans('training_facility.training_place_form_detail') }}</label>
                            <input type="text" class="form-control" name="training_place_form_detail" id="training_place_form_detail" value="{{ old('training_place_form_detail') }}" placeholder="{{ trans('training_facility.training_place_form_detail') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_name" class="form-label">{{ trans('training_facility.training_place_name') }}</label>
                            <input type="text" class="form-control" name="training_place_name" id="training_place_name" value="{{ old('training_place_name') }}" placeholder="{{ trans('training_facility.training_place_name') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_tel" class="form-label">{{ trans('training_facility.training_place_tel') }}</label>
                            <input type="text" class="form-control" name="training_place_tel" id="training_place_tel" value="{{ old('training_place_tel') }}" placeholder="{{ trans('training_facility.training_place_tel') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_postcode" class="form-label">{{ trans('training_facility.training_place_postcode') }}</label>
                            <input type="text" class="form-control" name="training_place_postcode" id="training_place_postcode" value="{{ old('training_place_postcode') }}" placeholder="{{ trans('training_facility.training_place_postcode') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_address1" class="form-label">{{ trans('training_facility.training_place_address1') }}</label>
                            <input type="text" class="form-control" name="training_place_address1" id="training_place_address1" value="{{ old('training_place_address1') }}" placeholder="{{ trans('training_facility.training_place_address1') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_address2" class="form-label">{{ trans('training_facility.training_place_address2') }}</label>
                            <input type="text" class="form-control" name="training_place_address2" id="training_place_address2" value="{{ old('training_place_address2') }}" placeholder="{{ trans('training_facility.training_place_address2') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_area" class="form-label">{{ trans('training_facility.training_place_area') }}</label>
                            <input type="text" class="form-control" name="training_place_area" id="training_place_area" value="{{ old('training_place_area') }}" placeholder="{{ trans('training_facility.training_place_area') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_person" class="form-label">{{ trans('training_facility.training_place_person') }}</label>
                            <input type="text" class="form-control" name="training_place_person" id="training_place_person" value="{{ old('training_place_person') }}" placeholder="{{ trans('training_facility.training_place_person') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="training_place_room_area" class="form-label">{{ trans('training_facility.training_place_room_area') }}</label>
                            <input type="text" class="form-control" name="training_place_room_area" id="training_place_room_area" value="{{ old('training_place_room_area') }}" placeholder="{{ trans('training_facility.training_place_room_area') }}">
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
                    <a href="{{route('view.trainee.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
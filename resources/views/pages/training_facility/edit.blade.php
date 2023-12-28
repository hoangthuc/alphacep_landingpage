@extends('layouts.master')

@section('title', 'Training Facility')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('training_facility.training_facility_edit') }}</h4>
    </div>
    <div class="main-dashboard-header-right">
        <div class="d-flex my-xl-auto right-content align-items-center">
            <div>
                <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                    <i class="bi bi-save"></i>
                </button>
            </div>
            <div>
                <a href="{{route('view.training_facility.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
                <!--   <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#training_facility" aria-current="page" href="#training_facility"> Thông tin khách hàng</a>
                    </li>
                  <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#company" href="#company">Thông tin company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#office" href="#office">Thông tin office</a>
                    </li> 
                </ul> -->

                <div class="tab-content">


                    <div class="tab-pane active" id="training_facility" role="training_facility">

                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mx-2" role="alert">
                            {{ $error }}
                        </div>
                        @endforeach
                        @endif
                        <form action="{{route('view.training_facility.update', ['id' => $training_facility->training_facility_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="name" class="form-label required">{{ trans('training_facility.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $training_facility->name }}" placeholder="{{ trans('training_facility.name') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="tel" class="form-label">{{ trans('training_facility.tel') }}</label>
                                    <input type="text" class="form-control" name="tel" id="tel" value="{{ $training_facility->tel }}" placeholder="{{ trans('training_facility.tel') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="postcode" class="form-label">{{ trans('training_facility.postcode') }}</label>
                                    <input type="text" class="form-control" name="postcode" id="postcode" value="{{ $training_facility->postcode }}" placeholder="{{ trans('training_facility.postcode') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="address1" class="form-label">{{ trans('training_facility.address1') }}</label>
                                    <input type="text" class="form-control" name="address1" id="address1" value="{{ $training_facility->address1 }}" placeholder="{{ trans('training_facility.address1') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="address2" class="form-label">{{ trans('training_facility.address2') }}</label>
                                    <input type="text" class="form-control" name="address2" id="address2" value="{{ $training_facility->address2 }}" placeholder="{{ trans('training_facility.address2') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="food_expense_payment" class="form-label">{{ trans('training_facility.food_expense_payment') }}</label>
                                    <select class="form-select" name="food_expense_payment" id="food_expense_payment">
                                        <option value="0" {{ $training_facility->food_expense_payment == 0 ? ' selected' : '' }}>No</option>
                                        <option value="1" {{ $training_facility->food_expense_payment == 1 ? ' selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="food_expense_payment_detail" class="form-label">{{ trans('training_facility.food_expense_payment_detail') }}</label>
                                    <input type="text" class="form-control" name="food_expense_payment_detail" id="food_expense_payment_detail" value="{{ $training_facility->food_expense_payment_detail }}" placeholder="{{ trans('training_facility.food_expense_payment_detail') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="food_expense_trainee_charge" class="form-label">{{ trans('training_facility.food_expense_trainee_charge') }}</label>
                                    <select class="form-select" name="food_expense_trainee_charge" id="food_expense_trainee_charge">
                                        <option value="0" {{ $training_facility->food_expense_trainee_charge == 0 ? ' selected' : '' }}>No</option>
                                        <option value="1" {{ $training_facility->food_expense_trainee_charge == 1 ? ' selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="food_expense_trainee_charge_detail" class="form-label">{{ trans('training_facility.food_expense_trainee_charge_detail') }}</label>
                                    <input type="text" class="form-control" name="food_expense_trainee_charge_detail" id="food_expense_trainee_charge_detail" value="{{ $training_facility->food_expense_trainee_charge_detail }}" placeholder="{{ trans('training_facility.food_expense_trainee_charge_detail') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="food_expense_comment" class="form-label">{{ trans('training_facility.food_expense_comment') }}</label>
                                    <input type="text" class="form-control" name="food_expense_comment" id="food_expense_comment" value="{{ $training_facility->food_expense_comment }}" placeholder="{{ trans('training_facility.food_expense_comment') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="house_cost_payment" class="form-label">{{ trans('training_facility.house_cost_payment') }}</label>
                                    <select class="form-select" name="house_cost_payment" id="house_cost_payment">
                                        <option value="0" {{ $training_facility->house_cost_payment == 0 ? ' selected' : '' }}>No</option>
                                        <option value="1" {{ $training_facility->house_cost_payment == 1 ? ' selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="house_cost_payment_detail" class="form-label">{{ trans('training_facility.house_cost_payment_detail') }}</label>
                                    <input type="text" class="form-control" name="house_cost_payment_detail" id="house_cost_payment_detail" value="{{ $training_facility->house_cost_payment_detail }}" placeholder="{{ trans('training_facility.house_cost_payment_detail') }}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="house_cost_trainee_charge" class="form-label">{{ trans('training_facility.house_cost_trainee_charge') }}</label>
                                    <select class="form-select" name="house_cost_trainee_charge" id="house_cost_trainee_charge">
                                        <option value="0" {{ $training_facility->house_cost_trainee_charge == 0 ? ' selected' : '' }}>No</option>
                                        <option value="1" {{ $training_facility->house_cost_trainee_charge == 1 ? ' selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="house_cost_trainee_charge_detail" class="form-label">{{ trans('training_facility.house_cost_trainee_charge_detail') }}</label>
                                    <input type="text" class="form-control" name="house_cost_trainee_charge_detail" id="house_cost_trainee_charge_detail" value="{{ $training_facility->house_cost_trainee_charge_detail }}" placeholder="{{ trans('training_facility.house_cost_trainee_charge_detail') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_form" class="form-label">{{ trans('training_facility.training_place_form') }}</label>
                                    <select class="form-select" name="training_place_form" id="training_place_form">
                                        <option value="01" {{ $training_facility->training_place_form == '01' ? ' selected' : '' }}>Dormitory</option>
                                        <option value="02" {{ $training_facility->training_place_form == '02' ? ' selected' : '' }}>Rental House</option>
                                        <option value="99" {{ $training_facility->training_place_form == '99' ? ' selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_form_detail" class="form-label">{{ trans('training_facility.training_place_form_detail') }}</label>
                                    <input type="text" class="form-control" name="training_place_form_detail" id="training_place_form_detail" value="{{ $training_facility->training_place_form_detail }}" placeholder="{{ trans('training_facility.training_place_form_detail') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_name" class="form-label">{{ trans('training_facility.training_place_name') }}</label>
                                    <input type="text" class="form-control" name="training_place_name" id="training_place_name" value="{{ $training_facility->training_place_name }}" placeholder="{{ trans('training_facility.training_place_name') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_tel" class="form-label">{{ trans('training_facility.training_place_tel') }}</label>
                                    <input type="text" class="form-control" name="training_place_tel" id="training_place_tel" value="{{ $training_facility->training_place_tel }}" placeholder="{{ trans('training_facility.training_place_tel') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_postcode" class="form-label">{{ trans('training_facility.training_place_postcode') }}</label>
                                    <input type="text" class="form-control" name="training_place_postcode" id="training_place_postcode" value="{{ $training_facility->training_place_postcode }}" placeholder="{{ trans('training_facility.training_place_postcode') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_address1" class="form-label">{{ trans('training_facility.training_place_address1') }}</label>
                                    <input type="text" class="form-control" name="training_place_address1" id="training_place_address1" value="{{ $training_facility->training_place_address1 }}" placeholder="{{ trans('training_facility.training_place_address1') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_address2" class="form-label">{{ trans('training_facility.training_place_address2') }}</label>
                                    <input type="text" class="form-control" name="training_place_address2" id="training_place_address2" value="{{ $training_facility->training_place_address2 }}" placeholder="{{ trans('training_facility.training_place_address2') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_area" class="form-label">{{ trans('training_facility.training_place_area') }}</label>
                                    <input type="text" class="form-control" name="training_place_area" id="training_place_area" value="{{ $training_facility->training_place_area }}" placeholder="{{ trans('training_facility.training_place_area') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_person" class="form-label">{{ trans('training_facility.training_place_person') }}</label>
                                    <input type="text" class="form-control" name="training_place_person" id="training_place_person" value="{{ $training_facility->training_place_person }}" placeholder="{{ trans('training_facility.training_place_person') }}">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="training_place_room_area" class="form-label">{{ trans('training_facility.training_place_room_area') }}</label>
                                    <input type="text" class="form-control" name="training_place_room_area" id="training_place_room_area" value="{{ $training_facility->training_place_room_area }}" placeholder="{{ trans('training_facility.training_place_room_area') }}">
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
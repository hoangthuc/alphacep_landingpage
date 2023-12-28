@extends('layouts.master')

@section('title', 'Customer Staff')

@section('content')
<form action="{{route('view.customer_staff.update', ['id' => $customer_staff->customer_staff_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @method('PUT')
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('customer_staff.staff_edit') }}</h4>
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                    {{ trans('customer_staff.staff_info') }}
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
                            <label for="name" class="form-label required">{{ trans('customer_staff.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$customer_staff->name }}" placeholder="{{ trans('customer_staff.name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name_kana" class="form-label  required">{{ trans('customer_staff.name_kana') }}</label>
                            <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{$customer_staff->name_kana }}" placeholder="{{ trans('customer_staff.name_kana') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="tel" class="form-label required">{{ trans('customer_staff.tel') }}</label>
                            <input type="text" class="form-control" name="tel" id="tel" max="10" min="10" value="{{$customer_staff->tel }}" placeholder="{{ trans('customer_staff.tel') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="mail" class="form-label required">{{ trans('customer_staff.mail') }}</label>
                            <input type="text" class="form-control" name="mail" id="mail" max="10" min="10" value="{{$customer_staff->mail }}" placeholder="{{ trans('customer_staff.mail') }}">
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="birthday" class="form-label">{{ trans('customer_staff.birthday') }}</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" value="{{$customer_staff->birthday }}" placeholder="{{ trans('customer_staff.birthday') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="sex" class="form-label required">{{ trans('customer_staff.sex') }}</label>
                            <select class="form-control" data-trigger name="sex" id="sex">
                                <option value="M">Male</option>
                                <option value="F"  @if($customer_staff->sex == "F" ) selected @endif>Female</option>
                                <option value="O"  @if($customer_staff->sex == "O" ) selected @endif>Others</option>
                            </select>
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="position" class="form-label">{{ trans('customer_staff.position') }}</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{$customer_staff->position }}" placeholder="{{ trans('customer_staff.position') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="nationality" class="form-label">{{ trans('customer_staff.nationality') }}</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" value="{{$customer_staff->nationality }}" placeholder="{{ trans('customer_staff.nationality') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="postcode" class="form-label">{{ trans('customer_staff.postcode') }}</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{$customer_staff->postcode }}" placeholder="{{ trans('customer_staff.postcode') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address1" class="form-label">{{ trans('customer_staff.address1') }}</label>
                            <input type="text" class="form-control" name="address1" id="address1" value="{{$customer_staff->address1 }}" placeholder="{{ trans('customer_staff.address1') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address2" class="form-label">{{ trans('customer_staff.address2') }}</label>
                            <input type="text" class="form-control" name="address2" id="address2" value="{{$customer_staff->address2 }}" placeholder="{{ trans('customer_staff.address2') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="certificate" class="form-label">{{ trans('customer_staff.certificate') }}</label>
                            <input type="text" class="form-control" name="certificate" id="certificate" value="{{$customer_staff->certificate }}" placeholder="{{ trans('customer_staff.certificate') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="certificate_submit" class="form-label ">{{ trans('customer_staff.certificate_submit') }}</label>
                            <select class="form-control" data-trigger name="certificate_submit" id="certificate_submit">
                                <option value="1">1</option>
                                <option value="0" @if($customer_staff->certificate_submit == 0 ) selected @endif>0</option>
                            </select>
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="role" class="form-label required">{{ trans('customer_staff.role') }}</label>
                            <select class="form-control" data-trigger name="role" id="role">
                                <option value="1">1</option>
                                <option value="0" @if($customer_staff->role == 0 ) selected @endif>0</option>
                            </select>
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="work_condition" class="form-label required">{{ trans('customer_staff.work_condition') }}</label>
                            <select class="form-control" data-trigger name="work_condition" id="work_condition">
                                <option value="1">1</option>
                                <option value="0" @if($customer_staff->work_condition == 0 ) selected @endif>0</option>
                            </select>
                        </div>

                        <div class=" col-lg-6 col-md-6 col-sm-12">
                            <label for="assignment_date" class="form-label">{{ trans('customer_staff.assignment_date') }}</label>
                            <input type="date" class="form-control" name="assignment_date" id="assignment_date" value="{{$customer_staff->assignment_date }}" placeholder="{{ trans('customer_staff.assignment_date') }}">
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
@extends('layouts.master')

@section('title', 'Sending Agency')

@section('content')
<form action="{{route('view.sending_agency.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('sending_agency.sending_agency_add') }}</h4>
        </div>
        <div class="main-dashboard-header-right">
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div>
                    <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                        <i class="bi bi-save"></i>
                    </button>
                </div>
                <div>
                    <a href="{{route('view.sending_agency.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
                    {{ trans('sending_agency.sending_agency_info') }}
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
                            <label for="name" class="form-label required">{{ trans('sending_agency.representative_name') }}</label>
                            <input type="text" class="form-control" name="representative_name" id="representative_name" value="{{ old('representative_name') }}" placeholder="{{ trans('sending_agency.representative_name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="representative_name_kana" class="form-label  required">{{ trans('sending_agency.representative_name_kana') }}</label>
                            <input type="text" class="form-control" name="representative_name_kana" id="representative_name_kana" value="{{ old('representative_name_kana') }}" placeholder="{{ trans('sending_agency.representative_name_kana') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="mail" class="form-label required">{{ trans('sending_agency.mail') }}</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="{{ old('mail') }}" placeholder="{{ trans('sending_agency.mail') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="tel" class="form-label required">{{ trans('sending_agency.tel') }}</label>
                            <input type="text" class="form-control" name="tel" id="tel" max="10" min="10" value="{{ old('tel') }}" placeholder="{{ trans('sending_agency.tel') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="fax" class="form-label">{{ trans('sending_agency.fax') }}</label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{ old('fax') }}" placeholder="{{ trans('sending_agency.fax') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="postcode" class="form-label">{{ trans('sending_agency.postcode') }}</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="{{ trans('sending_agency.postcode') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address1" class="form-label">{{ trans('sending_agency.address1') }}</label>
                            <input type="text" class="form-control" name="address1" id="address1" value="{{ old('address1') }}" placeholder="{{ trans('sending_agency.address1') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address2" class="form-label">{{ trans('sending_agency.address2') }}</label>
                            <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" placeholder="{{ trans('sending_agency.address2') }}">
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
                    <a href="{{route('view.sending_agency.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
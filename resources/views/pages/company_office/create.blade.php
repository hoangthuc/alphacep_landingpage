@extends('layouts.master')

@section('title', 'Company Office')

@section('content')
<form action="{{route('view.company_office.store',['company_id'=>$company->company_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('company_office.company_office_add') }}</h4>
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
                        {{ trans('company_office.company_office_info') }}
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
                            <label for="name" class="form-label required">{{ trans('company_office.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ trans('company_office.name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name_kana" class="form-label  required">{{ trans('company_office.name_kana') }}</label>
                            <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{ old('name_kana') }}" placeholder="{{ trans('company_office.name_kana') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="tel" class="form-label required">{{ trans('company_office.tel') }}</label>
                            <input type="text" class="form-control" name="tel" id="tel" max="10" min="10" value="{{ old('tel') }}" placeholder="{{ trans('company_office.tel') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="fax" class="form-label">{{ trans('company_office.fax') }}</label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{ old('fax') }}" placeholder="{{ trans('company_office.fax') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="postcode" class="form-label">{{ trans('company_office.postcode') }}</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ old('postcode') }}" placeholder="{{ trans('company_office.postcode') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="office_area" class="form-label">{{ trans('company_office.office_area') }}</label>
                            <input type="text" class="form-control" name="office_area" id="office_area" value="{{ old('office_area') }}" placeholder="{{ trans('company_office.office_area') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address1" class="form-label">{{ trans('company_office.address1') }}</label>
                            <input type="text" class="form-control" name="address1" id="address1" value="{{ old('address1') }}" placeholder="{{ trans('company_office.address1') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="address2" class="form-label">{{ trans('company_office.address2') }}</label>
                            <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" placeholder="{{ trans('company_office.address2') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="office_number" class="form-label">{{ trans('company_office.office_number') }}</label>
                            <input type="text" class="form-control" name="office_number" id="office_number" value="{{ old('office_number') }}" placeholder="{{ trans('company_office.office_number') }}">
                        </div>

                        <div class="  col-sm-12">
                            <label for="note" class="form-label">{{ trans('company_office.note') }}</label>
                            <textarea class="form-control" name="note" id="note" placeholder="{{ trans('company_office.note') }}">{{ old('note') }}</textarea>
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
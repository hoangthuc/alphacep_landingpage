@extends('layouts.master')

@section('title', 'Function Category')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('function_category.function_category_edit') }}</h4>
    </div>
    <div class="main-dashboard-header-right">
        <div class="d-flex my-xl-auto right-content align-items-center">
            <div>
                <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                    <i class="bi bi-save"></i>
                </button>
            </div>
            <div>
                <a href="{{route('view.function_category.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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


                <div class="tab-content">

                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mx-2" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif
                    <form action="{{route('view.function_category.update', ['id' => $function_category->category_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                        @method('PUT')
                        @csrf
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <label for="category_name" class="form-label required">{{ trans('function_category.category_name') }}</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $function_category->category_name }}" placeholder="{{ trans('function_category.category_name') }}">
                            </div>

                            <div class="col-sm-12">
                                <label for="parent_category_id" class="form-label ">{{ trans('function_category.parent_category') }}</label>
                                <select class="form-control" data-trigger name="parent_category_id" id="parent_category_id">
                                    <option value="">{{ trans('function_category.choose_parent') }}</option>
                                    @foreach ($categories as $cat)
                                    <option value="{{$cat->category_id}}" @if($function_category->parent_category_id == $cat->category_id) selected @endif>{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
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
<!-- row -->


@endsection

@section('script-footer')
<script src="{{ asset('assets/js/prism-custom.js') }}"></script>

<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

@endsection
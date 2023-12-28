@extends('layouts.master')

@section('title', 'Visit Guidance Record')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('visit_guidance_record.visit_guidance_record_edit') }}</h4>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('common.homepage') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('visit_guidance_record.visit_guidance_record') }}</li>
            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">
        <div class="d-flex my-xl-auto right-content align-items-center">
            <div>
                <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                    <i class="bi bi-save"></i>
                </button>
            </div>
            <div>
                <a href="{{route('view.project.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
                    <i class="bi bi-box-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header -->
<div class="col-md-12 col-lg-12 col-xl-12 mb-2">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card    pt-4">

            <div class="card-body">


                <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#visit_guidance_record" aria-current="page" href="#visit_guidance_record">{{ trans('visit_guidance_record.visit_guidance_record_info') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#visit_guidance_record_detail" href="#visit_guidance_record_detail">{{ trans('visit_guidance_record.visit_guidance_record_detail') }}</a>
                    </li>

                </ul>


                <div class="tab-content">

                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mx-2" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif

                    <div class="tab-pane active" id="visit_guidance_record" role="visit_guidance_record">

                        <form action="{{route('view.visit_guidance_record.update', ['id' => $model->visit_record_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf
                            <div class="row gy-4">


                                <div class="col-sm-12">
                                    <label for="company_office" class="form-label ">{{ trans('visit_guidance_record.company_office') }}</label>
                                    <select class="form-control" data-trigger name="company_office_id" id="company_office">
                                        <option value="">{{ trans('visit_guidance_record.choose_company_office') }}</option>
                                        @foreach ($company_office as $item)
                                        <option value="{{$item->company_office_id}}" {{$item->company_office_id == $model->company_office_id ? 'selected' : ''}}>ID: {{$item->company_office_id}} - Name: {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="visit_staff" class="form-label ">{{ trans('visit_guidance_record.visit_staff') }}</label>
                                    <select class="form-control" data-trigger name="visit_staff_id" id="visit_staff">
                                        <option value="">{{ trans('visit_guidance_record.visit_staff') }}</option>
                                        @foreach ($customer_staff as $item)
                                        <option value="{{$item->customer_staff_id}}" {{$item->customer_staff_id == $model->visit_staff_id ? 'selected' : ''}}>ID: {{$item->customer_staff_id}} - Name: {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="trainee" class="form-label ">{{ trans('visit_guidance_record.trainee') }}</label>
                                    <select class="form-control" data-trigger name="trainee_id" id="trainee">
                                        <option value="">{{ trans('visit_guidance_record.choose_trainee') }}</option>
                                        @foreach ($trainee as $item)
                                        <option value="{{$item->trainee_id}}" {{$item->trainee_id == $model->trainee_id ? 'selected' : ''}}>ID: {{$item->trainee_id}} - Name: {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="tab-pane" id="visit_guidance_record_detail" role="visit_guidance_record_detail">

                        <div class="row">

                            <div class="col-md-12 col-lg-12 col-xl-12" id="list-data">

                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered mb-0 text-nowrap gridjs-table">
                                        <thead class="gridjs-thead">
                                            <tr class="gridjs-tr">
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance_record_detail.id') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance_record_detail.seq_no') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance_record_detail.visit_date') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance_record_detail.visit_time') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="pe-1 mb-xl-0 text-end">
                                                        <a href="{{route('view.visit_guidance_record_detail.create',$model->visit_record_id)}}" class="btn btn-info btn-icon btn-b" target="_blank">
                                                            <i class="fe fe-plus"></i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in list" :key="item.detail_id">
                                                <td>((item.detail_id ))</td>
                                                <td>((item.seq_no ))</td>
                                                <td>((item.visit_date ))</td>
                                                <td>((item.visit_time ))</td>
                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a :href="`{{asset('visit-guidance-record-detail')}}/`+item.detail_id+`/edit`" class="text-info fs-14 lh-1"><i class="ri-edit-line"></i></a>
                                                        <form :action="`{{asset('visit-guidance-record-detail')}}/`+item.detail_id" :id="'formDelete_'+((item.visit_record_id))" class="pt-1" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="##" @click="deleteItem(item.visit_record_id)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="card-footer p-8pt">
                                        <ul class="pagination justify-content-start pagination-xsm m-0">

                                            <li class="page-item disabled" v-if="page <= 1">
                                                <button class="page-link" type="button" aria-label="Previous">
                                                    <i class="fe fe-arrow-left"></i>
                                                </button>
                                            </li>
                                            <li class="page-item" v-if="page > 1" @click="onPrePage()">
                                                <button class="page-link" type="button" aria-label="Previous">
                                                    <i class="fe fe-arrow-left"></i>
                                                </button>
                                            </li>


                                            <li class="page-item disabled" v-if="page > 3 ">
                                                <button class="page-link" type="button">
                                                    <span>...</span>
                                                </button>
                                            </li>
                                            <li class="page-item" v-for="item in listPage" v-if="page > (item - 3) && page < (item + 3) " @click="onPageChange(item)" v-bind:class="page == item ? 'active' : ''">
                                                <button class="page-link" type="button" aria-label="Page 1">
                                                    <span>((item))</span>
                                                </button>
                                            </li>


                                            <li class="page-item disabled" v-if="page > count - 1 || count == 1">
                                                <button class="page-link" type="button">
                                                    <i class="fe fe-arrow-right"></i>
                                                </button>
                                            </li>

                                            <li class="page-item" @click="onNextPage()" v-if="page <= count - 1 && count > 1">
                                                <button class="page-link" type="button">
                                                    <i class="fe fe-arrow-right"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

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

<script type="text/javascript">
    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    var S_HYPEN = "-";
    var options = {}
    var notifier = new AWN(options);

    new Vue({
        el: '#list-data',
        data: {
            sortDirection: 'desc',
            sortBy: 'company_id',
            count: 0,
            page: 1,
            list: [],
            conditionSearch: '',
            listPage: [],
            showCount: 10,
        },
        delimiters: ["((", "))"],
        mounted() {
            const that = this;
            this.onLoadPagination();
        },
        computed: {},

        methods: {
            sort: function(s) {
                if (s === this.sortBy) {
                    this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
                }
                this.sortBy = s;
            },
            onPageChange(_p) {
                this.page = _p;
                this.onLoadPagination();
            },
            onPrePage() {
                if (this.page > 1) {
                    this.page = this.page - 1;
                }
                this.onLoadPagination();
            },
            onNextPage() {
                if (this.page < this.count) {
                    this.page = this.page + 1;
                }
                this.onLoadPagination();
            },
            onLoadPagination() {
                const that = this;
                let conditionSearch = '?page=' + this.page;
                conditionSearch += '&showcount=' + this.showCount;
                conditionSearch += '&visit_record_id ={{$model->visit_record_id }}';
                this.conditionSearch = conditionSearch;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.visit_guidance_record_details.list')}}" + conditionSearch,
                    success: function(data) {
                        that.list = data.result.data;
                        console.log(that.list);
                        that.count = data.result.last_page;
                        let pageArr = [];
                        if (that.page - 2 > 0) {
                            pageArr.push(that.page - 2);
                        }
                        if (that.page - 1 > 0) {
                            pageArr.push(that.page - 1);
                        }
                        pageArr.push(that.page);
                        if (that.page + 1 <= that.count) {
                            pageArr.push(that.page + 1);
                        }
                        if (that.page + 2 <= that.count) {
                            pageArr.push(that.page + 2);
                        }
                        that.listPage = pageArr;
                    },
                    error: function(xhr, textStatus, error) {
                        notifier.warning('システムエラーが発生しました。 大変お手数ですが、サイト管理者までご連絡ください');
                    }
                });
            },
            deleteItem(id) {
                console.log(1);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        jQuery('#formDelete_' + id).submit();
                    }
                })

            },
        },
    });
</script>

@endsection
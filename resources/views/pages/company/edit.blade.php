@extends('layouts.master')

@section('title', 'Company')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('company.company_add') }}</h4>
    </div>
    <div class="main-dashboard-header-right">
        <div class="d-flex my-xl-auto right-content align-items-center">
            <div>
                <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                    <i class="bi bi-save"></i>
                </button>
            </div>
            <div>
                <a href="{{route('view.company.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
                <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#company" aria-current="page" href="#company">{{ trans('company.company_info') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#office" href="#office">{{ trans('company.customer_office_info') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#visit_guidance" href="#visit_guidance">{{ trans('company.visit_guidance_info') }}</a>
                    </li>
                </ul>

                <div class="tab-content">


                    <div class="tab-pane active" id="company" role="company">

                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mx-2" role="alert">
                            {{ $error }}
                        </div>
                        @endforeach
                        @endif
                        <form action="{{route('view.company.update', ['id' => $company->company_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf
                            <div class="row gy-4">
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="name" class="form-label required">{{ trans('company.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $company->name }}" placeholder="{{ trans('company.name') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="name_kana" class="form-label  required">{{ trans('company.name_kana') }}</label>
                                    <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{ $company->name_kana }}" placeholder="{{ trans('company.name_kana') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="tel" class="form-label required">{{ trans('company.tel') }}</label>
                                    <input type="text" class="form-control" name="tel" id="tel" max="10" min="10" value="{{ $company->tel }}" placeholder="{{ trans('company.tel') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="fax" class="form-label">{{ trans('company.fax') }}</label>
                                    <input type="text" class="form-control" name="fax" id="fax" value="{{ $company->fax }}" placeholder="{{ trans('company.fax') }}">
                                </div>
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="postcode" class="form-label">{{ trans('company.postcode') }}</label>
                                    <input type="text" class="form-control" name="postcode" id="postcode" value="{{ $company->postcode }}" placeholder="{{ trans('company.postcode') }}">
                                </div>

                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="office" role="office">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12 mb-2">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12" id="list-data">

                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered mb-0 text-nowrap gridjs-table">
                                        <thead class="gridjs-thead">
                                            <tr class="gridjs-tr">
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('company_office.id') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('company_office.name') }}</div>
                                                        <button class="btn btn-outline-success btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-up"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('company_office.company') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-maximize-2"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('company_office.tel') }}</div>
                                                        <button class="btn btn-outline-success btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="pe-1 mb-xl-0 text-end">
                                                        <a href="{{route('view.company_company_office.create',['company_id'=>$company->company_id])}}" class="btn btn-info btn-icon btn-b" target="_blank"> 
                                                            <i class="fe fe-plus"></i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in list" :key="item.company_id">
                                                <td>((item.company_office_id))</td>
                                                <td class="fw-medium">((item.name))</td>
                                                <td>((item.company_id))</td>
                                                <td class="fw-medium">((item.tel))</td>
                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a :href="`{{asset('company-office')}}/`+item.company_office_id+`/edit`" class="text-info fs-14 lh-1"><i class="ri-edit-line"></i></a>
                                                        <form :action="`{{asset('company-office')}}/`+item.company_office_id" :id="'formDelete_'+((item.company_office_id))" class="pt-1" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="##" @click="deleteItem(item.company_office_id)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
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
                    <div class="tab-pane" id="visit_guidance" role="visit_guidance">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12 mb-2">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12" id="list-data2">

                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered mb-0 text-nowrap gridjs-table">
                                        <thead class="gridjs-thead">
                                            <tr class="gridjs-tr">
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance.id') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance.company') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance.company_office') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance.visit_staff') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('visit_guidance.trainee') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th>
                                                    <div class="pe-1 mb-xl-0 text-end">
                                                        <a href="{{route('view.visit_guidance_record.create',['company_id'=>$company->company_id])}}" class="btn btn-info btn-icon btn-b" target="_blank"> 
                                                            <i class="fe fe-plus"></i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in list" :key="item.company_id">
                                                <td>((item.visit_record_id ))</td>
                                                <td>((item.company_id ))</td>
                                                <td>((item.company_office_id ))</td>
                                                <td>((item.visit_staff_id ))</td>
                                                <td>((item.trainee_id ))</td>
                                         
                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a :href="`{{asset('visit-guidance-record')}}/`+item.visit_record_id+`/edit`" class="text-info fs-14 lh-1"><i class="ri-edit-line"></i></a>
                                                        <form :action="`{{asset('visit-guidance-record')}}/`+item.visit_record_id" :id="'formDeleteVisitGuidance_'+((item.visit_record_id))" class="pt-1" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="##" @click="deleteVisitGuidance(item.visit_record_id)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
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
                conditionSearch += '&company_id=' + `{{$company->company_id}}`;
                this.conditionSearch = conditionSearch;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.company_offices.list')}}" + conditionSearch,
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
    
    new Vue({
        el: '#list-data2',
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
                conditionSearch += '&company_id=' + `{{$company->company_id}}`;
                this.conditionSearch = conditionSearch;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.visit_guidance_records.list')}}" + conditionSearch,
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
            deleteVisitGuidance(id) {
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
                        jQuery('#formDeleteVisitGuidance_' + id).submit();
                    }
                })

            },
        },
    });
</script>

@endsection
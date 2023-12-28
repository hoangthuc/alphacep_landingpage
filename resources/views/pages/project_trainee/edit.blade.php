@extends('layouts.master')

@section('title', 'Project Trainee')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('project_trainee.project_trainee_edit') }}</h4>
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

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card    pt-4">

            <div class="card-body">

                <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#project_trainee_info" href="#project_trainee_info">{{trans('project_trainee.project_trainee_info')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-bs-toggle="tab" data-bs-target="#contract_info" aria-current="page" href="#contract_info"> {{trans('project_trainee.contract_info')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-bs-toggle="tab" data-bs-target="#document" aria-current="page" href="#document"> {{trans('project_trainee.document')}}</a>
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
                    <div class="tab-pane active" id="project_trainee_info" role="project_trainee_info">

                        <form action="{{route('view.project_trainee.update', ['id' => $project_trainee->project_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf
                            <div class="row gy-4">

                                <div class="col-sm-12">
                                    <label for="project_id" class="form-label required">{{ trans('project_trainee.project_id') }}</label>
                                    <input type="number" class="form-control" value="{{$project_trainee->project_id}}" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <label for="trainee" class="form-label required">{{ trans('project_trainee.trainee') }}</label>
                                    <input type="number" class="form-control" value="{{$project_trainee->trainee_id}}" disabled>
                                </div>

                                <div class="col-sm-12">
                                    <label for="sending_agency" class="form-label ">{{ trans('project_trainee.sending_agency') }}</label>
                                    <select class="form-control" data-trigger name="sending_agency" id="sending_agency">
                                        @foreach ($sending_agency as $item)
                                        <option value="{{$item->sending_agency_id}}" @if($project_trainee->sending_agency_id == $item->sending_agency_id ) selected @endif>ID: {{$item->sending_agency_id}} - Name: {{$item->representative_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <label for="training_facility" class="form-label ">{{ trans('project_trainee.training_facility') }}</label>
                                    <select class="form-control" data-trigger name="training_facility" id="training_facility">
                                        @foreach ($training_facility as $item)
                                        <option value="{{$item->training_facility_id}}" @if($project_trainee->training_facility_id == $item->training_facility_id ) selected @endif>ID: {{$item->training_facility_id}} - Name: {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="tab-pane" id="contract_info" role="contract_info">
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
                                                        <div class="gridjs-th-content">{{trans('project_contract.contract_id')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('project_contract.trainee')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('project_contract.project_id')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th>
                                                    <div>
                                                        <a href="{{route('view.project_trainee_contract.create',['project_trainee_id'=>$project_trainee->project_trainee_id])}}" class="btn btn-info btn-icon btn-b" target="_blank">
                                                            <i class="fe fe-plus"></i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in list" :key="item.project_trainee_contract_id">
                                                <td>((item.contract_id))</td>
                                                <td>((item.project_trainee?.trainee?.name))</td>
                                                <td>((item.project_trainee?.project?.project_id))</td>

                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a :href="`{{asset('project-trainee-contract')}}/`+item.contract_id+`/edit`" class="text-info fs-14 lh-1"><i class="ri-edit-line"></i></a>
                                                        <form :action="`{{asset('project-trainee-contract')}}/`+item.contract_id" :id="'formDelete_'+((item.contract_id))" class="pt-1" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="##" @click="deleteItem(item.contract_id)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
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

                    <div class="tab-pane" id="document" role="document">
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
                                                        <div class="gridjs-th-content">{{trans('project_document.project_document_id ')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('project_document.document_name')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('project_document.document_type')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('project_document.target_doc')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th>
                                                    <div>
                                                        <a href="{{route('view.project_document.create',$project_trainee->project_trainee_id)}}" class="btn btn-info btn-icon btn-b" target="_blank">
                                                            <i class="fe fe-plus"></i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in list" :key="item.project_document_id">
                                                <td>((item.project_document_id))</td>
                                                <td>((item.document_name))</td>
                                                <td>((item.document_type))</td>
                                                <td>((item.target_doc))</td>

                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a :href="`{{asset('project-document')}}/`+item.project_document_id+`/edit`" class="text-info fs-14 lh-1"><i class="ri-edit-line"></i></a>
                                                        <form :action="`{{asset('project-document')}}/`+item.project_document_id" :id="'formDeleteDocument_'+((item.project_document_id))" class="pt-1" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="##" @click="deleteDocument(item.project_document_id)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
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
            sortBy: 'fyb_id',
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
                conditionSearch += '&project_trainee_id=' + '{{$project_trainee->project_trainee_id}}';
                this.conditionSearch = conditionSearch;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.project_trainee_contracts.list')}}" + conditionSearch,
                    success: function(data) {
                        that.list = data.result.data;
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

                        console.log(that.list);
                    },
                    error: function(xhr, textStatus, error) {
                        notifier.warning('システムエラーが発生しました。 大変お手数ですが、サイト管理者までご連絡ください');
                    }
                });
            },
            deleteItem(id) {
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
            sortBy: 'fyb_id',
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
                conditionSearch += '&project_trainee_id=' + '{{$project_trainee->project_trainee_id}}';
                this.conditionSearch = conditionSearch;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.project-documents.list')}}" + conditionSearch,
                    success: function(data) {
                        that.list = data.result.data;
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

                        console.log(that.list);
                    },
                    error: function(xhr, textStatus, error) {
                        notifier.warning('システムエラーが発生しました。 大変お手数ですが、サイト管理者までご連絡ください');
                    }
                });
            },
            deleteDocument(id) {
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
                        jQuery('#formDeleteDocument_' + id).submit();
                    }
                })

            },
        },
    });
</script>

@endsection
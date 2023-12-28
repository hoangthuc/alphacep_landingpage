@extends('layouts.master')

@section('title', 'Project Document')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('project_document.project_document_edit') }}</h4>
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
                    <div class="tab-pane active" id="project_document_info" role="project_document_info">

                        <form action="{{route('view.project_document.update', $model->project_document_id)}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf

                            <div class="card-body" id='list-data'>
                                <div class="row gy-4">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="document_name" class="form-label">{{ trans('project_document.document_name') }}</label>
                                        <input type="text" class="form-control" name="document_name" id="document_name" value="{{ $model->document_name }}">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="document_type" class="form-label">{{ trans('project_document.document_type') }}</label>
                                        <select class="form-control" name="document_type" id="document_type">
                                            <option value="01" {{ $model->document_type == '01' ? 'selected' : '' }}>資格申請書類</option>
                                            <option value="02" {{ $model->document_type == '02' ? 'selected' : '' }}>更新申請書類</option>
                                            <option value="03" {{ $model->document_type == '03' ? 'selected' : '' }}>監査書類</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="target_doc" class="form-label">{{ trans('project_document.target_doc') }}</label>
                                        <select class="form-control" name="target_doc" id="target_doc">
                                            <option value="01" {{ $model->target_doc == '01' ? 'selected' : '' }}>実習生書類</option>
                                            <option value="02" {{ $model->target_doc == '02' ? 'selected' : '' }}>企業書類</option>
                                            <option value="03" {{ $model->target_doc == '03' ? 'selected' : '' }}>組合書類</option>
                                        </select>
                                    </div>

                                    <span class="mb-0">{{trans('document_attribute.document_attributes') }}</span>
                                    <table class="table table-striped table-bordered mt-0 mb-0 mx-2 text-nowrap gridjs-table">
                                        <thead class="gridjs-thead">
                                            <tr class="gridjs-tr">
                                                <th class="gridjs-th gridjs-th-sort " style="width: 70px;">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('document_attribute.no') }}</div>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('document_attribute.name') }}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-maximize-2"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th class="gridjs-th gridjs-th-sort">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{ trans('document_attribute.value') }}</div>
                                                        <button class="btn btn-outline-success btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th class="text-end" style="width: 50px;">
                                                    <a @click="addAttr()" class="btn btn-info btn-icon btn-b">
                                                        <i class="fe fe-plus"></i></a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item,key) in attributes" :class="'attr-' + key" :key="key">
                                                <td class="text-center">((key+1))</td>
                                                <td class="fw-medium">
                                                    <input type="text" :name="'attr[' + key + '][attribute_name]'" v-model="item.attribute_name" class="form-control" value="">
                                                </td>
                                                <td class="fw-medium">
                                                    <input type="text" :name="'attr[' + key + '][attribute_value]'" v-model="item.attribute_value" class="form-control" value="">
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 flex-wrap justify-content-center" v-if="key != 0">
                                                        <a href="##" @click="deleteAttr(item)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="btn-list">
                                        <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
                                    </div>

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


<script type="text/javascript">
    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    var S_HYPEN = "-";
    var options = {}
    var notifier = new AWN(options);

    new Vue({
        el: '#list-data',
        data: {
            attributes: [],
        },
        delimiters: ["((", "))"],
        mounted() {
            const that = this;
            this.onLoadPagination();
        },
        computed: {},
        methods: {
            addAttr() {
                this.attributes.push({
                    'attribute_name': '',
                    'attribute_value': ''
                });
            },
            deleteAttr(item) {
                const index = this.attributes.indexOf(item);
                if (index !== -1) {
                    this.attributes.splice(index, 1);
                }
            },
            onLoadPagination() {
                const that = this;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.project-document-attributes.list')}}?project_document_id={{$model->project_document_id}}",
                    success: function(data) {
                        that.attributes = data.result.data;
                        console.log( that.attributes);
                    },
                    error: function(xhr, textStatus, error) {
                        notifier.warning('システムエラーが発生しました。 大変お手数ですが、サイト管理者までご連絡ください');
                    }
                });
            }
        }

    });
</script>
@endsection
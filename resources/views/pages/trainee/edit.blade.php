@extends('layouts.master')

@section('title', 'Trainee')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div>
        <h4 class="mb-0">{{ trans('trainee.trainee_edit') }}</h4>
    </div>
</div>
<!-- End Page Header -->
<div class="col-md-12 col-lg-12 col-xl-12 mb-2">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-2" role="alert">
        {{ $error }}
    </div>
    @endforeach
    @endif
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card    pt-4">

            <div class="card-body">
                <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#trainee" aria-current="page" href="#trainee">{{ trans('trainee.trainee_info') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#trainee_relative" href="#trainee_relative">{{ trans('trainee.trainee_relative_info') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="trainee" role="trainee">

                        <form action="{{route('view.trainee.update', ['id' => $model->trainee_id])}}" method="post" enctype="multipart/form-data" class="container-fluid">
                            @method('PUT')
                            @csrf
                            <div class="row gy-4">
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="name" class="form-label required">{{ trans('trainee.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}" placeholder="{{ trans('trainee.name') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="name_kana" class="form-label  required">{{ trans('trainee.name_kana') }}</label>
                                    <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{ $model->name_kana }}" placeholder="{{ trans('trainee.name_kana') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="name_kanji" class="form-label  required">{{ trans('trainee.name_kanji') }}</label>
                                    <input type="text" class="form-control" name="name_kanji" id="name_kanji" value="{{ $model->name_kanji }}" placeholder="{{ trans('trainee.name_kanji') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="mobile_tel" class="form-label required">{{ trans('trainee.mobile_tel') }}</label>
                                    <input type="text" class="form-control" name="mobile_tel" id="mobile_tel" max="10" min="10" value="{{ $model->mobile_tel }}" placeholder="{{ trans('trainee.mobile_tel') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="sex" class="form-label ">{{ trans('trainee.sex') }}</label>
                                    <select class="form-control" data-trigger name="sex" id="sex">
                                        <option value="1">{{ trans('trainee.male') }}</option>
                                        <option value="2">{{ trans('trainee.female') }}</option>
                                    </select>
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="marital_div" class="form-label ">{{ trans('trainee.marital_div') }}</label>
                                    <select class="form-control" data-trigger name="marital_div" id="marital_div">
                                        <option value="0">{{ trans('trainee.marital_div_0') }}</option>
                                        <option value="1">{{ trans('trainee.marital_div_1') }}</option>
                                    </select>
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="nationality_id" class="form-label ">{{ trans('trainee.nationality_id') }}</label>
                                    <select class="form-control" data-trigger name="nationality_id" id="nationality_id">
                                        <option value="1">{{ trans('trainee.nationality') }}</option>
                                    </select>
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="native_language_id" class="form-label ">{{ trans('trainee.native_language_id') }}</label>
                                    <select class="form-control" data-trigger name="native_language_id" id="native_language_id">
                                        <option value="1">{{ trans('trainee.native_language_id') }}</option>
                                    </select>
                                </div>


                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="occupation" class="form-label">{{ trans('trainee.occupation') }}</label>
                                    <input type="text" class="form-control" name="occupation" id="occupation" value="{{ $model->occupation }}" placeholder="{{ trans('trainee.occupation') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="birth_place" class="form-label">{{ trans('trainee.birth_place') }}</label>
                                    <input type="text" class="form-control" name="birth_place" id="birth_place" value="{{ $model->birth_place }}" placeholder="{{ trans('trainee.birth_place') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="home_country_address" class="form-label">{{ trans('trainee.home_country_address') }}</label>
                                    <input type="text" class="form-control" name="home_country_address" id="home_country_address" value="{{ $model->home_country_address }}" placeholder="{{ trans('trainee.birth_place') }}">
                                </div>


                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="enrollment_status_div">{{ trans('trainee.enrollment_status_div') }}:</label>
                                    <select class="form-control" id="enrollment_status_div" name="enrollment_status_div">
                                        <option value="01">所属中</option>
                                        <option value="02">一時帰国（2⇒3号移行時など）</option>
                                        <option value="03">中途帰国</option>
                                        <option value="04">帰国（実習終了）</option>
                                        <option value="05">失踪</option>
                                        <option value="06">滞在（婚姻など）</option>
                                        <option value="07">入国前キャンセル</option>
                                        <option value="08">他組合へ移動</option>
                                        <option value="09">特定活動中</option>
                                        <option value="10">特定活動中（実習終了済）</option>
                                        <option value="99">その他</option>
                                    </select>
                                </div>

                                <!-- Difficulty Notification -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="difficulty_notification_div">{{ trans('trainee.difficulty_notification_div') }}:</label>
                                    <select class="form-control" id="difficulty_notification_div" name="difficulty_notification_div">
                                        <option value="1">有</option>
                                        <option value="0">無</option>
                                    </select>
                                </div>

                                <!-- Difficulty Notification Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="difficulty_notification_date">{{ trans('trainee.difficulty_notification_date') }}:</label>
                                    <input type="date" class="form-control" id="difficulty_notification_date" name="difficulty_notification_date" value="{{ $model->difficulty_notification_date }}">
                                </div>

                                <!-- Disappeared Status -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="disappeared_status_div">{{ trans('trainee.disappeared_status_div') }}:</label>
                                    <select class="form-control" id="disappeared_status_div" name="disappeared_status_div">
                                        <option value="1">有</option>
                                        <option value="0">無</option>
                                    </select>
                                </div>

                                <!-- Disappeared Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="disappeared_date">{{ trans('trainee.disappeared_date') }}:</label>
                                    <input type="date" class="form-control" id="disappeared_date" name="disappeared_date" value="{{ $model->disappeared_date }}">
                                </div>

                                <!-- Resumption Status -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="resumption_status_div">{{ trans('trainee.resumption_status_div') }}:</label>
                                    <select class="form-control" id="resumption_status_div" name="resumption_status_div">
                                        <option value="1">有</option>
                                        <option value="0">無</option>
                                    </select>
                                </div>

                                <!-- Resumption Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="resumption_date">{{ trans('trainee.resumption_date') }}:</label>
                                    <input type="date" class="form-control" id="resumption_date" name="resumption_date" value="{{ $model->resumption_date }}">
                                </div>

                                <!--trainee Type -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="trainee_type">{{ trans('trainee.trainee_type') }}:</label>
                                    <select class="form-control" id="trainee_type" name="trainee_type">
                                        <option value="01">第一号団体監理型技能実習</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="status">{{ trans('trainee.status') }}:</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="01">1号実習中</option>
                                        <option value="02">2号実習中（1年目）</option>
                                        <option value="03">2号実習中（2年目）</option>
                                        <option value="04">3号実習中（1年目）</option>
                                        <option value="05">3号実習中（2年目）</option>
                                    </select>
                                </div>


                                <!-- Move Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="move_date">{{ trans('trainee.move_date') }}:</label>
                                    <input type="date" class="form-control" id="move_date" name="move_date" value="{{ $model->move_date }}">
                                </div>

                                <!-- Start Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="start_date">{{ trans('trainee.start_date') }}:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $model->start_date }}">
                                </div>

                                <!-- Complete Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="complete_date">{{ trans('trainee.complete_date') }}:</label>
                                    <input type="date" class="form-control" id="complete_date" name="complete_date" value="{{ $model->complete_date }}">
                                </div>

                                <!-- Sending Agency ID -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="sending_agency_id">{{ trans('trainee.sending_agency_id') }}:</label>
                                    <input type="number" class="form-control" id="sending_agency_id" name="sending_agency_id" value="{{ $model->sending_agency_id }}">
                                </div>

                                <!-- Apply Immigration Name -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="apply_immigration_name">{{ trans('trainee.apply_immigration_name') }}:</label>
                                    <input type="text" class="form-control" id="apply_immigration_name" name="apply_immigration_name" value="{{ $model->apply_immigration_name }}">
                                </div>

                                <!-- Update Immigration Name -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="update_immigration_name">{{ trans('trainee.update_immigration_name') }}:</label>
                                    <input type="text" class="form-control" id="update_immigration_name" name="update_immigration_name" value="{{ $model->update_immigration_name }}">
                                </div>

                                <!-- Passport No -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="passport_no">{{ trans('trainee.passport_no') }}:</label>
                                    <input type="text" class="form-control" id="passport_no" name="passport_no" value="{{ $model->passport_no }}">
                                </div>

                                <!-- Expiration Date -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="expiration_date">{{ trans('trainee.expiration_date') }}:</label>
                                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="{{ $model->expiration_date }}">
                                </div>

                                <!-- Schedule Landing Port -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="schedule_landing_port">{{ trans('trainee.schedule_landing_port') }}:</label>
                                    <input type="text" class="form-control" id="schedule_landing_port" name="schedule_landing_port" value="{{ $model->schedule_landing_port }}">
                                </div>

                                <!-- Stay Period -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="stay_period">{{ trans('trainee.stay_period') }}:</label>
                                    <input type="text" class="form-control" id="stay_period" name="stay_period" value="{{ $model->stay_period }}">
                                </div>

                                <!-- Visa Application Place -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="visa_application_place">{{ trans('trainee.visa_application_place') }}:</label>
                                    <input type="text" class="form-control" id="visa_application_place" name="visa_application_place" value="{{ $model->visa_application_place }}">
                                </div>

                                <!-- Entry Exit History Div -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="entry_exit_history_div">{{ trans('trainee.entry_exit_history_div') }}:</label>
                                    <select class="form-control" id="entry_exit_history_div" name="entry_exit_history_div">
                                        <option value="1">有</option>
                                        <option value="0">無</option>
                                    </select>
                                </div>

                                <!-- Entry Exit Times -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="entry_exit_times">{{ trans('trainee.entry_exit_times') }}:</label>
                                    <input type="number" class="form-control" id="entry_exit_times" name="entry_exit_times" value="{{ $model->entry_exit_times }}">
                                </div>

                                <!-- Entry Exit Div -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="entry_exit_div">{{ trans('trainee.entry_exit_div') }}:</label>
                                    <select class="form-control" id="entry_exit_div" name="entry_exit_div">
                                        <option value="1">ON</option>
                                        <option value="0">OFF</option>
                                    </select>
                                </div>

                                <!-- Entry Exit From Date -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="entry_exit_from_date">{{ trans('trainee.entry_exit_from_date') }}:</label>
                                    <input type="date" class="form-control" id="entry_exit_from_date" name="entry_exit_from_date" value="{{ $model->entry_exit_from_date }}">
                                </div>

                                <!-- Entry Exit To Date -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="entry_exit_to_date">{{ trans('trainee.entry_exit_to_date') }}:</label>
                                    <input type="date" class="form-control" id="entry_exit_to_date" name="entry_exit_to_date" value="{{ $model->entry_exit_to_date }}">
                                </div>

                                <!-- Residence Status -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="residence_status">{{ trans('trainee.residence_status') }}:</label>
                                    <input type="text" class="form-control" id="residence_status" name="residence_status" value="{{ $model->residence_status }}">
                                </div>

                                <!-- Residence Period -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="residence_period">{{ trans('trainee.residence_period') }}:</label>
                                    <input type="text" class="form-control" id="residence_period" name="residence_period" value="{{ $model->residence_period }}">
                                </div>

                                <!-- Residence Card Number -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="residence_card_number">{{ trans('trainee.residence_card_number') }}:</label>
                                    <input type="text" class="form-control" id="residence_card_number" name="residence_card_number" value="{{ $model->residence_card_number }}">
                                </div>

                                <!-- Stay Expiration Date -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="stay_expiration_date">{{ trans('trainee.stay_expiration_date') }}:</label>
                                    <input type="date" class="form-control" id="stay_expiration_date" name="stay_expiration_date" value="{{ $model->stay_expiration_date }}">
                                </div>

                                <!-- Applicant Agent -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="applicant_agent">{{ trans('trainee.applicant_agent') }}:</label>
                                    <input type="text" class="form-control" id="applicant_agent" name="applicant_agent" value="{{ $model->applicant_agent }}">
                                </div>

                                <!-- Relationship with trainee -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="relationship_with_trainee">{{ trans('trainee.relationship_with_trainee') }}:</label>
                                    <input type="text" class="form-control" id="relationship_with_trainee" name="relationship_with_trainee" value="{{ $model->relationship_with_trainee }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="applicant_tel" class="form-label required">{{ trans('trainee.applicant_tel') }}</label>
                                    <input type="text" class="form-control" name="applicant_tel" id="applicant_tel" max="10" min="10" value="{{ $model->applicant_tel }}" placeholder="{{ trans('trainee.applicant_tel') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="applicant_postcode" class="form-label">{{ trans('trainee.applicant_postcode') }}</label>
                                    <input type="text" class="form-control" name="applicant_postcode" id="applicant_postcode" value="{{ $model->applicant_postcode }}" placeholder="{{ trans('trainee.applicant_postcode') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="applicant_address1" class="form-label">{{ trans('trainee.applicant_address1') }}</label>
                                    <input type="text" class="form-control" name="applicant_address1" id="applicant_address1" value="{{ $model->applicant_address1 }}" placeholder="{{ trans('trainee.applicant_address1') }}">
                                </div>

                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="applicant_address2" class="form-label">{{ trans('trainee.applicant_address2') }}</label>
                                    <input type="text" class="form-control" name="applicant_address2" id="applicant_address2" value="{{ $model->applicant_address2 }}" placeholder="{{ trans('trainee.applicant_address2') }}">
                                </div>

                                <!-- Change Permission Apply Reason -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="change_permission_apply_reason">{{ trans('trainee.change_permission_apply_reason') }}</label>
                                    <input type="text" class="form-control" id="change_permission_apply_reason" name="change_permission_apply_reason" value="{{ $model->change_permission_apply_reason }}">
                                </div>

                                <!-- Update Permission Apply Reason -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="update_permission_apply_reason">{{ trans('trainee.update_permission_apply_reason') }}:</label>
                                    <input type="text" class="form-control" id="update_permission_apply_reason" name="update_permission_apply_reason" value="{{ $model->update_permission_apply_reason }}">
                                </div>

                                <!-- Notice Mail -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="notice_mail">{{ trans('trainee.notice_mail') }}:</label>
                                    <input type="email" class="form-control" id="notice_mail" name="notice_mail" value="{{ $model->notice_mail }}">
                                </div>

                                <!-- Relatives in Japan -->
                                <div class="  col-lg-6 col-md-6 col-sm-12">
                                    <label for="relatives_in_japan">{{ trans('trainee.relatives_in_japan') }}:</label>
                                    <select class="form-control" id="relatives_in_japan" name="relatives_in_japan">
                                        <option value="1">有</option>
                                        <option value="0">無</option>
                                    </select>
                                </div>

                                <!-- Train History -->
                                <div class=" col-sm-12">
                                    <label for="train_history">{{ trans('trainee.train_history') }}:</label>
                                    <textarea class="form-control" id="train_history" name="train_history">{{ $model->train_history }}</textarea>
                                </div>

                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary ">{{ trans('common.submit') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>

            
                    <div class="tab-pane" id="trainee_relative" role="trainee_relative">
                        <div class="row">

                            <div class="col-md-12 col-lg-12 col-xl-12" id="list-data">

                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered mb-0 text-nowrap gridjs-table">
                                        <thead class="gridjs-thead">
                                            <tr class="gridjs-tr">
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('trainee_relative.id')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('trainee_relative.name')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('trainee_relative.relationship')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th class="gridjs-th gridjs-th-sort ">
                                                    <div class="flex-between-center">
                                                        <div class="gridjs-th-content">{{trans('trainee_relative.trainee')}}</div>
                                                        <button class="btn btn-outline-light btn-wave waves-effect waves-light">
                                                            <i class="fe fe-arrow-down"></i>
                                                        </button>
                                                    </div>
                                                </th>

                                                <th>
                                                    <div>
                                                        <a href="{{route('view.trainee_relative.create',$model->trainee_id)}}" class="btn btn-info btn-icon btn-b" target="_blank">
                                                            <i class="fe fe-plus"></i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in list" :key="item.relative_id">
                                                <td>((item.relative_id))</td>
                                                <td>((item.name))</td>
                                                <td>((item.relationship))</td>
                                                <td>((item.trainee?.name))</td>

                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a :href="`{{asset('trainee-relative')}}/`+item.relative_id+`/edit`" class="text-info fs-14 lh-1"><i class="ri-edit-line"></i></a>
                                                        <form :action="`{{asset('trainee-relative')}}/`+item.relative_id" :id="'formDeleteWork_'+((item.relative_id))" class="pt-1" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="##" @click="deleteWork(item.relative_id)" class="text-danger fs-14 lh-1"><i class="ri-delete-bin-5-line"></i></a>
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
            sortBy: 'relative_id',
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
                conditionSearch += '&trainee_id={{$model->trainee_id}}';
                this.conditionSearch = conditionSearch;
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('api.trainee_relatives.list')}}" + conditionSearch,
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
            deleteProjectTrainee(id) {
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
@extends('layouts.master')

@section('title', 'Trainee')

@section('content')
<form action="{{route('view.trainee.store')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">{{ trans('trainee.trainee_add') }}</h4>
        </div>
        <div class="main-dashboard-header-right">
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div>
                    <button type="submit" class="btn btn-success btn-icon me-2 btn-b">
                        <i class="bi bi-save"></i>
                    </button>
                </div>
                <div>
                    <a href="{{route('view.trainee.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
                        {{ trans('trainee.trainee_info') }}
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
                            <label for="name" class="form-label required">{{ trans('trainee.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ trans('trainee.name') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name_kana" class="form-label  required">{{ trans('trainee.name_kana') }}</label>
                            <input type="text" class="form-control" name="name_kana" id="name_kana" value="{{ old('name_kana') }}" placeholder="{{ trans('trainee.name_kana') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="name_kanji" class="form-label  required">{{ trans('trainee.name_kanji') }}</label>
                            <input type="text" class="form-control" name="name_kanji" id="name_kanji" value="{{ old('name_kanji') }}" placeholder="{{ trans('trainee.name_kanji') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="mobile_tel" class="form-label required">{{ trans('trainee.mobile_tel') }}</label>
                            <input type="text" class="form-control" name="mobile_tel" id="mobile_tel" max="10" min="10" value="{{ old('mobile_tel') }}" placeholder="{{ trans('trainee.mobile_tel') }}">
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
                            <input type="text" class="form-control" name="occupation" id="occupation" value="{{ old('occupation') }}" placeholder="{{ trans('trainee.occupation') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="birth_place" class="form-label">{{ trans('trainee.birth_place') }}</label>
                            <input type="text" class="form-control" name="birth_place" id="birth_place" value="{{ old('birth_place') }}" placeholder="{{ trans('trainee.birth_place') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="home_country_address" class="form-label">{{ trans('trainee.home_country_address') }}</label>
                            <input type="text" class="form-control" name="home_country_address" id="home_country_address" value="{{ old('home_country_address') }}" placeholder="{{ trans('trainee.birth_place') }}">
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
                            <input type="date" class="form-control" id="difficulty_notification_date" name="difficulty_notification_date" value="{{ old('difficulty_notification_date') }}">
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
                            <input type="date" class="form-control" id="disappeared_date" name="disappeared_date" value="{{ old('disappeared_date') }}">
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
                            <input type="date" class="form-control" id="resumption_date" name="resumption_date" value="{{ old('resumption_date') }}">
                        </div>

                        <!-- Trainee Type -->
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
                            <input type="date" class="form-control" id="move_date" name="move_date" value="{{ old('move_date') }}">
                        </div>

                        <!-- Start Date -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="start_date">{{ trans('trainee.start_date') }}:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                        </div>

                        <!-- Complete Date -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="complete_date">{{ trans('trainee.complete_date') }}:</label>
                            <input type="date" class="form-control" id="complete_date" name="complete_date" value="{{ old('complete_date') }}">
                        </div>

                        <!-- Sending Agency ID -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="sending_agency_id">{{ trans('trainee.sending_agency_id') }}:</label>
                            <input type="number" class="form-control" id="sending_agency_id" name="sending_agency_id" value="{{ old('sending_agency_id') }}">
                        </div>

                        <!-- Apply Immigration Name -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="apply_immigration_name">{{ trans('trainee.apply_immigration_name') }}:</label>
                            <input type="text" class="form-control" id="apply_immigration_name" name="apply_immigration_name" value="{{ old('apply_immigration_name') }}">
                        </div>

                        <!-- Update Immigration Name -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="update_immigration_name">{{ trans('trainee.update_immigration_name') }}:</label>
                            <input type="text" class="form-control" id="update_immigration_name" name="update_immigration_name" value="{{ old('update_immigration_name') }}">
                        </div>

                        <!-- Passport No -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="passport_no">{{ trans('trainee.passport_no') }}:</label>
                            <input type="text" class="form-control" id="passport_no" name="passport_no" value="{{ old('passport_no') }}">
                        </div>

                        <!-- Expiration Date -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="expiration_date">{{ trans('trainee.expiration_date') }}:</label>
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}">
                        </div>

                        <!-- Schedule Landing Port -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="schedule_landing_port">{{ trans('trainee.schedule_landing_port') }}:</label>
                            <input type="text" class="form-control" id="schedule_landing_port" name="schedule_landing_port" value="{{ old('schedule_landing_port') }}">
                        </div>

                        <!-- Stay Period -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="stay_period">{{ trans('trainee.stay_period') }}:</label>
                            <input type="text" class="form-control" id="stay_period" name="stay_period" value="{{ old('stay_period') }}">
                        </div>

                        <!-- Visa Application Place -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="visa_application_place">{{ trans('trainee.visa_application_place') }}:</label>
                            <input type="text" class="form-control" id="visa_application_place" name="visa_application_place" value="{{ old('visa_application_place') }}">
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
                            <input type="number" class="form-control" id="entry_exit_times" name="entry_exit_times" value="{{ old('entry_exit_times') }}">
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
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="entry_exit_from_date">{{ trans('trainee.entry_exit_from_date') }}:</label>
                            <input type="date" class="form-control" id="entry_exit_from_date" name="entry_exit_from_date" value="{{ old('entry_exit_from_date') }}">
                        </div>

                        <!-- Entry Exit To Date -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="entry_exit_to_date">{{ trans('trainee.entry_exit_to_date') }}:</label>
                            <input type="date" class="form-control" id="entry_exit_to_date" name="entry_exit_to_date" value="{{ old('entry_exit_to_date') }}">
                        </div>

                        <!-- Residence Status -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="residence_status">{{ trans('trainee.residence_status') }}:</label>
                            <input type="text" class="form-control" id="residence_status" name="residence_status" value="{{ old('residence_status') }}">
                        </div>

                        <!-- Residence Period -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="residence_period">{{ trans('trainee.residence_period') }}:</label>
                            <input type="text" class="form-control" id="residence_period" name="residence_period" value="{{ old('residence_period') }}">
                        </div>

                        <!-- Residence Card Number -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="residence_card_number">{{ trans('trainee.residence_card_number') }}:</label>
                            <input type="text" class="form-control" id="residence_card_number" name="residence_card_number" value="{{ old('residence_card_number') }}">
                        </div>

                        <!-- Stay Expiration Date -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="stay_expiration_date">{{ trans('trainee.stay_expiration_date') }}:</label>
                            <input type="date" class="form-control" id="stay_expiration_date" name="stay_expiration_date" value="{{ old('stay_expiration_date') }}">
                        </div>

                        <!-- Applicant Agent -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="applicant_agent">{{ trans('trainee.applicant_agent') }}:</label>
                            <input type="text" class="form-control" id="applicant_agent" name="applicant_agent"  value="{{ old('applicant_agent') }}">
                        </div>

                        <!-- Relationship with Trainee -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="relationship_with_trainee">{{ trans('trainee.relationship_with_trainee') }}:</label>
                            <input type="text" class="form-control" id="relationship_with_trainee" name="relationship_with_trainee"  value="{{ old('relationship_with_trainee') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="applicant_tel" class="form-label required">{{ trans('trainee.applicant_tel') }}</label>
                            <input type="text" class="form-control" name="applicant_tel" id="applicant_tel" max="10" min="10" value="{{ old('applicant_tel') }}" placeholder="{{ trans('trainee.applicant_tel') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="applicant_postcode" class="form-label">{{ trans('trainee.applicant_postcode') }}</label>
                            <input type="text" class="form-control" name="applicant_postcode" id="applicant_postcode" value="{{ old('applicant_postcode') }}" placeholder="{{ trans('trainee.applicant_postcode') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="applicant_address1" class="form-label">{{ trans('trainee.applicant_address1') }}</label>
                            <input type="text" class="form-control" name="applicant_address1" id="applicant_address1" value="{{ old('applicant_address1') }}" placeholder="{{ trans('trainee.applicant_address1') }}">
                        </div>

                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="applicant_address2" class="form-label">{{ trans('trainee.applicant_address2') }}</label>
                            <input type="text" class="form-control" name="applicant_address2" id="applicant_address2" value="{{ old('applicant_address2') }}" placeholder="{{ trans('trainee.applicant_address2') }}">
                        </div>

                        <!-- Change Permission Apply Reason -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="change_permission_apply_reason">{{ trans('trainee.change_permission_apply_reason') }}:</label>
                            <input type="text" class="form-control" id="change_permission_apply_reason" name="change_permission_apply_reason" value="{{ old('change_permission_apply_reason') }}">
                        </div>

                        <!-- Update Permission Apply Reason -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="update_permission_apply_reason">{{ trans('trainee.update_permission_apply_reason') }}:</label>
                            <input type="text" class="form-control" id="update_permission_apply_reason" name="update_permission_apply_reason" value="{{ old('update_permission_apply_reason') }}">
                        </div>

                        <!-- Notice Mail -->
                        <div class="  col-lg-6 col-md-6 col-sm-12">
                            <label for="notice_mail">{{ trans('trainee.notice_mail') }}:</label>
                            <input type="email" class="form-control" id="notice_mail" name="notice_mail" value="{{ old('applicant_address2') }}">
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
                            <textarea class="form-control" id="train_history" name="train_history">{{ old('applicant_address2') }}</textarea>
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
                    <a href="{{route('view.trainee.index')}}" class="btn btn-danger btn-icon me-2 btn-b">
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
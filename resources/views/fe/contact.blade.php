@extends('layouts.fe')

@section('title', 'Homepage')
@section('css-header')
<link href="{{ asset('fe/assets/css/common.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('fe/assets/css/contact.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')


<div id="contact">
    <p class="title_1">Application Form</p>
    <h2 class="title_2">無料カウンセリングお申込みフォーム</h2>

    <picture id="breadcrumbs">
        <source srcset="{{ asset('fe/images/tip_breadcrumbs_01_desktop.jpg') }}" media="(min-width:700px)">
        <img srcset="{{ asset('fe/images/tip_breadcrumbs_01_mobile.jpg') }}" alt="">
    </picture>

    <script src="https://embed.ycb.me/" async="true" data-domain="onemonth"></script>

</div>
@endsection

@section('script-footer')
<script src="{{ asset('fe/assets/js/functions.js') }}"></script>
<script src="{{ asset('fe/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('fe/assets/js/jquery.bxslider.min.js') }}"></script>

<script>
    $('#checkbox').change(function() {
        if ($(this).is(':checked')) {
            $('#check_button').prop('disabled', false);
        } else {
            $('#check_button').prop('disabled', true);
        }
    });
</script>
@endsection
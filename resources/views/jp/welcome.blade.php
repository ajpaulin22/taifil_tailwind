@extends('jp.layout.client')

@section('content')
    <x-loader message="PLease wait while sending....."/>
    @include('jp.onepage.hero')
    @include('jp.onepage.departure')
    @include('jp.onepage.about')
    @include('jp.onepage.ttip')
    @include('jp.onepage.ssw')
    @include('jp.onepage.direct')
    @include('jp.onepage.post')
    @include('jp.onepage.inquiry')
@endsection

@push('scripts')
    <script src="{{asset("js/onepage.js")}}"></script>
@endpush
@extends('layout.client')

@section('content')
    <x-loader message="PLease wait while sending....."/>
    @include('onepage.hero')
    @include('onepage.departure')
    @include('onepage.about')
    @include('onepage.ttip')
    @include('onepage.ssw')
    @include('onepage.direct')
    @include('onepage.post')
    @include('onepage.inquiry')
@endsection

@push('scripts')
    <script src="{{asset("js/onepage.js")}}"></script>
@endpush
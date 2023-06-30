@extends('layout.client')

@section('content')
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
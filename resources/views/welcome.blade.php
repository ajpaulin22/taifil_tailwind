@extends('layout.client')

@section('content')
    @include('onepage.hero')
    @include('onepage.about')
    @include('onepage.ttip')
    @include('onepage.ssw')
    @include('onepage.post')
    @include('onepage.inquiry')
@endsection

@push('scripts')
    <script src="{{asset("js/onepage.js")}}"></script>
@endpush
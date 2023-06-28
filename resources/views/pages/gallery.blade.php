


@extends('layout.client')
@section('content')
<section class="mt-5 mb-5 ">
    {{-- {{dd($posts)}} --}}
    <div class="min-h-screen max-w-7xl md:mx-auto mx-5 overflow-y-scroll p-2 overflow-x-hidden md:flex gap-5">
        <div class="min-h-screen w-44 sticky top-0 bg-green-500 p-4 rounded text-white">
            <div class="text-2xl font-bold mb-2">
                Categories
            </div>
            <hr>
            <div class="p-2">
                <a href="" class="hover:text-sky-800">Event</a>
            </div>
            <hr>
            <div class="p-2">
                <a href="" class="hover:text-sky-800">Departure</a>
            </div>
        </div>
        <div class="w-full">
            <div class="">
                <a href="/client/gallery/create-post" class="py-2 px-4 border border-green-500 rounded shadow-lg hover:bg-green-500 hover:border-green-900 hover:text-white ">Create Post</a>
            </div>
            @php
                echo "<x-post_card/>"
            @endphp
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{asset("js/client/gallery.js")}}"></script>
@endpush
@endsection
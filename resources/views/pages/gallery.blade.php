





<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 2000)">
    @if (session()->has('message'))
        <x-success_toast message="{{ session()->get('message') }}"/>
    @endif
</div>
@section('title')
    Gallery
@endsection
@extends('layout.client')
@section('content')
<nav class="px-10 py-5 bg-green-500" aria-label="Breadcrumb">
    <div class="max-w-7xl flex justify-between mx-auto px-10">
        <div class="text-2xl text-white">Gallery</div>
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/" class="text-white inline-flex items-center text-sm font-medium hover:text-blue-600">
          <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Gallery</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
<section class="mt-5 mb-5 ">
    <div class="min-h-screen max-w-7xl md:mx-auto mx-5  p-2 overflow-x-hidden md:flex gap-5">
        <div class="min-h-screen w-96 sticky top-0 text-black p-4 rounded">
            <div class="text-2xl font-bold mb-2">
                CATEGORIES
            </div>
            <div class="p-2">
                <a href="/client/gallery" class="hover:text-sky-800">All</a>
            </div>
            <hr>
            <div class="p-2">
                <a href="/client/gallery?cat=events" class="hover:text-sky-800">Event</a>
            </div>
            <hr>
            <div class="p-2">
                <a href="/client/gallery?cat=departure" class="hover:text-sky-800">Departure</a>
            </div>
            <hr>
        </div>
        <div class="w-full">
            @admin
            <div class="">
                <a href="/client/gallery/create-post" class="py-2 px-4 border border-green-500 rounded shadow-lg hover:bg-green-500 hover:border-green-900 hover:text-white ">Create Post</a>
            </div>
            @endadmin
            @foreach ($posts as $post)
            <x-post_card id="{{$post['id']}}" title="{{$post['title']}}" content="{{$post['content']}}" cat="{{$post['category']}}" time="{{$post['time']}}" date="{{$post['date']}}" image="{{count($post['images']) > 0 ? $post['images'][0]['path'] :'' }}" />
            @endforeach
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{asset("js/client/gallery.js")}}"></script>
@endpush
@endsection
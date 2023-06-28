

@extends('layout.client')


@section('content')
<nav class="px-10 py-5 bg-green-500" aria-label="Breadcrumb">
    <div class="max-w-7xl flex justify-between mx-auto px-10">
        <div class="text-2xl text-white">Post</div>
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
          <a href="/client/gallery" class="text-white inline-flex items-center text-sm font-medium hover:text-blue-600">
            <span class="">Gallery</span>
        </a>
          
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-gray-300 md:ml-2 dark:text-gray-400">{{$data[0]['title']}}</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
<section class="mt-5 mb-5 ">
    <div class="min-h-screen max-w-7xl md:mx-auto mx-5  p-2 overflow-x-hidden md:grid grid-cols-5 grid-flow-col gap-5">
        <div class=" text-black p-4 rounded col-span-1 ">
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
        <div class="w-full col-span-4">
            <div class="title">
                <h1 class="text-2xl">{{$data[0]['title']}}</h1>
            </div>
            <div class="tab_details flex gap-5 text-sm font-thin text-gray-400 my-3">
                <div class="date cursor-default">{{$data[0]['date']}}</div>
                <div class="time cursor-default">
                    {{$data[0]['time']}}
                </div>
                <div>
                    <a href="" class="hover:text-black">{{$data[0]['category']}}</a>
                </div>
            </div>
            <hr>

            @if(count($data[0]['images']) != 0)
                
            <div class="swiper w-auto h-96 mt-5">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach($data[0]['images'] as $image)
                  <div class="swiper-slide flex justify-center items-center">
                    <img src="{{url('storage/'.$image['path'])}}" class="object-contain w-auto h-full" alt="">
                  </div>
                  @endforeach
                  ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
              
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              
                <!-- If we need scrollbar -->
                
            </div>
            @endif
            

            <hr class="mt-5">
            <div class="content whitespace-pre-line text-ellipsis overflow-hidden font-sans">
               {{$data[0]['content']}}
            </div>

            <hr class=" mt-10">
            <div class="flex justify-between py-5">
                
                @if(isset($prev[0]))
                <a href="/client/gallery/post?id={{$prev[0]['id']}}" class="p-2 bg-green-500 text-white rounded-lg hover:bg-green-200 hover:text-black border border-green-800"><< Prev Post</a>
                @endif
                @if(isset($next[0]))
                <a href="/client/gallery/post?id={{$next[0]['id']}}" class="p-2 bg-green-500 text-white rounded-lg hover:bg-green-200 hover:text-black border border-green-800">Next post >></a>
                @endif
                
                
            </div>
            <hr class="mb-10">
        </div>
    </div>
</section>
@endsection
@push('scripts')
   <script src="{{asset("js/client/gallery.js")}}"></script>
@endpush
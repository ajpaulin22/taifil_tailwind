
@section('title')
    Job Category
@endsection
@extends('layout.client')
@section('content')
<x-opening_spin/>
<nav class="py-2 px-1 md:px-10 md:py-5 bg-green-500 " aria-label="Breadcrumb">
    <div class="max-w-7xl text-center md:flex justify-between mx-auto px-10">
        <div class="text-sm md:text-2xl text-white">Job Category</div>
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/" class="text-white inline-flex items-center text-xs md:text-sm font-medium hover:text-blue-600">
          <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center ">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400 text-xs md:text-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 md:text-sm font-medium text-white md:ml-2 text-xs">{{$id}}</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-xs md:text-sm font-medium text-gray-500 md:ml-2">Job Category</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
    <section class="md:grid grid-cols-7 gap-4 mx-2 md:mx-auto max-w-7xl my-5">
        <div class="hidden col-span-1 md:block">
          {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Toggle modal
          </button> --}}
          <div class="text-2xl font-bold mb-2">
            CATEGORIES
          </div>
          <div class="">
              <a href="/client/jobcategory?data={{$id}}" class="hover:text-sky-800 w-full h-full inline-block p-2">All</a>
          </div>
          <hr>
           @foreach($cat as $c)
           <div class="{{(($category == $c->Category) ? 'bg-green-100 pointer-events-none' : '' )}}">
            <a href="/client/jobcategory?data={{$id}}&category={{$c->Category}}" class="hover:text-sky-800 w-full h-full inline-block p-2">{{$c->Category}}</a>
          </div>
        <hr>
           @endforeach
           

          </div>
        </div>
        <div class="md:grid grid-cols-3 gap-5 col-span-6">
            @if(Count($cards) > 0)
            @foreach ($cards as $card)
            @php
                $quali = $card->Qualifications==null ? "Still Updating..." : $card->Qualifications;
            @endphp
            <x-card_job require="{{$quali}}" job="{{$card->Operation}}" type="{{$id}}" cat="{{$card->CategoryID}}" op="{{$card->OperationID}}"/>
            @endforeach
            @else
            <h1 class="text-center col-span-3 text-lg mt-10">No Job Listing posted...</h1>
            @endif
        </div>
        <div class="col-start-2 col-span-6">
          {{$cards->links()}}
      </div>
    </section>
    
 
    
@endsection     

@push('scripts')
    <script defer src="{{asset("js/client/jobcategory.js")}}"></script>
@endpush
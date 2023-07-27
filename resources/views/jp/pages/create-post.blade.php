

@section('title')
    Create
@endsection
@extends('jp.layout.client')
@section('content')
<div id="alert">
</div>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <a href="{{ url()->previous() }}" class="flex w-full justify-center rounded-md bg-green-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
  </div>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create Post</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-4xl bg-green-300 p-5 rounded-md">
      <form class="space-y-6" id="create_form" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-span-1">
            <label for="personal_lastname" class="form-label">Category<span style="color:red">*</span>:</label>
            <select name="category" class="form-select" required>
                <option value="" selected disabled value>Choose....</option>
                <option value="events">Events</option>
                <option value="departure">Departure</option>
            </select>
        </div>

        <div class="form-group">
          <label  class="block text-sm font-medium leading-6 text-gray-900">Title<span style="color:red">*</span>:</label>
          <input  name="title" type="text" placeholder="Add Title" autocomplete="off" class="form-control" required>
        </div>
  
        <div class="form-group">
            <label  class="block text-sm font-medium leading-6 text-gray-900">Content<span style="color:red">*</span>:</label>
            {{-- <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Whats on your mind...." required></textarea> --}}
            {{-- <input type="hidden" name="content"> --}}
            <div id="scrolling-container-create" class="col-span-4">
              <div id="toolbar-container-create" class="bg-white">
                <span class="ql-formats">
                  <select class="ql-font"></select>
                  <select class="ql-size"></select>
                </span>
                <span class="ql-formats">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-strike"></button>
                </span>
                <span class="ql-formats">
                  <select class="ql-color"></select>
                  <select class="ql-background"></select>
                </span>
                <span class="ql-formats">
                  <button class="ql-script" value="sub"></button>
                  <button class="ql-script" value="super"></button>
                </span>
                <span class="ql-formats">
                  <button class="ql-header" value="1"></button>
                  <button class="ql-header" value="2"></button>
                  <button class="ql-blockquote"></button>
                  <button class="ql-code-block"></button>
                </span>
                <span class="ql-formats">
                  <button class="ql-list" value="ordered"></button>
                  <button class="ql-list" value="bullet"></button>
                  <button class="ql-indent" value="-1"></button>
                  <button class="ql-indent" value="+1"></button>
                </span>
                <span class="ql-formats">
                  <button class="ql-direction" value="rtl"></button>
                  <select class="ql-align"></select>
                </span>
                <span class="ql-formats">
                  <button class="ql-link"></button>
                  {{-- <button class="ql-image"></button>
                  <button class="ql-video"></button>
                  <button class="ql-formula"></button> --}}
                </span>
                <span class="ql-formats">
                  <button class="ql-clean"></button>
                </span>
              </div>
              <div id="container-create" class="h-auto bg-white">
    
              </div>
            </div>
        </div>
        <div class="form-group col-span-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Pictures</label>
            <input name="pictures[]" id="pictures" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" accept=".png,.jpeg,.jpg" multiple>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Compatible file type: PNG, JPG.</p>
          </div>

        <div>
          <button id="" class="flex w-full justify-center rounded-md bg-green-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
        </div>
      </form>
    
    </div>
</div>
<img id="sample" src="" alt="">
@push('scripts')
    <script src="{{asset("js/client/gallery.js")}}"></script>
@endpush
@endsection
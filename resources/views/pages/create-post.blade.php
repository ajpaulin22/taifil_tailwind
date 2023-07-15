

@section('title')
    Create
@endsection
@extends('layout.client')
@section('content')
<div id="alert">
</div>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
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
            <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Whats on your mind...." required></textarea>
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
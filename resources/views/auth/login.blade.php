
@push('styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@extends('layout.auth')
@section('title')
    Login
@endsection

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{url('auth/signin')}}" method="POST" id="login">
        @csrf
        <div class="form-group">
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6  @error('username') ring-red-600 @enderror">
          </div>
          @error('username')
            <label class="text-sm text-red-600">{{ $message }}</label>
          @enderror
        </div>
  
        <div class="form-group">
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6  @error('password') ring-red-600 @enderror">
          </div>
          @error('password')
            <label class="text-sm text-red-600">{{ $message }}</label>
          @enderror
        </div>
  
        <div>
          <button id="btnLogin" class="flex w-full justify-center rounded-md bg-green-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
        </div>
      </form>
      <div class="flex items-baseline justify-center">
        <a href="/auth/register" class="hover:border-b-2 hover:border-b-green-600">Create Account</a>
      </div>
    
    </div>
</div>
@endsection

@push('scripts')
    
@endpush

@push('scripts')
    <script src="{{asset('js/auth/auth.js')}}" defer></script>
@endpush
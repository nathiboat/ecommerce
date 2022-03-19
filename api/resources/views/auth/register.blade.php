@extends('layouts.app')

@section('content')   
    <div class="w-1/5 px-8 py-6 mt-4 text-left bg-white shadow-lg">
      
           
                <div class="text-2xl font-bold text-center">{{ __('Register') }}</div>

                <div class="mt-4">
                    <form  method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <label for="name" class="block">{{ __('Name') }}</label>
                            <input id="name" type="text" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="text-red-600 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')    
                                <span class="text-red-600 text-xs italic">{{ $message }}</span> 
                            @enderror
                          
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <strong class="text-red-600 text-xs italic">{{ $message }}</strong>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="flex items-baseline justify-between">
                            <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>

    </div>

@endsection

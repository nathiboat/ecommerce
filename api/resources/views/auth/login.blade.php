@extends('layouts.app')

@section('content')
        <div class="w-1/5 px-8 py-6 mt-4 text-left bg-white shadow-lg" >
            
                <div class="text-2xl font-bold text-center">{{ __('Login to your account') }}</div>

                <div class="mt-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" class="block">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                     <span  class="text-red-600 text-xs italic">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span  class="text-red-600 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-baseline justify-between">
                           
                                <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                         
                        </div>
                    </form>
                </div>
        </div>
@endsection

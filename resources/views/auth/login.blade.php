@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="justify-content: center; margin-top:5rem">
        <div class=" col-lg-5 offset-lg-1 p-4">
            <div class="contact_form_container">
                        <div class="contact_form_title" style="font-size: 2rem; text-align:center;margin-bottom:1rem">Sign In</div>

                        <form method="POST" action="{{ route('login') }}" style="padding: 1.5rem;border-radius:.5; background-color:#fff">
                            @csrf

                         <div class="form-group">
                                         <label for="exampleFormControlInput1">{{ __('E-Mail Address') }}</label>
                                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                         @error('email')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                        </div>


                                        <div class="form-group">
                                         <label for="exampleFormControlInput1">{{ __('Password') }}</label>
                                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                         @error('password')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror

                                        </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <br>
                                        <button type="submit" class="btn btn-primary ">
                                            {{ __('Login') }}
                                        </button>
                                        <br> <br>
                                        @if (Route::has('password.request'))
                                        <a class=" primary " href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                     </form>

                        
                    </div>

        </div>


    </div>
</div>
@endsection





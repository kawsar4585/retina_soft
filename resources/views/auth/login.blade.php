@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <div id="LoginError" style="display: none;" class="alert alert-danger"></div>

                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" data-loading-text="Login Processing"  class="btn btn-primary" id="login-btn">
                                    {{ __('Login') }}
                                </button>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="page-wraper">
    <div class="account-form">
        <div class="account-head">
            <a href="#"><img src="/assets/images/retina-logo.png" alt=""></a>
        </div>
        <div class="account-form-inner">
            <div class="account-container">
                <div class="heading-bx left">
                    <h2 class="title-head">Sign In</span></h2>
                    <p>Don't have an account? <a href="{{url('/register')}}">Create one here</a></p>
                </div>
                {{-- @if(session()->has('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif --}}
                    <div id="LoginError" style="display: none;" class="alert alert-danger"></div>

                <form id="login-form" class="contact-bx" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row placeani">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>Your Email</label>
                                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>Your Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">

                                    {{-- @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="form-group form-forget">

                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="ml-auto">Forgot Password?</a>
                                @endif
                            </div>
                        </div> --}}
                        <div class="col-lg-12 m-b15">
                            <button type="submit" id="login-btn" class="btn button-md">SIGN IN</button>

                        </div>
                        <div class="col-md-12">
                            {{-- <h6>Login with Social media</h6> --}}
                            <div class="">
                                <a class="btn flex-fill  google-plus" href="{{url('/google')}}"><i class="fab fa-google"></i>SIGN IN WITH GOOGLE</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">


    $('#login-btn').click(function (e) {
        e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{ route('login') }}",
                data: $('#login-form').serialize(),
                success: function (data) {
                    // console.log(data)

                    if (data.message==='success'){
                       if (data.role==='user'){
                            window.location = '/user/dashboard';

                        } else{

                            window.location = '/admin/dashboard';
                        }

                    }else{

                        $('#LoginError').show().text(data.message);
                    }
                },

            });


    });
</script>
@endsection

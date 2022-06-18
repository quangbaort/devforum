@extends('auth.layout.index')
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-body p-0 auth-header-box">
                        <div class="text-center p-3">
                            <a href="index.html" class="logo logo-admin">
                                <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                            </a>
                            <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Admin {{ env("APP_NAME") }}</h4>
                            <p class="text-muted  mb-0">{{ __('Sign in to') }} {{ env("APP_NAME") }}.</p>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form class="my-4"  method="POST" action="{{ route('admin.postLogin') }}" id="login">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="email">{{ __('Email') }}</label>
                                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" name="email" placeholder="{{ __('Enter your Email Address') }}" required >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end form-group-->

                            <div class="form-group">
                                <label class="form-label" for="userpassword">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="{{ __('Enter your password') }}" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end form-group-->

                            <div class="form-group row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch form-switch-success">
                                        <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                        <label class="form-check-label" for="customSwitchSuccess">{{ __('Remember me') }}</label>
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-6 text-end">
                                    <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i>{{ __('Forgot password?') }}</a>
                                </div><!--end col-->
                            </div><!--end form-group-->

                            <div class="form-group mb-0 row">
                                <div class="col-12">
                                    <div class="d-grid mt-3">
                                        <button class="btn btn-primary" type="submit">{{ __('Login') }} <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                </div><!--end col-->
                            </div> <!--end form-group-->
                        </form><!--end form-->
                        <div class="m-3 text-center text-muted">
                            <p class="mb-0">{{ __("Don't have account") }}  <a href="auth-register.html" class="text-primary ms-2">{{ __('Free Register') }}</a></p>
                        </div>
                        <hr class="hr-dashed mt-4">
                        <div class="text-center mt-n5">
                            <h6 class="card-bg px-3 my-4 d-inline-block">{{ __('Or login with') }}</h6>
                        </div>
                        <div class="d-flex justify-content-center mb-1">
                            <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-primary rounded-circle me-2">
                                <i class="fab fa-facebook align-self-center"></i>
                            </a>
                            <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-info rounded-circle me-2">
                                <i class="fab fa-twitter align-self-center"></i>
                            </a>
                            <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-danger rounded-circle">
                                <i class="fab fa-google align-self-center"></i>
                            </a>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div>
    </div>
@endsection

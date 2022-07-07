@extends('admin.layouts.master-without-nav')

@section('title', trans('Sign Up'))

@section('content')
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="{{ route('admin.dashboard') }}" class="d-inline-block auth-logo">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">@lang('Premium Admin & Dashboard Template')</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">@lang('Create New Account')</h5>
                                    <p class="text-muted">@lang('Get your free velzon account now')</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">@lang('Name') <span class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')]) placeholder="@lang('Enter your name')" value="{{ old('name') }}" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">@lang('Email') <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) placeholder="@lang('Enter email address')" value="{{ old('email') }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">@lang('Password') <span class="text-danger">*</span></label>
                                            <input type="password" id="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) placeholder="@lang('Enter password')">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="password_confirmation">@lang('Password Confirmation') <span class="text-danger">*</span></label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" @class(['form-control', 'is-invalid' => $errors->has('password_confirmation')]) placeholder="@lang('Enter password confirmation')">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <p class="mb-0 fs-12 text-muted fst-italic">
                                                @lang('By registering you agree to the Velzon')
                                                <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">
                                                    @lang('Terms of Use')
                                                </a>
                                            </p>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">@lang('Sign Up')</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title text-muted">@lang('Create account with')</h5>
                                            </div>

                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light">
                                                    <i class="ri-facebook-fill fs-16"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light">
                                                    <i class="ri-google-fill fs-16"></i>
                                                </button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light">
                                                    <i class="ri-github-fill fs-16"></i>
                                                </button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light">
                                                    <i class="ri-twitter-fill fs-16"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">@lang('Already have an account?') <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> @lang('Sign in') </a> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; {{ date('Y') }} {{ env('APP_NAME') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render(__('Create user')) }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" id="name" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')]) placeholder="Họ tên người dùng" autocomplete="off" required value="{{ old('name') ?? '' }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">@lang('Email')</label>
                                <input type="email" id="email" name="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) placeholder="Email người dùng" value="{{ old('email') ?? '' }}" autocomplete="off" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">@lang('Password')</label>
                                <input type="password" id="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) placeholder="Mật khẩu người dùng" autocomplete="off" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">@lang('Password Confirmation')</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" @class(['form-control', 'is-invalid' => $errors->has('password_confirmation')]) placeholder="Xác nhận mật khẩu người dùng" autocomplete="off" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="multiSelect">{{ __('Roles') }}</label>
                                <select class="form-control" id="multiSelect" name="roles[]" required>
                                    @foreach ($roles as $key => $role)
                                        <option value="{{ $role->id }}" {{ old('permission') == $role->id ? "selected" : "" }} >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch form-switch-danger">
                                    <input class="form-check-input" type="checkbox" id="superAdmin" name="is_super_admin" @if(old('is_super_admin')) checked @endif \>
                                    <label class="form-check-label" for="role">Super Admin</label>
                                    @error('is_super_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('assets/plugins/select/selectr.min.js') }}"></script>
<script src="{{ asset('assets/pages/forms-advanced.js') }}"></script>
@endpush
@push('css')
<link href="{{ asset('assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render(__('List user')) }}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('List user') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.index') }}" method="GET">
                            <div class="row g-3">
                                <div class="col">
                                    {{-- serach by name --}}
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{-- serach by email --}}
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') ?? '' }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{-- serach by permissions --}}
                                    <div class="form-group">
                                        <label for="role">{{ __('Roles') }}</label>
                                        <select class="form-control" id="role" name="roles">
                                            <option value="">{{ __('All') }}</option>
                                            @foreach ($roles as $key => $role)
                                                <option value="{{ $role->name }}" {{ old('roles') == $role->name ? "selected" : "" }} >{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-end my-2">
                                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Permission') }}</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($users->count() > 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" class="rounded-circle thumb-xs me-1">
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            @if(isset($user->roles))
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>{{ __('No permission') }}</td>
                                            @endif
                                            <td class="text-end">
                                                <a href="{{ route('admin.users.update', $user->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                                <form method="POST" class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <a class="btn-delete">
                                                        <i class="las la-trash-alt text-secondary font-16"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">{{ __('No data') }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{ $users->appends(['sort' => 'votes'])->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/fn_common.js') }}"></script>
@endpush

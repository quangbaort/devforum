@extends('admins.layout.index')
@section('content')
{{ Breadcrumbs::render(__('List user')) }}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('List user') }}</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <form action="{{ route('admin.user.index') }}" method="GET">
                    <div class="row g-3">
                        <div class="col">
                            {{-- serach by name --}}
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                            </div><!--end form-group-->
                        </div>
                        <div class="col">
                            {{-- serach by email --}}
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') ?? '' }}">
                            </div><!--end form-group-->
                        </div>
                        <div class="col">
                            {{-- serach by permissions --}}
                            <div class="form-group">
                                <label for="role">{{ __('Permissions') }}</label>
                                <select class="form-control" id="role" name="permission">
                                    <option value="">{{ __('All') }}</option>
                                    @foreach ($permissions as $key => $permission)
                                        <option value="{{ $permission->id }}"  {{ old('permission') == $permission->id ? "selected" : "" }} >{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--end form-group-->
                        </div>  <!--end col-->
                    </div>

                    <div class="form-group text-end my-2">
                        <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                    </div><!--end form-group-->

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
                                        <td><img src="/assets/images/users/user-3.jpg" alt="" class="rounded-circle thumb-xs me-1">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if(isset($user->permission))
                                            <td>
                                                @foreach($user->permissions as $permission)
                                                {{ $permission->name }}
                                                @endforeach
                                            </td>
                                        @else
                                            <td>{{ __('No permission') }}</td>
                                        @endif
                                        <td class="text-end">
                                            <a href="{{ route('admin.user.update', $user->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <form method="POST" class="d-inline" action="{{ route('admin.user.destroy', $user->id) }}">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <a class="btn-delete"><i class="las la-trash-alt text-secondary font-16 "></i><a>
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
                    </table><!--end /table-->
                    {{ $users->appends(['sort' => 'votes'])->links('vendor.pagination.custom') }}
                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->

</div>
@endsection
@section('scripts')
<script src="/js/fn_common.js"></script>
@endsection

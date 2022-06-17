@extends('admins.layout.index')
@section('content')
{{ Breadcrumbs::render(__('List user')) }}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('List user') }}</h4>
                <p class="text-muted mb-0">

                </p>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><img src="/assets/images/users/user-3.jpg" alt="" class="rounded-circle thumb-xs me-1">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_super_admin }}</td>
                                <td class="text-end">
                                    <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><!--end /table-->
                    {{ $users->appends(['sort' => 'votes'])->links('vendor.pagination.custom') }}
                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->

</div>
@endsection

@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>@lang('Name')</th>
                            <th>@lang('Guard')</th>
                            <th>@lang('Action')</th>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary">@lang('Edit')</a>
                                        <a href="{{ route('admin.roles.destroy', $role->id) }}" class="btn btn-danger">@lang('Delete')</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">@lang('No data')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

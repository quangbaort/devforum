@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render(__('Dashboard')) }}
    </div>
@endsection

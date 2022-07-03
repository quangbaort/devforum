<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Unikit - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- App css -->
    @stack('css')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body id="body" class="dark-sidebar">
@include('admin.partials.sidebar')
@include('admin.partials.topbar')

<div class="page-wrapper">
    <div class="page-content-tab">
        <div class="container-fluid">
            {{ Breadcrumbs::render() }}
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</div>

<!-- App js -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@stack('scripts')
<script src="{{ asset('assets/js/app.js') }}"></script>
@include('admin.partials.message')
</body>
</html>

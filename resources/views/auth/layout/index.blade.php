<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Unikit - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body id="body" class="auth-page" style="background-image: url('{{ asset('assets/images/p-1.png') }}'); background-size: cover; background-position: center center;">

<div class="container-md">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>

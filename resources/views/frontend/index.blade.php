<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>Burger House - Fast Food & Restaurant</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="src/assets-2/img/favicon.ico">


    @yield('styles')
    @include('frontend.styles')
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    @yield('content')

    @yield('scripts')
    @include('frontend.scripts')
</body>

</html>

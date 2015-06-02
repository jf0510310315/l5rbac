<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('admin.partials.header')
</head>
<body>

<div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @include('admin.partials.navbar')
                @include('admin.partials.sidebar')
            </nav>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

        @include('admin.partials.footer')
        @yield('javascripts')
</body>
</html>

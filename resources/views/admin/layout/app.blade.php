<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - Admin Panel</title>

    @include('admin.layout.css')

    @stack('style')

</head>

<body id="page-top">

    <div id="wrapper">
        @include('admin.layout.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.layout.header')
            </div>
        </div>

    </div>

    @include('admin.layout.script')

    @stack('script')
</body>

</html>

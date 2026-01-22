<!DOCTYPE html>
<html>

<head>
    <title>Laporan SIPMA</title>
    @include('pdf._style')
</head>

<body>

    @include('pdf._header')

    @yield('content')

    @include('pdf._signature')

</body>

</html>

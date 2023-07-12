<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- TITLE -->
    @stack('title')
    {{-- <link rel="icon" href="{{ asset('images/VIARoma-icon.png') }}" type="image/x-icon"> --}}

    <!-- CSS -->
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/header-footer-styles.css') }}">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Open+Sans:wght@700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <!-- NAVBAR -->
            <x-headerfooter.header-employee />

            <!-- CONTENT -->
            {{ $slot }}

            <!-- FOOTER -->
            <x-headerfooter.footer />
        </div>
    </div>

</body>

</html>

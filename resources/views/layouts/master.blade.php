<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    @yield('pagescript')

    <title>Contact - @yield('title')</title>
</head>
<body>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"   integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="/js/autocomplete.js"></script>

<div class="container" >
    @include('includes.nav')
</div>

<script src="/js/timer.js"></script>

<div class="container">

    @yield('contents')

    <div class="footer row">
        @include('includes.footer')
    </div>

</div><!-- end .container -->

<script src="/js/bootstrap.min.js"></script>
</body>
</html>

<!--
Eastern ........... America/New_York
Central ........... America/Chicago
Mountain .......... America/Denver
Mountain no DST ... America/Phoenix
Pacific ........... America/Los_Angeles
Alaska ............ America/Anchorage
Hawaii ............ America/Adak
Hawaii no DST ..... Pacific/Honolulu
-->
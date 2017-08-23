<section class="col-sm-8">
    {{"Current IP Address: " . $_SERVER['REMOTE_ADDR']}}
</section>
<section class="col-sm-4 ">
    {{ Carbon\carbon::now(file_get_contents('https://ipapi.co/1.2.3.4/timezone/'))->format('l jS \\of F Y') }}
</section>


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
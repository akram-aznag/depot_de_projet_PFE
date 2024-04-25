<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- login css files -->
<meta name="robots" content="noindex, follow">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/ vendor/bootstrap/css/bootstrap.min.css')}} ">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/vendor/animate/animate.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/vendor/css-hamburgers/hamburgers.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/vendor/animsition/css/animsition.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/vendor/select2/select2.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/vendor/daterangepicker/daterangepicker.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../front-end/main/Login_v14/css/customize.css')}}">
   


    <!-- login css files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('../front-end/assets/fonts/icomoon/style.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/fonts/flaticon/font/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/tiny-slider.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/glightbox.min.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/style.css')}}">
@notifyCss
<title>@yield('title')</title>
</head>
<style>
    input[type="text"],input[type="password"],input[type="email"]{
        border-radius: 0px;
    }
</style>
<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
        </div>
        </div>
        <div class="site-mobile-menu-body"></div>
        </div>
    @include('content.header')
    @yield('Authcontent')
    @include('content.footer')



    <!--login js files-->
    <script src="{{asset('../front-end/main/Login_v14/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
   <script src="{{asset('../front-end/main/Login_v14/vendor/animsition/js/animsition.min.js')}}"></script>
   <script src="{{asset('../front-end/main/Login_v14/vendor/bootstrap/js/popper.js')}}"></script>
   <script src="{{asset('../front-end/main/Login_v14/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('../front-end/main/Login_v14/vendor/select2/select2.min.js')}}"></script>
   <script src="{{asset('../front-end/main/Login_v14/vendor/daterangepicker/moment.min.js')}}"></script>
   <script src="{{asset('../front-end/main/Login_v14/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('../front-end/main/Login_v14/vendor/countdowntime/countdowntime.js')}}"></script>
    <script src="{{asset('../front-end/main/Login_v14js/main.js')}}"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"85f936c53b133851","b":1,"version":"2024.2.4","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <!--login js files-->
    <script src="{{asset('../front-end/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('../front-end/assets/js/tiny-slider.js')}}"></script>
<script src="{{asset('../front-end/assets/js/glightbox.min.js')}}"></script>
<script src="{{asset('../front-end/assets/js/aos.js')}}"></script>
<script src="{{asset('../front-end/assets/js/navbar.js')}}"></script>
<script src="{{asset('../front-end/assets/js/counter.js')}}"></script>
<script src="{{asset('../front-end/assets/js/custom.js')}}"></script>
<script src="{{asset('popupjs.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
@notifyJs


</body>
</html>
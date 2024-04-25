<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 17:05:06 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<script src="https://kit.fontawesome.com/9148e5dcd4.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('../front-end/assets/fonts/icomoon/style.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/fonts/flaticon/font/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/tiny-slider.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/glightbox.min.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('../front-end/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('../profile.css')}}">
<link rel="stylesheet" href="{{asset('../popup-style.css')}}">

<link rel="icon" type="image/png" href="{{asset('blogger.png')}}">
<title>@yield('title')</title>
<script nonce="3c81e364-4b11-4e54-95bb-88ba40caa3c0">try{(function(w,d){!function(ct,cu,cv,cw){ct[cv]=ct[cv]||{};ct[cv].executed=[];ct.zaraz={deferred:[],listeners:[]};ct.zaraz.q=[];ct.zaraz._f=function(cx){return async function(){var cy=Array.prototype.slice.call(arguments);ct.zaraz.q.push({m:cx,a:cy})}};for(const cz of["track","set","debug"])ct.zaraz[cz]=ct.zaraz._f(cz);ct.zaraz.init=()=>{var cA=cu.getElementsByTagName(cw)[0],cB=cu.createElement(cw),cC=cu.getElementsByTagName("title")[0];cC&&(ct[cv].t=cu.getElementsByTagName("title")[0].text);ct[cv].x=Math.random();ct[cv].w=ct.screen.width;ct[cv].h=ct.screen.height;ct[cv].j=ct.innerHeight;ct[cv].e=ct.innerWidth;ct[cv].l=ct.location.href;ct[cv].r=cu.referrer;ct[cv].k=ct.screen.colorDepth;ct[cv].n=cu.characterSet;ct[cv].o=(new Date).getTimezoneOffset();if(ct.dataLayer)for(const cG of Object.entries(Object.entries(dataLayer).reduce(((cH,cI)=>({...cH[1],...cI[1]})),{})))zaraz.set(cG[0],cG[1],{scope:"page"});ct[cv].q=[];for(;ct.zaraz.q.length;){const cJ=ct.zaraz.q.shift();ct[cv].q.push(cJ)}cB.defer=!0;for(const cK of[localStorage,sessionStorage])Object.keys(cK||{}).filter((cM=>cM.startsWith("_zaraz_"))).forEach((cL=>{try{ct[cv]["z_"+cL.slice(7)]=JSON.parse(cK.getItem(cL))}catch{ct[cv]["z_"+cL.slice(7)]=cK.getItem(cL)}}));cB.referrerPolicy="origin";cB.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(ct[cv])));cA.parentNode.insertBefore(cB,cA)};["complete","interactive"].includes(cu.readyState)?zaraz.init():ct.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
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
@yield('content')

@include('content.footer')

<div id="overlayer"></div>
<div class="loader">
<div class="spinner-border" role="status">
<span class="visually-hidden">Loading...</span>
</div>
</div>
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
<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-23581568-13');



		</script>

<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"85f372f039656653","b":1,"version":"2024.2.4","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 17:05:15 GMT -->
</html>
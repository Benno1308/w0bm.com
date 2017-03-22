<!doctype html>
<html lang="de">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="keywords" content="webm, webm site, w0bm, videos, funny, internet">
    <meta name="Description" content="@if(!empty($video->interpret)){{$video->interpret}} – {{$video->songtitle}}@else()No Data Available ;__;@endif">
    <meta property="og:image" content="@if(isset($video))https://w0bm.com/thumbs/{{str_replace(".webm","",$video->file)}}.gif"@endif/>
    <link rel="icon" href="/favicon.png">
    <title>@if(isset($video)){{ $video->id }} –@endif w0bm.com</title>
    <link rel="favicon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="/css/w0bmfonts.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/css/video-js.min.css">
    <link rel="stylesheet" href="/css/w0bmcustom.css?v=1.0.70">
<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(["setDomains", ["*.w0bm.com"]]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//stats.w0bm.com/";
        _paq.push(['setTrackerUrl', u+'js']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Piwik Code -->
</head>
<body>
@if(auth()->check())
    @include('partials.filterselect')
    @if(isset($video) && (auth()->user()->can('edit_video') || auth()->user()->id == $video->user_id))
        @include('partials.frontendedit')
	@endif
@endif
<canvas class="hidden-xs" id="bg"></canvas>

@include('partials.navigation')

<div class="wrapper">
    @yield('aside')
    <div style="width: auto; overflow: hidden; position: relative;">
        <div class=" container">
	    @yield('content')
        </div>
@include('partials.flash')
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-tagsinput.min.js"></script>
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/isotope.pkgd.min.js"></script>
<script src="/js/imagesloaded.pkgd.min.js"></script>
<script src="/js/jquery.timeago.js"></script>
<script src="/js/jquery.detectmobilebrowser.js"></script>
<script src="/js/video.min.js"></script>
<script src="/js/w0bmscript.js?v=1.1.15"></script>
</body>
</html>

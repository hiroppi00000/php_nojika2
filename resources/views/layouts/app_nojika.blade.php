<html>
<head>
    <title>Nojika with PHP</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!--    <script src="{{ asset('js/app.js') }}" defer></script> -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/nojika.css')}}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    @php
        $url = explode('/', url()->current());
        $menu = '';
        // /main_menuページ以外では「メニューに戻る」が表示される
        if(isset($url[4]) && $url[4] != 'main_menu')
            $menu = '<div class="bg-secondary text-white"><a href="'.url('/main_menu').'"><p style="color:white;">メニューに戻る</p></a></div>'
    @endphp

    @if(Auth::check())
        {!! $menu !!}
    @endif
    @yield('contents')
</div>
</body>
</html>

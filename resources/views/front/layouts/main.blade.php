<!doctype html>
<html lang="ja-JP">
<head>
    @section('css')
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>@yield('title') {{env('HOST_NAME')}}</title>
        <meta name="keywords"
              content="小林幹也, デザイン, インテリア, プロダクト, 家具, イス, ブランド, ディレクション, プランニング, みきや, design, interior, product, chair, brand, kobayashi, mikiya, ukihashi, moreTrees, 株式会社小林幹也スタジオ, スタジオ"/>
        <meta name="description"
              content="株式会社小林幹也スタジオ | {{env('HOST_NAME')}} INC.は小林幹也（デザイナー）が代表を務めるデザイン会社です。家具やプロダクトの商品開発およびディレクション業務、インテリアに関する企画、プランニング及びデザインなど設計業務、各種プランニングおよびディレクション業務また企業のコンサルティング業務などを行っています。"/>
        <meta name="author" content="{{env('HOST_NAME')}} INC."/>
        <meta property="og:title" content="{{env('HOST_NAME')}}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="http://www.mikiyakobayashi.com/"/>
        <meta property="og:image" content="http://www.mikiyakobayashi.com/common/img/ogp.jpg"/>
        <meta property="og:site_name" content="{{env('HOST_NAME')}}"/>
        <meta property="og:description"
              content="株式会社小林幹也スタジオ | {{env('HOST_NAME')}} INC.は小林幹也（デザイナー）が代表を務めるデザイン会社です。家具やプロダクトの商品開発およびディレクション業務、インテリアに関する企画、プランニング及びデザインなど設計業務、各種プランニングおよびディレクション業務また企業のコンサルティング業務などを行っています。"/>
        <link rel="shortcut icon" href="/common/img/favicon.ico"/>
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
              href="/common/img/apple-touch-icon-144-precomposed.png"/>
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}"/>
        @show

        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{asset('front/js/libs.js')}}" type="text/javascript"></script>
        <script src="{{asset('front/js/common.js')}}" type="text/javascript"></script>

</head>
<body id="mikiyakobayashi" class="@if(Route::currentRouteName() == 'front.index') index @else sub @endif">
<noscript>
    <div id="noscript_message">javascriptが無効になっているようです。 本サイトを正しく表示するためにはjavascriptを有効にしてください。</div>
</noscript>

<!-- content -->
<div id="wrap">
    @section('header')
        @include('front.partials.header')
    @show
    <div id="contents-wrap">
        <div id="contents">
            @yield('content')
        </div>
    </div>
</div>
<!-- end content -->

<!-- menu -->
<div id="menu">
    @section('menu')
        @include('front.partials.navigation')
    @show
</div>
<!-- end menu -->

<!--footer -->
<div id="footer">
    @section('footer')
        @include('front.partials.footer')
    @show
</div>
<!-- end footer-->
</body>
</html>
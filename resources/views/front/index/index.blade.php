@extends('front.layouts.main')
@section('title','')
<!-- content -->
@section('content')
    <div id="top" class="content">
        <div id="stage">
            <div id="site-name">{{env('HOST_NAME')}}</div>
            <ul id="images">
                <li><img src="http://www.mikiyakobayashi.com/upload/img001.jpg" alt="top01"/></li>
                <li><img src="http://www.mikiyakobayashi.com/upload/YAMANAMI_4260WW.jpg" alt="top02"/></li>
                <li><img src="http://www.mikiyakobayashi.com/upload/UDGW2_103_DC91803_WW.jpg" alt="top03"/></li>
                <li><img src="http://www.mikiyakobayashi.com/upload/_IMG_11110WW.jpg" alt="top04"/></li>
                <li><img src="http://www.mikiyakobayashi.com/oliveoil_0291w.jpg" alt="top05"/></li>
                <li><img src="http://www.mikiyakobayashi.com/TOP_KIME.jpg" alt="top06"/></li>
            </ul>
            <div id="scroll-info">
                <a href="{{route('front.project')}}">scroll</a>
                <div id="scroll-info-line">
                    <div></div>
                </div>
            </div>
        </div>
        <script src="{{asset('front/js/index.js')}}" type="text/javascript"></script>
    </div>
@endsection



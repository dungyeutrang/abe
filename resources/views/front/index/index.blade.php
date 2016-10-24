@extends('front.layouts.main')
@section('title','')
<!-- content -->
@section('content')
    <div id="top" class="content">
        <div id="stage">
            <div id="site-name">{{env('HOST_NAME')}}</div>
            <ul id="images">
                @foreach($data as $dt)
                <li><img src="{{asset('upload/'.$dt->name)}}" alt="top01"/></li>
                @endforeach
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



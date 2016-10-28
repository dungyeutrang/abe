@extends('front.layouts.main')
@section('title','PRESS || ')

@section('title_menu_left','PRESS')

@section('search')
@section('search_title')

@endsection

@endsection


@section('content')
    <div id="press" class="content">
        <div class="container">
            <div class="lang-nav">
                <ul class="hover-line-links">
                    <li><a href="#" lang="vi" class=""><span>VI</span></a></li>
                    <li><a href="#" lang="en" class="current"><span>EN</span></a></li>
                </ul>
            </div>
            <div class="sections">
                <div class="section section-tabled">
                    <div class="tabled-th">
                        <h2>MAGAZINE</h2>
                    </div>
                    <div class="tabled-td">
                        <div lang="vi" style="display: none;">
                            <ul>
                                <li>
                                    {!!$press?$press->press_vi:''!!}
                                </li>
                            </ul>
                        </div>
                        <div lang="en">
                            <ul>
                                <li>
                                    {!! $press?$press->press_en:'' !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="{{asset('front/js/page_init.js')}}"></script>

        </div>
    </div>
@endsection

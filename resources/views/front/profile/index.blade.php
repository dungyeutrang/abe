@extends('front.layouts.main')
@section('title','PROFILE || ')

@section('title_menu_left','PROFILE')

@section('search')
@section('search_title')

@endsection

@endsection


@section('content')
    <div id="profile" class="content">
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
                        <img class="img img-responsive" style="max-width: 100%"
                             src="{{asset('upload').'/'.$profile->avatar}}"
                             onerror="this.src='{{asset('img/noimage.gif')}}'">
                    </div>
                    <div class="tabled-td">
                        <div lang="vi">
                            {!! $profile->summary_vi !!}
                        </div>
                        <div lang="en" style="display: none;">
                            {!! $profile->summary_en !!}
                        </div>
                    </div>

                </div>

                <div class="section section-tabled">
                    <div class="tabled-th">
                        <h3>PROFILE</h3>
                    </div>
                    <div class="tabled-td">
                        <div lang="vi">
                            {!! $profile->profile_vi !!}
                        </div>
                        <div lang="en" style="display: none;">
                            {!! $profile->profile_en !!}
                        </div>
                    </div>
                </div>

                <div class="section section-tabled">
                    <div class="tabled-row">
                        <div class="tabled-th">
                            <h3>COMPANY</h3>
                        </div>
                        <div class="tabled-td studio">
                            <div lang="vi" style="display: block;">
                                {!! $profile->company_vi !!}
                            </div>
                            <div lang="en" style="display: none;">

                                {!! $profile->company_en !!}

                            </div>
                        </div>
                    </div>

                    <div class="tabled-row">
                        <div class="tabled-th">
                            <h3>SHOP &amp; SHOWROOM</h3>
                        </div>
                        <div class="tabled-td showroom">
                            <div lang="vi" style="display: block;">
                                {!! $profile->shop_showroom_vi !!}
                            </div>
                            <div lang="en" style="display: none;">
                                {!! $profile->shop_showroom_en !!}

                            </div>
                        </div>
                    </div>

                    <div class="tabled-row">
                        <div class="tabled-th">
                            <h3>STAFF</h3>
                        </div>
                        <div class="tabled-td">
                            <div class="staff">
                                <div class="prof" lang="vi" style="display: block;">
                                    {!! $profile->staff_vi !!}
                                </div>
                                <div class="prof" lang="en" style="display: none;">
                                    {!! $profile->staff_en !!}
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <script type="text/javascript" src="{{asset('front/js/page_init.js')}}"></script>
        </div>
    </div>
@endsection

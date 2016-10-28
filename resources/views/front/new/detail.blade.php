@extends('front.layouts.main')
@section('title','NEWS || ')

@section('title_menu_left','NEWS')

@section('search')
@section('search_title')
    {{strtoupper($newTypeCurrent->name)}}
@endsection

@include('front.partials.search')
@endsection


@section('menu')
    @parent
    <nav id="cnavi-links" class="nav-links">
        <ul>
            <li><a href="{{route('front.new')}}">ALL</a></li>
            @foreach($newTypes as $newType)
                <li @if($newType->id == $newTypeCurrent->id) class="current" @endif>
                    <a href="{{url('/').$newType->link}}">{{strtoupper($newType->name)}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection

@section('content')
    <div id="news-detail" class="content">
        <div class="container">
            <div class="paginate">
                <div class="prev">
                    @if($before)
                        <a href="{{url('/').$before->link}}"></a>
                    @else
                        <span></span>
                    @endif
                </div>
                <div class="list">

                    <a href="{{url('/').$currentNew->newType->link}}">

							<span>
								<i class="b1 c1"></i><i class="b1 c2"></i><i class="b1 c3"></i>
								<i class="b2 c1"></i><i class="b2 c2"></i><i class="b2 c3"></i>
								<i class="b3 c1"></i><i class="b3 c2"></i><i class="b3 c3"></i>
							</span>
                    </a>
                </div>
                <div class="next">
                    @if($after)
                        <a href="{{url('/').$after->link}}"></a>
                    @else
                        <span></span>
                    @endif

                </div>
            </div>

            <div class="entry-detail">
                <?php $images = explode(',', $currentNew->images); ?>
                <div id="photo">
                    @if($currentNew->images)
                        <div id="images">
                            <ul>
                                @foreach($images as $image)
                                    <li><img src="{{asset('upload').'/'.$image}}"></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <script type="text/javascript" src="{{asset('front/js/news_detail.js')}}"></script>
                </div>
                <div id="info" class="section">
                    <h1 class="title wfont">{{$currentNew->name}}</h1>
                    <div class="date wfont">{{date("Y M d",strtotime($currentNew->date))}}</div>
                    <div class="body">
                        {!! $currentNew->desc !!}
                    </div>
                    @if($currentNew->more_desc)
                        <div class="more">
                            {!! $currentNew->more_desc !!}
                        </div>
                    @endif
                </div>
            </div>


            <div class="paginate">
                <div class="prev">
                    @if($before)
                        <a href="{{url('/').$before->link}}"></a>
                    @else
                        <span></span>
                    @endif
                </div>
                <div class="list">

                    <a href="{{url('/').$currentNew->newType->link}}">

							<span>
								<i class="b1 c1"></i><i class="b1 c2"></i><i class="b1 c3"></i>
								<i class="b2 c1"></i><i class="b2 c2"></i><i class="b2 c3"></i>
								<i class="b3 c1"></i><i class="b3 c2"></i><i class="b3 c3"></i>
							</span>
                    </a>
                </div>
                <div class="next">
                    @if($after)
                        <a href="{{url('/').$after->link}}"></a>
                    @else
                        <span></span>
                    @endif

                </div>
            </div>
    </div>
@endsection

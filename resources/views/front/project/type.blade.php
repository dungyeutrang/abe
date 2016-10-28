@extends('front.layouts.main')
@section('title',' PROJECTS || ')

@section('title_menu_left','PROJECTS')
@section('search')
@section('search_title')
    {{strtoupper($categoryName)}}
@endsection
@include('front.partials.search')
@endsection


@section('menu')
    @parent
    <nav id="cnavi-links" class="nav-links">
        <ul>
            <li><a href="{{route('front.project')}}">ALL</a></li>
            @foreach($categories as $category)
                <li @if($category->link == $url) class="current" @endif>
                    <a href="{{url('/').$category->link}}">{{strtoupper($category->name)}}</a>
                    <div class="sub-nav-links mCustomScrollbar _mCS_1 mCS_no_scrollbar"
                         style="overflow: visible; display: none;">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-sub-nav mCSB_vertical mCSB_outside" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                 style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                <div class="sub-nav-links-inner">
                                    <dl>
                                        <dt>{{strtoupper($category->name)}}</dt>
                                        <dd>
                                            <ul class="hover-line-links">
                                                <li><a href="{{url('/').$category->link}}">
                                                        <span>
                                                            <?php $total = 0; ?>
                                                            @foreach($listProjectByCategories as $categoryGroup)
                                                                @if($categoryGroup->category_id == $category->id)
                                                                    <?php $total = $categoryGroup->count ?>
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                            ALL ITEMS [{{$total}}]
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>Producer</dt>
                                        <dd>
                                            <ul class="hover-line-links">
                                                <?php $categoryByProducer = $groupItem[$category->id]['producers'] ?>
                                                @foreach($categoryByProducer as $producer)
                                                    <li>
                                                        <a @if($type == PROJECT_PRODUCER && $producer->slug == $detail) class="current"
                                                           @endif href="{{url('/').$category->link.'/producer/'.$producer->slug}}"><span>{{$producer->name}}
                                                                [{{$producer->count}}]</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>Year</dt>
                                        <dd>
                                            <ul class="hover-line-links">
                                                <?php $categoryByYear = $groupItem[$category->id]['years'] ?>
                                                @foreach($categoryByYear as $projectYear)
                                                        <li>
                                                            <a @if($type == PROJECT_YEAR && $projectYear->year== $detail) class="current"
                                                               @endif href="{{url('/').$category->link.'/year/'.$projectYear->year}}"><span>{{$projectYear->year}}
                                                                    [{{$projectYear->count}}]</span></a>
                                                        </li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>Type</dt>
                                        <dd>
                                            <ul class="hover-line-links">
                                                <?php $categoryByType = $groupItem[$category->id]['types'] ?>
                                                @foreach($categoryByType as $projectType)
                                                        <li>
                                                            <a @if($type == PROJECT_TYPE && $projectType->link == $detail) class="current"
                                                               @endif href="{{url('/').$projectType->link}}"><span>{{$projectType->projectType->name}}
                                                                    [{{$projectType->count}}]</span></a>
                                                        </li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div id="mCSB_1_scrollbar_vertical"
                             class="mCSB_scrollTools mCSB_1_scrollbar mCS-sub-nav mCSB_scrollTools_vertical"
                             style="display: none;">
                            <div class="mCSB_draggerContainer">
                                <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                     style="position: absolute; min-height: 30px; top: 0px; display: block; height: 25px; max-height: 175px;"
                                     oncontextmenu="return false;">
                                    <div class="mCSB_dragger_bar" style="line-height: 30px;">

                                    </div>
                                </div>
                                <div class="mCSB_draggerRail">

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection

@section('content')
    <div id="portfolio" class="content flow-grid">
        @foreach($data as $dt)
            <div class="entry">
                <a href="{{url('/').$dt->link}}">　
                    <div class="thumb" data-original-width="400" data-original-height="266">
                        <img src="{{asset('upload/'.$dt->image_thumb)}}">
                    </div>
                    <div class="meta">
                        <div class="client">{{$dt->projectProducer->name}}</div>
                        <h2 class="title">{{$dt->name}}</h2>
                    </div>
                </a>
            </div>
        @endforeach
        <script type="text/javascript" src="{{asset('front/js/flow_grid_init.js')}}"></script>
    </div>
@endsection

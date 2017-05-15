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
                                                        <a href="{{url('/').$category->link.'/producer/'.$producer->slug}}"><span>{{$producer->name}}
                                                                [{{$producer->count}}]</span></a>
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
                                                        <a href="{{url('/').$category->link.'/year/'.$projectYear->year}}"><span>{{$projectYear->year}}
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
                                                        <a href="{{url('/').$projectType->link}}"><span>{{$projectType->projectType->name}}
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
    <div id="portfolio-detail" class="content">
        <div id="photo">
            @foreach($projectImages as $image)
                <div class="entry-photo">
                    <div class="photo"><img src="{{asset('upload').'/'.$image->image}}"></div>
                    @if($image->caption)
                        <div class="credit">{{$image->caption}}</div>
                    @endif
                </div>
            @endforeach

        </div>
        <div id="info">
            <div class="paginate">
                <div class="prev">
                    @if($before)
                        <a href="{{url('/').$before->link}}"></a>
                    @else
                    <span></span>
                    @endif
                </div>
                <div class="list">
                    <a href="{{$linkCategory}}">
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
                <h1 class="title">{{strtoupper($project->name)}}</h1>
                <ul class="categories">
                    <li>{{$project->projectCategory->name}}</li>
                    <li>{{$project->year}}</li>
                    @foreach($projectTypes as $projectType)
                        <li>{{$projectType->projectType->name}}</li>
                    @endforeach
                </ul>
                <p class="body">
                    {!! $project->desc !!}
                </p>
            </div>
            <div class="copy wfont">&copy; {{env('HOST_NAME')}} INC. All Rights Reserved.</div>
        </div>
        <script type="text/javascript" src="{{asset('front/js/portfolio_detail.js')}}"></script>
    </div>
@endsection

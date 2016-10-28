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
    <div id="news" class="content flow-grid">

        @foreach($news as $new)
            <div class="entry">
                <a href="{{url('/').$new->link}}">　
                    <div class="thumb" data-original-width="400" data-original-height="248">
                        <img src="{{asset('upload'.'/'.$new->image_thumb)}}">
                    </div>
                    <div class="meta">
                        <div class="date">{{date('Y M d',strtotime($new->date))}}</div>
                        <h2 class="title">{!! $new->name !!}</h2>
                    </div>
                    <div class="body">
                        <h2 class="title">{{$new->name}}</h2>
                        <p>{{str_limit(strip_tags($new->desc),STR_LIMIT)}}</p>
                    </div>
                </a>
            </div>
        @endforeach
        <script type="text/javascript" src="{{asset('front/js/flow_grid_init.js')}}"></script>
    </div>
@endsection

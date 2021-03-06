<nav id="gnavi-links" class="nav-links">
    <ul class="hover-line-links">
        <li><a @if(str_contains(Request::fullUrl(),route('front.project'))) class="current" @endif href="{{route('front.project')}}"><span>PROJECTS</span></a></li>
        <li><a @if(str_contains(Request::fullUrl(),route('front.new'))) class="current" @endif href="{{route('front.new')}}"><span>NEWS</span></a></li>
        <li><a @if(str_contains(Request::fullUrl(),route('front.profile'))) class="current" @endif href="{{route('front.profile')}}"><span>PROFILE</span></a></li>
        <li><a @if(str_contains(Request::fullUrl(),route('front.press'))) class="current" @endif  href="{{route('front.press')}}"><span>PRESS</span></a></li>
        <li><a href="{{route('front.contact')}}"><span>CONTACT</span></a></li>
        <li><a href="{{env('LINK_FACEBOOK')}}" class="external"><span><i class="icon_fb"></i></span></a></li>
    </ul>
</nav>
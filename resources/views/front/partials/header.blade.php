<div id="header">
    <div class="container">
        <h1 id="logo"><a href="/" class="hover-line"><span>{{strtoupper(env('HOST_NAME'))}}</span></a></h1>
        <div id="gnavi" class="nav">
            <div class="nav-btn">
                <a href="#">
					<span class="bars">
						<span class="bar"></span>
						<span class="bar"></span>
						<span class="bar"></span>
						<span class="bar"></span>
					</span>
                    <span class="label">@yield('title_menu_left')</span>
                </a>
            </div>
        </div>
        @section('search')
        @show
    </div>
</div>
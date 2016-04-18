@include('frontend.static_layout.header')

<div id="container">
    <div class="box_content staticsPage">
        <div class="statics_bottom">
			@yield('sidebar')
			@yield('content')
		</div>
	</div>
</div>

@include('frontend.layout.footer')
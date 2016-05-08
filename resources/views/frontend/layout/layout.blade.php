@include('frontend.layout.header')

<div class="container mid_content" style="margin-top: 81px">
	<div class="row {{strpos(url()->full(), 'account') !== FALSE ? 'account-page' : 'frontend-page'}}">
		@yield('sidebar')
		@yield('content')
	</div>
	<div class="container">
		@yield('generalDoc')
	</div>
</div>

@include('frontend.layout.footer')
<form action="{{ URL::to('doLogin') }}" method="POST" id="loginForm">

	@if(Session::has('errors'))
	
	<div class="alert alert-danger">
		{{ Session::get('errors')->first() }}
	</div>

	@endif

	<input type="text" name="username">
	<input type="text" name="password">
	<!-- <button id="loginButton">Login</button> -->
	<input type="submit" value="Login">
</form>
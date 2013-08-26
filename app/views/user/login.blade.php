<form action="{{ URL::to('doLogin') }}" method="POST" id="loginForm">
	<input type="text" name="username">
	<input type="text" name="password">
	<!-- <button id="loginButton">Login</button> -->
	<input type="submit" value="Login">
</form>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/Login.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<title>Login</title>
</head>
<body>
	<div class="login-wrap">
	<div class="login-html">
		<div>
			<h1 style="text-align: center;color: #1161ee;margin-bottom: 60px;font-family: 'nunito';font-weight: normal;">LearnToCode University</h1>
		</div>
		
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="{{ route('login') }}" method="POST">
					@csrf
					<div class="group">
						<label for="user" class="label">Email</label>
						<input id="user" type="email" name="email" class="input @error('email') is-invalid @enderror" required autocomplete="email" autofocus value="{{ old('email') }}">
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" name="password" type="password" class="input @error('password') is-invalid @enderror" data-type="password" required autocomplete="current-password">
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" name="remember" {{ old('remember') ? 'checked' : '' }}>
						<label for="check"><span class="icon"></span> Remember Me</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign In">
					</div>
					<div class="hr"></div>
					@if (Route::has('password.request'))
					<div class="foot-lnk">
						<a href="{{ route('password.request') }}">Forgot Password?</a>
					</div>
					@endif
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>
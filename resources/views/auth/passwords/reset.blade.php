<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/Login.css">
	<title>Login</title>
</head>
<body>
	<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Reset Password</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="{{ route('password.update') }}" method="POST">
					@csrf
                    <input type="hidden" name="token" value="{{ $token }}">

					<div class="group">
						<label for="user" class="label">Email</label>
						<input id="user" type="email" name="email" class="input @error('email') is-invalid @enderror" required autocomplete="email" autofocus value="{{ $email ?? old('email') }}">
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
						<label for="pass" class="label">Confirm Password</label>
						<input id="pass" name="password_confirmation" type="password" class="input" required autocomplete="new-password">
					</div>
					<div class="group" style="margin-top: 50px;">
						<input type="submit" class="button" value="Reset Password">
					</div>
					<div class="hr"></div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>

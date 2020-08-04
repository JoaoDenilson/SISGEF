<!DOCTYPE html>
<html lang="PT-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login SIGEF</title>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('css/home/img/favicons/favicon.png') }}"/>

<!--CSS LOGIN=====================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles-merged.css')}}">


	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/css/main.css')}}">
	
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('css/home/img/header.jpg')}}');">
			<div class="wrap-login100">
				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
					@csrf
					<!-- <span class="login100-form-logo">
						<img src="home/img/logoP.png">
					</span>
 -->
					<span class="login100-form-title p-b-34 p-t-27">
						<h1 id=titulo>SISGEF</h1>
						<h1 id=subtitulo>Sistema de Gerenciamento de Filas</h1>
						Seja Bem-Vindo!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Login Obrigatório">
						
						<input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
						@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Senha Obrigatória">
						
						<input id="password" placeholder="Senha" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
						@if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Lembrar senha.
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button  class="login100-form-btn btn btn-primary" id="botao">
							Entrar
						</button>
					</div>

					<!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Esqueceu a senha?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
<!--SCRIPTS LOGIN=================================================================================-->
	<script src="{{ asset('js/login/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('js/login/main.js')}}"></script>



</body>
</html>
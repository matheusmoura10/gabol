<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Reactor - Bootstrap Admin Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('styles/webfont.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/climacons-font.css')}}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/font-awesome.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/card.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/sli.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/app.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/app.skins.css')}}">
  <!-- endbuild -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
  </div>
</div>
<!-- /page loading spinner -->
<div class="app signin v2 usersession">
    <div class="session-wrapper">
      <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image:url(http://lorempixel.com/1200/800/business);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(http://lorempixel.com/1200/800/business?2);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(http://lorempixel.com/1200/800/business?3);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
      </div>
  </div>
  <div class="card bg-white no-border">
    <div class="card-block">
        <form method="POST" class="form-layout" action="{{ route('login') }}">
            @csrf
            <div class="text-center m-b">
              <img src="https://www.logaster.com.br/logotype/data/7849304/png/512/1/?c=46819a18adabf1ed288c81cc911b965e" style="max-height: 200px">
              <h4 class="text-uppercase">Bem vindo ao GABOL</h4>
              <p>Entre com seus dados abaixo</p>
          </div>
          <div class="form-inputs p-b">
              <label class="text-uppercase">Email</label>
              <input type="email" class="form-control input-lg" name="email" placeholder="Email" required>
              @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
               @endif
            <label class="text-uppercase">Senha</label>
            <input type="password" class="form-control input-lg" name="password" placeholder="Senha" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Salvar Senha?
                                    </label>

        </div>
        <button class="btn btn-primary btn-block btn-lg m-b" type="submit">Conectar</button>

    </form>
</div>
</div>
<div class="push"></div>
</div>
</div>
<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="{{ asset('scripts/helpers/modernizr.js')}}"></script>
<script src="{{ asset('vendor/jquery/dist/jquery.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{ asset('vendor/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{ asset('scripts/helpers/smartresize.js')}}"></script>
<script src="{{ asset('scripts/constants.js')}}"></script>
<script src="{{ asset('scripts/main.js')}}"></script>
<!-- endbuild -->
</body>

</html>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>LOGIN | LaraManager</title>
    <meta name="description" content="Simple customer manager">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Carlos Eduardo da Silva - carlosedasilva@gmail.com">
    
    <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="assets/app/css/styles.css" rel="stylesheet">
    
    <link href="assets/app/img/ico.png" rel="shortcut icon" type="image/x-icon">

    <script>
        var appUrl = '{{ $url }}';
    </script>

  </head>

  <body class="login-body">

    <!-- BEGIN: Container -->
    <div class="container-fluid">

        <!-- BEGIN: row -->
        <div class="row" style="margin-top:200px;">
        
            <div class="col-md-4">
            </div>

            <div class="col-md-4 col-md-2" style="background-color:rgba(255, 255, 255, 0.7);padding-bottom:10px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">LaraManager - Entrar no Sistema</h3>

                        <!-- BEGIN: Mensagem de erro -->
                            <!-- <div class="alert alert-danger" role="alert">
                            </div> -->
                        <!-- END: Mensagem de erro -->

                    </div>
                    <div class="panel-body">
                        <form action="{{ route('login') }}" method="post" accept-charset="UTF-8" role="form">

                        
                        <fieldset>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@admin.com" autocomplete="email" autofocus required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha..."  value="" autocomplete="current-password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember" style="color:#6f6c6c;">
                                            Lembrar acesso
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <small style="color:#BDBDBD;">
                                Login: admin@admin.com 
                                <br> 
                                Senha: admin
                            </small>
                            <br>
                            <br>
                            @csrf
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar">

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu a sua senha?
                                </a>
                            @endif
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            </div>
        </div>
        <!-- END: row -->

    </div>
    <!-- END: Container -->

</body>

<script src="assets/vendor/jquery/dist/jquery.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/app/js/Core/Boot.js"></script>

</html>
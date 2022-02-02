<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?> | <?=$titleHeader?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=asset("plugins/fontawesome-free/css/all.min.css",'admin');?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css",'admin');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=asset("dist/css/adminlte.min.css",'admin');?>">

  <link rel="stylesheet" href="<?=asset("css/message.css"); ?>">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=SITE['root']?>"><b><?= mb_strtoupper( SITE['name'] )?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <form action="<?=SITE['root']?>/admin/login" method="post">

      <p class="login-box-msg">Faça login para iniciar sua sessão</p>

      <div class="login_form_callback"> <?= flash(); ?></div>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
              Lembrar-me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <!--   <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Esqueci a minha senha</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Registre um novo usuário</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=asset("plugins/jquery/jquery.min.js",'admin');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=asset("plugins/bootstrap/js/bootstrap.bundle.min.js",'admin');?>"></script>
<!-- AdminLTE App -->
<script src="<?=asset("dist/js/adminlte.min.js",'admin');?>"></script>
</body>
</html>

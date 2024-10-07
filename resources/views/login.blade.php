<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PMO</title>
  <link rel="icon" type="image/ico"  href="{{asset('/assets/dist/img/favicon.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-form">
  <div class="login-logo">
      <img src="{{asset('assets/dist/img/pmoLogo.jpg')}}">
  </div>

  <div class="card">
    <div class="text-left mb-4">
    <h2><span>Login</span></h2>
    </div>
    <div class="p-0 login-card-body">
    @if(session('success'))
         <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @elseif(session('fail'))
          <div class="alert alert-danger" role="alert">
             {{ session('fail') }}
              </div>
              @endif
      <form action="{{url('save-login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <div class="field">
          <label for="email">E-mail address</label>
          <br>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          </div>
          @if ($errors->has('email'))
            <div class="text-danger small mt-1">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <div class="input-group mb-3">
          <div class="field password">
          <label for="password">Password</label>
          <br>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <span class="icon" id="icon">
          </div>
          @if ($errors->has('password'))
            <div class="text-danger small mt-1">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            {{-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> --}}
          </div>
          <div class="col-12">
            <button type="submit" name="submit" class="p-2 submit btn btn-primary btn-block mb-2">Sign In</button>
          </div>
        </div>
      </form>
      <p class="mb-1 text-center">
        <!-- <a href="{{url('forget/password')}}">Forgot Your Password?</a> -->
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</body>
</html>
<script>
      //  $(document).ready(function() {
      //       toastr.options.timeOut = 10000;
      //       @if (Session::has('error'))
      //           toastr.error('{{ Session::get('error') }}');
      //       @elseif(Session::has('success'))
      //           toastr.success('{{ Session::get('success') }}');
      //       @endif
      //   });
</script>
<script>
    window.addEventListener("DOMContentLoaded", function(){
        let eyeIcon = document.getElementById("icon"),
        password = document.getElementById("password");
        eyeIcon.addEventListener("click", function(){
            document.querySelector(".password .icon").classList.toggle("visible");
            if(password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password"
            }
        })
    })

</script>

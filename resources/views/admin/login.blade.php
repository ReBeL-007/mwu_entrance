<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Portal | egskill</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/backend/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
  <div class="card" style="background-color: #ecf0f1;">
      <div class="card-header" style="text-align: center;">
        <h1 style="color: rgb(128, 0, 107); text-align: center;">Mid-Western University</h1>
        <!-- <h4>Examinations Management Office</h4> -->
      </div>
      
      <!-- /.card-header -->
      <div class="card-body">
        <div class="col-md-12">
          {{-- @include('admin.backend.layouts.error') --}}
          @include('admin.backend.includes.messages')
        </div>
        <form action="{{ route('admin.login') }}" method="post">
            {{ csrf_field() }}
        
          <div class="row">
            <div class="col-md-5">
              <div class="input-group mb-3 ">
                
                <input type="text" class="form-control" name="email" placeholder="Email / Token">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-user"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="input-group mb-3">
                
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="input-group mb-3">
              <button class="btn btn-success">Login</button>
              </div>  
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-5">
                <div class="form-check" style="padding-left: 0px;">
                    <input class="form-check-input" style="cursor: pointer;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label offset-md-1" for="remember" style="margin: 3px 2em; cursor: pointer;">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="col-md-5">
              
              {{-- <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a> --}}
          </div>
        </div>
        </form>
        
      </div>

      <!-- /.card-body --> 
  </div>
  <!-- /.card -->


<!-- jQuery 3 -->
<script src="{{ asset('/backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>


</body>
</html>

<html><head>
        <title>Login</title>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='/style.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
  <div class="row">

    <div class="main">

      <h3>Please Log In, or <a href="/sign-up">Sign Up</a></h3>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <a href="/login/fb" class="btn btn-lg btn-primary btn-block">Facebook</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <a href="/login/google" class="btn btn-lg btn-danger btn-block">Google</a>
        </div>
      </div>
      <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
      </div>

        {!! \Form::open(['url'=>url('login')]) !!}
        @if(\Session::has('failure'))
        <div class="alert alert-danger">{{\Session::get('failure')}}</div>
        @endif
        {!! \Form::input('text',"email", "",['placeholder'=>"Enter Email"],'Email') !!}
        {!! \Form::input('password',"password", "",['placeholder'=>"Enter Password"],'Password') !!}
        {!! \Form::submit('Login', array('class' => 'btn btn-primary')) !!}
        {!! \Form::close() !!}
     

    </div>

  </div>
</div>
    </body></html>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="xvv.css"/>
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  method="POST" action="{{ route('login') }}" class="sign-in-form">
            {{ csrf_field() }}
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
            </div>
           
            <input type="submit" value="Login" class="btn solid" />
            
            
          </form>
          <form method="POST" action="{{ route('register') }}" class="sign-up-form">
          {{ csrf_field() }}
          <form  class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="name" type="text" class="form-control" placeholder='full name' name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" type="email" class="form-control" placeholder='email' name="email" value="{{ old('email') }}" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" placeholder='password' type="password" class="form-control" name="password" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password-confirm" type="password" class="form-control" placeholder='password confirmation' name="password_confirmation" required>
            </div>
            <input type="submit" class="btn" value="Sign up" />
      
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>

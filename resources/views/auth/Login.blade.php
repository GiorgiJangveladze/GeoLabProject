
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
         @if ($errors->has('email'))
            <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
            </span>
          </br>
          @endif
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
         @if ($errors->has('password'))
            <span class="help-block">
               <strong>{{ $errors->first('password') }}</strong>
            </span>
          </br>
          @endif
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="remember" type="submit">Sign in</button>
       @if(\Session::has('error'))
       <span class="help-block">
           <strong>{!! \Session::get('error') !!}</strong>
       </span>
       @endif
      </form>

    </div> <!-- /container --> 
  </body>
</html>

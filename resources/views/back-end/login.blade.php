<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('login/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('login/css/fontawesome-all.css')}}" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body>
    <h1>Admin Panel Login</h1>
    <div class="w3l-login-form">
        <h2>Welcome</h2>
        <form action="{{route('login.store')}}" method="POST">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger" style="">
              <ul>
                @foreach($errors->all() as $error)
                  <span style="color: #fc3955">{{ $error }} </span>
                @endforeach
              </ul>
            </div>
          @endif
                 @if (session()->has('success') )
                <div class="alert alert-warning" style="color: #fc3955;text-align: center;">{{ session()->get('success') }}</div>
              @endif
            <div class="w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control"   value="{{ old('email') }}"name="email" placeholder="Email" required="required" value="{{old('email')}}" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required" value="{{old('password')}}"  />
                </div>
            </div>
            <div class="forgot">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>
            <button type="submit">Login</button>
        </form>
       
    </div>
    <footer>
         &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">love</i> by
            <a href="https://darkcodeswebsite.000webhostapp.com/" target="_blank">DarkCode</a> for a better web.
    </footer>

</body>

</html>
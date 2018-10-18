<html>
<head>

    <link href="{{asset('css/bootstrap4/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('admin/css/login.css')}}" rel="stylesheet">
    <script src="{{asset('css/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Admin Login</h2>
                <p>Please enter your username and password</p>
            </div>
            <form id="Login">

                <div class="form-group">


                    <input type="text" class="form-control" id="inputEmail" placeholder="Username">

                </div>

                <div class="form-group">

                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">

                </div>
                <button type="submit" class="btn btn-primary">Login</button>

            </form>
        </div>
    </div>
</div>
</div>


</body>
</html>

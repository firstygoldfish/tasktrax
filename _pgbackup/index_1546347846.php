<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Signin Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="sign-in.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" action="login.php" method="post">
            <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">TaskTrax Login</h1>
            <div id="errormsg" class="alert alert-danger d-none" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>                                                                                                ~=ERROR=~
            </div>
            <script type="text/javascript">
            var url = new URL(window.location);
            var c = url.searchParams.get("loginfail");
            if (c) {
              document.getElementById("errormsg").innerHTML = "Invalid Login Credentials";
              document.getElementById("errormsg").classList.remove("d-none");
            }
            </script>
            <p class="mt-5 mb-3 text-muted">This is a secure system and access is only granted to authorised users.&nbsp; Any attempt to access this system by unauthorised users may lead to prosecution.</p>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="userID" class="form-control" placeholder="Username" autofocus="" required name="userID">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="userPW" class="form-control" placeholder="Password" required name="userPW">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

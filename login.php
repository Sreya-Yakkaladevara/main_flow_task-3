<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="page">
        <h2 class="text-center text-primary mb-3">Login</h2>
        <form method='post' action="registeration.php">
        <?php include('server.php') ?>
           <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="enter your email">
           </div>  <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="enter your password">
           </div> 
           <div class="form-btn">
            <button name="login" class="btn btn-primary">login</button>
           </div>
           <p>
  		Not yet a member? <a href="registeration.php">Sign up</a>
  	</p>
        </form>
    </div>
</body>
</html>
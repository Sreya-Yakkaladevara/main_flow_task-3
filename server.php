<?php

$Fullname ="";
$email="";
$password="";
$errors=array();

$db = mysqli_connect('localhost:3307','root','','login-register');

if(isset($_POST['register'])){
    $Fullname=mysqli_real_escape_string($db,$_POST['full_name']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $conformpassword=mysqli_real_escape_string($db,$_POST['conformpassword']);



    if(empty($Fullname)) {array_push($errors,"Full name is required");}
    if(empty($email)) {array_push($errors,"Email is required");}
    if(empty($password)) {array_push($errors,"Password is required");}
    if(empty($conformpassword)) {array_push($errors," conform password is requried");}
    if ($password!= $conformpassword) {
        array_push($errors, "The two passwords do not match");
    }
      $user_check_query = "SELECT * FROM user WHERE full_name='$Fullname' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
    if ($user) {
        if ($user['full_name'] === $Fullname) {
          array_push($errors, "Username already exists");
        }
    
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
    }
    if (count($errors) > 0){
        foreach ($errors as $error){
            echo "<div class ='alert alert-danger'>$error</div>";
        }
    }
    else{
        if (count($errors) == 0) {
            $password = md5($password);//encrypt the password before saving in the database
      
            $query = "INSERT INTO user (full_name, email, password) 
                      VALUES('$Fullname', '$email', '$password')";
            mysqli_query($db, $query);
            
            header('location: login.php');
        }
    }
}

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(empty($email)){array_push($errors,"Email is required");}
    if(empty($password)){array_push($errors,"Password is required");}

    if (count($errors) > 0){
        foreach ($errors as $error){
            echo "<div class ='alert alert-danger'>$error</div>";
        }
    } else{
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['email'] = $username;
              $_SESSION['success'] = "You are now logged in";
              header('location: index.html');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
}



?>
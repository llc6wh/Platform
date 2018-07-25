<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['email_addr']) & isset($_POST['login_password'])){

    $host = "localhost";
    $username = "root";
    $password = "usbw";
    $user_database = "test"; #"test" is the name of the SQL database with table "Users"

    $email = $_POST['email_addr']; #email username from form
    $pwd = $_POST['login_password']; #password combo with user from form

    $try_again_redirect_url = "login_form.php";
    $successful_login_redirect_url = "homepage.html";

    $mysqli = new mysqli($host,$username,$password, $user_database); #DB connection
    if($mysqli->connect_error){
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
    }

    $login_stmt_user = $mysqli->prepare("SELECT first_name FROM users WHERE email = ?"); #prepare valid login query
    $login_stmt_user->bind_param('s', $email);
    $login_stmt_user->execute();
    $result_one = $login_stmt_user->get_result();


    $login_stmt_password = $mysqli->prepare("SELECT * FROM users WHERE Password = ?"); #remember Password is capital in DB
    $login_stmt_password->bind_param('s', $pwd);
    $login_stmt_password->execute();
    $result_two = $login_stmt_password->get_result();

    if($result_one == NULL || $result_two == NULL){
      header('Location: /' . $try_again_redirect_url);
      exit();
    }
    else if ($result_one == $result_two){
      session_start();
      $_SESSION["session_user"] = $result_one;
      header('Location: /' . $successful_login_redirect_url);
    }
    else if ($result_one != $result_two){
      header('Location: /' . $try_again_redirect_url);
    }

    $login_stmt_user->close();
    $login_stmt_password->close();
    $mysqli->close();
  }

  else{
    header('Location: /' . $try_again_redirect_url);
    exit();
  }
}






 ?>

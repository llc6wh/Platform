<html>
<head>
</head>

<body>
  <h1>Welcome to Platform</h1> <!--fancy CSS-->

<?php


  $host = "localhost";
  $username = "root";
  $password = "usbw";
  $user_database = "test"; #"test" is the name of the SQL database with table "Users"

  $mysqli = new mysqli($host,$username,$password, $user_database);

  if($mysqli->connect_errno){
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
  }


?>

</body>









</html>

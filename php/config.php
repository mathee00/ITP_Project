<!-- This code is commited on 10th of October  -->

<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "folms";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>

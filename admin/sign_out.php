<?php
  $con = mysqli_connect("localhost",'root','','sis');
  if($con) {
    echo "connection is successful";
  }
  else {
    echo "server failed";
  }
  session_unset();
  session_destroy();
  header("Location:..\index.html");
?>

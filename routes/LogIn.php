<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $username = mysqli_real_escape_string($db,$_POST['username1']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password1']);

    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
      header("location: Home.php");
 }
 else {
  $error = "Your Login Name or Password is invalid";
}
}
?>

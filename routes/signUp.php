<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $sql4 = "SELECT * FROM user";
      $result4 = mysqli_query($db,$sql4);
      $row = mysqli_fetch_array($result4,MYSQLI_ASSOC);
      $active = $row['active'];

      $countt = mysqli_num_rows($result4);
     $onn = $countt + 1;
     $_SESSION["onnn"] = $onn;


$username = mysqli_real_escape_string($db,$_POST['username2']);
$isAdmin = mysqli_real_escape_string($db,"0");
$mypassword = mysqli_real_escape_string($db,$_POST['password2']);
$mypassword2 = mysqli_real_escape_string($db,$_POST['password3']);
$id = mysqli_real_escape_string($db, $_SESSION["onnn"]);

if($username == "Admin" || $username == "admin" || $username == "Administrator" || $username == "administrator"){
   echo '<script>alert("This username cannot be used")</script>';
   echo "<script>window.location = 'Home.php'</script>";
}
else{
if($mypassword2 == $mypassword){

$sql = "INSERT INTO user(id,username,password,isAdmin)"."VALUES('$id','$username','$mypassword','$isAdmin')";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

echo '<script>alert("Sign up successful")</script>';
   echo "<script>window.location = 'Home.php'</script>";
}
else{
   echo '<script>alert("Please enter the same password again")</script>';
   echo "<script>window.location = 'Home.php'</script>";
}
}

}
?>

<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = mysqli_real_escape_string($db,$_POST['MakeID']);

      $sql4 = "SELECT * FROM user WHERE id = '$id'";
      $result4 = mysqli_query($db,$sql4);
      $row = mysqli_fetch_array($result4,MYSQLI_ASSOC);
      $active = $row['active'];
      $isAdmin = $row['isAdmin'];
      
      if($isAdmin == 0){
          $setAdmin = 1;
      }
      else if($isAdmin == 1){
        $setAdmin = 0;
    }

$sql = "UPDATE user SET isAdmin='$setAdmin' WHERE id='$id'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

header("location: MakeAdmin.php");

}
?>

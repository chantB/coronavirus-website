<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $sql4 = "SELECT * FROM contact";
      $result4 = mysqli_query($db,$sql4);
      $row = mysqli_fetch_array($result4,MYSQLI_ASSOC);
      $active = $row['active'];

      $countt = mysqli_num_rows($result4);
     $onn = $countt + 1;
     $_SESSION["onnn2"] = $onn;


$Cname = mysqli_real_escape_string($db,$_POST['Cname']);
$Cemail = mysqli_real_escape_string($db,$_POST['Cemail']);
$Cphone = mysqli_real_escape_string($db,$_POST['Cphone']);
$Cmessage = mysqli_real_escape_string($db,$_POST['Cmessage']);
$CID = mysqli_real_escape_string($db, $_SESSION["onnn2"]);

if($Cmessage != null){

$sql = "INSERT INTO contact(CID,Cname,Cemail,Cphone,Cmessage)"."VALUES('$CID','$Cname','$Cemail','$Cphone','$Cmessage')";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
echo '<script>alert("Message sent")</script>';
   echo "<script>window.location = 'Home.php'</script>";
}
else{
   echo '<script>alert("Please enter the same password again")</script>';
   echo "<script>window.location = 'Home.php'</script>";
}

}
?>

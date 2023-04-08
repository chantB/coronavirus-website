<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql4 = "SELECT * FROM statistics";
      $result4 = mysqli_query($db,$sql4);
      $row = mysqli_fetch_array($result4,MYSQLI_ASSOC);
      $active = $row['active'];
      $date = strtotime($row['date']);
      $sqlDate = date('Y-m-d', strtotime("+1 day", $date));

      $countt = mysqli_num_rows($result4);
     $onn = $countt + 1;
     $_SESSION["onnn3"] = $onn;

     $sql3 = "SELECT * FROM region";
      $result3 = mysqli_query($db,$sql3);
      $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
      $active3 = $row3['active'];
      $Rdate = strtotime($row3['Rdate']);
      $sqlRDate = date('Y-m-d', strtotime("+1 day", $Rdate));


      $countt2 = mysqli_num_rows($result3);
     $onn2 = $countt2 + 1;
     $_SESSION["onnn6"] = $onn2;

     $sql4 = "SELECT * FROM district";
      $result4 = mysqli_query($db,$sql4);
      $row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
      $active4 = $row4['active'];
      $Ddate = strtotime($row4['Ddate']);
      $sqlDDate = date('Y-m-d', strtotime("+1 day", $Ddate));

      $countt4 = mysqli_num_rows($result4);
     $onn4 = $countt4 + 1;
     $_SESSION["onnn4"] = $onn4;

$totalDeaths = mysqli_real_escape_string($db,$_POST['totalDeaths']);
$newDeaths = mysqli_real_escape_string($db,$_POST['newDeaths']);
$totalRecoveries = mysqli_real_escape_string($db,$_POST['totalRecoveries']);
$newRecoveries = mysqli_real_escape_string($db,$_POST['newRecoveries']);
$id = mysqli_real_escape_string($db, $_SESSION["onnn3"]);


$region0 = mysqli_real_escape_string($db,$_POST['region0']);
$region1 = mysqli_real_escape_string($db,$_POST['region1']);
$region2 = mysqli_real_escape_string($db,$_POST['region2']);
$region3 = mysqli_real_escape_string($db,$_POST['region3']);
$region4 = mysqli_real_escape_string($db,$_POST['region4']);
$region5 = mysqli_real_escape_string($db,$_POST['region5']);
$rid = mysqli_real_escape_string($db, $_SESSION["onnn6"]);

$district0 = mysqli_real_escape_string($db,$_POST['district0']);
$district1 = mysqli_real_escape_string($db,$_POST['district1']);
$district2 = mysqli_real_escape_string($db,$_POST['district2']);
$district3 = mysqli_real_escape_string($db,$_POST['district3']);
$district4 = mysqli_real_escape_string($db,$_POST['district4']);
$district5 = mysqli_real_escape_string($db,$_POST['district5']);
$district6 = mysqli_real_escape_string($db,$_POST['district6']);
$district7 = mysqli_real_escape_string($db,$_POST['district7']);
$district8 = mysqli_real_escape_string($db,$_POST['district8']);
$district9 = mysqli_real_escape_string($db,$_POST['district9']);
$district10 = mysqli_real_escape_string($db,$_POST['district10']);
$district11 = mysqli_real_escape_string($db,$_POST['district11']);
$district12 = mysqli_real_escape_string($db,$_POST['district12']);
$district13 = mysqli_real_escape_string($db,$_POST['district13']);
$district14 = mysqli_real_escape_string($db,$_POST['district14']);
$district15 = mysqli_real_escape_string($db,$_POST['district15']);
$district16 = mysqli_real_escape_string($db,$_POST['district16']);
$district17 = mysqli_real_escape_string($db,$_POST['district17']);
$district18 = mysqli_real_escape_string($db,$_POST['district18']);
$district19 = mysqli_real_escape_string($db,$_POST['district19']);
$district20 = mysqli_real_escape_string($db,$_POST['district20']);
$district21 = mysqli_real_escape_string($db,$_POST['district21']);
$district22 = mysqli_real_escape_string($db,$_POST['district22']);
$district23 = mysqli_real_escape_string($db,$_POST['district23']);
$district24 = mysqli_real_escape_string($db,$_POST['district24']);
$did = mysqli_real_escape_string($db, $_SESSION["onnn4"]);


$sql = "INSERT INTO statistics(SID,date,newDeaths,totalDeaths,newRecoveries,totalRecoveries)"."VALUES('$id','$sqlDate','$newDeaths','$totalDeaths','$newRecoveries','$totalRecoveries')";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

$sql2 = "INSERT INTO region(RID,Rdate,NorthLeb,Beqaa,MountLeb,Beirut,Nabatyeh,SouthLeb)"."VALUES('$rid','$sqlRDate','$region0','$region1','$region2','$region3','$region4','$region5')";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$count2 = mysqli_num_rows($result2);

$sql3 = "INSERT INTO district(DID,Ddate,Akkar,Tripoli,Hermel,MiniehDenieh,Zgharta,Koura,Bcharreh,Batroun,Baalbeck,Zahle,WestBekaa,Rachaiya,Jbeil,Kesrwan,ElMatn,Alay,Chouf,Baabda,Nabatyeh,Marjeyoun,BintJbeil,Hasbaya,Jezzine,Saida,Sour)"."VALUES('$did','$sqlDDate','$district0','$district1','$district2','$district3','$district4','$district5','$district6','$district7','$district8','$district9','$district10','$district11','$district12','$district13','$district14','$district15','$district16','$district17','$district21','$district22','$district23','$district24','$district18','$district19','$district20')";
$result3 = mysqli_query($db,$sql3);
$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
$count3 = mysqli_num_rows($result3);

header("location: Home.php");

}
?>

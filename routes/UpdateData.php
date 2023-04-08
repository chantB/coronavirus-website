<html>

<head>
    <link rel="stylesheet" type="text/css" href="../lib/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../lib/css/header.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script>
        // Prevent dropdown menu from closing when click inside the form
        $(document).on("click", ".navbar-right .dropdown-menu", function (e) {
            e.stopPropagation();
        });
    </script>

</head>
<header>
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
      $_SESSION['isAdmin'] = $row['isAdmin'];
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        echo '<script>alert("Log in successful")</script>';
   }
   else {
    echo '<script>alert("Login Name or Password is invalid")</script>';
 }
}
 if(isset($_SESSION['id'])) {
     if($_SESSION['isAdmin'] == 0){
    $w = $_SESSION['username'];
   echo "<nav class='navbar navbar-default navbar-expand-lg navbar-light'>
   <div class='navbar-header'>
       <a class='navbar-brand' href='Home.php'>Coronavirus<b>Website</b></a>
       <button type='button' data-target='#navbarCollapse' data-toggle='collapse' class='navbar-toggle'>
           <span class='navbar-toggler-icon'></span>
           <span class='icon-bar'></span>
           <span class='icon-bar'></span>
           <span class='icon-bar'></span>
       </button>
   </div>
   <!-- Collection of nav links, forms, and other content for toggling -->
   <div id='navbarCollapse' class='collapse navbar-collapse'>
       <ul class='nav navbar-nav'>
       <li><a class='HomeLink' href='Home.php'>Home</a></li>
       <li><a class='PreventionLink' href='Prevention.php'>Prevention</a></li>
       <li><a class='NewsLink' href='News.php'>News</a></li>
       <li><a class='LebanonLink' href='CoronavirusInLebanon.php'>Statistics</a></li>
       <li><a class='ContactUsLink' href='ContactUs.php'>Contact Us</a></li>
       </ul>
       <ul class='nav navbar-nav navbar-right'>
           <li>
               <a data-toggle='dropdown' class='dropdown-toggle' href='#'>$w</a>
           </li>
           <li>
           <a href='logOut.php'
           class='btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1'>Sign
               out</a>
           </li>
       </ul>
   </div>
</nav>";
}
else if($_SESSION['isAdmin'] == 1){
    $w = $_SESSION['username'];
    echo "<nav class='navbar navbar-default navbar-expand-lg navbar-light'>
    <div class='navbar-header'>
        <a class='navbar-brand' href='Home.php'>Coronavirus<b>Website</b></a>
        <button type='button' data-target='#navbarCollapse' data-toggle='collapse' class='navbar-toggle'>
            <span class='navbar-toggler-icon'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id='navbarCollapse' class='collapse navbar-collapse'>
        <ul class='nav navbar-nav'>
            <li><a class='HomeLink' href='Home.php'>Home</a></li>
            <li><a class='PreventionLink' href='Prevention.php'>Prevention</a></li>
            <li><a class='NewsLink' href='News.php'>News</a></li>
            <li><a class='LebanonLink' href='CoronavirusInLebanon.php'>Statistics</a></li>
            <li><a class='ContactUsLink' href='ContactUs.php'>Contact Us</a></li>
        <li><a class='UpdateDataLink' href='UpdateData.php'>Update Data</a></li>
        <li><a class='MakeAdminLink' href='MakeAdmin.php'>Make Admin</a></li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
            <li>
                <a data-toggle='dropdown' class='dropdown-toggle' href='#'>$w</a>
            </li>
            <li>
            <a href='logOut.php'
            class='btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1'>Sign
                out</a>
            </li>
        </ul>
    </div>
 </nav>";
}
}
else{
    echo"<nav class='navbar navbar-default navbar-expand-lg navbar-light'>
    <div class='navbar-header'>
        <a class='navbar-brand' href='Home.php'>Coronavirus<b>Website</b></a>
        <button type='button' data-target='#navbarCollapse' data-toggle='collapse' class='navbar-toggle'>
            <span class='navbar-toggler-icon'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id='navbarCollapse' class='collapse navbar-collapse'>
        <ul class='nav navbar-nav'>
        <li><a class='HomeLink' href='Home.php'>Home</a></li>
        <li><a class='PreventionLink' href='Prevention.php'>Prevention</a></li>
            <li><a class='NewsLink' href='News.php'>News</a></li>
            <li><a class='LebanonLink' href='CoronavirusInLebanon.php'>Statistics</a></li>
            <li><a class='ContactUsLink' href='ContactUs.php'>Contact Us</a></li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
            <li>
                <a data-toggle='dropdown' class='dropdown-toggle' href='#'>Login</a>
                <ul class='dropdown-menu form-wrapper'>
                    <li>
                        <form action='' method='POST'>

                            <div class='form-group'>
                                <input type='text' class='form-control' placeholder='Username' name='username1'
                                    required='required'>
                            </div>
                            <div class='form-group'>
                                <input type='password' class='form-control' placeholder='Password' name='password1'
                                    required='required'>
                            </div>
                            <input type='submit' class='btn btn-primary btn-block' value='Login'>
                        </form>
                    </li>
                </ul>
            </li>
            <li>
                <a href='#' data-toggle='dropdown'
                    class='btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1'>Sign up</a>
                <ul class='dropdown-menu form-wrapper'>
                    <li>
                        <form action='signUp.php' method='post'>
                            <p class='hint-text'>Fill in this form to create your account!</p>
                            <div class='form-group'>
                                <input type='text' class='form-control' placeholder='Username' name='username2'
                                    required='required'>
                            </div>
                            <div class='form-group'>
                                <input type='password' class='form-control' placeholder='Password' name='password2'
                                    required='required'>
                            </div>
                            <div class='form-group'>
                                <input type='password' class='form-control' placeholder='Confirm Password'
                                    name='password3' required='required'>
                            </div>
                            <div class='form-group'>
                                <label class='checkbox-inline'><input type='checkbox' required='required'> I accept
                                    the Terms and Conditions</label>
                            </div>
                            <input type='submit' class='btn btn-primary btn-block' value='Sign up'>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
";
}

?>
</header>
<style>
    .navbar .nav .UpdateDataLink {
        color: #ff6700 !important;
    }
    .UpdateData1{
        margin-left: 20px;
        width: 150px;
    }
    .UpdateDataContainer{
        display: flex;
        flex-direction: row;
        margin-top: 52px;
    }
    .btnContact{
        margin-top: 50px;
        margin-left: 20px;
        width: 10%;
    border: none;
    border-radius: 1rem;
    padding: 0.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    }
    .UpdateCategory{
        font-size: 20px;
        margin-left: 20px;
        margin-top:87px;
    }
    .UpdateDataDiv{
        margin-top:20px;
        background-color: green;
    }
    .CategoryDiv{
    float: left;
    width: 20%;
    height:1000px;
  }
  .UpdateDiv {
    float: left;
    width: 80%;
    height: 1000px;
  }
  footer{
      margin-top:1100px;
  }
  .btn{
  margin-top: 7px !important;
}
</style>

<?php
    include("config.php");

 $sql = "SELECT * FROM region WHERE RID=(SELECT max(RID) FROM region)";
       $result = mysqli_query($db,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $active = $row['active'];
       $NL = $row['NorthLeb'];
       $Beqaa = $row['Beqaa'];
       $ML = $row['MountLeb'];
       $Beirut = $row['Beirut'];
       $Nabatyeh = $row['Nabatyeh'];
       $SL = $row['SouthLeb'];

     $sql2 = "SELECT * FROM statistics WHERE SID=(SELECT max(SID) FROM statistics)";
       $result2 = mysqli_query($db,$sql2);
       $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
       $active2 = $row2['active'];
       $newDeaths = $row2['newDeaths'];
       $totalDeaths = $row2['totalDeaths'];
       $newRecoveries = $row2['newRecoveries'];
       $totalRecoveries = $row2['totalRecoveries'];

       $sql3 = "SELECT * FROM district WHERE DID=(SELECT max(DID) FROM district)";
       $result3 = mysqli_query($db,$sql3);
       $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
       $active3 = $row3['active'];

       $Akkar = $row3['Akkar'];
       $Tripoli = $row3['Tripoli'];
       $Hermel = $row3['Hermel'];
       $MiniehDenieh = $row3['MiniehDenieh'];
       $Zgharta = $row3['Zgharta'];
       $Koura = $row3['Koura'];
       $Bcharreh = $row3['Bcharreh'];
       $Batroun = $row3['Batroun'];

       $Baalbeck = $row3['Baalbeck'];
       $Zahle = $row3['Zahle'];
       $WestBekaa = $row3['WestBekaa'];
       $Rachaiya = $row3['Rachaiya'];

       $Jbeil = $row3['Jbeil'];
       $Kesrwan = $row3['Kesrwan'];
       $ElMatn = $row3['ElMatn'];
       $Alay = $row3['Alay'];
       $Chouf = $row3['Chouf'];
       $Baabda = $row3['Baabda'];

       $Jezzine = $row3['Jezzine'];
       $Saida = $row3['Saida'];
       $Sour = $row3['Sour'];

       $Nabatyeh2 = $row3['Nabatyeh'];
       $Marjeyoun = $row3['Marjeyoun'];
       $BintJbeil = $row3['BintJbeil'];
       $Hasbaya = $row3['Hasbaya'];
?>

<body>
<div class="UpdateDataDiv">
<div class="CategoryDiv">
<p class="UpdateCategory">Deaths</p>   
<p class="UpdateCategory">Recoveries</p>
<p class="UpdateCategory">Cases per region</p>
<p class="UpdateCategory">Cases in North Lebanon</p>
<p class="UpdateCategory">Cases in Beqaa</p>
<p class="UpdateCategory">Cases in Mount Lebanon</p>
<p class="UpdateCategory">Cases in South Lebanon</p>
<p class="UpdateCategory">Cases in Nabatyeh</p>

</div>
<div class="UpdateDiv">
<form action="Update.php" method="POST">
    <div class="UpdateDataContainer">   
    <div class="UpdateData1">
  <p>Total Deaths</p>
  <input type="number" class="form-control" value=<?php echo $totalDeaths; ?> min="0"  max="1000000" step="1" name="totalDeaths"/>
  </div>

  <div class="UpdateData1">
  <p>New Deaths</p>
  <input type="number" class="form-control" value=<?php echo $newDeaths; ?> min="0"  max="1000000" step="1" name="newDeaths"/>
  </div>

  </div>


  <div class="UpdateDataContainer">   
    <div class="UpdateData1">
  <p>Total Recoveries</p>
  <input type="number" class="form-control" value=<?php echo $totalRecoveries; ?> min="0"  max="1000000" step="1" name="totalRecoveries"/>
  </div>

  <div class="UpdateData1">
  <p>New Recoveries</p>
  <input type="number" class="form-control" value=<?php echo $newRecoveries; ?> min="0"  max="1000000" step="1" name="newRecoveries"/>
  </div>

  </div>


  <div class="UpdateDataContainer"> 
    <div class="UpdateData1">
  <p>North Lebanon</p>
  <input type="number" class="form-control" value=<?php echo $NL; ?> min="0"  max="1000000" step="1" name="region0"/>
  </div>

  <div class="UpdateData1">
  <p>Beqaa</p>
  <input type="number" class="form-control" value=<?php echo $Beqaa; ?> min="0"  max="1000000" step="1" name="region1"/>
  </div>

  <div class="UpdateData1">
  <p>Mount Lebanon</p>
  <input type="number" class="form-control" value=<?php echo $ML; ?> min="0"  max="1000000" step="1" name="region2"/>
  </div>

  <div class="UpdateData1">
  <p>Beirut</p>
  <input type="number" class="form-control" value=<?php echo $Beirut; ?> min="0"  max="1000000" step="1" name="region3"/>
  </div>

  <div class="UpdateData1">
  <p>Nabatyeh</p>
  <input type="number" class="form-control" value=<?php echo $Nabatyeh; ?> min="0"  max="1000000" step="1" name="region4"/>
  </div>

  <div class="UpdateData1">
  <p>South Lebanon</p>
  <input type="number" class="form-control" value=<?php echo $SL; ?> min="0"  max="1000000" step="1" name="region5"/>
  </div>

  </div>
  <div class="UpdateDataContainer"> 
    <div class="UpdateData1">
  <p>Akkar</p>
  <input type="number" class="form-control" value=<?php echo $Akkar; ?> min="0"  max="1000000" step="1" name="district0"/>
  </div>

  <div class="UpdateData1">
  <p>Tripoli</p>
  <input type="number" class="form-control" value=<?php echo $Tripoli; ?> min="0"  max="1000000" step="1" name="district1"/>
  </div>

  <div class="UpdateData1">
  <p>Hermel</p>
  <input type="number" class="form-control" value=<?php echo $Hermel; ?> min="0"  max="1000000" step="1" name="district2"/>
  </div>

  <div class="UpdateData1">
  <p>Minieh Denieh</p>
  <input type="number" class="form-control" value=<?php echo $MiniehDenieh; ?> min="0"  max="1000000" step="1" name="district3"/>
  </div>

  <div class="UpdateData1">
  <p>Zgharta</p>
  <input type="number" class="form-control" value=<?php echo $Zgharta; ?> min="0"  max="1000000" step="1" name="district4"/>
  </div>

  <div class="UpdateData1">
  <p>Koura</p>
  <input type="number" class="form-control" value=<?php echo $Koura; ?> min="0"  max="1000000" step="1" name="district5"/>
  </div>

  <div class="UpdateData1">
  <p>Bcharreh</p>
  <input type="number" class="form-control" value=<?php echo $Bcharreh; ?> min="0"  max="1000000" step="1" name="district6"/>
  </div>

  <div class="UpdateData1">
  <p>Batroun</p>
  <input type="number" class="form-control" value=<?php echo $Batroun; ?> min="0"  max="1000000" step="1" name="district7"/>
  </div>

  </div>

  <div class="UpdateDataContainer"> 
    <div class="UpdateData1">
  <p>Baalbeck</p>
  <input type="number" class="form-control" value=<?php echo $Baalbeck; ?> min="0"  max="1000000" step="1" name="district8"/>
  </div>

  <div class="UpdateData1">
  <p>Zahle</p>
  <input type="number" class="form-control" value=<?php echo $Zahle; ?> min="0"  max="1000000" step="1" name="district9"/>
  </div>

  <div class="UpdateData1">
  <p>West Bekaa</p>
  <input type="number" class="form-control" value=<?php echo $WestBekaa; ?> min="0"  max="1000000" step="1" name="district10"/>
  </div>

  <div class="UpdateData1">
  <p>Rachaiya</p>
  <input type="number" class="form-control" value=<?php echo $Rachaiya; ?> min="0"  max="1000000" step="1" name="district11"/>
  </div>

  </div>

  <div class="UpdateDataContainer"> 
    <div class="UpdateData1">
  <p>Jbeil</p>
  <input type="number" class="form-control" value=<?php echo $Jbeil; ?> min="0"  max="1000000" step="1" name="district12"/>
  </div>

  <div class="UpdateData1">
  <p>Kesrwan</p>
  <input type="number" class="form-control" value=<?php echo $Kesrwan; ?> min="0"  max="1000000" step="1" name="district13"/>
  </div>

  <div class="UpdateData1">
  <p>El Matn</p>
  <input type="number" class="form-control" value=<?php echo $ElMatn; ?> min="0"  max="1000000" step="1" name="district14"/>
  </div>

  <div class="UpdateData1">
  <p>Alay</p>
  <input type="number" class="form-control" value=<?php echo $Alay; ?> min="0"  max="1000000" step="1" name="district15"/>
  </div>

  <div class="UpdateData1">
  <p>Chouf</p>
  <input type="number" class="form-control" value=<?php echo $Chouf; ?> min="0"  max="1000000" step="1" name="district16"/>
  </div>

  <div class="UpdateData1">
  <p>Baabda</p>
  <input type="number" class="form-control" value=<?php echo $Baabda; ?> min="0"  max="1000000" step="1" name="district17"/>
  </div>

  </div>

  <div class="UpdateDataContainer"> 
    <div class="UpdateData1">
  <p>Jezzine</p>
  <input type="number" class="form-control" value=<?php echo $Jezzine; ?> min="0"  max="1000000" step="1" name="district18"/>
  </div>

  <div class="UpdateData1">
  <p>Saida</p>
  <input type="number" class="form-control" value=<?php echo $Saida; ?> min="0"  max="1000000" step="1" name="district19"/>
  </div>

  <div class="UpdateData1">
  <p>Sour</p>
  <input type="number" class="form-control" value=<?php echo $Sour; ?> min="0"  max="1000000" step="1" name="district20"/>
  </div>

  </div>

  <div class="UpdateDataContainer"> 
    <div class="UpdateData1">
  <p>Nabatyeh</p>
  <input type="number" class="form-control" value=<?php echo $Nabatyeh2; ?> min="0"  max="1000000" step="1" name="district21"/>
  </div>

  <div class="UpdateData1">
  <p>Marjeyoun</p>
  <input type="number" class="form-control" value=<?php echo $Marjeyoun; ?> min="0"  max="1000000" step="1" name="district22"/>
  </div>

  <div class="UpdateData1">
  <p>BintJbeil</p>
  <input type="number" class="form-control" value=<?php echo $BintJbeil; ?> min="0"  max="1000000" step="1" name="district23"/>
  </div>

  <div class="UpdateData1">
  <p>Hasbaya</p>
  <input type="number" class="form-control" value=<?php echo $Hasbaya; ?> min="0"  max="1000000" step="1" name="district24"/>
  </div>

  </div>


  <input type='submit' class="btnContact" value='Update'>
</form>
</div>
</div>
</body>

<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fa fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fa fa-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-linkedin"></i></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href=#">CoronavirusWebsite.com</a>
    </div>
    <!-- Copyright -->
</footer>

</html>

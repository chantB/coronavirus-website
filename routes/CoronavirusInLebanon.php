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
    .navbar .nav .LebanonLink {
        color: #ff6700 !important;
    }
</style>

<script>
    function _(x) {
        return document.getElementById(x);
    }
    function showNL() {
        var div = document.getElementById('pie-chart');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart2');
        div.style.display = 'block';

        var div = document.getElementById('pie-chart3');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart4');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart5');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart6');
        div.style.display = 'none';

    }
    function showBeqaa() {
        var div = document.getElementById('pie-chart');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart2');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart3');
        div.style.display = 'block';

        var div = document.getElementById('pie-chart4');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart5');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart6');
        div.style.display = 'none';

    }
    function showML() {
        var div = document.getElementById('pie-chart');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart2');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart3');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart4');
        div.style.display = 'block';

        var div = document.getElementById('pie-chart5');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart6');
        div.style.display = 'none';



    }
    function showNabatyeh() {
        var div = document.getElementById('pie-chart');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart2');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart3');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart4');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart5');
        div.style.display = 'block';
        
        var div = document.getElementById('pie-chart6');
        div.style.display = 'none';


    }
    function showSL() {
        var div = document.getElementById('pie-chart');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart2');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart3');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart4');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart5');
        div.style.display = 'none';

        var div = document.getElementById('pie-chart6');
        div.style.display = 'block';


    }
</script>

<?php
    include("config.php");

 $totalRegionCases = 0.0;

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
       $date = $row['Rdate'];
 


     $sql2 = "SELECT * FROM statistics WHERE SID=(SELECT max(SID) FROM statistics)";
       $result2 = mysqli_query($db,$sql2);
       $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
       $active2 = $row2['active'];
       $newDeaths = $row2['newDeaths'];
       $totalDeaths = $row2['totalDeaths'];
       $newRecoveries = $row2['newRecoveries'];
       $totalRecoveries = $row2['totalRecoveries'];

       $totalRegionCases = $NL+$Beqaa+$ML+$Beirut+$Nabatyeh+$SL;

       $NLp = ($NL*100)/$totalRegionCases;
       $Beqaap = ($Beqaa*100)/$totalRegionCases;
       $MLp = ($ML*100)/$totalRegionCases;
       $Beirutp = ($Beirut*100)/$totalRegionCases;
       $Nabatyehp = ($Nabatyeh*100)/$totalRegionCases;
       $SLp = ($SL*100)/$totalRegionCases;

       $sql3 = "SELECT * FROM district WHERE DID=(SELECT max(SID) FROM statistics)";
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

       $totalNLCases = $Akkar+$Tripoli+$Hermel+$MiniehDenieh+$Zgharta+$Koura+$Bcharreh+$Batroun;

       $Akkarp = ($Akkar*100)/$totalNLCases;
       $Tripolip = ($Tripoli*100)/$totalNLCases;
       $Hermelp = ($Hermel*100)/$totalNLCases;
       $MiniehDeniehp = ($MiniehDenieh*100)/$totalNLCases;
       $Zghartap = ($Zgharta*100)/$totalNLCases;
       $Kourap = ($Koura*100)/$totalNLCases;
       $Bcharrehp = ($Bcharrehp*100)/$totalNLCases;
       $Batrounp = ($Batrounp*100)/$totalNLCases;

       $Baalbeck = $row3['Baalbeck'];
       $Zahle = $row3['Zahle'];
       $WestBekaa = $row3['WestBekaa'];
       $Rachaiya = $row3['Rachaiya'];

       $totalBeqaaCases = $Baalbeck+$Zahle+$WestBekaa+$Rachaiya;

       $Baalbeckp = ($Baalbeck*100)/$totalBeqaaCases;
       $Zahlep = ($Zahle*100)/$totalBeqaaCases;
       $WestBekaap = ($WestBekaa*100)/$totalBeqaaCases;
       $Rachaiyap = ($Rachaiya*100)/$totalBeqaaCases;

       $Jbeil = $row3['Jbeil'];
       $Kesrwan = $row3['Kesrwan'];
       $ElMatn = $row3['ElMatn'];
       $Alay = $row3['Alay'];
       $Chouf = $row3['Chouf'];
       $Baabda = $row3['Baabda'];

       $totaMLLCases = $Jbeil+$Kesrwan+$ElMatn+$Alay+$Chouf+$Baabda;

       $Jbeilp = ($Jbeil*100)/$totaMLLCases;
       $Kesrwanp = ($Tripoli*100)/$totaMLLCases;
       $ElMatnp = ($ElMatn*100)/$totaMLLCases;
       $Alayp = ($Alay*100)/$totaMLLCases;
       $Choufp = ($Chouf*100)/$totaMLLCases;
       $Baabdap = ($Baabda*100)/$totaMLLCases;

       $Jezzine = $row3['Jezzine'];
       $Saida = $row3['Saida'];
       $Sour = $row3['Sour'];

       $totalSLCases = $Jezzine+$Saida+$Sour;

       $Jezzinep = ($Jezzine*100)/$totalSLCases;
       $Saidap = ($Saida*100)/$totalSLCases;
       $Sourp = ($Sour*100)/$totalSLCases;

       $Nabatyeh2 = $row3['Nabatyeh'];
       $Marjeyoun = $row3['Marjeyoun'];
       $BintJbeil = $row3['BintJbeil'];
       $Hasbaya = $row3['Hasbaya'];

       $totalNabatyehCases = $Nabatyeh2+$Marjeyoun+$BintJbeil+$Hasbaya;

       $Nabatyeh2p = ($Nabatyeh2*100)/$totalNabatyehCases;
       $Marjeyounp = ($Marjeyoun*100)/$totalNabatyehCases;
       $BintJbeilp = ($BintJbeil*100)/$totalNabatyehCases;
       $Hasbayap = ($Hasbaya*100)/$totalNabatyehCases;
          ?>


<body>
    <style>
        .btn{
  margin-top: 7px !important;
}
        .pie-chart {
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 <?php echo $NLp; ?>%,
			#f28e2c 0,
			#f28e2c <?php echo $NLp + $Beqaap; ?>%,
			#e15759 0,
			#e15759 <?php echo $NLp + $Beqaap + $MLp; ?>%,
			#76b7b2 0,
			#76b7b2 <?php echo $NLp + $Beqaap + $MLp + $Beirutp; ?>%,
			#59a14f 0,
			#59a14f <?php echo $NLp + $Beqaap + $MLp + $Beirutp + $Nabatyehp; ?>%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}
.pie-chart2 {
    display:none;
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 <?php echo $Akkarp; ?>%,
			#f28e2c 0,
			#f28e2c <?php echo $Akkarp + $Tripolip; ?>%,
			#e15759 0,
			#e15759 <?php echo $Akkarp + $Tripolip + $Hermelp; ?>%,
			#76b7b2 0,
			#76b7b2 <?php echo $Akkarp + $Tripolip + $Hermelp + $MiniehDeniehp; ?>%,
			#59a14f 0,
			#59a14f <?php echo $Akkarp + $Tripolip + $Hermelp + $MiniehDeniehp + $Zghartap; ?>%,
            #5e3aa8 0,
			#5e3aa8 <?php echo $Akkarp + $Tripolip + $Hermelp + $MiniehDeniehp + $Zghartap + $Kourap;?>%,
            #95573e 0,
			#95573e <?php echo $Akkarp + $Tripolip + $Hermelp + $MiniehDeniehp + $Zghartap  + $Kourap + $Bcharrehp;?>%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}

.pie-chart2 h2 {
	position: absolute;
	margin: 1rem;
}
.pie-chart2 cite {
	position: absolute;
	bottom: 0;
	font-size: 80%;
	padding: 1rem;
	color: gray;
}
.pie-chart2 figcaption {
	position: absolute;
	bottom: 1em;
	right: 1em;
	font-size: smaller;
	text-align: right;
}
.pie-chart2 span:after {
	display: inline-block;
	content: "";
	width: 0.8em;
	height: 0.8em;
	margin-left: 0.4em;
	height: 0.8em;
	border-radius: 0.2em;
	background: currentColor;
}
.pie-chart3 {
    display:none;
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 <?php echo $Baalbeckp; ?>%,
			#f28e2c 0,
			#f28e2c <?php echo $Baalbeckp + $Zahlep; ?>%,
			#e15759 0,
			#e15759 <?php echo $Baalbeckp + $Zahlep + $WestBekaap; ?>%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}

.pie-chart3 h2 {
	position: absolute;
	margin: 1rem;
}
.pie-chart3 cite {
	position: absolute;
	bottom: 0;
	font-size: 80%;
	padding: 1rem;
	color: gray;
}
.pie-chart3 figcaption {
	position: absolute;
	bottom: 1em;
	right: 1em;
	font-size: smaller;
	text-align: right;
}
.pie-chart3 span:after {
	display: inline-block;
	content: "";
	width: 0.8em;
	height: 0.8em;
	margin-left: 0.4em;
	height: 0.8em;
	border-radius: 0.2em;
	background: currentColor;
}
.pie-chart4 {
    display:none;
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 <?php echo $Jbeilp; ?>%,
			#f28e2c 0,
			#f28e2c <?php echo $Jbeilp + $Kesrwanp; ?>%,
			#e15759 0,
			#e15759 <?php echo $Jbeilp + $Kesrwanp + $ElMatnp; ?>%,
			#76b7b2 0,
			#76b7b2 <?php echo $Jbeilp + $Kesrwanp + $ElMatnp + $Alayp; ?>%,
			#59a14f 0,
			#59a14f <?php echo $Jbeilp + $Kesrwanp + $ElMatnp + $Alayp + $Choufp; ?>%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}

.pie-chart4 h2 {
	position: absolute;
	margin: 1rem;
}
.pie-chart4 cite {
	position: absolute;
	bottom: 0;
	font-size: 80%;
	padding: 1rem;
	color: gray;
}
.pie-chart4 figcaption {
	position: absolute;
	bottom: 1em;
	right: 1em;
	font-size: smaller;
	text-align: right;
}
.pie-chart4 span:after {
	display: inline-block;
	content: "";
	width: 0.8em;
	height: 0.8em;
	margin-left: 0.4em;
	height: 0.8em;
	border-radius: 0.2em;
	background: currentColor;
}
.pie-chart6 {
    display:none;
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 <?php echo $Jezzinep; ?>%,
			#f28e2c 0,
			#f28e2c <?php echo $Jezzinep + $Saidap; ?>%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}

.pie-chart6 h2 {
	position: absolute;
	margin: 1rem;
}
.pie-chart6 cite {
	position: absolute;
	bottom: 0;
	font-size: 80%;
	padding: 1rem;
	color: gray;
}
.pie-chart6 figcaption {
	position: absolute;
	bottom: 1em;
	right: 1em;
	font-size: smaller;
	text-align: right;
}
.pie-chart6 span:after {
	display: inline-block;
	content: "";
	width: 0.8em;
	height: 0.8em;
	margin-left: 0.4em;
	height: 0.8em;
	border-radius: 0.2em;
	background: currentColor;
}
.pie-chart5 {
    display:none;
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 <?php echo $Nabatyeh2p; ?>%,
			#f28e2c 0,
			#f28e2c <?php echo $Nabatyeh2p + $Marjeyounp; ?>%,
			#e15759 0,
			#e15759 <?php echo $Nabatyeh2p + $Marjeyounp + $BintJbeilp; ?>%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}

.pie-chart5 h2 {
	position: absolute;
	margin: 1rem;
}
.pie-chart5 cite {
	position: absolute;
	bottom: 0;
	font-size: 80%;
	padding: 1rem;
	color: gray;
}
.pie-chart5 figcaption {
	position: absolute;
	bottom: 1em;
	right: 1em;
	font-size: smaller;
	text-align: right;
}
.pie-chart5 span:after {
	display: inline-block;
	content: "";
	width: 0.8em;
	height: 0.8em;
	margin-left: 0.4em;
	height: 0.8em;
	border-radius: 0.2em;
	background: currentColor;
}
.picBeqaa{
    margin-left: 200px;
    margin-top: 114px;
    position: absolute;
}
.picNL{
    margin-left: 211.5px;
    margin-top: 46.5px;
    position: absolute;
}
.picML{
    margin-left: 130px;
    margin-top: 218px;
    position: absolute;
}
.picBeirut{
    margin-left: 138px;
    margin-top: 308px;
    position: absolute;
}
.picNabatyeh{
    margin-left: 102px;
    margin-top: 475.5px;
    position: absolute;
}
.picSL{
    margin-left: 48px;
    margin-top: 436px;
    position: absolute;
}
.MapContainer{
    
}
.StatsDiv{
    margin-top: 40px;
}
.MapDate{
    margin-top: 40px;
    color: white;
    font-size: 40px;
    margin-left: 250px;
}
.MapDescription{
    margin-left: 20px;
    height: 70px;
    background: white;
    width: 215px;
    margin-top: 10px;
    position: absolute;
}
.MapDescription1{
    height:33.3%;
}
.MapDescription2{
    height:33.3%;
}
.MapDescription3{
    height:33.5%;
}
.MapDescriptionContainer{
    margin-top: 6px;
    display flex;
    flex-direction row;
    position: absolute;
}
.Green{
    margin-left: 6px;
    height: 12px;
    width: 12px;
    background-color: green;
    position: absolute;

}
.Yellow{
    margin-left: 6px;
    height: 12px;
    width: 12px;
    background-color: yellow;
    position: absolute;

}
.Red{
    margin-left: 6px;
    height: 12px;
    width: 12px;
    background-color: red;
    position: absolute;

}
.ColorDescription{
    margin-left: 30px;
    margin-top: -4px;
    position: absolute;
    width: 200px;
}
body {
    background-image: url('./../assets/Lebanon background.jpg');
    height:100%;
    background-repeat: no-repeat;
    background-size: cover;
}
    </style>
 
 <?php  

 if($NL >=0 && $NL <200){
     $ColorNL = "./../assets/region6-Green.png";
 }
 else if($NL > 200 && $NL <600){
    $ColorNL = "./../assets/region6-Yellow.png";
}
else if($NL > 600){
    $ColorNL = "./../assets/region6-Red.png";
}

if($Beqaa >=0 && $Beqaa <200){
    $ColorBeqaa = "./../assets/region1-Green.png";
}
else if($Beqaa > 200 && $Beqaa <600){
   $ColorBeqaa = "./../assets/region1-Yellow.png";
}
else if($Beqaa > 600){
   $ColorBeqaa = "./../assets/region1-Red.png";
}

if($ML >=0 && $ML <200){
    $ColorML = "./../assets/region4-Green.png";
}
else if($ML > 200 && $ML <600){
   $ColorML = "./../assets/region4-Yellow.png";
}
else if($ML > 600){
   $ColorML = "./../assets/region4-Red.png";
}

if($Beirut >=0 && $Beirut <200){
    $ColorBeirut = "./../assets/region5-Green.png";
}
else if($Beirut > 200 && $Beirut <600){
   $ColorBeirut = "./../assets/region5-Yellow.png";
}
else if($Beirut > 600){
   $ColorBeirut = "./../assets/region5-Red.png";
}

if($Nabatyeh >=0 && $Nabatyeh <200){
    $ColorNabatyeh = "./../assets/region2-Green.png";
}
else if($Nabatyeh > 200 && $Nabatyeh <600){
   $ColorNabatyeh = "./../assets/region2-Yellow.png";
}
else if($Nabatyeh > 600){
   $ColorNabatyeh = "./../assets/region2-Red.png";
}

if($SL >=0 && $SL <200){
    $ColorSL = "./../assets/region3-Green.png";
}
else if($SL > 200 && $SL <600){
   $ColorSL = "./../assets/region3-Yellow.png";
}
else if($SL > 600){
   $ColorSL = "./../assets/region3-Red.png";
}
 ?>




    <div class="container2">
        <div class="MapDiv">
        <div class="MapDate"><?php echo $date; ?>
        </div>
          <div class="MapContainer">
        <?php echo"<img class='picNL' src='$ColorNL' />"?>
        <?php echo"<img class='picBeqaa' src='$ColorBeqaa' />"?>
        <?php echo"<img class='picML' src='$ColorML' />"?>
        <?php echo"<img class='picBeirut' src='$ColorBeirut' />"?>
        <?php echo"<img class='picNabatyeh' src='$ColorNabatyeh' />"?>
        <?php echo"<img class='picSL' src='$ColorSL' />"?>

            <span style="font-weight: bold; position: absolute; top: 0px; z-index: 3; margin-top:312px; margin-left:270px" onclick="showNL()">North Lebanon</span>
            <span style="font-weight: bold; position: absolute; top: 0px; z-index: 3; margin-top:410px; margin-left:370px" onclick="showBeqaa()">Beqaa</span>
            <span style="font-weight: bold; position: absolute; top: 0px; z-index: 3; margin-top:450px; margin-left:207px" onclick="showML()">Mount Lebanon</span>
            <span style="font-weight: bold; position: absolute; top: 0px; z-index: 3; margin-top:480px; margin-left:110px">Beirut</span>
            <span style="font-weight: bold; position: absolute; top: 0px; z-index: 3; margin-top:708px; margin-left:150px" onclick="showNabatyeh()">Nabatyeh</span>
            <span style="font-weight: bold; position: absolute; top: 0px; z-index: 3; margin-top:730px; margin-left:54px" onclick="showSL()">South Lebanon</span>

            </div>
            <div class="MapDescription">
            <div class="MapDescription1">
            <div class="MapDescriptionContainer">
            <div class="Green"></div>
            <p class="ColorDescription">Between 0 and 200 cases</p>
            </div>
        </div>
        <div class="MapDescription2">
        <div class="MapDescriptionContainer">
        <div class="Yellow"></div>
            <p class="ColorDescription">Between 200 and 600 cases</p>
            </div>
        </div>
        <div class="MapDescription3">
        <div class="MapDescriptionContainer">
        <div class="Red"></div>
            <p class="ColorDescription">More than 600 cases</p>
            </div>
        </div>
        </div>
        </div>
        <div class="StatsDiv" id="StatsDiv">
            <div class="SmallContainerDiv">
                <div class="SmallContainerRed">
                    <div class="SmallContainerString1">
                        Total Deaths
                    </div>
                    <div class="SmallContainerString2">
                    <?php echo $totalDeaths; ?>
                    </div>
                </div>
                <div class="SmallContainer">
                    <div class="SmallContainerString1">
                        New Deaths
                    </div>
                    <div class="SmallContainerString2">
                    <?php echo $newDeaths; ?>
                    </div>
                </div>
            </div>

            <div class="SmallContainerDiv SmallContainerDiv2">
                <div class="SmallContainerRed">
                    <div class="SmallContainerString1">
                        Total Recoveries
                    </div>
                    <div class="SmallContainerString2">
                    <?php echo $totalRecoveries; ?>
                    </div>
                </div>
                <div class="SmallContainer">
                    <div class="SmallContainerString1">
                        New Recoveries
                    </div>
                    <div class="SmallContainerString2">
                    <?php echo $newRecoveries; ?>
                    </div>
                </div>
            </div>
            <div class="pieDiv">
                <figure class="pie-chart" id="pie-chart">
                    <h2>Distribution of positive Covid-19 cases</h2>
                    <figcaption>
                    North Lebanon <?php echo $NL; ?><span style="color:#4e79a7"></span><br>
                    Beqaa <?php echo $Beqaa; ?><span style="color:#f28e2c"></span><br>
                    Mount Lebanon <?php echo $ML; ?><span style="color:#e15759"></span><br>
                    Beirut <?php echo $Beirut; ?><span style="color:#76b7b2"></span><br>
                    Nabatyeh <?php echo $Nabatyeh; ?><span style="color:#59a14f"></span><br>
                    South Lebanon <?php echo $SL; ?><span style="color:#edc949"></span>
                    </figcaption>
                </figure>
                </div>
                <div class="pieDiv">
                <figure class="pie-chart2" id="pie-chart2">
                    <h2>Covid-19 cases in North Lebanon</h2>
                    <figcaption>
                    Akkar <?php echo $Akkar; ?><span style="color:#4e79a7"></span><br>
                    Tripoli <?php echo $Tripoli; ?><span style="color:#f28e2c"></span><br>
                    Hermel <?php echo $Hermel; ?><span style="color:#e15759"></span><br>
                    Minieh Denieh <?php echo $MiniehDenieh; ?><span style="color:#76b7b2"></span><br>
                    Zgharta <?php echo $Zgharta; ?><span style="color:#59a14f"></span><br>
                    Koura <?php echo $Koura; ?><span style="color:#5e3aa8"></span><br>
                    Bcharreh <?php echo $Bcharreh; ?><span style="color:#95573e"></span><br>
                    Batroun <?php echo $Batroun; ?><span style="color:#edc949"></span>
                    </figcaption>
                </figure>
            </div>
            <div class="pieDiv">
                <figure class="pie-chart3" id="pie-chart3">
                    <h2>Covid-19 cases in Beqaa</h2>
                    <figcaption>
                    Baalbeck <?php echo $Baalbeck; ?><span style="color:#4e79a7"></span><br>
                    Zahle <?php echo $Zahle; ?><span style="color:#f28e2c"></span><br>
                    WestBekaa <?php echo $WestBekaa; ?><span style="color:#e15759"></span><br>
                    Rachaiya <?php echo $Rachaiya; ?><span style="color:#edc949"></span>
                    </figcaption>
                </figure>
            </div>
            <div class="pieDiv">
                <figure class="pie-chart4" id="pie-chart4">
                    <h2>Covid-19 cases in Mount Lebanon</h2>
                    <figcaption>
                    Jbeil <?php echo $Jbeil; ?><span style="color:#4e79a7"></span><br>
                    Kesrwan <?php echo $Kesrwan; ?><span style="color:#f28e2c"></span><br>
                    ElMatn <?php echo $ElMatn; ?><span style="color:#e15759"></span><br>
                    Alay <?php echo $Alay; ?><span style="color:#76b7b2"></span><br>
                    Chouf <?php echo $Chouf; ?><span style="color:#59a14f"></span><br>
                    Baabda <?php echo $Baabda; ?><span style="color:#edc949"></span>
                    </figcaption>
                </figure>
            </div>
            <div class="pieDiv">
                <figure class="pie-chart5" id="pie-chart5">
                    <h2>Covid-19 cases in Nabatyeh</h2>
                    <figcaption>
                    Nabatyeh <?php echo $Nabatyeh2; ?><span style="color:#4e79a7"></span><br>
                    Marjeyoun <?php echo $Marjeyoun; ?><span style="color:#f28e2c"></span><br>
                    BintJbeil <?php echo $BintJbeil; ?><span style="color:#e15759"></span><br>
                    Hasbaya <?php echo $Hasbaya; ?><span style="color:#edc949"></span>
                    </figcaption>
                </figure>
            </div>
            <div class="pieDiv">
                <figure class="pie-chart6" id="pie-chart6">
                    <h2>Covid-19 cases in South Lebanon</h2>
                    <figcaption>
                    Jezzine <?php echo $Jezzine; ?><span style="color:#4e79a7"></span><br>
                    Saida <?php echo $Saida; ?><span style="color:#f28e2c"></span><br>
                    Sour <?php echo $Sour; ?><span style="color:#edc949"></span>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</body>
<style>
    footer {
        margin-top: 908px !important;
    }
</style>
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

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../lib/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../lib/css/header.css" />
    <link rel="stylesheet" type="text/css" href="../lib/css/contact.css" />
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
    .navbar .nav .PreventionLink {
        color: #ff6700 !important;
    }
    .PreventionDiv{
        height: 500px;
    }
    .preventionTitle{
        font-size: 40px;
        text-align: center;
        margin-top: 20px;
    }
    .preventionContainer{
        margin-top: 20px;
        height: 400px;
        margin-right: 40px;
        margin-left: 40px;
    }
    .preventionContainer1{
        height: 200px;
        display: flex;
        flex-direction: row;
    }
    .preventionContainer2{
        height: 200px;
        display: flex;
        flex-direction: row;
    }
    .preventionContainer1E1{
        height: 200px;
        width:33.3%

    }
    .preventionContainer1E2{
        height: 200px;
        width:33.3%

    }
    .preventionContainer1E3{
        height: 200px;
        width:33.4%

    }
    .preventionContainer2E1{
        height: 200px;
        width:33.3%

    }
    .preventionContainer2E2{
        height: 200px;
        width:33.3%

    }
    .preventionContainer2E3{
        height: 200px;
        width:33.4%

    }
    .logo{
        height:100px;
        width:100px;
        display: block;
  margin-left: auto;
  margin-right: auto;
    }
    .preventionText{
        margin-top: 30px;
        text-align:center;
        font-size: 15px;
    }
    body{
        background-image: url('./../assets/background11.jpg');
        background-repeat: no-repeat;
    background-size: cover;
    }
    .btn{
  margin-top: 7px !important;
}
</style>



<body>
<div class="container contact-form">
            <div class="PreventionDiv">
                <p class="preventionTitle">Coronavirus Prevention</p>
                  <div class="preventionContainer">
                    <div class="preventionContainer1">

                    <div class="preventionContainer1E1">
                    <img class="logo" src="./../assets/logo1.png" />
                    <p class="preventionText">Clean your hands often. Use soap and water, or an alcohol-based hand rub</p>
                    </div>
                    <div class="preventionContainer1E2">
                    <img class="logo" src="./../assets/logo7.png" />
                    <p class="preventionText">Wear a mask when physical distancing is not possible</p>
                   </div>
                    <div class="preventionContainer1E3">
                    <img class="logo" src="./../assets/logo8.png" />
                    <p class="preventionText">Maintain a safe distance from anyone who is coughing or sneezing</p>
                    </div>
                    </div>

                    <div class="preventionContainer2">

                    <div class="preventionContainer2E1">
                    <img class="logo" src="./../assets/logo4.png" />
                    <p class="preventionText">Don’t touch your eyes, nose or mouth</p>
                    </div>
                    <div class="preventionContainer2E2">
                    <img class="logo" src="./../assets/logo5.png" />
                    <p class="preventionText">Cover your nose and mouth with your bent elbow or a tissue when you cough or sneeze</p>
                   </div>
                    <div class="preventionContainer2E3">
                    <img class="logo" src="./../assets/logo6.png" />
                    <p class="preventionText">Stay home if you feel unwell</p>
                    </div>

                    </div>
                  </div>
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

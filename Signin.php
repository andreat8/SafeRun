<?php
  $username="";
  $password="";
  $error = false;
  $loginOK = null;

  if(isset($_POST["submit"])){
    if(isset($_POST["username"])) $username=$_POST["username"];
    if(isset($_POST["password"])) $password=$_POST["password"];

    if(empty($username) || empty($password)) {
      $error=true;
    }

    if(!$error){
      //check username and password with the database record
      require_once("db.php");
      $sql = "select password from profile where username='$username'";
      $result = $mydb->query($sql);

      $row=mysqli_fetch_array($result);
      if ($row){
        if(strcmp($password, $row["password"]) ==0 ){
          $loginOK=true;
        } else {
          $loginOK = false;
        }
      }

      if($loginOK) {
        //set session variable to remember the username
        session_start();
        $_SESSION["username"] = $username;
        Header("Location:homepage.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upcoming Races</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="signinCSS.css">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>


<body>
  <div class="container-fluid">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img id="brand-image" src="running.png" class="runImg">
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="homepage.php#brand-image">Home <span class="sr-only">(current)</span></a></li>
            <?php
            if(!isset($_SESSION["username"])){
              echo '<li class="active"><a href="Signin.php">Login</a></li>';
            }else{
              echo '<li><a href="profile.php">Profile</a></li>';
            }
            ?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Discussion</a></li>
                <li><a href="#">Training Plans</a></li>
                <li><a href="#">Nutrition</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Routes</a></li>
              </ul>
            </li>
            <li><a href="#">About Us</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="running.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
        <!-- <form method="post" action="login.php" > -->
          <input type="text" id="login" class="fadeIn second" name="username" placeholder="User name"
            value="<?php
              if(!empty($username))
                $username;
            ?>"/>

          <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="
          <?php
          if(!empty($password))
            $password;
          ?>" />

          <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

      </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </div>
  </div>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>

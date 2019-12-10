<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Homepage</title>
   <link href="css/bootstrap.min.css" rel="stylesheet" />
   <script src="jquery-3.1.1.min.js"></script>
   <script src="js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="cssMain.css">

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
             <li class="active" ><a href="homepage.php">Home <span class="sr-only">(current)</span></a></li>
             <?php
             if(!isset($_SESSION["username"])){
               echo '<li><a href="Signin.php">Login</a></li>';
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

  <!-- Overlay image -->
  <div class="wrapper">
    <img src="run1.jpg">
    <div class="overlay">
      <div class="content">
        <h1>Welcome
          <?php
          if( isset( $_SESSION['username'] ) ) {
            echo $_SESSION['username'];
          }
        ?> to SafeRun!</h1>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <!-- Flip buttons -->
  <div class="container">
    </br>
    <div class="row">
      <div class="col-md-4">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-color: #8B1F41;">
              </br>
              </br>
              </br>
              </br>
              <h1 class="card-title">Upcoming Races</h1>
            </div>
            <div class="flip-card-back">
              <h1>Upcoming Races</h1>
              </br>
              </br>
              <p>There are tons of races that happen each year in the Blacksburg/Roanoke area.
                Perfect for all ages and levels!</p>
              </br>
              </br>
              <div class="card-footer">
                <a href="upcoming_races.php" class="btn btn-primary">Find a Race Here!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-color: #FFFFFF;">
              </br>
              </br>
              </br>
              </br>
              <h1 class="card-title">Find a Run</h1>
            </div>
            <div class="flip-card-back">
              <h1>Find a Run</h1>
              </br>
              </br>
              <p>Are you new to running and don't know where to start? Or are you an active running and training for your next race?
                You've come to the perfect spot! Find a run that suites you best here!</p>
              <div class="card-footer">
                <a href="#" class="btn btn-primary">Find a Run Here!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-color: #E87722;">
              </br>
              </br>
              </br>
              </br>
              <h1 class="card-title">Create a Run</h1>
            </div>
            <div class="flip-card-back">
              <h1>Create a Run</h1>
              </br>
              </br>
              <p class="card-text">Are you an active runner and are passionate about helping others achieve their goal?
                Create and lead a run! Or, if you are new to running and haven't found the perfect run, create one here!</p>
              <div class="card-footer">
                <a href="#" class="btn btn-primary">Create a run Here!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </br>

    <!-- Other Page Content  -->
    <div class="col-sm-4">
      <h2>About Safe Run</h2>
      <img id="aboutImage" src="running.png">
      <p>This site was created to encourage others to run and to run safely!</p>
      <h3>External Links</h3>
      <p>Here are some links that might helo you naivgate the site!</p>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="contactUs.php">Contact Us</a></li>
        <li><a href="#">Update Profile</a></li>
        <li><a href="d3_running.php">View Site Analytics</a></li>
      </ul>
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>
    <div class="col-sm-8">
      <h2>New Running Shoes</h2>
      <h5>Running Shoes, Dec 7, 2019</h5>
      <img id="aboutImage" src="UA.png">
      <p>Amazing new shoes</p>
      <p>Under Armour's new Charged Asset 8's is the perfect shoe for long runs. Thye are stable and help with balance. <a href="https://www.underarmour.com/en-us/ua-charged-assert-8/pid3021952-002">Shop Here!</a></p>
      <br>
      <h2>Running Clothes</h2>
      <h5>Running Clothes, Dec 10, 2019</h5>
      <img id="aboutImage" src="nike.jpg">
      <p>Awesome clothes!</p>
      <p> Nike has the newest and most innovative clothes on the market! <a href="https://www.nike.com/w/running-clothing-37v7jz6ymx6">Shop Here!</a></p>
      </br>
    </div>

    </br>

    <!-- Featured Run  -->
    <div class="row">
      </br>
      <div class="col-lg-6">
        <h2>This site can help you with all your running needs!</h2>
        <p>The site includes:</p>
        <ul>
          <li>
            <strong>Running Groups (create a run and join a run)</strong>
          </li>
          <li>Gallery</li>
          <li>Discussion, nutrition, and sketching pages</li>
          <li>Upcoming races page</li>
          <li>And much more!</li>
        </ul>
        <p>Please contact us if you have any issues! Also, on the about page, you are able to get the contact information of the founders of htis site!</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="run2.jpg">
      </div>
    </br>
    </br>
    </div>

    <!-- Testimonals  -->
  </br>
  </br>
  <h2><strong>Testimonials</strong></h2>
  <hr>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-image" style="background-image: url('emily.jpg');"></div>
          <div class="container-test">
            <h4><b>Emily McGarey</b></h4>
            <p><em>"</em>I have loved this site! I was able to meet a lot of other runners and it helped
              me improve my time!<em>"</em></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-image" style="background-image: url('georgia.jpg');"></div>
          <div class="container-test">
            <h4><b>Georgia Stierman</b></h4>
            <p><em>"</em>I have loved this site! I was able to meet a lot of other runners and it helped
              me improve my time!<em>"</em></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-image" style="background-image: url('Andrea.jpg');"></div>
          <div class="container-test">
            <h4><b>Andrea Tardif</b></h4>
            <p><em>"</em>I have loved this site! I was able to meet a lot of other runners and it helped
              me improve my time!<em>"</em></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>

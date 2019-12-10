<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Home </title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="cssMain.css">


  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

  <script>
  <script>
    var asyncRequest;
    function getContent(){
      var url = "running_Data.php";
        try{
          asyncRequest = new XMLHttpRequest();
          asyncRequest.onreadystatechange=stateChange;
          asyncRequest.open('GET',url,true);
          asyncRequest.send();
        }catch (exception) {alert("Request not found");}
    }

    function stateChange(){
      if(asyncRequest.readyState==4 && asyncRequest.status==200){
        document.getElementById("contentArea").innerHTML=
          asyncRequest.responseText;
      }
    }

    function clearPage(){
      document.getElementById("contentArea").innerHTML = "";
    }

    function init(){
      var x = document.getElementById("RunningLevel");
      x.addEventListener("mouseover", getContent);

      var y = document.getElementById("RunningLevel");
      y.addEventListener("mouseout", clearPage);
    }
    document.addEventListener("DOMContentLoaded", init);

    $(function(){
      $("#RunningLevel").change(function()
      {
        $.ajax(
          {
          url:"running_Data.php?id=" + $("#RunningLevel").val(),
          async:true,
          success: function(result)
          {
            $("#contentArea").html(result);
          }
        })
      })
    })
  </script>
</head>

<body>
  <!-- Nav Bar -->
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
          <li><a href="homepage.php">Home <span class="sr-only">(current)</span></a></li>
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
    </div>
  </nav>

    <form method="get" action="showData.php">
    <label> Choose a Running Level:
      <select name="RunningLevel" id="RunningLevel">
        <?php
          require_once("db.php");
          $sql = "select DISTINCT(RunningLevel) from profile order by RunningLevel";
          $result = $mydb->query($sql);
          while($row=mysqli_fetch_array($result)){
            echo "<option value='".$row["RunningLevel"]."'>".$row["RunningLevel"]."</option>";
          }

        ?>
      </select>
    </label>
    <br>
      <input type="submit" name="submit" value="Submit">
    </form>
      <script src="js/jquery-1.11.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <div id="contentArea">&nbsp;</div>
  </body>
</html>

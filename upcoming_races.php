<?php
    require_once("db.php");
    $RaceName="";
    $location="";
    $startTime="";
    $endTime="";
    $Date="";
    $RunningLevel="";
    $link = "";
    $error = false;

    if(isset($_POST["submit"])){
      if(isset($_POST["RaceName"])) $RaceName=$_POST["RaceName"];
      if(isset($_POST["Location"])) $location=$_POST["Location"];
      if(isset($_POST["StartTime"])) $startTime=$_POST["StartTime"];
      if(isset($_POST["EndTime"])) $endTime=$_POST["EndTime"];
      if(isset($_POST["Date"])) $Date=$_POST["Date"];
      if(isset($_POST["RunningLevel"])) $RunningLevel=$_POST["RunningLevel"];

      $sql = "insert into Race(RaceName, Location, StartTime, EndTime, Date, RunningLevel)
      values('$RaceName','$location', '$startTime', '$endTime', '$Date', '$RunningLevel')";

      $result=$mydb->query($sql);

      if ($result==1) {
        $msg = "<p>A new race has been created!</p>";
        }
      }elseif(isset($_POST["delete"])){
      if(isset($_POST["RaceName"])) $RaceName=$_POST["RaceName"];

      $sql = "DELETE FROM Race
      WHERE RaceName='$RaceName'";

      $result=$mydb->query($sql);

      if ($result==1) {
        $msg = "<p>A race has been deleted</p>";
      }
    }

    if(isset($_POST["modify"])){
      if(isset($_POST["RaceName"])) $RaceName=$_POST["RaceName"];
      if(isset($_POST["Location"])) $location=$_POST["Location"];
      if(isset($_POST["StartTime"])) $startTime=$_POST["StartTime"];
      if(isset($_POST["EndTime"])) $endTime=$_POST["EndTime"];
      if(isset($_POST["Date"])) $Date=$_POST["Date"];
      if(isset($_POST["RunningLevel"])) $RunningLevel=$_POST["RunningLevel"];

      $sql = "UPDATE Race
      SET Location='$location', StartTime='$startTime', EndTime='$endTime', Date='$Date', RunningLevel='$RunningLevel'
      WHERE RaceName='$Race'";
      $result=$mydb->query($sql);

      if ($result==1) {
        $msg = "<p>A race has been updated!</p>";
      }
    }
  ?>
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
  <script type="text/javascript">
  //function gets the difference from a future time and date and the current time and date
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



<div class="container-1">
  <h1 class="race_title">Upcoming Races</h1>
    <table border="2">
    <tr class="tableHeader">
      <th>Race Name</th>
      <th>Location</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Date</th>
      <th>RunningLevel</th>
    </tr>
<?php
//send query
$sql = "SELECT RaceName, Location, StartTime, EndTime, Date, RunningLevel
From Race";
$result = $mydb->query($sql);

//$result should be a result


while($row = mysqli_fetch_array($result)){
  echo "<tr>";
  echo "<td width='20%'>".$row["RaceName"]."</td>
  <td width='20%'>".$row["Location"]."</td>
  <td width='20%'>".$row["StartTime"]."</td>
  <td width='20%'>".$row["EndTime"]."</td>
  <td width='20%'>".$row["Date"]."</td>
  <td width='20%'>".$row["RunningLevel"]."</td><br />";
  echo "</tr>";
}
 ?>
</table>
</div>
<!-- insert race -->

  <div class="container-2">
    <div class="col-xs-6 col-md-4">
      <div class="row">
        <h1 class="race_title">Add a Race!</h1>
      <form class="formClass" action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
        <br>
        <div class="form-group">
          <label> Enter Race Name:
          <input type="text" name="RaceName" value="
          <?php if(!empty($RaceName)){
            echo $RaceName;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
          <label> Enter location:
          <input type="text" name="Location" value="
          <?php if(!empty($location)){
            echo $location;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
          <label> Enter Start Time:
          <input type="time" name="StartTime" value="
          <?php if(!empty($startTime)){
            echo $startTime;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
          <label> Enter End Time:
          <input type="time" name="EndTime" value="
          <?php if(!empty($endTime)){
            echo $endTime;
          }
          ?>">
          <br />
          </label>
        </div>

        <div class="form-group">
          <label> Choose Date of race:
          <input type="date" name="Date" value="
          <?php if(!empty($date)){
            echo $date;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
        <label> Choose a Running Level:
          <select name="RunningLevel" id="RunningLevel" value="<?php echo $RunningLevel; ?>">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
          </select>
        </label>
        </div>
        <br />
        <br />
        <input type="submit" name="submit" value="Submit" />
        <?php  echo ( $msg ); ?>
        <br />
        </div>
      </div>

<!-- delete race -->

          <div class="col-xs-6 col-md-4">
            <div class="row">
            <h1 class="race_title">Delete a Race!</h1>
            <form class="formClass" action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
              <br>
              <div class="form-group">
                <select name="RaceName" id="RaceName">
                <?php
                  require_once("db.php");
                  $sql = "select RaceName from Race order by RaceName";
                  $result = $mydb->query($sql);
                  while($row=mysqli_fetch_array($result)){
                    echo "<option value='".$row["RaceName"]."'>".$row["RaceName"]."</option>";
                  }

                ?>">
                <br>
                  </select>
                </label>
              </div>
              <br />
              <button type="submit" name="delete" value="Delete">Delete</button>
              <?php  echo ( $msg ); ?>
              <br />
      </form>
    </div>
  </div>

<!-- modify race -->

    <div class="col-xs-6 col-md-4">
      <div class="row">
        <h1 class="race_title">Update a Race!</h1>
      <form class="formClass" action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
        <br>
        <div class="form-group">
          <select name="RaceName" id="RaceName">
          <?php
            require_once("db.php");
            $sql = "select RaceName from Race order by RaceName";
            $result = $mydb->query($sql);
            while($row=mysqli_fetch_array($result)){
              echo "<option value='".$row["RaceName"]."'>".$row["RaceName"]."</option>";
            }

          ?>">
          <br>
            </select>
          </label>
        </div>

        <div class="form-group">
          <label> Enter location:
          <input type="text" name="Location" value="
          <?php if(!empty($location)){
            echo $location;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
          <label> Enter Start Time:
          <input type="time" name="StartTime" value="
          <?php if(!empty($startTime)){
            echo $startTime;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
          <label> Enter End Time:
          <input type="time" name="EndTime" value="
          <?php if(!empty($endTime)){
            echo $endTime;
          }
          ?>">
          <br />
          </label>
        </div>

        <div class="form-group">
          <label> Choose Date of race:
          <input type="date" name="Date" value="
          <?php if(!empty($date)){
            echo $date;
          }
          ?>">
          <br>
          </label>
        </div>

        <div class="form-group">
        <label> Choose a Running Level:
          <select name="RunningLevel" id="RunningLevel" value="<?php echo $RunningLevel; ?>">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
          </select>
        </label>
        </div>
        <br />
        <button type="submit" name="modify" value="Modify">Modify</button>
        <?php  echo ( $msg ); ?>
        <br />
</form>
</div>
</div>
</div>


</body>

</html>

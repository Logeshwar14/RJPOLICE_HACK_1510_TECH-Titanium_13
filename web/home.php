<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>WELCOME</title>

    <link rel="stylesheet" type="text/css" href="stylehome.css">

</head>
<header>
    <div class="container">
      <h1 class="logo"><img src="track2.png" style="float:left; height:30px"></h1>

      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="#">History</a></li>
          <li><a href="#">new event</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
     <h1 style="color:#55d6aa">Hello, <?php echo $_SESSION['name']; ?></h1>
     <div class="box" style="float:left">
		<p>Current event: SVCE HIGHWAYS</p>
		<p>No of officers: 3</p>
		<p>Event duration: 2 hours</p>
          <p><a href="track.php">view event</a></p>
     </div>



</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>

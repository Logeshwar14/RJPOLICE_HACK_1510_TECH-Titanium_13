<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style2.css">

</head>

<body>

     <form action="login.php" method="post">

        <h2><img src="logo.png" style="height:200px"></h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        

        <input type="text" name="uname" placeholder="User Name"><br>

        

        <input type="password" name="password" placeholder="Password"><br> 
        <center>    
        <button type="submit">Login</button>
        </center>    
     </form>

</body>

</html>
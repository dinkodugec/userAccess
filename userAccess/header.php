<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style type="text/css">
body {
  font-family: verdana;
  font-size: 13px;
}

header {
  height: 30px;
  padding: 10px;
  background-color: black;
  color: white;
}

header a {
  color: white;
  text-decoration: none;
}
</style>

<body>


  <header> <a href="home.php"> Home</a> . <a href="admin.php">Admin</a> . <a href="login.php"> Login </a>. <a
      href="signup.php"> Signup </a>. <a href="rec.php">
      Recepcionist </a> . <a href="acc.php"> Accountant </a> . <a href="logout.php"> Log out </a></header>

  <span><?php    

   /*   print_r($_SESSION); */
  
      if(isset($_SESSION['myname']))
      {
             echo "hi, " .  $_SESSION['myname'];
      }
  ?>


    <?php
  
    if( access ('ADMIN', false)): ?>

    <form action="" method="post">
      <select name="" id="">
        <option>User</option>
        <option>Accountant</option>
        <option>Rcepcionist</option>
        <option>Admin</option>
      </select>
    </form>

    <?php endif; ?>

  </span>
<?php
  session_start();
  //$_SESSION["fname"]=$_GET["fname"];
  extract($_GET);
  $_SESSION['username'] = $_GET['user'];
  $pass=$_GET['psw'];

  $link = pg_pconnect('host=localhost dbname=hospital_managment user=postgres password=12345');

  $result = pg_query($link, "select * from user_table where user_id='{$_SESSION['username']}'");

  $row = pg_fetch_assoc($result);

  $message = "YOU HAVE SUCCESFULLY LOGGED IN";

  //if(strcmp($_SESSION['username'],"admin")==0)
  
   if($pass==$row['u_password'])
  {
	 echo "<script type='text/javascript'>alert('$message');</script>";
	 header('Location: aptpage.html');
  }
  else
  {
	 echo "please enter valid password and id";
	 //header('Location: userlogin.html');	
  }
?>
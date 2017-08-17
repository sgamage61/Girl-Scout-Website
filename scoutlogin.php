<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <title>Girl Scout Website</title>
<head>
    <link rel="stylesheet" href="/girlscout.css" />
    <link rel="stylesheet" href="/scoutlogin.css" />
</head>
<body onLoad="slideA();">
<div class="banner">
    <div id="bannerimg"></div>
				<h1 align="center"><font size="35" color="#16A085" face="Verdana">Troop 1142</font></h1>
			</div>

<div class="menubar">
     <ul id="menu">
  <li><a href="firstpage.html" class="item">Welcome</a></li>
  <li><a href="aboutus.html" class="item">About Us</a></li>
  <li><a href="upcomingevents.html" class="item">Upcoming Events</a></li>
  <li><a href="scoutlogin.php" class="selected">Troop Member Login</a></li>
  <li><a href="join.php" class="item">Join</a></li>
</ul> 
</div>

<div class="login">
   <div id="logindesign">
    <h2 align="middle" class="loginhere">Login Here!</h2>
     <form method="post" action="scoutlogin.php">
            <font color="black" size="4" face="Garamond" class="email">Email Address:</font><br> <input type="text" name="email" class="parameters"><br><br>
            <font color="black" face="Garamond" size="4" class="password">Password:</font><br><input type="password" name="password" class="parameters"><br><br>
             <button type="submit" name="login" action="scoutlogin.php"class="btn">Sign In</button>
        </form>
     <br>
     <a href="join.php" class="create">Create Account</a><br><br>
     <a href="forgotpassword.php" class="create">Forgot Your Password?</a>
	 <br>
       <?php
       $con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
	 //$con=new mysqli('localhost','root','','Girlscouts');
    if(isset($_POST['login'])){
        $email= $_POST['email'];
        $_SESSION['email'] = $email;
        $pass= $_POST['password'];
		$error= "";
        
    $sql="SELECT * FROM ScoutInfo WHERE Email='$email'";
    $result = $con->query($sql);

    if($result->num_rows == 0){
    echo("The email and password you entered do not match our records. Please try again.");
    }else{
        $sql="SELECT * FROM ScoutInfo WHERE Email='$email'";
        $result= $con->query($sql);
		$correctpass = $result->fetch_assoc();
                $hash=hash("sha512",$pass);
		if($hash != $correctpass['Password']){
			echo("The password you entered is incorrect");
		}else{
			?>
		<script>
		window.location='loginpage.php';
	    </script>
			<?php
		}
    }
}
      ?> 
</div>
</div>
     

</body>
    </html>
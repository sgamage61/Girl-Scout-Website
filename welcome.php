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
  <li><a href="join.html" class="item">Join</a></li>
</ul> 
</div>

<div class="welcome">
<div id="welcomedesign">
	 <?php
     $con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
    if(isset($_POST['login'])){
        $email= $_POST['email'];
        $pass= $_POST['password'];
		$error= "";
		$sql="SELECT * FROM ScoutInfo WHERE Email='$email'";
		$result = $con->query($sql);
                if($result == NULL){
                echo "No account with the provided email exists. Please try again."
                }
		if($result->num_rows > 0){
			$error= "This email address is already in use. Please use another email to register.";
			echo $error;
		}
    if($error == ""){
        $sql="INSERT INTO ScoutInfo(Name,Rank,Email,Password) VALUES('$name','$rank','$email','$pass')";
		$con->query($sql);
    }
	unset($name);
	unset($email);
	unset($pass);
	unset($error);
	}


?>

</div>
</body>
</html>
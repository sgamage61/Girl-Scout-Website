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
  <li><a href="scoutlogin.php" class="item">Troop Member Login</a></li>
  <li><a href="join.php" class="selected">Join</a></li>
</ul> 
</div>

<div class="register">
   <div id="registerdesign">
    <h1 align="middle">Register Here!</h1><br>
		 <div id="errors">
		 <?php
     $con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
    if(isset($_POST['register'])){
        $name= $_POST['name'];
        $rank= $_POST['rank'];
        $email= $_POST['email'];
        $pass= $_POST['password'];
        $hash=hash("sha512",$pass);
        $securityq= $_POST['securityq'];
        $answer= $_POST['answer'];
	$error= "";
		
    
    if (empty($name)){
        $error="Name is required.\n";
		echo $error;
    }
     if (empty($rank)){
        $error="Rank is required.\n";
		echo $error;
    }
     if (empty($email)){
        $error="Email is required.\n";
		echo $error;
    }
     if (empty($pass)){
        $error="Password is required.\n";
		echo $error;
    }
     if (empty($securityq)){
        $error="Security Question is required.\n";
		echo $error;
    }
     if (empty($answer)){
        $error="Answer to Security Question is required.\n";
		echo $error;
    }
		$sql="SELECT * FROM ScoutInfo WHERE Email='$email'";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			$error= "This email address is already in use. Please use another email to register.";
			echo $error;
		}
    if($error == ""){
        $sql="INSERT INTO ScoutInfo(Name,Rank,Email,Password,Security_Question,Answer_Security_Question) VALUES('$name','$rank','$email','$hash','$securityq','$answer')";
		$con->query($sql);
    }
	unset($name);
	unset($email);
	unset($pass);
        unset($rank);
        unset($securityq);
        unset($answer);
	unset($error);
	}


?>
		 </div>
     <form method="post" action="join.php">
		
            <font color="black" size="4" face="Garamond" class="name">Name:</font><br> <input type="text" name="name" class="parameters"><br><br>
            <font color="black" face="Garamond" size="4" class="rank">Rank:</font><br><select name="rank" class="drop"> 
                 <option value="Daisy">Daisy(grades K-1,ages 5-7)</option>
				<option value="Brownie">Brownie(grades 2-3,ages 7-9)</option>
                <option value="Junior">Junior(grades 4-5,ages 9-11)</option>
                <option value="Cadette">Cadette(grades 6-8,ages 11-14)</option>
                <option value="Senior">Senior(grades 9-10,ages 14-16)</option>
                <option value="Ambassador">Ambassador(grades 11-12,ages 16-18)</option>
</select><br><br>
            <font color="black" face="Garamond" size="4" class="email">Email:</font><br><input type="text" name="email" class="parameters"><br><br>
            <font color="black" face="Garamond" size="4" class="password">Create Password:</font><br><input type="password" name="password" class="parameters"><br><br>
<font color="black" face="Garamond" size="4" class="securityq">Choose Security Question:</font><br><select name="securityq" class="drop"> 
                 <option value="Maiden">What is your mother's maiden name?</option>
		<option value="Middle">What is your father's middle name?</option>
                <option value="Hometown">What is your home town?</option>
                <option value="Movie">What is your favorite movie?</option>
                <option value="Sport">What is your favorite sport?</option>
                <option value="Food">What is your favorite food?</option>
</select><br><br>
           <font color="black" face="Garamond" size="4" class="password">Answer to Security Question:</font><br><input type="password" name="answer" class="parameters"><br><br>
             <button type="submit" name="register" action="join.php"class="btn">Create Account</button>
        </form>
     <br>
     <a href="scoutlogin.php" class="create">Already Have an Account? Login Here!</a>

</div>
</div>




</body>
    </html>
<!DOCTYPE html>
         <html>
        <title>Girl Scout Website</title>
<head>
    <link rel="stylesheet" href="/girlscout.css" />
    <link rel="stylesheet" href="/scoutlogin.css" />
</head>
<body><br><br>
<div class="forgot">
   <div id="forgotdesign">
   <form method="post" action="forgotpassword.php">
     <p class="forgotpassword"> Forgot Your Password? No worries! Simply type in your email and new <br> password you would like to use
and we can complete your request!</p><br>
            <font color="black" size="4" face="Garamond" class="email">Email Address:</font><br> <input type="text" name="email" class="resetfields"><br><br>
            <font color="black" face="Garamond" size="4" class="securityq">Select Corresponding Security Question:</font><br><select name="securityq" class="drop"> 
                 <option value="Maiden">What is your mother's maiden name?</option>
		<option value="Middle">What is your father's middle name?</option>
                <option value="Hometown">What is your home town?</option>
                <option value="Movie">What is your favorite movie?</option>
                <option value="Sport">What is your favorite sport?</option>
                <option value="Food">What is your favorite food?</option>
</select><br><br>
              <font color="black" face="Garamond" size="4" class="password">Answer to Security Question:</font><br><input type="password" name="answer" class="parameters"><br><br>
              <font color="black" face="Garamond" size="4" class="password">Create New Password:</font><br><input type="password" name="password1" class="resetfields"><br><br>
            <font color="black" face="Garamond" size="4" class="password">Confirm New Password:</font><br><input type="password" name="password2" class="resetfields"><br><br>
             <button type="submit" name="forgot" action="forgotpassword.php"class="btn">Reset</button>
        </form>
<?php
       $con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
	 //$con=new mysqli('localhost','root','','Girlscouts');
    if(isset($_POST['forgot'])){
        $email= $_POST['email'];
        $pass1= $_POST['password1'];
        $pass2= $_POST['password2'];
        $securityq=$_POST['securityq'];    
        $answer=$_POST['answer'];
        $sql="SELECT * FROM ScoutInfo WHERE Email='$email'";
        $result = $con->query($sql);
        if($result->num_rows == 0){
         echo("The email you entered is not contained in our records. Please try again.");
       }else{
         $correctanswer = $result->fetch_assoc();
         $correctanswer= $correctanswer['Answer_Security_Question'];
         if($answer != $correctanswer){
         echo ("Either the security question you selected or the answer you provided are incorrect. Please try  
         again.");
         }
         else if($pass1 != $pass2){
         echo("The two passwords you entered do not match. Please try again.");
         }
         else{
         $hash=hash("sha512",$pass1);
         $sqi="UPDATE ScoutInfo SET Password='$hash' WHERE Email='$email'";
         $con->query($sqi);
         echo("Your password has been successfully reset. Click below to proceed.");
         }
      }
  }
?><br><br>
<a href="scoutlogin.php" class="create">Redirect to Login</a>
</div>
</div>
</body>
         </html>
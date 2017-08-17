<!DOCTYPE html>

	    <?php
        $con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
    if(isset($_POST['login'])){
        $username= $_POST['username'];
        $pass= $_POST['password'];
		$error= "";
	}
        
        $sql="SELECT * FROM Leaders";
        $result=$con->query($sql);
        $output=$result->fetch_assoc();
        $correctuser=$output['username'];
        $correctpass=$output['password'];
	if($username === $correctuser && $pass === $correctpass){
		
      ?>
	  <script>
		window.location='firstpage.html';
	  </script>
	  <?php
	}else{
	?>
	<?php
	 echo "Access Denied";
	?>
	 <script>
		window.location='index.html';
	  </script>
	 <?php
	 echo "Access Denied";
	}
	?>
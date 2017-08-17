<?php
session_start();
$email= $_SESSION['email'];
?>
<!DOCTYPE html>
    <?php
    $con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
    $sql="SELECT Name FROM ScoutInfo WHERE Email='$email'";
    $result = $con->query($sql);
    $nameaccess = $result->fetch_assoc();
    $name = $nameaccess['Name'];
    echo "<h1 style='color:#16A085;font-family:Verdana;'>"."Hello ".$name."!"."</h1>";
    ?>
    <html>
        <head>
        <title>Girl Scout Website</title>
        <link rel="stylesheet" href="/logininfo.css" />
        </head>
        <br>
        <br>
         <form method="post" action="cookies.php">
        <button type="submit" name="login" action="cookies.php"class="btn">Check Your Cookie Sales!</button><br><br>
        <button type="submit" name="login" action="progress.php"class="btn">Check Your Progress!</button><br><br>
        <button type="submit" name="login" action="personal.php"class="btn">See Your Personal Information!</button>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>
<form method="post" action="logout.php">
<button type="submit" name="login" action="logout.php"class="btn">Logout</button><br>
</form>
       
    </html>
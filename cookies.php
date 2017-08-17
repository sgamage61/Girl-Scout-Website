<?php
session_start();
$email= $_SESSION['email'];
$con=new mysqli('localhost', 'id2206321_sgamage','deeli0601', 'id2206321_girlscouts');
$sql="SELECT ID,Name FROM ScoutInfo WHERE Email='$email'";
$result = $con->query($sql);
$output=$result->fetch_assoc();
$name=$output['Name'];
$id=$output['ID'];
echo "<h1 style='color:#16A085;font-family:Verdana;'>"."Hello ".$name."!"."</h1><br>";
$sql="SELECT * FROM CookieInfo,ScoutInfo WHERE ID=Scout_ID";
$result = $con->query($sql);
$output=$result->fetch_assoc();
$cookies_sold=$output['Cookies_Sold'];
$cookies_ordered=$output['Cookies_Ordered'];
$smores=$output['Smores'];
$thinmints=$output['Thin_Mints'];
$tagalongs=$output['Tagalongs'];
$samoas=$output['Samoas'];
$trefoils=$output['Trefoils'];
$dosidos=$output['Dosidos'];
$lemonades=$output['Lemonades'];
$smiles=$output['Smiles'];
$thanksalot=$output['Thanksalot'];
$tofeetastic=$output['Tofeetastic'];
$trios=$output['Trios'];
echo "Cookies Ordered: ".$cookies_ordered." cookies!<br>";
echo "Cookies Sold: ".$cookies_sold." cookies!<br>";
echo "Girl Scout S'mores Cookies Sold: ".$smores." cookies!<br>";
echo "Thin Mints Cookies Sold: ".$thinmints." cookies!<br>";
echo "Caramel deLites Cookies Sold: ".$tagalongs." cookies!<br>";
echo "Peanut Butter Patties Cookies Sold: ".$samoas." cookies!<br>";
echo "Shortbread/Trefoils Cookies Sold: ".$trefoils." cookies!<br>";
echo "Do-Si-Dos/Peanut Butter Sandwich Cookies Sold: ".$dosidos." cookies!<br>";
echo "Lemonade Cookies Sold: ".$lemonades." cookies!<br>";
echo "Savannah Smiles Cookies Sold: ".$smiles." cookies!<br>";
echo "Thanks-A-Lot Cookies Sold: ".$thanksalot." cookies!<br>";
echo "Tofee-tastic Cookies Sold: ".$tofeetastic." cookies!<br>";
echo "Trios Cookies Sold: ".$trios." cookies!<br>";
?>
<!DOCTYPE html>
<html>
<title>Girl Scout Website</title>
<head>
    <link rel="stylesheet" href="/logininfo.css" />
</head>
<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form method="post" action="loginpage.php">
<button type="submit" name="login" action="loginpage.php"class="btn">Back</button><br>
</form>
</body>
</html>
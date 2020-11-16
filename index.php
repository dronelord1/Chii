<?php

$link=mysqli_connect("localhost","root","");
$con = mysqli_select_db($link,"login");


session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style.css"><link href="bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="style.css"><link href="fontawesome/css/all.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>
<title>Dashboard</title>
</head>
<input type="checkbox" id="check">
<div class="content">


<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#div_refresh").load("index1.php");
setInterval(function() {
$("#div_refresh").load("index1.php");
}, 1000);
});
</script>
</head>
<body>
<div id="div_refresh"></div>
</body>
	
		
<?php

include("database_connect1.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($conn,"SELECT * FROM esptable2");//table select


		
   echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Prepaid Recharge/Control</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Amount</td> 
		<td>Power control</td>        
      </tr>  
		";

while($row = mysqli_fetch_array($result)) {

 	 echo "<tr class='success'>";	
	
	 echo "<tr class='success'>";	
	
    $column11 = "Amount";
	$unit_id = $row['id']; 
		
	echo "<td><form action= update_values.php method= 'post'>
  	<p>&#8358<input style='width: 20%;' type='number' name='value' value=$column11  size='100'>
  	<input type='hidden' name='unit' value=$unit_id ><input type='hidden' name='column' value=$column11 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='Pay'></P></form></td>";
	
    $unit_id = $row['id'];
	$X = $row['Amount'];
	$Y = 0.0323305401323322;
	$current_number = ($X * $Y);
	$T = $row['SENT_NUMBER_4'] ;
    $current_number_1 = $current_number - $T;
	$column111 = "RECEIVED_NUM1";  
	$current_number_sum = number_format($current_number_1, 2);
	if($current_number_sum <= 0){
    $label_received_number = "label-danger";
	}
	else{
    $label_received_number = "label-success";
	}
		$unit = 99999;
		$pass = 12345;
		               
              
	mysqli_query($conn,"UPDATE esptable2 SET RECEIVED_NUM1 = $current_number_sum WHERE id=$unit AND PASSWORD=$pass");
    $stm=$conn->prepare("UPDATE esptable2 set RECEIVED_NUM1 = '$current_number_sum' WHERE id=$unit AND PASSWORD=$pass");
    $stm->execute();  
           

    $column1 = "RECEIVED_BOOL1";
   	
    $current_bool_1 = $row['RECEIVED_BOOL1'];

	if($current_number_sum <= 0.02){
	$current_bool_1 == 0;
	$inv_current_bool_1 = 1;
	$text_current_bool_1 = "OFF";
	$color_current_bool_1 = "#e04141";
	}else{
	if($current_bool_1 == 1){
    $inv_current_bool_1 = 0;
	$text_current_bool_1 = "ON";
	$color_current_bool_1 = "#6ed829";
	}
	else{
    $inv_current_bool_1 = 1;
	$text_current_bool_1 = "OFF";
	$color_current_bool_1 = "#e04141";
	}
	}
	
	
	
	
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='hidden' name='value2' value=$current_bool_1   size='15' >	
	<input type='hidden' name='value' value=$inv_current_bool_1  size='15' >	
  	<input type='hidden' name='unit' value=$unit_id >
  	<input type='hidden' name='column' value=$column1 >
  	<input type= 'submit' name= 'change_but' style=' margin-left: 10%; margin-top: 0; font-size: 30px; text-align:center; background-color: $color_current_bool_1' value=$text_current_bool_1></form></td>";
	
    echo "</tr>
	  </tbody>";      
	
}

echo "</table>
<br>
<br>
<hr>";
		
?>


</div>	

	

<body>




<header>
<label for="check"><i class="fas fa-bars" id="sidebar_btn"></i></label>

<div class="left_area">
<h3>MALI<span>TECH</span></h3>
</div>
<div class="right_area">
 <center>
    <h0></h0>
    </center>
<script>
    $(document).ready(function(){  
        setInterval(function(){   
            $("h0").load("data.php");
        }, 1000);
    });
    </script>
</div>
</header>




<div class="sidebar">
<center>
<?php
$con = mysqli_connect('localhost', 'root', '', 'login');
$sql = "SELECT * FROM users where id = '$_SESSION[id]'";
$q = mysqli_query($con, $sql);
$result1 = $con->query($sql);
while($row = mysqli_fetch_assoc($result1)){
	echo "<img src='uploads/".$row['avatar']."' class='profile_image' alt=''>";
	}
?>
<h4><?php echo htmlspecialchars($_SESSION["username"]);?></h4>
</center>
<a href="welcome.php"><i class="fas fa-home"></i><span>Home</span></a>
<a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
<a href="contact_us.php"><i class="fa fa-phone"></i><span>Contact Us</span></a>
<a href="reset-password1.php"><i class="fas fa-key"></i><span>Reset Password</span></a>
<a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Sign Out</span></a>
</div>

</body>
</html>





















<?php

include("database_connect1.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
   
	


$result = mysqli_query($conn,"SELECT * FROM esptable2");//table select

	
echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Value Indicators</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Current(A) </td>
        <td>Voltage(V) </td>
        <td>Power(KW) </td>
		<td>Energy Consumed(KWh) </td>
		<td>Energy Left(KWh) </td>
      </tr>  
		";
		  

while($row = mysqli_fetch_array($result)) {

 	echo "<tr class='info'>";
    
	 $unit_id = $row['id'];
	 $current =  $row['SENT_NUMBER_1'];
	if($current > 0){
    $label_sent_number_1 = "label-success";
	}
	else{
      $label_sent_number_1 = "label-danger";
	};
	echo "<td><input type='hidden' name='value2' value=$current  size='15' >		
     	<input type='hidden' name='unit' value=$unit_id >
		<span class='label $label_sent_number_1' style=' margin-left: 0%; margin-top: 0; font-size: 35px; text-align:center';>"
		 . $current . "</td>
	    </span>";
	$voltage =  $row['SENT_NUMBER_2'];
	if($voltage >= 250){
    $label_sent_number_2 = "label-danger";
	}
	else{
    $label_sent_number_2 = "label-success";
	};
	echo "<td><input type='hidden' name='value2' value=$voltage  size='15' >		
     	<input type='hidden' name='unit' value=$unit_id >
		<span class='label $label_sent_number_2' style=' margin-left: 5%; margin-top: 0; font-size: 35px; text-align:center';>"
		 . $voltage . "</td>
	    </span>";
		 $power =  $row['SENT_NUMBER_3'];
	if($power > 0){
    $label_sent_number_3 = "label-success";
	}
	else{
      $label_sent_number_3 = "label-danger";
	};
	echo "<td><input type='hidden' name='value2' value=$power  size='15' >		
     	<input type='hidden' name='unit' value=$unit_id >
		<span class='label $label_sent_number_3' style=' margin-left: 10%; margin-top: 0; font-size: 35px; text-align:center';>"
		 . $power . "</td>
	    </span>";

		 $energy =  $row['SENT_NUMBER_4'];
	if($energy > 0){
    $label_sent_number_4 = "label-success";
	}
	else{
      $label_sent_number_4 = "label-danger";
	};
	echo "<td><input type='hidden' name='value2' value=$energy  size='15' >		
     	<input type='hidden' name='unit' value=$unit_id >
		<span class='label $label_sent_number_4' style=' margin-left: 30%; margin-top: 0; font-size: 35px; text-align:center';>"
		 . $energy . "</td>
	    </span>";

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
	};
		echo "<td><form action= update_values.php method= 'post'>
  	    <input type='hidden' name='value2' value=$current_number_sum  size='15' >		
     	<input type='hidden' name='unit' value=$unit_id >
    	<input type='hidden' name='column' value=$column111>
		<span class='label $label_received_number' style=' margin-left: 20%; margin-top: 0; font-size: 35px; text-align:center';>"
		 . $current_number_sum . "</td>
	    </span>";
		$unit = 99999;
		$pass = 12345;
		               
              

	echo "</tr>
	</tbody>"; 

	
}
echo "</table>
<br>
";
?>
		
<?php
include("database_connect1.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT * FROM esptable2");//table select

echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Phase Indicators</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Meter ID</td>
        <td>Red Phase Ind</td>
        <td>Yellow Phase Ind</td>
		<td>Blue Phase Ind</td>
      </tr>  
		";
	  
	
	
while($row = mysqli_fetch_array($result)) {

 	$cur_sent_bool_1 = $row['SENT_BOOL_1'];
	$cur_sent_bool_2 = $row['SENT_BOOL_2'];
	$cur_sent_bool_3 = $row['SENT_BOOL_3'];
	

	if($cur_sent_bool_1 == 1){
    $label_sent_bool_1 = "label-success";
	$text_sent_bool_1 = "Active";
	}
	else{
    $label_sent_bool_1 = "label-danger";
	$text_sent_bool_1 = "Inactive";
	}
	
	
	if($cur_sent_bool_2 == 1){
    $label_sent_bool_2 = "label-success";
	$text_sent_bool_2 = "Active";
	}
	else{
    $label_sent_bool_2 = "label-danger";
	$text_sent_bool_2 = "Inactive";
	}
	
	
	if($cur_sent_bool_3 == 1){
    $label_sent_bool_3 = "label-success";
	$text_sent_bool_3 = "Active";
	}
	else{
    $label_sent_bool_3 = "label-danger";
	$text_sent_bool_3 = "Inactive";
	}
	 
		
	  echo "<tr class='info'>";
	  $unit_id = $row['id'];
        echo "<td>" . $row['id'] . "</td>";	
		echo "<td>
		<span class='label $label_sent_bool_1'>"
			. $text_sent_bool_1 . "</td>
	    </span>";
		
		echo "<td>
		<span class='label $label_sent_bool_2'>"
			. $text_sent_bool_2 . "</td>
	    </span>";
		
		echo "<td>
		<span class='label $label_sent_bool_3'>"
			. $text_sent_bool_3 . "</td>
	    </span>";
	  echo "</tr>
	  </tbody>"; 
      

	
}
echo "</table>";
?>
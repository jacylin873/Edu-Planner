<?php 
	//Load connecter
	include_once('connect-mysql.php');
	
	//Setup query
	$query = "SELECT DISTINCT petType FROM pet ORDER BY petType";
	
	//Fetch the results
	$result = mysqli_query($dbconn, $query)
		or die("Couldn't execute query.");

	$tablecode = "<select name='petType'>";

	//Loop through the results to manage each row
	while ($row = mysqli_fetch_assoc($result))
	{
		$isSelected ="";
		if(isset($_GET['petType']) && $_GET['petType'] == $row['petType']){
			$isSelected ="selected";
		}
		$tablecode .= "<option value='".$row['petType']."'".$isSelected.">".$row['petType']."</option>\n";
	}

	$tablecode .= "</select>";

	echo ($tablecode);
?>







<?php 
	//Load connecter
	include_once('connect-mysql.php');

	//Setup query
	$query = "SELECT DISTINCT breed FROM pet WHERE petType = '".$petclass."' ORDER BY breed";
	//echo ($petclass."<br><br>");
	
	//Fetch the results
	$result = mysqli_query($dbconn, $query)
		or die("Couldn't execute query.");

	$tablecode = "<select name='breed'>";
	//Loop through the results to manage each row
	while ($row = mysqli_fetch_assoc($result))
	{
		$isSelected ="";
		if(isset($_GET['breed']) && $_GET['breed'] == $row['breed']){
			$isSelected ="selected";
		}
		$tablecode .= "<option value='".$row['breed']."'".$isSelected.">".$row['breed']."</option>\n";
	}
	$tablecode .= "</select>";

	echo ($tablecode);
?>







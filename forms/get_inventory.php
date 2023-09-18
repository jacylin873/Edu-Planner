<?php 
	//Load connecter
	include_once('../includes/connect-mysql.php');

	$query;
	//Setup query
	if(isset($_GET['breed'])){
		$query = "SELECT pet.*, pfood.* FROM pet LEFT JOIN  pfood ON pet.breed = pfood.breed WHERE pet.breed = '".$_GET['breed']."' ORDER BY pet.petName";
	}
	else if(isset($_GET['petType'])){
		$query = "SELECT pet.*, pfood.* FROM pet LEFT JOIN  pfood ON pet.petType = pfood.petType AND  pfood.breed = pet.breed WHERE pet.petType = '".$_GET['petType']."' ORDER BY pet.petName";
	}
	else{
		$query = "SELECT pet.*,pfood.* FROM pet LEFT JOIN  pfood ON pfood.breed = pet.breed ORDER BY pet.petType";
	}
	
	//Fetch the results
	$result = mysqli_query($dbconn, $query)
		or die("Couldn't execute query.");

	$tablecode = "<table border='1' name='pets'>";
	$tablecode .= "<tr><th>Pet Name</th><th>Pet Type</th><th>Pet Breed</th><th>Color</th><th>Description</th><th>Price</th><th>Food</th><th>Price</th></tr>";
	//Loop through the results to manage each row
	while ($row = mysqli_fetch_assoc($result))
	{
		$tablecode .= "<tr><th>".$row['petName']."</th><th>".$row['petType']."</th><th>".$row['breed']."</th><th>".$row['color']."</th><th>".$row['petDescription']."</th><th>".$row['price']."</th><th>".$row['food']."</th><th>".$row['cost']."</th></tr>";
	}
	$tablecode .= "</table>";

	echo ($tablecode);
?>
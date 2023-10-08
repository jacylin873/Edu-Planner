<?php

if(isset($_POST['submit'])){
		//$petclass = $_GET['petType'];
		//$petbreed = $_GET['breed'];
		
	//Load connecter
	include_once('connect-mysql.php');

	//Setup query
	$query = "INSERT INTO pet (petName, petType, petDescription, price, color, breed)
			VALUES ('".$_POST['n']."', '".$_POST['t']."', '".$_POST['d']."', '".$_POST['p']."', '".$_POST['c']."', '".$_POST['b']."')";


	if ($dbconn->query($query) === TRUE) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $query . "<br>" . $dbconn->error;
	}


	//Fetch the results
	//$result = mysqli_query($dbconn, $query)
	//	or die("Couldn't execute query.");


}

else{
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<label for="n">Name</label><br>
<input name="n" id="n" type="text"><br><br>
<label for="t">Type</label><br>
<input name="t" id="n"  type="text"><br><br>
<label for="p">Price</label><br>
<input name="p" id="p" type="text"><br><br>
<label for="c">Color</label><br>
<input name="c" id="c" type="text"><br><br>
<label for="b">Breed</label><br>
<input name="b" id="b" type="text"><br><br>

<br>
<label for="d">Description</label><br>
<textarea name="d" id="d" rows="10" cols="30">
The cat was playing in the garden.
</textarea>

	<br>
	<input type="submit" name="submit" value="Submit Form"><br>

</form>
<?php
}
?>
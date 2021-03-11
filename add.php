<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Pub</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
<div id="NavBarWrapper">
            <div id="LogoWrapper">
                <!-- a tag wraps the LOGO div to link back to home-->
                <a href="index.html">
                    <div class="Logo">
                        <!-- Image for logo goes here-->
                        <img class="LogoImg" src="images/BeerPic.png">
                    </div>
                </a>
             <!-- a tag wrapper END-->
            </div>
            <div class="NavBar">
                <div id="ButtonWrapper">
                     <div id="HomeButton" onclick="location.href='index.html'">
                        <h1 class="HomeButtonText">Home</h1>
                    </div>
                    <div id="PubsButton" onclick="location.href='pubs.php'">
                        <h1 class="PubsButtonText">Pubs</h1>
                    </div>
                    <div id="AboutButton" onclick="location.href='aboutUs.html'">
                        <h1 class="AboutButtonText">About Us</h1>
                    </div>
                </div>
            </div>
        </div>
<form method="POST">
	<a href="pubs.php">Back</a>
	<p>
		<label for="id">id</label>
		<input type="text" id="id" name="id">
	</p>
	<p>
		<label for="name">Pub Name</label>
		<input type="text" id="name" name="name">
	</p>
	<p>
		<label for="town">Town</label>
		<input type="text" id="town" name="town">
	</p>
	<p>
		<label for="county">County</label>
		<input type="text" id="county" name="county">
	</p>
	<p>
		<label for="toilets">Number Of Wheelchair Accessible Toilets</label>
		<input type="number" id="toilets" name="toilets">
	</p>
	<p>
		<label for="lift">Lift</label>
		<input type="number" id="lift" name="lift">
	</p>
	<input type="submit" name="save" value="Save">
</form>

<?php
	if(isset($_POST['save'])){
		//open the json file
		$data = file_get_contents('pubs.json');
		$data = json_decode($data);

		//data in out POST
		$input = array(
			'id' => $_POST['id'],
			'name' => $_POST['name'],
			'town' => $_POST['town'],
			'county' => $_POST['county'],
			'toilets' => $_POST['toilets'],
			'lift' => $_POST ['lift']
		);

		//append the input to our array
		$data[] = $input;
		//encode back to json
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('pubs.json', $data);

		header('location: index.php');
	}
?>
</body>
</html>
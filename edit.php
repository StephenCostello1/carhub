<?php
	//get the index from URL
	$index = $_GET['index'];

	//get json data
	$data = file_get_contents('pubs.json');
	$data_array = json_decode($data);

	//assign the data to selected index
	$row = $data_array[$index];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Pub</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
<div id="NavBarWrapper">
            <div id="LogoWrapper">
                <!-- a tag wraps the LOGO div to link back to home-->
                <a href="index.html">
                    <div class="Logo">
                        <!-- Image for logo goes here-->
                        <img class="LogoImg" src=" ">
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
		<input type="text" id="id" name="id" value="<?php echo $row->id; ?>">
	</p>
	<p>
		<label for="name">name</label>
		<input type="text" id="name" name="name" value="<?php echo $row->name; ?>">
	</p>
	<p>
		<label for="town">Town</label>
		<input type="text" id="town" name="town" value="<?php echo $row->town; ?>">
	</p>
	<p>
		<label for="county">County</label>
		<input type="text" id="county" name="county" value="<?php echo $row->county; ?>">
	</p>
	<p>
		<label for="toilets">Number Of Wheelchair Accessible Toilets</label>
		<input type="number" id="toilets" name="toilets" value="<?php echo $row->toilets; ?>">
	</p>
	<input type="submit" name="save" value="Save">
</form>

<?php
	if(isset($_POST['save'])){
		//set the updated values
		$input = array(
			'id' => $_POST['id'],
			'name' => $_POST['name'],
			'town' => $_POST['town'],
			'county' => $_POST['county'],
			'toilets' => $_POST['toilets']
		);

		//update the selected index
		$data_array[$index] = $input;

		//encode back to json
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('pubs.json', $data);

		header('location: index.php');
	}
?>
</body>
</html>
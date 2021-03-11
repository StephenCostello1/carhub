<?php
//connet to the wheelchairfriendlypubs database
$connect = mysqli_connect("localhost", "root", "", "wheelchairfriendlypubs");

if(!$connect){
	echo "<script type='text/javascript'>";
	echo "alert('Failed to connect to database!');";
	echo  "</script>";
}
else {
//call pubs.json 
$filename = "pubs.json";

//get contents of pubs.json
$data = file_get_contents($filename);

//decode contents of the array
$array = json_decode($data, true);

//insert data into mysql
foreach($array as $row) 
{
	$sql = "INSERT INTO pubs(id, name, town,
	county, toilets, lift) VALUES ('".$row["id"]."','".$row["name"]."', '".$row["town"]."', '".$row["county"]."', '".$row["toilets"]."', '".$row["lift"]."')";
	
	mysqli_query($connect, $sql);

}

//confirm data has been successfully inserted
echo "<script type='text/javascript'>";
echo "alert('Data Inserted');";
echo  "</script>";
}
?>
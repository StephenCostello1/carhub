<!DOCTYPE html>
<html>
    <head>
        <title>Home </title>
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="search.css">
    </head>
    <body>
	
        <!--Nav Bar Start -->
        <div id="NavBarWrapper">
            <div id="LogoWrapper">
                <!-- a tag wraps the LOGO div to link back to home-->
                <a href="index.html">
                    <div class="Logo">
                        <!-- Image for logo goes here-->
                        <img class="LogoImg" src="../images/BeerPic.png">
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
        <!--Nav Bar END-->
        
        <!-- Body Wrapper Default  !INCLUDE IN ALL PAGES!-->
        <div id="BodyWrapper">
            <div class="DocBody">
                <!-- INSERT NEW CODE HERE ! TREAT THIS AS THE NEW BODY !-->
			
		
		
<table border="1"style="top:15%;">
	<thead>
		<th>ID</th>
		<th>Pub Name</th>
		<th>Town</th>
		<th>County</th>
		<th>Number Of Wheelchair Accessible Toilets</th>
		<th>Lift</th>
		<th>Update</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php
			//fetch data from json
			$data = file_get_contents('pubs.json');
			//decode into php array
			$data = json_decode($data);
			
			//create counter to count rows of data
			$index = 0;
			
			//insert data from json into table on pubs page
			foreach($data as $row){
				echo "
					<tr>
						<td>".$row->id."</td>
						<td>".$row->name."</td>
						<td>".$row->town."</td>
						<td>".$row->county."</td>
						<td>".$row->toilets."</td>
						<td>".$row->lift."</td>
						<!-- Edit button -->
						<td>
							<a href='edit.php?index=".$index."'>Edit</a>
						</td>
						<!-- Delete button -->
						<td>
							<a href='delete.php?index=".$index."'>Delete</a>
						</td>				
						
					</tr>
				";
				//add 1 to counter to stop adding data
				$index++;
			}
		?>
		<button style="position:relative;top:79%;margin-right:1%;"input="button" onclick="location.href='connect_json_to_mysql.php'">Add to DB</button>
        <button style="position:relative;top:79%;"input="button" onclick="location.href='add.php'">Add New Pub</button>
	</tbody>
</table>     
        
			</div>
        </div>
        <!--BODY WRAPPER END-->
    </body>
</html>
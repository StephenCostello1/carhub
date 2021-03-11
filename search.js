
var file = "pubs.json";
var searchText = document.getElementById("SearchBar");
var JSONFile;



function LoadJSON()
{
	//alert("Button pressed");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.overrideMimeType("application/json");
	
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
			//alert("ready state triggered");
            JSONFile = JSON.parse(this.responseText);
            searchText = searchText.value;
            myFunction(JSONFile);
        }
    }
    xmlhttp.open("GET", file, false);
    xmlhttp.send();
}
function myFunction(JSONFile) 
{
	//alert("Parse function triggered");
    var parsedJSON = JSONFile;
    
    for(var i=0;i<parsedJSON.length;i++)
    {
        if(searchText.toLowerCase() == parsedJSON[i].county.toLowerCase())
        {
            document.getElementById("sResults").style.border = "2px solid black";
            document.getElementById("sResults").innerHTML += parsedJSON[i].name + ", " + parsedJSON[i].county + "<br>Wheel Chair Accessible lift = " + parsedJSON[i].lift + "<br><br>" ;
        }
        else if(searchText == parsedJSON[i].id)
        {
            document.getElementById("sResults").style.border = "2px solid black";
            document.getElementById("sResults").innerHTML += "Id =" + parsedJSON[i].id + "<br>" + parsedJSON[i].name + ", " + parsedJSON[i].county + "<br>Wheel Chair Accessible lift = " + parsedJSON[i].lift + "<br><br>" ;
        }
        else if(searchText.toLowerCase() == parsedJSON[i].town.toLowerCase())
        {
            document.getElementById("sResults").style.border = "2px solid black";
            document.getElementById("sResults").innerHTML += parsedJSON[i].name + ", " + parsedJSON[i].county + "<br>Wheel Chair Accessible lift = " + parsedJSON[i].lift + "<br><br>" ;
        }
        else if(searchText.toLowerCase() == parsedJSON[i].name.toLowerCase())
        {
            document.getElementById("sResults").style.border = "2px solid black";
            document.getElementById("sResults").innerHTML += parsedJSON[i].name + ", " + parsedJSON[i].county + "<br>Wheel Chair Accessible lift = " + parsedJSON[i].lift + "<br><br>" ;
        }
    }
}
function remove()
{
    document.getElementById("SearchBar").setAttribute("value","");
}
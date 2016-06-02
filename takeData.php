<html>
<head>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","CC1120_Device.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<?php
//For CC1120 Change data
$servername = "localhost";
$username = "root";
$password = "satunol10";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM CC1120_Main";
$result  = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	$ID[$Element] = $row["ID"];
	$Name[$Element] = $row["Name"];
	$Type[$Element] = $row["Type"];
	if ( $Type[$Element] == "Selected")
	{
	$Selected = $Name[$Element];
	echo "<script> showUser(". $Selected . "); </script>";
	}
	$Element++;
    }
}
$Max_CC1120 = $Element;
?> 
<form>
<select name="users" onchange="showUser(this.value)">
  
<?php
echo "<option value='" . $Selected . "'>Selected " . $Selected . "</option>";
$Element = 0;
while ( $Element < $Max_CC1120 )
{
    if ($ID[$Element] != 0)
    {
	echo "<option value='" . $ID[$Element] . "'>" . $ID[$Element] . ", " . $Name[$Element] . ", " . $Type[$Element] . "</option>";
    }
	$Element++;
}
?>
  </select>
<div id="txtHint"><b>Person info will be listed here...</b></div>
</form>
<br>


</body>
</html>

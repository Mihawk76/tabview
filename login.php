<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
session_start();
// define variables and set to empty values
$id_temp = $pass_temp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id_temp = test_input($_POST["id_temp"]);
   $pass_temp = test_input($_POST["pass_temp"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr>
        <td>Id: </td><td><input type="text" name="id_temp"
value=""></td></tr>
<tr>
<td>Password: </td><td><input type="password" name="pass_temp"
value=""></td></tr>
</table>
<input type="submit" name="submit" value="Submit">
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "satunol10";
$dbname = "testdb";
$id;
$password;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connectioni
if ($id_temp == "")
        {
        $eror_id="Id belum dimasukkan<BR>";
        }
if ($pass_temp == "")
        {
        $eror_pass="Password belum dimasukkan<BR>";
        }
		
$id_temp = stripslashes($id_temp);
$pass_temp = stripslashes($pass_temp);
/**
$id_temp = mysql_real_escape_string($id_temp);
$pass_temp = mysql_real_escape_string($pass_temp);
*/
$sql = "SELECT password FROM id_password WHERE id='$id_temp'";
$result = $conn->query($sql);
// if ($result->num_rows > 0) {
    // output data of each row
 //   while($row = $result->fetch_assoc()) {
        $row = $result->fetch_assoc();
        $password = $row["password"];
if ($pass_temp != $password)
{
	$eror_pass="Password salah<BR>";
}
else if ($pass_temp === $password)
{

    echo "Login Sukses";
    echo "<br>id temp is " . $id_temp;
    $_SESSION['login_user']=$id_temp;
    echo "<br>Session is " . $_SESSION['login_user'] . "<br>";
    //session_register("login_user");
    header("location: tabview.php");
}
echo $eror_id . " " . $eror_pass . " id input " . $id_temp . " pass input " . $pass_temp . " pass database " . $password;
if ($conn->query($sql) === TRUE) {
    echo "Login Sukses";
    session_register("myusername");
    session_register("mypassword"); 
    header("location: http://192.168.0.104/tabview/tabview.php");
} else {
    echo "" . $conn->error;
}

$conn->close();
?>
</body>
</html>


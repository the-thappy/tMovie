<?php	include './db.php'; 
///$user = htmlspecialchars(mysql_real_escape_string($_POST["user"]));
$user = $_POST["user"];
//$pass = htmlspecialchars(mysql_real_escape_string($_POST["pass"]));
$pass = $_POST["pass"];
$query = "SELECT user, pass FROM user WHERE user = '" . $user . "' AND pass = '" . $pass ."';";
$res = $db->query($query);
while ($row = $res->fetch_assoc()) {
	if ($user == $row["user"] && $pass == $row["pass"]) {
			session_start();
			$_SESSION["user"] = $user;
		}
}
header("Location: ../index.php?loggedin=1");
?>

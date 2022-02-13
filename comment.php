<?php
include("auth_session.php");
include("db.php");
function setComments($con) {
	if(isset($_POST['commentSubmit'])) {
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
		$result = $con->query($sql);
	}
}

function getComments($con) {
	$sql = "SELECT * FROM comments";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		echo "<div class='comment-box'><textbox><p>";
			echo $row['uid']."<br>";
			echo $row['date']."<br>";
			echo $row['message'];
		echo "</p></div></textbox>";
	}
	
}

// function filterComment($con) {
// 	$email = $_SESSION['email'];
// 	$sql = "SELECT * FROM comments where uid=$email;"
// 	$result = $con->query($sql);

// 	while ($row = $result->fetch_assoc()) {
// 		echo "<div class='comment-box'><textbox><p>";
// 			echo $row['uid']."<br>";
// 			echo $row['date']."<br>";
// 			echo $row['message'];
// 		echo "</p></div></textbox>";
// 	}
// }

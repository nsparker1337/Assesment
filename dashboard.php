<?php
date_default_timezone_set('Asia/Kolkata');
//include auth_session.php file on all user panel pages to avoid unauthorized access.
include("auth_session.php");
include("db.php");
include("comment.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="./images/comments.ico">
    <title>Dashboard - Comment Box</title>
    <link rel="stylesheet" href="style2.css" />
</head>
<?php
    echo "<div class='container'>
        <label for='email'>Email:$_SESSION[email]</label>
        <form method='POST' action='".setComments($con)."'>
        <input type='hidden' name='uid' value='$_SESSION[email]'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea id='subject'name='message' placeholder='Write something...' style='height:200px'></textarea>
        <input type='submit' name='commentSubmit' value='Submit'>&nbsp&nbsp<a href='logout.php'>Log Out</a>
    </form></div>"; 
?>
<?php
    echo "<input type='filter' name='filterComment' value='filter'>";
        getComments($con);
?>
</html>

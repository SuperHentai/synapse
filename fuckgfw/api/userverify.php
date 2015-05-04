<?php
include("../dbConn.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $usernameBase = $_POST['username'];
    $passwdBase = $_POST['passwd'];
    $username = base64_decode($usernameBase);
    $passwd = base64_decode($passwdBase);
    $sql = sprintf("select count(*) from users where username='%s' and password='%s'",mysql_real_escape_string($username),mysql_real_escape_string($passwd));
    $rawResult = mysql_query($sql,dbConn());
    $num = mysql_fetch_array($rawResult);
    if($num[0]==1){

    }
}
?>

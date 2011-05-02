<?php

session_start();

$username=strtolower($_POST['username']);
$password=$_POST['password'];
if (!isset($_POST['error']) && empty($_POST['error'])) {
    $_POST['error'] = 0;
}

if($username && $password) {

    $connect = mysql_connect("localhost", "root", "")
        or die("Error connecting with the server!");
    mysql_select_db("hw4db")
        or die("Database not found!");

    $query = mysql_query("
             SELECT username, password
             FROM men
             WHERE username='$username'
             UNION
             SELECT username, password
             FROM women
             WHERE username='$username'
        ");

    $numrows= mysql_num_rows($query);



    $_SESSION['name']=$dbname;
    if ($numrows != 0) {

        while($row = mysql_fetch_assoc($query)) {
            $dbusername=$row['username'];
            $dbpassword=$row['password'];
        }

        $name_query = mysql_query("
        SELECT name
             FROM men
             WHERE username='$dbusername'
             UNION
             SELECT name
             FROM women
             WHERE username='$dbusername'
            ");

        $name_rows = mysql_num_rows($name_query);

        if ($name_rows != 0) {
            while($name_row = mysql_fetch_assoc($name_query)) {
                $dbname = $name_row['name'];
            }
        }

        $_SESSION['name'] = $dbname;

        if ($username==$dbusername && md5($password)==$dbpassword) {
            $_SESSION['username']=$dbusername;

            header("Location: user_profile.php");

        } else {
            header("Location: index.php?error=1");
        }

    } else {
        header("Location: index.php?error=2");
    }

} else {
    header("Location: index.php?error=3");
}

?>

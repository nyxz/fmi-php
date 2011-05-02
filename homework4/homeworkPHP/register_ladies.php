<?php
session_start();
if (isset($_POST['submit'])) {
    if (isset($_POST['username'], $_POST['password'], $_POST['password_rep'],
        $_POST['name'], $_POST['chest'], $_POST['height'], $_POST['legs'])
        && !empty($_POST['name']) && !empty($_POST['username'])
        && !empty($_POST['password']) && !empty($_POST['password_rep'])
        && !empty($_POST['chest']) && !empty($_POST['height']) && !empty($_POST['legs'])) {

        $submit = $_POST['submit'];
        $username = strtolower(strip_tags($_POST['username']));
        $password = strip_tags($_POST['password']);
        $password_rep = strip_tags($_POST['password_rep']);
        $name = strip_tags($_POST['name']);
        $chest = strip_tags($_POST['chest']);
        $height = strip_tags($_POST['height']);
        $legs = strip_tags($_POST['legs']);
        $hair = $_POST['hair'];
        $eyes = $_POST['eyes'];

        //db open
        $connect = mysql_connect("localhost", "root", "")
            or die("Error connecting with the server!");
        mysql_select_db("hw4db") or die("Database not found!");

        //user availability check
        $namecheck = mysql_query("
                SELECT username
                FROM women
                WHERE username='$username'
                UNION
                SELECT username
                FROM men
                WHERE username='$username'
            ");
        $count = mysql_num_rows($namecheck);

        if($count!=0) {
            header("Location: index.php?werr=1");
        }

        if ($password == $password_rep) {
            if (is_numeric($height)!=TRUE || is_numeric($chest)!=TRUE || is_numeric($legs)!=TRUE) {
                header("Location: index.php?werr=2");

            }  else if (strlen($username) > 30 || strlen($name) > 50) {
                    header("Location: index.php?werr=3");

                } else {
                    if (strlen($password) > 30 || strlen($password) < 6) {
                        header("Location: index.php?werr=4");

                    } else {

                    //password encrypting
                        $password = md5($password);
                        $password_rep = md5($password_rep);

                        mysql_query('set names utf8', $connect);

                        $queryreg = mysql_query("
                        INSERT INTO women(username, password, name, chest, height, hair, eyes, legs)
                        VALUES ('$username', '$password', '$name', '$chest', '$height', '$hair', '$eyes', '$legs' );  
                            ");
                        header('Location: index.php?succ=1');

                    }
                }
        }else {
            header("Location: index.php?werr=5");
        }
    } else {
        header("Location: index.php?werr=6");
    }
}

?>


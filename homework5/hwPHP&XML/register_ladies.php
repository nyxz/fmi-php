<?php
session_start();

$womenFilename = 'women.xml';

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

                        $womenFile = new DOMDocument();
                        $womenFile->load($womenFilename);
                        
                        $root = $womenFile->firstChild;
                        $lady = $womenFile->createElement('lady');
                        $root->appendChild($lady);
                        
                        $usernamexml = $womenFile->createElement('username');
                        $usernamexml->appendChild($womenFile->createTextNode($username));
                        $lady->appendChild($usernamexml);
                        
                        $passxml = $womenFile->createElement('password');
                        $passxml->appendChild($womenFile->createTextNode($password));
                        $lady->appendChild($passxml);
                        
                        $namexml = $womenFile->createElement('name');
                        $namexml->appendChild($womenFile->createTextNode($name));
                        $lady->appendChild($namexml);
                        
                        $chestxml = $womenFile->createElement('chest');
                        $chestxml->appendChild($womenFile->createTextNode($chest));
                        $lady->appendChild($chestxml);
                        
                        $heighttxml = $womenFile->createElement('height');
                        $heighttxml->appendChild($womenFile->createTextNode($height));
                        $lady->appendChild($heighttxml);
                        
                        $hairxml = $womenFile->createElement('hair');
                        $hairxml->appendChild($womenFile->createTextNode($hair));
                        $lady->appendChild($hairxml);
                        
                        $eyesxml = $womenFile->createElement('eyes');
                        $eyesxml->appendChild($womenFile->createTextNode($eyes));
                        $lady->appendChild($eyesxml);

                        $legsxml = $womenFile->createElement('legs');
                        $legsxml->appendChild($womenFile->createTextNode($legs));
                        $lady->appendChild($legsxml);

                        $womenFile->save('women.xml');
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


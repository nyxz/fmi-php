<?php

session_start();

$menFilename = 'men.xml';

if (isset($_POST['submit'])) {
    if (isset( $_POST['username'], $_POST['password'], $_POST['password_rep'],
        $_POST['name'], $_POST['salary'], $_POST['height'])
        && !empty($_POST['name']) && !empty($_POST['username'])
        && !empty($_POST['password']) && !empty($_POST['password_rep'])
        && !empty($_POST['salary']) && !empty($_POST['height'])) {

        $submit = $_POST['submit'];
        $username = strtolower(strip_tags($_POST['username']));
        $password = strip_tags($_POST['password']);
        $password_rep = strip_tags($_POST['password_rep']);
        $name = strip_tags($_POST['name']);
        $salary = strip_tags($_POST['salary']);
        $height = strip_tags($_POST['height']);

        if (isset($_POST['owner_of']) && !empty($_POST['owner_of'])) {
            $owner_of= serialize($_POST['owner_of']);
        } else {
            $owner_of = "";
        }

        //db open
        $connect = mysql_connect("localhost", "root", "")
            or die("Error connecting with the server!");
        mysql_select_db("hw4db") or die("Database not found!");

        //user availability check
        $namecheck = mysql_query("
                SELECT username
                FROM men
                WHERE username='$username'
                UNION
                SELECT username
                FROM women
                WHERE username='$username'
            ");

        $count = mysql_num_rows($namecheck);

        if($count!=0) {

            header("Location: index.php?menerr=1");
        }

        if ($password == $password_rep) {
            if (is_numeric($height)!=TRUE || is_numeric($salary)!=TRUE) {

                header("Location: index.php?menerr=2");

            } else if (strlen($username) > 30 || strlen($name) > 50) {

                    header("Location: index.php?menerr=3");

                } else if (strlen($password) > 30 || strlen($password) < 6) {

                        header("Location: index.php?menerr=4");
                    } else {

                    //password encrypting
                        $password = md5($password);
                        $password_rep = md5($password_rep);


                        $menFile = new DOMDocument();
                        $menFile->load($menFilename);
                        
                        $root = $menFile->firstChild;
                        $gman = $menFile->createElement('gentlemen');
                        $root->appendChild($gman);
                        
                        $usernamexml = $menFile->createElement('username');
                        $usernamexml->appendChild($menFile->createTextNode($username));
                        $gman->appendChild($usernamexml);
                        
                        $passxml = $menFile->createElement('password');
                        $passxml->appendChild($menFile->createTextNode($password));
                        $gman->appendChild($passxml);
                        
                        $namexml = $menFile->createElement('name');
                        $namexml->appendChild($menFile->createTextNode($name));
                        $gman->appendChild($namexml);
                        
                        $salaryxml = $menFile->createElement('salary');
                        $salaryxml->appendChild($menFile->createTextNode($salary));
                        $gman->appendChild($salaryxml);
                        
                        $owner_of_xml = $menFile->createElement('owner_of');
                        $owner_of_xml->appendChild($menFile->createTextNode($owner_of));
                        $gman->appendChild($owner_of_xml);
                        
                        $heightxml = $menFile->createElement('height');
                        $heightxml->appendChild($menFile->createTextNode($height));
                        $gman->appendChild($heightxml);

                        $menFile->save('men.xml');
                        header('Location: index.php?succ=1');
                    }


        } else {
            header("Location: index.php?menerr=5");
        }
    } else {
        header("Location: index.php?menerr=6");

    }
}
?>
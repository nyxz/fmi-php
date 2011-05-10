<?php

session_start();

$my_check = 0;
$menFilename = 'men.xml';
$womenFilename = 'women.xml';

$username = strtolower($_POST['username']);
$password = $_POST['password'];


if ($username && $password) {
    $menDoc = new DOMDocument();
    $menDoc->load($menFilename) or die('No file loaded');

    $menUnameList = $menDoc->getElementsByTagName('username');


    for ($i = 0; $i < $menUnameList->length; $i++) {

        $user = $menUnameList->item($i)->nodeValue;
        if ($user == $username) {
            $menDocPass = new DOMDocument();
            $menDocPass->load($menFilename);
            $menPassList = $menDocPass->getElementsByTagName('password');
            $mPass = $menPassList->item($i)->nodeValue;
            $my_check = 1;
            if ($mPass == md5($password)) {
                $maleName = new DOMDocument();
                $maleName->load($menFilename);

                $menNameList = $maleName->getElementsByTagName('name');
                $name = $menNameList->item($i)->nodeValue;
                $_SESSION['name'] = $name;
                header("Location: user_profile.php");
            } else {
                header("Location: index.php?error=1");
            }
        }
    }


    $womenDoc = new DOMDocument();
    $womenDoc->load($womenFilename);

    $womenUnameList = $womenDoc->getElementsByTagName('username');

    for ($i = 0; $i < $womenUnameList->length; $i++) {
        $user = $womenUnameList->item($i)->nodeValue;
        if ($user == $username) {
            $womenPass = new DOMDocument();
            $womenPass->load($womenFilename);
            $womenPassList = $womenPass->getElementsByTagName('password');
            $wPass = $womenPassList->item($i)->nodeValue;
            $my_check = 1;
            if ($wPass == md5($password)) {
                $fimaleName = new DOMDocument();
                $fimaleName->load($womenFilename);

                $womenNameList = $fimaleName->getElementsByTagName('name');
                $name = $womenNameList->item($i)->nodeValue;
                $_SESSION['name'] = $name;
                header("Location: user_profile.php");
            } else {
                header("Location: index.php?error=1");
            }
        }
    }
    if ($my_check == 0) {
        header("Location: index.php?error=2");
    }
} else {
    header("Location: index.php?error=3");
}
?>

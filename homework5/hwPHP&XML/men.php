<?php
$doc = new DOMDocument();
$doc->load( 'men.xml' );

$men = $doc->getElementsByTagName( "man" );
foreach( $men as $man ) {
    $ids = $man->getElementsByTagName( "id" );
    $id = $names->item(0)->nodeValue;

    $usernames= $man->getElementsByTagName( "username" );
    $username= $sernames->item(0)->nodeValue;

    $passwords = $man->getElementsByTagName( "password" );
    $password = $passwords->item(0)->nodeValue;

    $names= $man->getElementsByTagName( "name" );
    $name= $names->item(0)->nodeValue;

    $salaries= $man->getElementsByTagName( "salary" );
    $salary= $salaries->item(0)->nodeValue;

    $owner_ofs= $man->getElementsByTagName( "owner_of" );
    $owner_of= $owner_ofs->item(0)->nodeValue;

    $heights= $man->getElementsByTagName( "height" );
    $height= $heights->item(0)->nodeValue;

    echo "<b>$name - $password - $salary\n</b><br>";
} 
?>

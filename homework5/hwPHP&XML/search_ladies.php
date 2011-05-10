<?php
session_start();
if (!isset($_GET['women_search']) && empty($_GET['women_search'])) {
    $_GET['women_search'] = 0;
}

$womenFilename = 'women.xml';
$result = -1;
$title = $_SESSION['name'] . " in the house";
$rows = 0;
if (isset($_GET['submit'])) {
    if (isset($_GET['height_from'], $_GET['height_to'], $_GET['chest'], $_GET['legs']) &&
            !empty($_GET['height_from']) && !empty($_GET['height_to']) &&
            !empty($_GET['chest']) && !empty($_GET['legs'])) {

        $submit = $_GET['submit'];
        $height_from = $_GET['height_from'];
        $height_to = $_GET['height_to'];
        $hair = $_GET['hair'];
        $chest = $_GET['chest'];
        $legs = $_GET['legs'];
        $eyes = $_GET['eyes'];


        if (is_numeric($height_from) != TRUE || is_numeric($height_to) != TRUE
                || is_numeric($chest) != TRUE || is_numeric($legs) != TRUE) {

            header('Location:user_profile.php?women_search=2');
        } else {

            $searchFile = new DOMDocument();
            $searchFile->load($womenFilename);
            $listOfladies = $searchFile->getElementsByTagName('lady');
            $result = 1;
        }
    } else {
        header('Location:user_profile.php?women_search=1');
    }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <div id="body_cont">
            <div id="header">
                <div id="result">
                    <table>
                        <tr>
                            <td><h3><a href="user_profile.php"> <?php echo '<< Back'?> </a></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <h2>Your search result...</h2>

                            </td>
                        </tr>
                    </table>




                </div>

            </div>

            <div id="content">
                <?php
                if ($result == 1) {
                    echo
                    "<table id=\"table\" align='center' cellspacing='0' border='1' class='results'>
                    <tr>
                        <th id=\"column\">Username</th>
                        <th id=\"column\">Name</th>
                        <th id=\"column\">Height</th>
                        <th id=\"column\">Hair color</th>
                        <th id=\"column\">Chest measure</th>
                        <th id=\"column\">Legs length</th>
                        <th id=\"column\">Eyes</th>
                    </tr>";
                    foreach ($listOfladies as $lady) {

                        $usrname = $lady->getElementsByTagName('username');
                        $usrnameValue = $usrname->item(0)->nodeValue;

                        $nm = $lady->getElementsByTagName('name');
                        $nmValue = $nm->item(0)->nodeValue;

                        $hght = $lady->getElementsByTagName('height');
                        $hghtValue = $hght->item(0)->nodeValue;

                        $hr = $lady->getElementsByTagName('hair');
                        $hairValue = $hr->item(0)->nodeValue;

                        $chst = $lady->getElementsByTagName('chest');
                        $chstValue = $chst->item(0)->nodeValue;

                        $lgs = $lady->getElementsByTagName('legs');
                        $lgsValue = $lgs->item(0)->nodeValue;

                        $eyesxml = $lady->getElementsByTagName('eyes');
                        $eyesValue = $eyesxml->item(0)->nodeValue;

                        if ($height_from <= $hghtValue
                                && $height_to >= $hghtValue
                                && $chstValue >= $chest
                                && $lgsValue >= $legs
                                && $hairValue == $hair
                                && $eyesValue == $eyes) {


                            echo '<tr>' .
                            '<td>' . $usrnameValue . '</td>' .
                            '<td>' . $nmValue . '</td>' .
                            '<td>' . $hghtValue . '</td>' .
                            '<td>' . $hairValue . '</td>' .
                            '<td>' . $chstValue . '</td>' .
                            '<td>' . $lgsValue . '</td>' .
                            '<td>' . $eyesValue . '</td>' .
                            '</tr>';
                        }
                    }
                }
                
                ?>

            </div>

        </div>
    </body>
</html>

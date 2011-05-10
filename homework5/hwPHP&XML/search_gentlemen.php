<?php
session_start();
if (!isset($_GET['men_search']) && empty($_GET['men_search'])) {
    $_GET['men_search'] = 0;
}

$menFilename = 'men.xml';
$result = -1;
$title = $_SESSION['name'] . " in the house";
if (isset($_GET['submit'])) {
    if (isset($_GET['height_from'], $_GET['height_to'], $_GET['salary']) &&
            !empty($_GET['height_from']) && !empty($_GET['height_to']) &&
            !empty($_GET['salary'])) {

        $submit = $_GET['submit'];
        $height_from = $_GET['height_from'];
        $height_to = $_GET['height_to'];
        $salary = $_GET['salary'];

        if (isset($_GET['owns']) && !empty($_GET['owns'])) {
            $owner_of = serialize($_GET['owns']);
        } else {
            $owner_of = "";
        }

        if (is_numeric($height_from) != TRUE || is_numeric($height_to) != TRUE || is_numeric($salary) != TRUE) {

            header('Location:user_profile.php?men_search=2');
        } else {

            $searchFile = new DOMDocument();
            $searchFile->load($menFilename);
            $listOfgentlemen = $searchFile->getElementsByTagName('gentlemen');
            $result = 1;
        }
    } else {

        header('Location:user_profile.php?men_search=1');
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
                            <td><h3><a href="user_profile.php"> << Back </a></h3></td>
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
                            <th id=\"column\">Salary</th>
                            <th id=\"column\">Owns</th>
                    
                <tr>";

                    foreach ($listOfgentlemen as $lstG) {

                        $usrname = $lstG->getElementsByTagName('username');
                        $usrnameValue = $usrname->item(0)->nodeValue;

                        $nm = $lstG->getElementsByTagName('name');
                        $nmValue = $nm->item(0)->nodeValue;

                        $hght = $lstG->getElementsByTagName('height');
                        $hghtValue = $hght->item(0)->nodeValue;

                        $slry = $lstG->getElementsByTagName('salary');
                        $slryValue = $slry->item(0)->nodeValue;

                        $own = $lstG->getElementsByTagName('owner_of');
                        $ownValue = $own->item(0)->nodeValue;

                        if ($height_from <= $hghtValue
                                && $height_to >= $hghtValue
                                && $slry >= $salary
                                && $ownValue == $owner_of) {

                            $ownVal = "";
                            if ($ownValue != "") {
                                $ownValue = unserialize($ownValue);
                                foreach ($ownValue as $v) {
                                    $ownVal .= " $v";
                                }
                                echo
                                '<tr>' .
                                '<td>' . $usrnameValue . '</td>' .
                                '<td>' . $nmValue . '</td>' .
                                '<td>' . $hghtValue . '</td>' .
                                '<td>' . $nmValue . '</td>' .
                                '<td>' . $ownVal . '</td>' .
                                '</tr>';
                            }
                        }
                    }

                    echo '</table>';
                }
                ?>

            </div>
        </div>
    </body>    
</html>

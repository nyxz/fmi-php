<?php
session_start();
if (!isset($_GET['women_search']) && empty($_GET['women_search'])) {
    $_GET['women_search'] = 0;
}

$title = $_SESSION['username']." in the house";
$rows=0;
if(isset ($_GET['submit'])) {
    if(isset ($_GET['height_from'], $_GET['height_to'], $_GET['chest'], $_GET['legs']) &&
        !empty($_GET['height_from']) && !empty($_GET['height_to']) &&
        !empty($_GET['chest']) && !empty($_GET['legs'])) {

        $submit = $_GET['submit'];
        $height_from = $_GET['height_from'];
        $height_to = $_GET['height_to'];
        $hair = $_GET['hair'];
        $chest = $_GET['chest'];
        $legs = $_GET['legs'];
        $eyes = $_GET['eyes'];

        //db open
        $connect = mysql_connect("localhost", "root", "")
            or die("Error connecting with the server!");
        mysql_select_db("hw4db")
            or die("Database not found!");

        if (is_numeric($height_from)!=TRUE || is_numeric($height_to)!=TRUE
            || is_numeric($chest)!=TRUE || is_numeric($legs)!=TRUE) {

            header('Location:user_profile.php?women_search=2');

        } else {

            mysql_query('set names utf8', $connect);

            $querysearch=mysql_query("
                    SELECT username, name, height, hair, chest, legs, eyes
                    FROM Women
                    WHERE hair='$hair' 
                                        AND chest>='$chest'
                    AND legs>='$legs' 
					AND height BETWEEN '$height_from' AND '$height_to'
                    AND eyes='$eyes'
                ");

            if (isset($querysearch) && !empty ($querysearch)) {
                $rows = mysql_num_rows($querysearch);
            } else {
                $rows=0;
            }

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
                            <td><h3><a href="user_profile.php"> << Back </a></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if($rows==0) {
                                    echo '<h2>No match found!</h2>';
                                } else if($rows==1) {
                                        echo'<h2>1 match found</h2>';
                                    }else {
                                        echo "$rows ".'matches found';
                                    }
                                ?>

                            </td>
                        </tr>
                    </table>




                </div>

            </div>

            <div id="content">
                <?php
                if ($rows>0) {
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
                    while ($row = mysql_fetch_assoc($querysearch)) {
                        $username1 = $row['username'];
                        $name1 = $row['name'];
                        $height1 = $row['height'];
                        $hair1 = $row['hair'];
                        $chest1 = $row['chest'];
                        $legs1 = $row['legs'];
                        $eyes1 = $row['eyes'];

                        echo '<tr>'.
                            '<td>'.$username1.'</td>'.
                            '<td>'.$name1.'</td>'.
                            '<td>'.$height1.'</td>'.
                            '<td>'.$hair1.'</td>'.
                            '<td>'.$chest1.'</td>'.
                            '<td>'.$legs1.'</td>'.
                            '<td>'.$eyes1.'</td>'.
                            '</tr>';

                    }
                }
                ?>

            </div>

        </div>
    </body>
</html>

<?php
session_start();
if (!isset($_GET['men_search']) && empty($_GET['men_search'])) {
    $_GET['men_search'] = 0;
}

$title = $_SESSION['username']." in the house";
$rows=0;
if(isset ($_GET['submit'])) {
    if(isset ($_GET['height_from'], $_GET['height_to'], $_GET['salary']) &&
        !empty($_GET['height_from']) && !empty($_GET['height_to']) &&
        !empty($_GET['salary'])) {

        $submit = $_GET['submit'];
        $height_from = $_GET['height_from'];
        $height_to = $_GET['height_to'];
        $salary = $_GET['salary'];

        if (isset($_GET['owns']) && !empty($_GET['owns'])) {
            $owner_of= serialize($_GET['owns']);
        } else {
            $owner_of = "";
        }

        //db open
        $connect = mysql_connect("localhost", "root", "")
            or die("Error connecting with the server!");
        mysql_select_db("hw4db")
            or die("Database not found!");

        if (is_numeric($height_from)!=TRUE || is_numeric($height_to)!=TRUE || is_numeric($salary)!=TRUE) {

        //sssssssssssssssssssssssssssssssssssssssssssss
            header('Location:user_profile.php?men_search=2');
        } else {

            mysql_query('set names utf8', $connect);

            $querysearch=mysql_query("
                    SELECT username, name, height, salary, owner_of
                    FROM Men
                    WHERE salary>='$salary'
                    AND owner_of like '%$owner_of%'
					AND height BETWEEN '$height_from' AND '$height_to'
                ");

            if (isset($querysearch) && !empty ($querysearch)) {
                $rows = mysql_num_rows($querysearch);
            } else {
                $rows=0;
            }

        }
    } else {

        header('Location:user_profile.php?men_search=1');

        echo "Fill all fields";
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
                                        echo '<h2>'."$rows ".'matches found'.'<h2>';
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
                            <th id=\"column\">Salary</th>
                            <th id=\"column\">Owns</th>
                    
                <tr>";
                    while ($row = mysql_fetch_assoc($querysearch)) {
                        $username1 = $row['username'];
                        $name1 = $row['name'];
                        $height1 = $row['height'];
                        $salary1 = $row['salary'];
                        $owner_of2="";
                        $owner_of1= $row['owner_of'];
                        if ($owner_of1!="") {
                            $owner_of2="";
                            $owner_of1 = unserialize($owner_of1);
                            foreach($owner_of1 as $v) {
                                $owner_of2.= " $v";
                            }
                        }


                        echo '<tr>'.
                            '<td>'.$username1.'</td>'.
                            '<td>'.$name1.'</td>'.
                            '<td>'.$height1.'</td>'.
                            '<td>'.$salary1.'</td>'.
                            '<td>'.$owner_of2.'</td>'.
                            '</tr>';

                    }

                    echo '</table>';
                }
                ?>

            </div>
        </div>
    </body>    
</html>

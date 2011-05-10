<?php session_start();

if (!isset($_GET['men_search']) && empty($_GET['men_search'])) {
    $_GET['men_search'] = 0;
}
if (!isset($_GET['women_search']) && empty($_GET['women_search'])) {
    $_GET['women_search'] = 0;
}


$title = $_SESSION['name']." in the house";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <div id="body_cont">
            <div id="header">
                <div id="welcome">
                    <?php
                    if($_SESSION['name']) {
                        echo "<h1>Welcome, ".$_SESSION['name']."!</h1>";
                        echo "<br/>";
                        ?>
                </div>
                <div id="logout_button">
                    <a href='logout.php'>Logout</a>
                </div>
            </div>
            <div id="content">
                <div id="women">
                    <h2>Woman Finder</h2>

                    <?php
                    if($_GET['women_search'] == 1) {
                        echo '<h3>'.'Fill all fields'.'</h3>';
                    } else if ($_GET['women_search'] == 2) {
                        echo "<h3>Invalid input! Try again!</h3>";
                    }
                    ?>
                    <form action="search_ladies.php" method="GET" class="finder">
                        <table>
                            <tr>
                                <td>
                                    Height:
                                </td>
                                <td>
                                    Between:<input type="text" name="height_from" size="5" maxlength="3">&nbsp
                                    and<input type="text" name="height_to" size="5" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Min chest measurement (cm):
                                </td>
                                <td>
                                    <input type="text" name="chest" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Min legs length (cm):
                                </td>
                                <td>
                                    <input type="text" name="legs" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hair color:
                                </td>
                                <td>
                                    <select name="hair">
                                        <option value="black">black</option>
                                        <option value="white">white</option>
                                        <option value="brown">brown</option>
                                        <option value="blond">blond</option>
                                        <option value="red">red</option>
                                        <option value="pink">orange</option>
                                        <option value="pink">pink</option>
                                        <option value="blue">blue</option>
                                        <option value="green">green</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>
				Eyes color:  
                                </td>
                                <td>
                                    <select name="eyes">
                                        <option value="brown">brown</option>
                                        <option value="green">green</option>
                                        <option value="blue">blue</option>
                                    </select>
                                </td>
                            </tr>


                        </table>
                        <input type="submit" name="submit" value="Search">
                    </form>
                </div>

                <div id="men">
                    <h2>Man Finder</h2>
                    <?php
                    if($_GET['men_search'] == 1) {
                        echo '<h3>'.'Fill all fields'.'</h3>';
                    } else if ($_GET['men_search'] == 2) {
                        echo "<h3>Invalid input! Try again!</h3>";
                    }
                    ?>
                    <form action="search_gentlemen.php" method="GET" class="finder">
                        <table>
                            <tr>
                                <td>
                                    Height (cm):
                                </td>
                                <td>
                                    Between:<input type="text" name="height_from" size="5" maxlength="3">&nbsp
                                    and <input type="text" name="height_to" size="5" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Min salary(EURO):
                                </td>
                                <td>
                                    <input type="text" name="salary">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Owns:
                                </td>
                                <td>
                                    Car<input type="checkbox" name="owns[]" value="car" />
                                    Villa<input type="checkbox" name="owns[]" value="villa" />
                                    Yacht<input type="checkbox" name="owns[]" value="yacht" />
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="submit" value="Search">
                    </form>


                    <?php

                    } else {
                        die("You must be logged in!");
                    }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

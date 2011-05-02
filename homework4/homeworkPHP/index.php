<!DOCTYPE html>
<?php
session_start();
if (!isset($_GET['error']) && empty($_GET['error'])) {
    $_GET['error'] = 0;
}
if (!isset($_GET['menerr']) && empty($_GET['menerr'])) {
    $_GET['menerr'] = 0;
}
if (!isset($_GET['werr']) && empty($_GET['werr'])) {
    $_GET['werr'] = 0;
}
if (!isset($_GET['succ']) && empty($_GET['succ'])) {
    $_GET['succ'] = 0;
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <title>Find your perfect match</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>
    <body>
        <div id="body_cont">
            <div id="header">

                <div id="log_error">
                    <table>
                        <tr>
                            <th><h1>Welcome!</h1></th>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if ($_GET['succ']==1) {

                                    echo "Registration successful! You can login now!";
                                }
                                if ($_GET['error'] == 3) {
                                    echo 'Please enter username and password!';
                                }
                                else if($_GET['error'] == 2) {
                                        echo '<h3>No such user in the database!</h3>';
                                    }
                                    else if($_GET['error'] == 1) {
                                            echo '<h3>Wrong password</h3>';
                                        }
                                ?>

                            </td>
                        </tr>
                    </table>
                </div>

                <div id="login">

                    <form action="login.php" method="POST">

                        <table id="login">
                            <tr>
                                <td>Username:</td><td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>Password:</td><td><input type="password" name="password"></td>
                            </tr>
                            <tr>
                                <td></td><td><input type="submit" value="Log in"></td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
            <div id="content">
                <div id="women">
                    <h1>Lady</h1>
                    <?php
                    if ($_GET['werr'] == 1) {
                        echo '<h2>'."Username already taken. Please choose other username!".'</h2>';
                    } else if ($_GET['werr'] == 2) {
                            echo '<h2>'."Invalid input for height, chest measurement or legs length!".'</h2>';
                        } else if ($_GET['werr'] == 3) {
                                echo '<h2>'."Invalid username of name! Please try again!".'</h2>';
                            } else if ($_GET['werr'] == 4) {
                                    echo '<h2>'."Invalid password length!Please try again!".'</h2>';
                                } else if ($_GET['werr'] == 5) {
                                        echo '<h2>'."Passwords don't match!".'</h2>';
                                    } else if ($_GET['werr'] == 6) {
                                            echo '<h2>'."Please fill all fields!".'</h2>';
                                        }
                    ?>
                    <form action="register_ladies.php" method="POST">
                        <table class="regform">
                            <tr>
                                <td>
								Username (up to 30 symbols):  
                                </td>
                                <td>
                                    <input type="text" name="username" >
                                </td>
                            </tr>
                            <tr>
                                <td>
								Password (between 6 and 30 symbols):  
                                </td>
                                <td>
                                    <input type="password" name="password">
                                </td>
                            </tr>
                            <tr>
                                <td>
								Repeat password:  
                                </td>
                                <td>
                                    <input type="password" name="password_rep">
                                </td>
                            </tr>
                            <tr>
                                <td>
								Name (up to 50 symbols):	
                                </td>
                                <td>
                                    <input type="text" name="name" >
                                </td>
                            </tr>
                            <tr>
                                <td>
								Chest measurement (cm):  
                                </td>
                                <td>
                                    <input type="text" name="chest" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td>
								Height (cm):  
                                </td>
                                <td>
                                    <input type="text" name="height" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td>
								Leg length (cm):  
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

                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Register">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div id="men">
                    <h1>Gentleman</h1>
                    <?php
                    if ($_GET['menerr'] == 1) {
                        echo '<h2>'."Username already taken. Please choose other username!".'</h2>';
                    } else if ($_GET['menerr'] == 2) {
                            echo '<h2>'."Invalid salary or height!".'</h2>';
                        } else if ($_GET['menerr'] == 3) {
                                echo '<h2>'."Invalid username or name! Please try again!".'</h2>';
                            } else if ($_GET['menerr'] == 4) {
                                    echo '<h2>'."Invalid password length!".'</h2>';
                                } else if ($_GET['menerr'] == 5) {
                                        echo '<h2>'."Passwords don't match!".'</h2>';
                                    } else if ($_GET['menerr'] == 6) {
                                            echo '<h2>'."Please fill all fields!".'</h2>';
                                        }
                    ?>
                    <form action="register_gentlemen.php" method="POST">
                        <table class="regform">

                            <tr>
                                <td>
								Username (up to 30 symbols):  
                                </td>
                                <td>
                                    <input type="text" name="username" >
                                </td>
                            </tr>
                            <tr>
                                <td>
								Password (between 6 and 30 symbols):  
                                </td>
                                <td>
                                    <input type="password" name="password">
                                </td>
                            </tr>
                            <tr>
                                <td>
								Repeat password:  
                                </td>
                                <td>
                                    <input type="password" name="password_rep">
                                </td>
                            </tr>
                            <tr>
                                <td>
								Name (up to 50 symbols):  
                                </td>
                                <td>
                                    <input type="text" name="name" >
                                </td>
                            </tr>
                            <tr>
                                <td>
								Salary (euro):  
                                </td>
                                <td>
                                    <input type="text" name="salary">
                                </td>
                            </tr>
                            <tr>
                                <td>
								You own?:  
                                </td>
                                <td>
                                    <p>
								Car<input type="checkbox" name="owner_of[]" value="car" />
								Villa<input type="checkbox" name="owner_of[]" value="villa" />
								Yacht<input type="checkbox" name="owner_of[]" value="yacht" />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
								Height (cm):  
                                </td>
                                <td>
                                    <input type="text" name="height" maxlength="3">
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Register">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>


            </div>
        </div>
    </body>
</html>
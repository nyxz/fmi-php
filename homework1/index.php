<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once("functions.php");

        $csv = "one,two,three,four,one,four";
        $result = parseUniqueCSV($csv);
        parseUniqueCSV($csv);
        var_dump($result);

        echo '<br><br><br>';

        //array(4) {
        //  [0]=>
        //  string(3) "one"
        //  [1]=>
        //  string(3) "two"
        //  [2]=>
        //  string(5) "three"
        //  [3]=>
        //  string(4) "four"
        //}

        $sent = "I love eating cookies late at night";
        $replaceMap = array("love" => "hate", "cookies" => "waffles", " " => "_");

        $replaced = replace($sent, $replaceMap);
        var_dump($replaced); // "I_hate_eating_waffles_late_at_night";
        echo '<br><br><br>';

        $arrayOfFiles = array("image1.jpg", "image2.jpg", "song1.mp3");
        $result = extensions($arrayOfFiles);
        var_dump($result);
        //array(3) {
        //  ["image1"]=>
        //  string(3) "jpg"
        //  ["image2"]=>
        //  string(3) "jpg"
        //  ["song1"]=>
        //  string(3) "mp3"
        echo '<br><br><br>';

        $alphabet = array("a", "b", "c", "d", "$", "#");
        $length = 4;
        $pass = password($alphabet, 4);
        echo $pass; // "bc$#";
        ?>
    </body>
</html>

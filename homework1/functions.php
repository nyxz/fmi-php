<?php

// $csvString - низ, във формат Comma Separated Value
// функцията Parse-ва низа, като го разделя по запетайките
// и връща уникалните елементи
// input - "rado,vlado,rado,vlado"
// output - масив, който съдържа уникалните елементи [rado, vlado]

function parseUniqueCSV($csvString) {
    $strWithoutSpaces = str_replace(' ', '', $csvString);
    $newArr = explode(',', $strWithoutSpaces);

    return array_unique($newArr);
}

// $string - низ, например някакво изречение.
// $replaceMap - асоциативен масив от вида $key=>$value
// $key и $value са низове.
// функцията замества всяко срещане на $key в $string с $value
// input - "Python is cool", ["Python" => "PHP", "cool" => "cooler"]
// output - "PHP is cooler"
// 1
function replace($string, $replaceMap) {
    foreach ($replaceMap as $k => $v) {
        $string = str_replace($k, $v, $string);
    }
    return $string;
}

// 2
function replace2($string, $replaceMap) {
    $key = array_keys($replaceMap);
    $value = array_values($replaceMap);
    return str_replace($key, $value, $string);
}

// $arrayOfFiles - масив от низове, които представляват име на файл
// функцията трябва да върне асоциативен масив, където
// $key е името на файла, а $value е разширението му
// input - ["omg.jpg", "wtf.mp3", "asd.txt"]
// output - ["omg" => "jpg", "wtf" => "mp3", "asd" => "txt"]
function extensions($arrayOfFiles) {

    $strWithoutSpaces = str_replace(' ', '', $arrayOfFiles);

    $key = array();
    $val = array();

    foreach ($arrayOfFiles as $v) {

        $arr = explode('.', $v);

        array_push($key, $arr[0]);
        array_push($val, $arr[1]);
    }
    $result = array_combine($key, $val);

    return $result;
}

// $alphabet - масив от букви
// $length - дължината на генерираната парола
// функцията трябва да генерира парола
// със случайни числа от $alphabet
// и дължина $length
// input - password(array("a","b","c","d","$","#"),  4)
// output - "d$#a" (може да има повторения)
function password($alphabet, $length) {
    for ($i = 0; $i < $length; $i++) {
        $pass .= $alphabet[rand(0, count($alphabet)-1)];
    }

    return $pass;
}

?>
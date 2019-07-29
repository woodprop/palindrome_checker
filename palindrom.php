<?php
$strToCheck = 'Аргентина манита';     //Исходная строка
$string = mb_strtolower(preg_replace('/\s+/', '', $strToCheck));   //Удаляем пробелы


if (isPalindrome($string)) {
    echo $strToCheck;
}
else {
    $res = getSubPalindrome($string) or $res = mb_substr($string, 0, 1);
    echo $res;
}


function getSubPalindrome($str) {
    $len = mb_strlen($str);

    for ($l = $len - 1; $l >= 2; $l--) {
        for ($s = 0; $s <= ($len - $l); $s++) {
            $subStr = mb_substr($str, $s, $l);
            if (isPalindrome($subStr)) return $subStr;
        }
    }
    return false;
}


function isPalindrome($str) {
    if ($str == mb_strrev($str)) {
        return true;
    }
    return false;
}


function mb_strrev($str) {
    $strRev = "";
    for($i = mb_strlen($str, "UTF-8"); $i >= 0; $i--) {
        $strRev .= mb_substr($str, $i, 1, "UTF-8");
    }
    return $strRev;
}

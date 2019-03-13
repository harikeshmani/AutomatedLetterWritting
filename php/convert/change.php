<?php 
function utf8_to_unicode($str) {
$unicode = array();
$values = array();
$lookingFor = 1;
for ($i = 0; $i < strlen($str); $i++) {
    $thisValue = ord($str[$i]);
    if ($thisValue < 128) {
        $number = dechex($thisValue);
        $unicode[] = (strlen($number) == 1) ? '%u000' . $number : "%u00" . $number;
    } else {
        if (count($values) == 0)
            $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
        $values[] = $thisValue;
        if (count($values) == $lookingFor) {
            $number = ( $lookingFor == 3 ) ?
                    ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ) :
                    ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64
                    );
            $number = dechex($number);
            $unicode[] =
                    (strlen($number) == 3) ? "%u0" . $number : "%u" . $number;
            $values = array();
            $lookingFor = 1;
        } // if
    } // if
}
return implode("", $unicode);
}
?>
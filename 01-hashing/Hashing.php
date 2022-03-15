<?php

class Hashing
{
    protected static int $LBLower = 96;//Lower Boundary Lower Case
    protected static int $UBLower = 123; //Upper Boundary Lower Case
    protected static int $middleLower = 109; //Middle lower case
    protected static int $LBUpper = 64; //Lower Boundary Upper Case
    protected static int $UBUpper = 91; //Upper Boundary Upper Case
    protected static int $middleUpper = 77; //Middle upper case
    protected static int $shift = 12; //Number of spaces the letter shifts left or right accorting to the Ascii

    public function __construct()
    {
    }

    public function encrypt($givenWord): string
    {

        $array = str_split(string: $givenWord, length: 1);                //Split the string into an array of letters
        for ($i = 0; $i < strlen($givenWord); $i++) {
            $letter = $array[$i];
            if (ord($letter) > self::$LBLower and ord($letter) < self::$UBLower) {  //if the letter is a lower case proceed
                if (ord($letter) < self::$middleLower) {                               // if the letter is in the first half, add 12 to its ascii value
                    $array[$i] = chr(ord($letter) + self::$shift);
                } else {
                    $array[$i] = chr(ord($letter) - self::$shift);                              // if it is in the second half, subtract 12 from it
                }
            }
            if (ord($letter) > self::$LBUpper and ord($letter) < self::$UBUpper) {
                if (ord($letter) < self::$middleUpper) {
                    $array[$i] = chr(ord($letter) + self::$shift);
                } else {
                    $array[$i] = chr(ord($letter) - self::$shift);
                }
            }
        }

        return join($array);
    }

    public function decrypt($cypher): string
    {

        $array = str_split(string: $cypher, length: 1);
        for ($i = 0; $i < strlen($cypher); $i++) {
            $letter = $array[$i];
            if (ord($letter) > self::$LBLower and ord($letter) < self::$UBLower) {
                if (ord($letter) < self::$middleLower) {
                    $array[$i] = chr(ord($letter) + self::$shift);
                } else {
                    $array[$i] = chr(ord($letter) - self::$shift);
                }
            }
            if (ord($letter) > self::$LBUpper and ord($letter) < self::$UBUpper) {
                if (ord($letter) < self::$middleUpper) {
                    $array[$i] = chr(ord($letter) + self::$shift);
                } else {
                    $array[$i] = chr(ord($letter) - self::$shift);
                }
            }
        }

        return join($array);
    }
}




<?php

class Encrypting{

    private $givenWord;
    private $result;

    public function __construct($givenWord){
        $this->givenWord = $givenWord;
    }

    public function Encrypt(){
        $givenWord= $this->givenWord;
        $array=str_split(string: $givenWord, length: 1);
        for ($i = 0; $i < strlen($givenWord); $i++) {
            $letter = $array[$i];
            if (ord($letter) > 96 and ord($letter) < 123){
                if (ord($letter)<109){
                    $array[$i]=chr(ord($letter) + 12);
                }else{
                    $array[$i]=chr(ord($letter) - 12);
                }
            }
            if (ord($letter) > 64 and ord($letter) < 91){
                if (ord($letter)<77){
                    $array[$i]=chr(ord($letter) + 12);
                }else{
                    $array[$i]=chr(ord($letter) - 12);
                }
            }
        }
        $this->result = join($array);
        return $this->result;
    }
}

<?php

class Decrypting{
    private $cypher;
    private $result;

    public function __construct($cypher){
        $this->cypher = $cypher;
    }
    public function Decrypt(){
        $cypher = $this->cypher;
        $array=str_split(string: $cypher, length: 1);
        for ($i = 0; $i < strlen($cypher); $i++) {
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
        return join($array);
    }
}
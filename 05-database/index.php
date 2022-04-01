<?php

include 'config.php';
include 'Hashing-openssl.php';


$cipher = 'aes-256-cbc';
try {
    $newHashing = new Hashing($cipher);
    $newHashing->connect($config);
} catch (Exception) {
    exit('Invalid cipher method!');
}
//$wordToHash = 'This is to be encrypted'; ->parameter must be set
//Ask if the word to be hashed exists in the database
if (isset ($wordToHash)) {
    if ($newHashing->getData($wordToHash) === $wordToHash) {
        $hash = $newHashing->encrypt($wordToHash);
        $newHashing->inputData($hash, $wordToHash);
        echo 'Word after hashing: '.$hash.'<br />';
    } else {
        echo 'Word after hashing: '.$newHashing->getData($wordToHash)['hashed_string'];
    }
}

//Ask if the hash is already in the database-> triggers only if there is a hashed word provided
//$hash = 'X4vw98ouoq27qbicLvzXHoXZTcuRsd38VPMhTn7CAv8='; ->parameter must be set

if (isset($hash)) {
    if ($newHashing->getData($hash) === $hash) {
        echo 'Word after unhashing: '.$newHashing->decrypt($hash);
    } else {
        echo 'Word after unhashing: '.($newHashing->getData($hash))['initial_word'];
    }
}


<?php

include 'config.php';
include '../03-hashing-openssl/Hashing-openssl.php';
include 'dbConn.php';


$cipher = 'aes-256-cbc';
try {
    $newHashing = new Encryption($cipher);
    $conn       = new dbConn();
    $conn->connect($config);
} catch (Exception) {
    exit('Invalid cipher method!');
}
$wordToHash = 'This is to be encrypted'; //->parameter must be set
if (isset($wordToHash)) {
    if ($conn->doesExist($wordToHash)) {
        echo 'Word after hashing: '.$conn->getData($wordToHash)['hashed_string'];
    } else {
        $hash = $newHashing->encrypt($wordToHash);
        $conn->inputData($hash, $wordToHash);
        echo 'Word after hashing: '.$hash.'<br />';
    }
}
if (isset($hash)) {
    if ($conn->doesExist($hash)) {
        echo 'Word after unhashing: '.($conn->getData($hash))['initial_word'];
    } else {
        echo 'Word after unhashing: '.$newHashing->decrypt($hash);
    }
}

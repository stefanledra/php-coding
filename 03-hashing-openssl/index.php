<?php

$wordToEncrypt = 'This is to be encrypted';

$cipher = 'aes-256-cbc';
try {
    $newEncryption = new Encryption($cipher);
    $wordToDecrypt = $newEncryption->encrypt($wordToEncrypt);
    echo 'Encrypted word: '.$wordToDecrypt.'<br />';
    echo 'Result after decrypting: '.$newEncryption->decrypt($wordToDecrypt).'<br />';
} catch (Exception $e) {
    echo $e->getMessage().' '.'<br />';
}

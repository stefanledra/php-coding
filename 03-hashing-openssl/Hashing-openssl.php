<?php

class Encryption
{

    private string $cipher = 'aes-256-cbc';
    private int $option = 0;


    public function __construct()
    {

    }

    public function encrypt($data): array
    {
        $keyGenBits    = 16;
        $key           = bin2hex(openssl_random_pseudo_bytes($keyGenBits));
        $ivlen         = openssl_cipher_iv_length($this->cipher);
        $iv            = openssl_random_pseudo_bytes($ivlen);
        $encryptedData = openssl_encrypt($data, $this->cipher, $key, $this->option, $iv);
        $resultArray   = array('encryptedData' => $encryptedData, 'key' => $key, 'iv' => $iv);

        return $resultArray;
    }

    public function decrypt($dataArray): string
    {

        $decryptedData = openssl_decrypt(
            $dataArray['encryptedData'],
            $this->cipher,
            $dataArray['key'],
            $this->option,
            $dataArray['iv']);

        return $decryptedData;

    }
}

$dataToEncrypt = 'This is to be encrypted';
$dataToDecrypt = array();
$new           = new Encryption();
$dataToDecrypt = $new->encrypt($dataToEncrypt);
echo 'Data after encrypting: '.$dataToDecrypt['encryptedData'].'<br />';

echo 'Data after decripting back: '.$new->decrypt($dataToDecrypt).'<br />';


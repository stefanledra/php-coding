<?php

class Encryption
{

    private ?string $cipher;
    private array $cipherMethods;
    private int $option;


    public function __construct($cipher)
    {
        $this->cipherMethods = openssl_get_cipher_methods();
        if (in_array($cipher, $this->cipherMethods)) {
            $this->cipher = $cipher;
            $this->option = 0;
        } else {
            $this->cipher = null;
            echo 'Invalid encryption method, please create a new object with a valid encryption method!';
        }

    }

    public function encrypt($data): array
    {
        if (is_null($this->cipher)) {
            echo 'Can not encrypt with an invalid method!';

            return array();
        } else {
            $keyGenBits = 16;   // Number of bits needed for the key to be valid
            $key = bin2hex(openssl_random_pseudo_bytes($keyGenBits));       //Using the functions to get a randomized and valid key for encryption
            $ivlen = openssl_cipher_iv_length($this->cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $encryptedData = openssl_encrypt($data, $this->cipher, $key, $this->option, $iv);
            $resultArray = array(
                'encryptedData' => $encryptedData,
                'key'           => $key,
                'iv'            => $iv,
                'cipher'        => $this->cipher,
            );

            return $resultArray;
        }
    }

    public function decrypt($dataArray): string
    {

        $decryptedData = openssl_decrypt(
            $dataArray['encryptedData'],
            $dataArray['cipher'],
            $dataArray['key'],
            $this->option,
            $dataArray['iv']);

        return $decryptedData;

    }
}

$dataToEncrypt = 'This is to be encrypted';
$dataToDecrypt = array();
$cipher        = 'aes-192-cbc';
$new           = new Encryption($cipher);
$dataToDecrypt = $new->encrypt($dataToEncrypt);
echo 'Encrypted data: '.$dataToDecrypt['encryptedData'].'<br />'.
     'Key you can use for decrypting: '.$dataToDecrypt['key'].'<br />'.
     'Initialisation vector: '.$dataToDecrypt['iv'].'<br />'.
     'Encryption method: '.$dataToDecrypt['cipher'].'<br />';
echo 'Data after decrypting back: '.$new->decrypt($dataToDecrypt).'<br />';



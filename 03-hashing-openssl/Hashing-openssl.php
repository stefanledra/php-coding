<?php

class Encryption
{

    private string $cipher;
    private string $key;
    private string $iv;
    private string $initialWord;
    private array $cipherMethods;
    private int $option;
    private int $keyGenBits;


    public function __construct($cipher)
    {
        $this->keyGenBits    = 16;   // Number of bits needed for the key to be valid
        $this->option        = 0; // constant, should always be 0
        $this->cipherMethods = openssl_get_cipher_methods();
        if (in_array($cipher, $this->cipherMethods)) {
            $this->cipher = $cipher;

        } else {
            throw new Exception('Invalid encryption method!');
        }

    }

    public function encrypt($initialWord): string
    {

        $this->key         = bin2hex(openssl_random_pseudo_bytes($this->keyGenBits));       //Using the functions to get a randomized and valid key for encryption
        $ivlen             = openssl_cipher_iv_length($this->cipher);
        $this->iv          = openssl_random_pseudo_bytes($ivlen);
        $this->initialWord = $initialWord;

        return openssl_encrypt($initialWord, $this->cipher, $this->key, $this->option, $this->iv);

    }

    public function decrypt($encryptedWord): string
    {
        $decryptedWord = openssl_decrypt($encryptedWord, $this->cipher, $this->key, $this->option, $this->iv);
        if ($decryptedWord == $this->initialWord) {
            return $decryptedWord;
        } else {
            return 'Provided word can not be decrypted. Please input the valid ciphertext!';
        }
    }
}

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





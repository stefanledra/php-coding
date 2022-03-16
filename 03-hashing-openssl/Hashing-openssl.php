<?php

class Encryption
{
    private string $data;
    private string $iv;
    private string $encodedData;
    private string $cipher = 'aes-256-cbc';
    private int $option = 0;


    public function __construct($data)
    {
        $this->data = $data;
        $this->key  = bin2hex(openssl_random_pseudo_bytes(16));
    }

    public function encrypt()
    {
        $ivlen             = openssl_cipher_iv_length($this->cipher);
        $this->iv          = openssl_random_pseudo_bytes($ivlen);
        $this->encodedData = openssl_encrypt($this->data, $this->cipher, $this->key, $this->option, $this->iv);

        return $this->encodedData;
    }

    public function decrypt()
    {

        $decryptedData = openssl_decrypt($this->encodedData, $this->cipher, $this->key, $this->option, $this->iv);

        return $decryptedData;

    }
}

$data = 'This needs to be crypted';
$new  = new Encryption($data);
echo 'Data after encrypting: '.$new->encrypt().'<br />';
echo 'Data after decripting back: '.$new->decrypt().'<br />';


<?php

include 'dbConn.php';

class Hashing extends Dbh
{

    private string $cipher;
    private string $key;
    private string $iv;
    private int $option;
    private int $keyGenBits;


    public function __construct()
    {
        $this->keyGenBits = 16;   // Number of bits needed for the key to be valid
        $this->option     = 0; // constant, should always be 0
    }

    public function encrypt($initialWord, $cipher): string
    {
        $cipherMethods = openssl_get_cipher_methods();
        if (in_array($cipher, $cipherMethods)) {
            $this->cipher = $cipher;
        } else {
            throw new Exception('Invalid encryption method!');
        }
        $this->key = bin2hex(openssl_random_pseudo_bytes($this->keyGenBits));       //Using the functions to get a randomized and valid key for encryption
        $ivlen     = openssl_cipher_iv_length($this->cipher);
        $this->iv  = openssl_random_pseudo_bytes($ivlen);
        $result    = openssl_encrypt($initialWord, $this->cipher, $this->key, $this->option, $this->iv);
        $query     = 'INSERT INTO 
                      hash_history(hashed_string, iv, cipher_key, cypher, initial_word) 
                      values(? , ? , ? , ? , ?)';
        $stmt      = $this->connect()->prepare($query);
        $stmt->execute([$result, $this->iv, $this->key, $this->cipher, $initialWord]);

        return $result;
    }

    public function decrypt($encryptedWord): string
    {
        $stmt = $this->connect()->prepare('SELECT * FROM hash_history where hashed_string = ?');
        $stmt->execute([$encryptedWord]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if (isset($result->initial_word)) {
            return 'Result after decrypting: '.$result->initial_word;
        } else {
            return 'Provided word can not be decrypted. Please input the valid ciphertext!';
        }
    }
}








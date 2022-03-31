<?php

include 'Hashing-openssl.php';
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hashing algorithm</title>
    </head>
    <body>
    <form method="POST">
        Enter the word you want to hash and the method:
        <label>
            <input type="text" name="givenWord" placeholder="Word">
            <input type="text" name="cipher" placeholder="Method">
        </label>
        <input type="submit" name="hashButton" value="Hash">
    </form>
    <br/>
    <form method="POST">
        Enter the hashed string you want to unhash:
        <label>
            <input type="text" name="hashedWord">
        </label>
        <input type="submit" name="unhashButton" value="Unhash">
    </form>

    </body>
    </html>
<?php

$newHashing = new Hashing();
if (isset($_POST['hashButton'])) {
    try {
        $result = $newHashing->encrypt($_POST['givenWord'], $_POST['cipher']);
        echo 'Encrypted word: '.$result.'<br />';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} elseif (isset($_POST['unhashButton'])) {
    try {
        echo $newHashing->decrypt($_POST['hashedWord']).'<br />';
    } catch (Exception $e) {
        echo $e->getMessage().' '.'<br />';
    }
}
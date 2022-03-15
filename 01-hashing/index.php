<?php
include 'Hashing.php';
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hashing algorithm</title>
    </head>
    <body>
    <form method="POST">
        Unesite rijec koju zelite da sifrujete:
        <input type="text" name="givenWord">
        <input type="submit" name="encryptButton" value="Sifruj">
    </form>
    <br/>
    <form method="POST">
        Unesite rijec koju zelite da desifrujete:
        <input type="text" name="cypher">
        <input type="submit" name="decryptButton" value="Desifruj">
    </form>

    </body>
    </html>
<?php

if (isset($_POST['encryptButton'])) {

    $encrypt = new Hashing();
    echo 'Kodirana rijec:'.$encrypt->encrypt($_POST['givenWord']);
} elseif (isset($_POST['decryptButton'])) {

    $decrypt = new Hashing();
    echo 'Rezultat nakon dekodiranja:'.$decrypt->decrypt($_POST['cypher']);
}

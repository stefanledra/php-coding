<?php
    include "classes/encrypting.class.php";
    include "classes/decrypting.class.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="POST">
    <label for="givenWord">Unesite rijec koju zelite da sifrujete:</label>
    <input type="text" name="givenWord">
    <input type="submit" name="encrypt" value="Sifruj">
</form>
<br />
<form method="POST">
    <label for="givenWord">Unesite rijec koju zelite da desifrujete:</label>
    <input type="text" name="cypher" >
    <input type="submit" name="decrypt" value="Desifruj">
</form>

</body>
</html>
<?php

if (isset($_POST['encrypt'])) {

    $encrypt = new Encrypting($_POST['givenWord']);
    echo 'Kodirana rijec:'.$encrypt->Encrypt();
}elseif (isset($_POST['decrypt'])){

    $decrypt = new Decrypting($_POST['cypher']);
    echo 'Rezultat nakon dekodiranja:'.$decrypt->Decrypt();
}

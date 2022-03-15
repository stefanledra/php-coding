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

    $encrypt = new Hashing();
    echo 'Kodirana rijec:'.$encrypt->encrypt($_POST['givenWord']);
}elseif (isset($_POST['decrypt'])){

    $decrypt = new Hashing();
    echo 'Rezultat nakon dekodiranja:'.$decrypt->decrypt($_POST['cypher']);
}

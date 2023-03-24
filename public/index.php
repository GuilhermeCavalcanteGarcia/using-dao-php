<?php

require_once("config.php");


//$user = new User();

//$user->loadById(3);

//echo $user;

//echo "<br>";echo "<br>";echo "<br>";
//echo "=========LISTA DE USURÁRIOS==========<br>";
//echo "<br>";echo "<br>";echo "<br>";


$listaUsers = User::listUsers();

echo json_encode($listaUsers);
?>
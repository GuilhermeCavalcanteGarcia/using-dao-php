<?php

require_once("config.php");

$user = new User();


/*
//====-Retornando objeto do usuário de acordo com o ID passado-====
$user->loadById(3);
echo $user;
echo "<br>";echo "<br>";echo "<br>";
*/


/*
echo "=========LISTA DE USURÁRIOS==========<br>";
echo "<br>";echo "<br>";echo "<br>";
Listando todos os usuários cadastrados no banco de dados 
$listaUsers = User::listUsers();
echo json_encode($listaUsers);
echo "======================================<br>";
echo "<br>";echo "<br>";echo "<br>";
*/

/*
echo "======-Pesquisando usuário-=====<br>";
//$searchUser = User::search("cavalcante");
echo json_encode($searchUser);
*/

//Retornando usuário de acordo com a senha e o login passado
$user->login("guilherme.teste@email.com","598643");
echo $user;


?>
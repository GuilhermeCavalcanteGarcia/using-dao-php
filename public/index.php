<?php

require_once("config.php");

$user = new User();



//====-Retornando objeto do usuário de acordo com o ID passado-====
// $user->loadById(3);
// echo $user;
// echo "<br>";echo "<br>";echo "<br>";




// echo "=========LISTA DE USURÁRIOS==========<br>";
// echo "<br>";echo "<br>";echo "<br>";
// Listando todos os usuários cadastrados no banco de dados 
// $listaUsers = User::listUsers();
// echo json_encode($listaUsers);
// echo "======================================<br>";
// echo "<br>";echo "<br>";echo "<br>";

/*
echo "======-Pesquisando usuário-=====<br>";
//$searchUser = User::search("cavalcante");
echo json_encode($searchUser);
*/

//Retornando usuário de acordo com a senha e o login passado
// $user->login("zzzzzzzzzzzzm","598643");
// echo $user;


//Cadastrando usurário diretamente por método estático
// $user->setLogin("testeblumenau@email.com.br");
// $user->setSenha("44444");
// echo $user->registerUser();
// echo $user;


// Atulizando dados do usuário 


$user->loadById(110);

$user->updateUser("professor@email.com.br", "4545454545455");

echo $user;

?>
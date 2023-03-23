<?php

require_once("config.php");


$sql = new Sql();

$users = $sql->select("SELECT * FROM users");

echo json_encode($users)

?>
<?php 

require_once("config.php");

/* 1 VIDEO
$sql = new Sql();

$users=$sql->select("SELECT * FROM tb_users");


echo json_encode($users);
*/

$root = new Users();

$root->loadById(3);

echo $root;


 ?>
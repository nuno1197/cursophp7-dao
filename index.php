<?php 

require_once("config.php");

/* 1 VIDEO
$sql = new Sql();

$users=$sql->select("SELECT * FROM tb_users");


echo json_encode($users);
*/

//carrega um user
//$root = new Users();

//$root->loadById(4);

//echo $root;

//Carrega uma lista de users

//$lista = Users::getList();

//echo json_encode($lista);


//Carrega uma lista de users pelo Login

//$search = Users::search("Jo");

//echo json_encode($search);

//carrega um user usando o login e a passe

$usuario = new Users();
$usuario->login("root","teste");

echo $usuario;
 ?>
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

//$usuario = new Users();
//$usuario->login("root","teste");

//echo $usuario;

//criando um novo user
//$aluno = new Users("aluno","matematica" );

//$aluno->setDeslogin("Maria");
//$aluno->setDessenha("matematica");

//$aluno->insert();

//echo $aluno;

//alterar user
//$user= new Users();

//$user->loadById(3);

//$user->update("prof","portugues");
//echo $user;

$user = new Users();
$user->loadById(3);

$user->delete();

echo $user;
 ?>
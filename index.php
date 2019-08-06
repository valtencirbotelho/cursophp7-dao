<?php 		

require_once("Config.php");

//Carrega um único usuário.
//$root = new Usuario();
//$root->loadbyId(2);
//echo $root;

//Carrega uma lista de usuários.
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("tenci");
//echo json_encode($search);

//Carrega um usuário usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("user","12345");
//echo $usuario;

/*Inserindo um novo registro no banco.
$aluno = new Usuario("José", "@259015#");
$aluno->insert();
echo $aluno;
*/

//Alterando registro no banco.
/*$usuario = new Usuario();
$usuario->loadbyId(9);
$usuario->update("Alessandra", "147258@");
echo $usuario;
*/

$usuario = new Usuario();
$usuario->loadbyId(7);
$usuario->delete();
echo $usuario;

 ?>
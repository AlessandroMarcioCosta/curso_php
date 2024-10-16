<?
//Variaveis Pré 
//vardump exibi o tipo da variavel
//toda informação via Get ou POST  entrega uma string para alterar é necessário fazer uma converconverssão (casting)
$nome = (int)$_GET["a"]; //<-- casting força para mudar o tipo de string para inteiro

//var_dump($nome);

$ip = $_SERVER["SCRIPT_NAME"];

echo $ip;

?>
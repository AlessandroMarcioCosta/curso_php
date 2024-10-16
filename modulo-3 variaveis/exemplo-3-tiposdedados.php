<?php

//tipos de dados Php
//comentário de linha simples

$nome = "Alessandro";        //strings
$site = "www.hcode.com.br";

$ano = 1990;                 //variavel não pode comerçar com números  
$salario = 5500.99;          //caracter especial especial o unico permitido é o _(underline)
$bloqueado = false;          // nã pode usar variaveis pré definidas
/////////////////////////////////////////////
$frutas = array("abacaxi", "laranja", "manga");

//echo $frutas[2];

$nascimento = new DateTime();

//var_dump($nascimento);
/////////////////////////////////////////////

$arquivo = fopen("exemplo-3.php", "r");

//var_dump($arquivo);

$nulo = NULL;
$vazio = "";
/* comentário de blocos
 pose ser usado para documentar seu codigo ou comentários de varias linhas */

?>
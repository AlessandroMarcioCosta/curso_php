<?php

/*
$anoNascimento = 1990;

$nomeCompleto = "";*/
//Na linha de baixo temos uma variável com númerono nome
//uso de variaveis padrão camel case exemplo $anoNascimento <--recomendação boa pratica
//não usar variaveis usando nomes reservados
$nome1 = "Alessandro";

$sobrenome = "Márcio";

$nomeCompleto = $nome1 . " " . $sobrenome;  //concatenar com espaço para separar palavras

echo $nomeCompleto;

exit;

echo $nome1;

echo "<br/>";

unset($nome1);

// se a variavel existir 

if (isset($nome1)) {     

    echo $nome1;

}

?>
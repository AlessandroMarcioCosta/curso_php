<?php

$nome = "Alessandro";

function teste() {

    global $nome;
    echo $nome;

}

function teste2() {

    $nome = "Erika";

    echo $nome."agora no teste2";

}

teste();
teste2();

?>
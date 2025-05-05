<?php

class Pessoa{

    public $nome = "Alessandro Márcio";
    protected $idade = 20 ;
    private $senha = "123456";

    public function verDados (){

        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
        echo $this->senha . "<br/>";



    }
}


class programador extends Pessoa{

}

$objeto =new pessoa();

echo $objeto->verDados(); 


?>
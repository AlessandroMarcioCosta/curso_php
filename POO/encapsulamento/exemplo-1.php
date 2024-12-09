<?php

    class Pessoa{
        public $nome;                                              //atributo
        public function falar(){                                  //metodo
                return "O nome é ".$this->nome;                      
        }




    }
    $alessandro = new Pessoa();
    $alessandro->nome= "Alessandro Márcio";
    echo $alessandro->falar();
                                                                      //aula concluida e revisada 09/12
     ?>

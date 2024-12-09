<?php

    class Carro {
        private $modelo;                    //atributos
        private $motor;                     //atributos
        private $ano;

        public function getModelo(){

            return $this->modelo;
        }

        public function setModelo($modelo){

            $this->modelo = $modelo;
        }
  

        public function getAno(){

            return $this->ano;
        }
    
        public function setano($ano){
    
            $this->ano = $ano;
        }
    
}



?>
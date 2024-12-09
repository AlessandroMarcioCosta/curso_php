<?php

    class Carro {
        private $modelo;                    //atributos
        private $motor;                     //atributos
        private $ano;

        public function setModelo($modelo){

            return $this->modelo;
        }
    
        public function setMotor($motor):float{

            return $this->motor;
        }
    
        public function setAno($ano):int{
    
            $this->ano;
        }
   
        public function exibir(){

            return array(
                    "modelo"=>$this->getModelo(),
                    "motor"=>$this->getMotor(),
                    "ano"=>$this->getAno()
            );

        }
    
    }
$gol = new Carro();
$gol->setModelo("GOL GT");
$gol->setMotor("1.6");
$gol->setAno("2017");
      
  
var_dump($gol->exibir());
    

?>
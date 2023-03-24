<?php

class User{

    private $id;
    private $login;
    private $senha;
    private $data_tempo;


    //SET and GET do id
    public function getId(){

        return $this->id;

    }
    public function setId($value){

        $this->id = $value;

    }

    //SET and GET do login
    public function getLogin(){

        return $this->login;

    }
    public function setLogin($value){

        $this->login = $value;

    }

    //SET and GET da senha
    public function getSenha(){

        return $this->senha;

    }
    public function setSenha($value){

        $this->senha = $value;

    }


    //SET and GET da data_tempo
    public function getData_Tempo(){

        return $this->data_tempo;

    }
    public function setData_Tempo($value){

        $this->data_tempo = $value;

    }

}

?>
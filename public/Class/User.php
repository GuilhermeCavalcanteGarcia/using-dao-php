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


    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM users WHERE id = :ID", array(":ID"=>$id));

        if (count($results) > 0){

            $row = $results[0];

            $this->setId($row['id']);

            $this->setLogin($row['login']);

            $this->setSenha($row['senha']);

            $this->setData_Tempo(new DateTime($row['data_tempo']));


        }

    }

    public function __toString(){

        return json_encode(array(

            "id"=>$this->getId(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "data_tempo"=>$this->getData_Tempo()->format("d-m-Y H:i:s")
        
        ));

    }

}

?>
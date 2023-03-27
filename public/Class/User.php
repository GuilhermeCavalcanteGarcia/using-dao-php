<?php

class User{

    private $id;
    private $login;
    private $senha;
    private $data_tempo;


    public function __construct($login = "", $senha = ""){

        $this->setLogin($login);
        $this->setSenha($senha);

    }

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

    public function setData($data){

        $this->setId($data["id"]);
        $this->setLogin($data["login"]);
        $this->setSenha($data["senha"]);
        $this->setData_Tempo(DateTime::createFromFormat('Y-m-d H:i:s', $data["data_tempo"]));


    }

    
    
    //Métodos que conversam com o banco de dados
    
    public static function search($value){

        $sql = new Sql();

        return $sql->select("SELECT * FROM users WHERE login LIKE :SEARCH ORDER BY login", array(
            ':SEARCH'=>"%".$value."%"
        ));

    }

    public function registerUser(){

        $sql = new Sql();

        $results = $sql->select("CALL sp_users_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getLogin(),
            ':PASSWORD'=>$this->getSenha()
        ));

        if (count($results) > 0){
        
            $this->setData($results[0]);
        
        }


    }

    public function updateUser($login, $senha){

        $this->setLogin($login);
        $this->setSenha($senha);

        $sql = new Sql();

        $sql->queryNew("UPDATE users SET login=:LOGIN, senha=:SENHA WHERE id = :ID", array(
            ':LOGIN'=>$this->getLogin(),
            ':SENHA'=>$this->getSenha(),
            ':ID'=>$this->getId()
        ));

    }

    // 2:20
    public function deleteUser($id){

        $this->loadById($id);

        $sql = new Sql();

        $sql->queryNew("DELETE FROM users WHERE id=:ID", array(
            ':ID'=>$this->getId()
        ));

        echo $this;


    }

    public function login($login, $password){

        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM users WHERE login = :LOGIN AND senha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));
        
        if (count($results) > 0){
        
            $this->setData($results[0]);
        
        }

    }


    public static function listUsers(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM users ORDER BY id");



    }
    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM users WHERE id = :ID", array(':ID'=>$id));

        if (count($results) > 0){

            $this->setData($results[0]);

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
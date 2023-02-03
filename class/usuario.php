<?php

require_once("config.php");

class Usuarios{

private $nomeUsu  ;

private $idadeUsu;
private $senhaUsu  ;
private $idUsu ;


public function getNomeUsu(){
        return $this->nomeUsu;
}

public function setNomeUsu($value) {

        $this->nomeUsu = $value;

}
public function getIdadeUsu(){
    return $this->idadeUsu;
}

public function setIdadeUsu($value) {

    $this->idadeUsu = $value;

}
public function getIdUsu(){
    return $this->idUsu;
}

public function setIdUsu($value) {

    $this->idUsu = $value;

}


public function loadId ($id){

        $sql = new Sql;

       $results = $sql->select("SELECT * FROM EXEMPLO WHERE id =:id", array(
            ":id" => $id
        )
        )
        ;
        
        if (count($results) > 0 ){

            $row = $results[0];
            $this->setIdUsu($row["id"]);
            $this->setNomeUsu($row["nome"]);
            $this->setIdadeUsu($row["idade"]);         



        }
}

public function __toString(){

        return json_encode(
            array(
                "id" => $this->getIdUsu(),
                "nome" => $this->getNomeUsu(),
                "idade" => $this->getIdadeUsu()
            )
        );
}

}
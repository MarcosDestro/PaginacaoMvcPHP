<?php

class Posts extends Model {

    //Puxa a conexão com o banco de dados
    public function __construct(){
        parent::__construct();
    }

    //Retorna a lista de itens por offset e limit
    public function getList($off, $lim){
        $array = [];

        $sql = $this->db->query("SELECT * FROM posts LIMIT $off, $lim");
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Retorna o total de itens no banco
    public function getTotal(){
        $sql = $this->db->query("SELECT COUNT(*) as c FROM posts");
        $sql = $sql->fetch();

        return $sql['c'];
    }
}
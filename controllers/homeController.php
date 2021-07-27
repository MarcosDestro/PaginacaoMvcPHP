<?php
class homeController extends controller {
 
    public function index(){
        $dados = array();
        //Determina o total de itens por página
        $limit = 10;

        //Determina o total de páginas
        $posts = new Posts();
        $total = $posts->getTotal();
        $dados['paginas'] = ceil($total/$limit);

        //Determina e verifica que 'p' foi enviado via get
        $dados['paginaAtual'] = 1;
        if(isset($_GET['p'])){
            $dados['paginaAtual'] = intval($_GET['p']);
        }

        //Determina o offset e envia para consulta
        $offset = ($dados['paginaAtual'] * $limit)- $limit;
        $dados['lista'] = $posts->getList($offset, $limit);
            
        //Envia as infos para o view
        $this->loadView('home', $dados);
    }

}

?>
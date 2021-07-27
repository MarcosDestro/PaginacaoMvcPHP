<?php

class Core {

    public function run(){
        //Armazena a url enviada
        $url = '/';
        if(isset($_GET['url'])){
            $url = $url.$_GET['url'];
        }
        //Cria parametros vazio
        $params = array();

        //Se url não estiver vazia e for diferente de '/', faça
        if(!empty($url) && $url != '/'){
            //Pegar a url e armazenar em um array dividido pela barra
            $url = explode('/', $url);

            //Remove o primeiro item vazio do array
            array_shift($url);

            //Assume o primeiro item como controller
            $currentController = $url[0]."Controller";

            //Remover o primeiro item, que seria o controller, e assume a action
            array_shift($url);
            if(isset($url[0]) && !empty($url[0])){
                //Se a url[0] existe e não estiver vazia, assume:
                $currentAction = $url[0];
                array_shift($url);
            }else{
                //...Caco contrário, assuma index
                $currentAction = 'index';
            }
            //Se ainda tiver itens em url, guarde como parâmetros
            if(count($url) > 0){
                $params = $url;
            }
        }
        else {
            //Se na enviado assuma os controllers e action abaixo
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        //Se o arquivo controller não existir ou o método de uma classe não existir, assuma notfoundController
        if (!file_exists('controllers/'.$currentController.".php") || !method_exists($currentController, $currentAction)) {
            $currentController = 'notfoundController';
            $currentAction = 'index';
        }
        
        //Instanciamos o controller armazenado
        $c = new $currentController;
        //Chamamos uma função para que possamos passar os parâmetros
        call_user_func_array(array($c, $currentAction), $params);

    }

}
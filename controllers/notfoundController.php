<?php
class notfoundController extends controller {
 
    public function index(){
        //Chamando o view 404 
        $this->loadView('404', array());
    }

}

?>
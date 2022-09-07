<?php

Class Controller{

    public $dado;
    public $dado2;

    public function __construct()
    {
        $this->dados = array();
    }

    public function carregarTemplate($nomeView, $dadosModel = array(), $dadosModel2 = array())
    {
        $this->dados = $dadosModel;
        $this->dados2 = $dadosModel2;
        require 'Views/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array())
    {
        extract($dadosModel);
        require'Views/'.$nomeView.'.php';
    }


}//fim da Class 

?>
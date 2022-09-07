<?php

Class Core{

    public function __construct()
    {
        $this->run();
    }

    public function run()
    {   
        $parametros = array();
        if(isset($_GET['pag']))
        {
            $url = $_GET['pag'];
        }
        //possui informação apos dominio
        // www.sitex.com/classe/funcao/parametro
        if (!empty($url)) 
        {
            $url = explode('/', $url);
            $controller = $url[0].'Controller';
            array_shift($url);

            //if o usuario mandou funcao
            if (isset($url[0]) && !empty($url[0])) 
            {
                $metodo = $url[0];
                array_shift($url);
            }else //enviou somente classe
            {
                $metodo = 'index';
            }

            if (count($url)>0) 
            {
                $parametros = $url;
            }

        }else //www.sitex.com/
        {
            $controller = 'homeController';
            $metodo = 'index';
        }

        $caminho = 'newjobs/Controllers/'.$controller.'.php';

        if (!file_exists($caminho) && !method_exists($controller, $metodo)) 
        {
            $controller = 'homeController';
            $metodo = 'index';
        }

        $c = new $controller;

        call_user_func_array(array($c,$metodo), $parametros);

    }//fim do run()

}//fim da class

?>
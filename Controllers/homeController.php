<?php 

Class homeController extends Controller
{
    public function index()
    {
        // 1) chamar um model
        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('home');
    }


}

?>
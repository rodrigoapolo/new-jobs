<?php 

Class contaController extends Controller
{
    public function login()
    {
        // 1) chamar um model
        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('login');
    }

    public function cadastrarcandidato()
    {
        // 1) chamar um model
        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('cadastrarcandidato');
    }
    public function cadastrarempresa()
    {
        // 1) chamar um model
        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('cadastrarempresa');
    }

    public function sair()
    {
        // 1) chamar um model
        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('saindo');
    }

}

?>
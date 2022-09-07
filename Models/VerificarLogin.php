<?php 

Class VerificarLogin{

    public function verificarContas()
    {
        //session_start();
        if(!isset($_SESSION['idCandidato']) && !isset($_SESSION['idEmpresa']) && !isset($_SESSION['idRecrutador']))
        {
            header("Location: conta/login");
            exit;
        }
    }

    public function verificarContasP()
    {
        session_start();
        if(!isset($_SESSION['idCandidato']) && !isset($_SESSION['idEmpresa']) && !isset($_SESSION['idRecrutador']))
        {
            header("Location: ../conta/login");
            exit;
        }
    }

    public function sair()
    {
        session_start();
        unset($_SESSION['idCandidato']);
        unset($_SESSION['idEmpresa']);
        unset($_SESSION['idRecrutador']);
        session_destroy();
        header("Location: login");
    }

}



?>
<?php 

Class feedController extends Controller
{
    public function index()
    {
        // 1) chamar um model
        session_start();
        $conta = new VerificarLogin();
        $conta->verificarContas();

        if(isset($_SESSION['idCandidato']))
        {
            $c = new Candidato();
            $c->setIdCandidato($_SESSION['idCandidato']);
            $id = $c->mostraCliente($c);
            $v = new Feed();
            $v->setBairroVaga($id['bairroCandidato']);
            $vaga = $v->todaVaga($v);
            // echo "<pre>";
            // var_dump($vaga);
            // echo "<pre/>";

        }elseif(isset($_SESSION['idRecrutador']))
        {   
            $r = new Recrutador();
            $r->setIdRecrutador($_SESSION['idRecrutador']);
            $id = $r->mostraRecrutador($r);
            $v = new Feed();
            $v->setIdEmpresa($id['idEmpresa']);
            $vaga = $v->mostraVagaR($v);
            // echo "<pre>";
            // var_dump($id);
            // echo "<pre/>";

        }elseif(isset($_SESSION['idEmpresa']))
        {
            $e = new Empresa();
            $e->setIdEmpresa($_SESSION['idEmpresa']);
            $id = $e->mostraCliente($e);
            $r = new Feed();
            $r->setIdEmpresa($_SESSION['idEmpresa']);
            $vaga = $r->todoRecrutador($r);
        }


        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('feed',$id,$vaga);
    }

    public function perfil()
    {
        // 1) chamar um model
        $conta = new VerificarLogin();
        $conta->verificarContasP();
        $for= array();

        if(isset($_SESSION['idCandidato']))
        {
            $c = new Candidato();
            $c->setIdCandidato($_SESSION['idCandidato']);
            $id = $c->mostraCliente($c);
            $f = New Formacao();
            $f->setIdCandidato($id['idCandidato']);
            $for = $f->mostraFormacao($f);

        }elseif(isset($_SESSION['idRecrutador']))
        {   
            $r = new Recrutador();
            $r->setIdRecrutador($_SESSION['idRecrutador']);
            $id = $r->mostraRecrutador($r);
            // echo "<pre>";
            // var_dump($id);
            // echo "<pre/>";

        }elseif(isset($_SESSION['idEmpresa']))
        {
            $e = new Empresa();
            $e->setIdEmpresa($_SESSION['idEmpresa']);
            $id = $e->mostraCliente($e);
            // echo "<pre>";
            // var_dump($id);
            // echo "<pre/>";
        }
        
        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end
        
        $this->carregarTemplate('eu',$id,$for);
    }

    public function candidato()
    {
        // 1) chamar um model
        $conta = new VerificarLogin();
        $conta->verificarContasP();
        $candi= array();

        if(isset($_SESSION['idCandidato']))
        {
            header("Location: ../feed");

        }elseif(isset($_SESSION['idRecrutador']))
        {
            // $r = new Recrutador();
            // $r->setIdRecrutador($_SESSION['idRecrutador']);
            // $id = $r->mostraRecrutador($r);

            $int = new Interesse();
            $_SESSION['todosCandi'];
            if(empty($_SESSION['todosCandi']))
            {
                $_SESSION['todosCandi'] = $_POST['txMostCandi'];
            }else
            {
                if(!empty($_POST['txMostCandi']))
                {
                    if($_SESSION['todosCandi'] != $_POST['txMostCandi'])
                    {
                        $_SESSION['todosCandi'] = $_POST['txMostCandi'];
                    }
                }
            }

            $va = new Vaga();
            $va->setIdVaga($_SESSION['todosCandi']);
            $id = $va->mostraNomeVaga($va);

            $int->setIdVaga($_SESSION['todosCandi']);
            $candi = $int->mostraInteresse($int);
            // echo "<pre>";
            // var_dump($id);
            // echo "<pre/>";

        }elseif(isset($_SESSION['idEmpresa']))
        {
            header("Location: ../feed");
            // echo "<pre>";
            // var_dump($id);
            // echo "<pre/>";
        }

        // 2) chamar uma view
        // 3) fazer a juncao de back end com front end

        $this->carregarTemplate('candidato',$id,$candi);
    }
}

?>
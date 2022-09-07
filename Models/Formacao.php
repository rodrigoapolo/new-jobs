<?php

require_once 'Conexao.php';

class Formacao
{
    private $con;
    private $idFormacao;
    private $nomeCurso;
    private $nomeInstituicao;
    private $dtInicio;
    private $dtFina;
    private $descDiploma;
    private $idCandidato;

   

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarF($id)
    {
        $erro = New Erro(); 
        $curso = htmlentities(addslashes($_POST['txNomeCurso']));
        $instituicao = htmlentities(addslashes($_POST['txNomeInstituicao']));
        $dtInicio = htmlentities(addslashes($_POST['txDtInicio']));
        $dtFinal = htmlentities(addslashes($_POST['txDtFinal']));
        $diploma = htmlentities(addslashes($_POST['txDiploma']));
        

        //Verficar se esta preenchido
        if(!empty($curso) && !empty($instituicao) && !empty($dtInicio)
            && !empty($dtFinal)&& !empty($diploma))
         {
            $f = new Formacao();
            $f->setNomeCurso($curso);
            $f->setNomeInstituicao($instituicao);
            $f->setDtInicio($dtInicio);
            $f->setDtFina($dtFinal);
            $f->setDescDiploma($diploma);
            $f->setIdCandidato($id);

            ///////////////////////////
            $f->cadastrar($f);

            

         }else
         {
            $erro->campoVazio();
         }

    }//fim do cadastrarFoneE

    public function cadastrar($formacao){//cadatrar vaga

        $stmt = $this->con->prepare("INSERT INTO tbformacao (nomeCurso,nomeInstituicao
                                    ,dtInicio,dtFinal,diploma,idCandidato)
                                    VALUES (?,?,?,?,?,?)");
        $stmt->bindValue(1, $formacao->getNomeCurso());
        $stmt->bindValue(2, $formacao->getNomeInstituicao());
        $stmt->bindValue(3, $formacao->getDtInicio());
        $stmt->bindValue(4, $formacao->getDtFina());
        $stmt->bindValue(5, $formacao->getDescDiploma());
        $stmt->bindValue(6, $formacao->getIdCandidato());
        $stmt->execute();
        $erro = New Erro(); 
        $erro->sucessoPerfil();
        return true;
        //return 'Cadastro realizado com sucesso';
    }//fim cadastrar


    public function delete($id){//Apagar um formacao

        $stmt = $this->con->prepare("DELETE FROM tbformacao WHERE idFormacao = ?");
        $stmt->bindValue(1, $id->getIdFormacao());
        $stmt->execute();
        header("Location: perfil");
        //return 'Apagado com sucesso';
    }//fim do delete

    public function mostraFormacao($id){//Mostra todas Formacao
        $resultado = array();

        $stmt = $this->con->prepare("SELECT * FROM tbformacao WHERE idCandidato = ?");
        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }//fim do mostraFOramacao

    public function mostrForma($id){//Mostra todas Formacao
        $resultado = array();

        $stmt = $this->con->prepare("SELECT * FROM tbformacao WHERE idFormacao = ?");
        $stmt->bindValue(1, $id->getIdFormacao());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function atualiForm($id)
    {
        $erro = New Erro(); 
        $curso = htmlentities(addslashes($_POST['txEditNomeCurso']));
        $instituicao = htmlentities(addslashes($_POST['txEditNomeInstituicao']));
        $dtInicio = htmlentities(addslashes($_POST['txEditDtInicio']));
        $dtFinal = htmlentities(addslashes($_POST['txEditDtFinal']));
        $diploma = htmlentities(addslashes($_POST['txEditDiploma']));
        

        //Verficar se esta preenchido
        if(!empty($curso) && !empty($instituicao) && !empty($dtInicio)
            && !empty($dtFinal)&& !empty($diploma))
         {
            $f = new Formacao();
            $f->setNomeCurso($curso);
            $f->setNomeInstituicao($instituicao);
            $f->setDtInicio($dtInicio);
            $f->setDtFina($dtFinal);
            $f->setDescDiploma($diploma);
            $f->setIdFormacao($id);

            $f->updateFormaca($f);

         }else
         {
            $erro->campoVazio();
         }

    }//fim do cadastrarFoneE

    public function updateFormaca($atualizar)//Atualizar
    {   
        $erro = New Erro(); 
        $stmt = $this->con->prepare("UPDATE tbformacao SET nomeCurso = ?,nomeInstituicao = ?
                                        ,dtInicio = ?,dtFinal = ?,diploma = ?   
                                        WHERE idFormacao  = ? ");

        $stmt->bindValue(1, $atualizar->getNomeCurso());
        $stmt->bindValue(2, $atualizar->getNomeInstituicao());
        $stmt->bindValue(3, $atualizar->getDtInicio());
        $stmt->bindValue(4, $atualizar->getDtFina());
        $stmt->bindValue(5, $atualizar->getDescDiploma());
        $stmt->bindValue(6, $atualizar->getIdFormacao());
        $stmt->execute();

        $erro->atualizadoPerfil();

    }


        // GET da CLASSE
    public function getIdCandidato()
    {
        return $this->idCandidato;
    }

    public function getDescDiploma()
    {
        return $this->descDiploma;
    }

    public function getDtFina()
    {
        return $this->dtFina;
    }

    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    public function getNomeInstituicao()
    {
        return $this->nomeInstituicao;
    }

    public function getNomeCurso()
    {
        return $this->nomeCurso;
    }

    public function getIdFormacao()
    {
        return $this->idFormacao;
    }

        // SET da CLASSE

    public function setIdCandidato($idCandidato)
    {
        $this->idCandidato = $idCandidato;
    }


    public function setDescDiploma($descDiploma)
    {
        $this->descDiploma = $descDiploma;
    }

    public function setDtFina($dtFina)
    {
        $this->dtFina = $dtFina;
    }

    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;
    }

    public function setNomeInstituicao($nomeIns)
    {
        $this->nomeInstituicao = $nomeIns;
    }

    public function setNomeCurso($nomeC)
    {
        $this->nomeCurso = $nomeC;
    }

    public function setIdFormacao($id)
    {
        $this->idFormacao = $id;
    }

}//fim da Formacao
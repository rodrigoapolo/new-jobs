<?php

require_once 'Conexao.php';

class Experiencia
{
    private $con;
    private $idExperiencia;
    private $nomeEmpresa;
    private $cargo;
    private $nivelHierarquico;
    private $especialidade;
    private $dtInicio;
    private $dtSaida;
    private $idCandidato;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarExperi($id)
    {
        $erro = New Erro(); 
        $nome = htmlentities(addslashes($_POST['txNomeEmp']));
        $cargo = htmlentities(addslashes($_POST['txCargo']));
        $especialidade = htmlentities(addslashes($_POST['txEspecialidade']));
        $dtInicio = htmlentities(addslashes($_POST['txDtInicio']));
        $dtFinal= htmlentities(addslashes($_POST['txDtFinal']));
        

        //Verficar se esta preenchido
        if(!empty($nome) && !empty($cargo) && !empty($especialidade)
         && !empty($dtInicio))
         {
            $ex = new Experiencia();
            $ex->setNomeEmpresa($nome);
            $ex->setCargo($cargo);
            $ex->setEspecialidade($especialidade);
            $ex->setDtInicio($dtInicio);
            $ex->setDtSaida($dtFinal);
            $ex->setIdCandidato($id);

            $ex->cadastrar($ex);        

         }else
         {
            $erro->campoVazio();
         }
    }

    public function cadastrar($experiencia)
    {
        $erro = New Erro(); 
        $stmt = $this->con->prepare("INSERT INTO tbexperiencia (nomeEmpresa,cargo
                                            ,especialidade,dtInicio
                                            ,dtSaida,idCandidato)
                                            VALUES (?,?,?,?,?,?)");
    
        $stmt->bindValue(1, $experiencia->getNomeEmpresa());
        $stmt->bindValue(2, $experiencia->getCargo());
        $stmt->bindValue(3, $experiencia->getEspecialidade());
        $stmt->bindValue(4, $experiencia->getDtInicio());
        $stmt->bindValue(5, $experiencia->getDtSaida());
        $stmt->bindValue(6, $experiencia->getIdCandidato());
        $stmt->execute();
        $erro->sucessoPerfil();
        //header("Location: perfil");
        return true;
    }

    public function mostraExperiencia($id){//Mostra Experiencia
        
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbexperiencia WHERE idCandidato = ?");
        
        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function mostraExpe($id){//Mostra Experiencia
        
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbexperiencia WHERE idExperiencia = ?");
        
        $stmt->bindValue(1, $id->getIdExperiencia());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function delete($id){//Apagar um Experiencia

        $stmt = $this->con->prepare("DELETE FROM tbexperiencia WHERE idExperiencia = ?");
        $stmt->bindValue(1, $id->getIdExperiencia());
        $stmt->execute();
        header("Location: perfil");
        //return 'Apagado com sucesso';
    }

    public function updateExperi($idExp)
    {
        $erro = New Erro(); 
        $nome = htmlentities(addslashes($_POST['txNomeEmpes']));
        $cargo = htmlentities(addslashes($_POST['txCargo']));
        $especialidade = htmlentities(addslashes($_POST['txEspecialidade']));
        $dtInicio = htmlentities(addslashes($_POST['txDtInicio']));
        $dtFinal= htmlentities(addslashes($_POST['txDtFinal']));
        

        //Verficar se esta preenchido
        if(!empty($nome) && !empty($cargo) && !empty($especialidade)
         && !empty($dtInicio))
         {
            $ex = new Experiencia();
            $ex->setNomeEmpresa($nome);
            $ex->setCargo($cargo);
            $ex->setEspecialidade($especialidade);
            $ex->setDtInicio($dtInicio);
            $ex->setDtSaida($dtFinal);
            $ex->setIdExperiencia($idExp);


            $ex->update($ex);        

         }else
         {
            $erro->campoVazio();
         }
    }
    
    public function update($atualizar){//Atualizar

        $erro = New Erro(); 
        $stmt = $this->con->prepare("UPDATE tbexperiencia SET nomeEmpresa = ?,cargo = ?
                                        ,especialidade = ?,dtInicio = ?
                                        ,dtSaida = ? 
                                        WHERE 	idExperiencia = ?");
       
        $stmt->bindValue(1, $atualizar->getNomeEmpresa());
        $stmt->bindValue(2, $atualizar->getCargo());
        $stmt->bindValue(3, $atualizar->getEspecialidade());
        $stmt->bindValue(4, $atualizar->getDtInicio());
        $stmt->bindValue(5, $atualizar->getDtSaida());
        $stmt->bindValue(6, $atualizar->getIdExperiencia());
        $stmt->execute();

        $erro->atualizadoPerfil();
        // $dado = $stmt->fetch();
        // return $dado;
        //return true;
        //header("Location: perfil");


}

    public function getIdExperiencia()
    {
        return $this->idExperiencia;
    }

    public function setIdExperiencia($idExperiencia)
    {
        return $this->idExperiencia = $idExperiencia;
    }

    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    public function setNomeEmpresa($nomeEmpresa)
    {
        return $this->nomeEmpresa = $nomeEmpresa;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        return $this->cargo = $cargo;
    }

    public function getNivelHierarquico()
    {
        return $this->nivelHierarquico;
    }

    public function setNivelHierarquico($nivelHierarquico)
    {
        return $this->nivelHierarquico = $nivelHierarquico;
    }

    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    public function setEspecialidade($especialidade)
    {
        return $this->especialidade = $especialidade;
    }

    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    public function setDtInicio($dtInicio)
    {
        return $this->dtInicio = $dtInicio;
    }

    public function getDtSaida()
    {
        return $this->dtSaida;
    }

    public function setDtSaida($dtSaida)
    {
        return $this->dtSaida = $dtSaida;
    }

    public function getIdCandidato()
    {
        return $this->idCandidato;
    }

    public function setIdCandidato($idCandidato)
    {
        return $this->idCandidato = $idCandidato;
    }



}//fim da Class Experiencia
  



?>
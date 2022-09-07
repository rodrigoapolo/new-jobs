<?php

require_once 'Conexao.php';

class Interesse
{
    private $con;
    private $ativoInteresse;
    private $idInteresse;
    private $idCandidato;
    private $idVaga;



    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarInteresse($idVa,$idCand){//cadatrar vaga

        $erro = New Erro();
        $idVaga = htmlentities(addslashes($idVa));
        $idCandidato = htmlentities(addslashes($idCand));
        

        //Verficar se esta preenchido
        if(!empty($idVaga) && !empty($idCandidato))
         {
            $i = new Interesse();
            $i->setIdVaga($idVaga);
            $i->setIdCandidato($idCandidato);
            
            
            $i->cadastrar($i);

           

         }else
         {  
             $erro->campoVazioFeed();
         }


    }

    public function cadastrar($interesse)// Candastrar Interesse
    {

        $stmt = $this->con->prepare("SELECT nomeCandidato FROM tbcandidato
                                    INNER JOIN tbinteresse
                                    ON tbcandidato.idCandidato = tbinteresse.idCandidato
                                    WHERE  tbinteresse.idVaga = ? AND tbcandidato.idCandidato = ?");
            
        $stmt->bindValue(1, $interesse->getIdVaga());
        $stmt->bindValue(2, $interesse->getIdCandidato());
        $stmt->execute();

        $erro = New Erro();
        if($stmt->rowCount()>0)
        {
            
            $erro->jaCadastrado();
            return false;                   
        }else
        {
            $stmt = $this->con->prepare("INSERT INTO tbInteresse (ativoInteresse, idCandidato, idVaga)
                                                        VALUES (?,?,?)");
        
            $stmt->bindValue(1, 's');
            $stmt->bindValue(2, $interesse->getIdCandidato());
            $stmt->bindValue(3, $interesse->getIdVaga());
            $stmt->execute();
            $erro->sucessoCandidatar();
        }

        

    }//fim do cadastrar

    public function delete($id){//Apagar um Interesse

        $stmt = $this->con->prepare("DELETE FROM tbInteresse WHERE idInresse = ?");
        $stmt->bindValue(1, $id->getIdInteresse());
        $stmt->execute();
        //return 'Apagado com sucesso';
    }

    public function mostraInteresse($id){//Mostra um Interesse
        $resultado = array();
        $stmt = $this->con->prepare("SELECT tbcandidato.idCandidato,nomeCandidato,emailCandidato,bairroCandidato,zonaCandidato,cargo FROM tbcandidato
                                    INNER JOIN tbinteresse
                                        ON tbcandidato.idCandidato = tbinteresse.idCandidato
                                            INNER JOIN tbvaga
                                                ON tbinteresse.idVaga = tbvaga.idVaga
                                    WHERE  tbinteresse.idVaga = ?");
        
        $stmt->bindValue(1, $id->getIdVaga());
        $stmt->execute();

        if($stmt->rowCount()>0)
        {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;  
        }else
        {

            return false;  

            
        }

    }

    //set da class
    public function setIdVaga($idVaga)
    {
        $this->idVaga = $idVaga;
    }

    public function setIdCandidato($idCand)
    {
        $this->idCandidato = $idCand;
    }

    public function setIdInteresse($id)
    {
        $this->idInteresse = $id;
    }
    public function setAtivoInteresse($id)
    {
        $this->ativoInteresse = $id;
    }

    //get da classs
    public function getIdVaga()
    {
        return $this->idVaga;
    }


    public function getIdCandidato()
    {
        return $this->idCandidato;
    }

    public function getIdInteresse()
    {
        return $this->idInteresse;
    }

    public function getAtivoInteresse()
    {
        return $this->ativoInteresse;
    }


}//fim da Interessi
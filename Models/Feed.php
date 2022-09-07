<?php 

require_once 'Conexao.php';

class Feed{

    private $con;
    private $bairroVaga;
    private $idEmpresa;
    private $busca;
    private $idVaga;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }


    public function mostraVagaR($id){//Mostra um vaga

        $resultado = array();
        $stmt = $this->con->prepare("SELECT idVaga,descVaga,cargo,dtInicio,dtFim,cepVaga,enderecoVaga,numeroVaga,complementoVaga,bairroVaga,cidadeVaga,zonaVaga,horarioTrabalho,salarioVaga,ativoVaga,nomeEmpresa
                                    FROM tbvaga
                                    INNER JOIN tbempresa 
                                    on tbvaga.idEmpresa = tbempresa.idEmpresa
                                    WHERE tbvaga.idEmpresa = ? AND ativoVaga LIKE 's'");
        
        $stmt->bindValue(1, $id->getIdEmpresa());
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

    public function todoRecrutador($id){//Mostra todos Recrutador
        $resultado = array();

        $stmt = $this->con->prepare("SELECT idRecrutador, nomeRecrutador,cpfRecrutador,emailRecrutador, nomeEmpresa 
                                        FROM tbRecrutador
                                        INNER JOIN tbempresa
                                        on tbrecrutador.idEmpresa = tbempresa.idEmpresa
                                        WHERE tbrecrutador.idEmpresa = ?");

        $stmt->bindValue(1, $id->getIdEmpresa());
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

    public function todaVaga($bairro){//Mostra todas Vagas
        $resultado = array();

        $stmt = $this->con->prepare("SELECT idVaga,descVaga,cargo,dtInicio,dtFim,cepVaga,enderecoVaga,numeroVaga,complementoVaga,bairroVaga,zonaVaga,horarioTrabalho,salarioVaga,ativoVaga,nomeEmpresa 
                                    FROM tbvaga
                                    INNER JOIN tbempresa 
                                    on tbvaga.idEmpresa = tbempresa.idEmpresa
                                    WHERE ativoVaga LIKE 's' AND bairroVaga LIKE ? ");

        $stmt->bindValue(1, $bairro->getBairroVaga());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function todaVagaSem($bairro){//Mostra todas Vagas
        $resultado = array();

        $stmt = $this->con->prepare("SELECT idVaga,descVaga,cargo,dtInicio,dtFim,cepVaga,enderecoVaga,numeroVaga,complementoVaga,bairroVaga,zonaVaga,horarioTrabalho,salarioVaga,ativoVaga,nomeEmpresa 
                                    FROM tbvaga
                                    INNER JOIN tbempresa 
                                    on tbvaga.idEmpresa = tbempresa.idEmpresa
                                    WHERE ativoVaga LIKE 's' AND bairroVaga NOT LIKE ? ");

        $stmt->bindValue(1, $bairro->getBairroVaga());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function busca($campo){//Mostra todas Vagas
        $resultado = array();

        $stmt = $this->con->prepare("SELECT idVaga,descVaga,cargo,dtInicio,dtFim,cepVaga,enderecoVaga,numeroVaga,complementoVaga,bairroVaga,zonaVaga,horarioTrabalho,salarioVaga,ativoVaga,nomeEmpresa 
                                    FROM tbvaga
                                    INNER JOIN tbempresa 
                                    on tbvaga.idEmpresa = tbempresa.idEmpresa
                                    WHERE ativoVaga LIKE 's' AND (cargo LIKE :camp OR descVaga LIKE :camp OR nomeEmpresa LIKE :camp) ");

        $stmt->bindValue('camp', '%'.$campo->getBusca().'%');
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function buscaRecru($campo){//Mostra todas Vagas
        $resultado = array();
        $stmt = $this->con->prepare("SELECT idVaga,descVaga,cargo,dtInicio,dtFim,cepVaga,enderecoVaga,numeroVaga,complementoVaga,bairroVaga,cidadeVaga,zonaVaga,horarioTrabalho,salarioVaga,ativoVaga,nomeEmpresa
                                    FROM tbvaga
                                    INNER JOIN tbempresa 
                                    on tbvaga.idEmpresa = tbempresa.idEmpresa
                                    WHERE tbvaga.idEmpresa = :id AND ativoVaga LIKE 's' AND (cargo LIKE :camp OR descVaga LIKE :camp) ");
        
        $stmt->bindValue('id', $campo->getIdEmpresa());
        $stmt->bindValue('camp', '%'.$campo->getBusca().'%');
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;  

    }

    public function buscaEmpresa($campo){//Mostra todos Recrutador
        $resultado = array();

        $stmt = $this->con->prepare("SELECT idRecrutador, nomeRecrutador,cpfRecrutador,emailRecrutador, nomeEmpresa 
                                        FROM tbRecrutador
                                        INNER JOIN tbempresa
                                        on tbrecrutador.idEmpresa = tbempresa.idEmpresa
                                        WHERE tbrecrutador.idEmpresa = ? AND nomeRecrutador LIKE ?");

        $stmt->bindValue(1, $campo->getIdEmpresa());
        $stmt->bindValue(2, '%'.$campo->getBusca().'%');
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;        
    }    

    public function buscarInteresse($campo){//Mostra um Interesse
        $resultado = array();
        $stmt = $this->con->prepare("SELECT tbcandidato.idCandidato,nomeCandidato,emailCandidato,bairroCandidato,zonaCandidato,cargo FROM tbcandidato
                                    INNER JOIN tbinteresse
                                        ON tbcandidato.idCandidato = tbinteresse.idCandidato
                                            INNER JOIN tbvaga
                                                ON tbinteresse.idVaga = tbvaga.idVaga
                                    WHERE  tbinteresse.idVaga = :id AND(nomeCandidato LIKE :camp OR emailCandidato LIKE :camp OR bairroCandidato LIKE :camp)");
        
            $stmt->bindValue('id', $campo->getIdVaga());
            $stmt->bindValue('camp', '%'.$campo->getBusca().'%');
            $stmt->execute();
    
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;  
            
        
    }

    public function getBairroVaga()
    {
        return $this->bairroVaga;
    }

    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    public function getBusca()
    {
        return $this->busca;
    }
    
    public function getIdVaga()
    {
        return $this->idVaga;
    }

//////////////////////////////////////

    public function setBairroVaga($bairroVaga)
    {
        $this->bairroVaga = $bairroVaga;

        return $this;
    }


    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

    public function setBusca($busca)
    {
        $this->busca = $busca;

        return $this;
    }

    public function setIdVaga($idVaga)
    {
        $this->idVaga = $idVaga;

        return $this;
    }
}
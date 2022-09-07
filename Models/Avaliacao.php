<?php

require_once 'Conexao.php';

Class Avaliacao{
    private $con;
    private $idAvaliacao;
    private $comentario;
    private $estrela;
    private $dtAvaliacao;
    private $idCandidato;
    private $idEmpresa;

    
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrar($Avaliacao)
    {
        $stmt = $this->con->prepare("INSERT INTO tbavaliacao (comentario,estrela
                                                ,dtAvaliacao,idCandidato,idEmpresa)
                                                VALUES (?,?,?,?,?)");
        
        $stmt->bindValue(1, $Avaliacao->getComentario());
        $stmt->bindValue(2, $Avaliacao->getEstrela());
        $stmt->bindValue(3, $Avaliacao->getDtAvaliacao());
        $stmt->bindValue(4, $Avaliacao->getIdCandidato());
        $stmt->bindValue(4, $Avaliacao->getIdEmpresa());
        $stmt->execute();

        return true;
    }

    
    public function mostraAvaliacao($id)//Mostra Experiencia
    {
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbavaliacao WHERE idCandidato = ?");
        
        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function delete($id){//Apagar um Experiencia

        $stmt = $this->con->prepare("DELETE FROM tbavaliacao WHERE idAvaliacao = ?");
        $stmt->bindValue(1, $id->getIdAvaliacao());
        $stmt->execute();
        //return 'Apagado com sucesso';
    }

    public function update($atualizar){//Atualizar

        $stmt = $this->con->prepare("UPDATE tbavaliacao SET comentario = ?, estrela = ?,
                                        dtAvaliacao = ?, idCandidato = ?, idEmpresa = ?
                                        WHERE idAvaliacao = ?");
       
        $stmt->bindValue(1, $atualizar->getComentario());
        $stmt->bindValue(2, $atualizar->getEstrela());
        $stmt->bindValue(3, $atualizar->getIdAvaliacao());
        $stmt->bindValue(4, $atualizar->getIdCandidato());
        $stmt->bindValue(5, $atualizar->getIdEmpresa());
        $stmt->execute();
        // $dado = $stmt->fetch();
        // return $dado;
        //return true;
        return 'Atualização realizado com sucesso';
    }

    public function getIdAvaliacao()
    {
        return $this->idAvaliacao;
    }

    public function setIdAvaliacao($idAvaliacao)
    {
        return $this->idAvaliacao = $idAvaliacao;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        return $this->comentario = $comentario;
    }

    public function getEstrela()
    {
        return $this->estrela;
    }

    public function setEstrela($estrela)
    {
        return $this->estrela = $estrela;
    }

    public function getDtAvaliacao()
    {
        return $this->dtAvaliacao;
    }

    public function setDtAvaliacao($dtAvaliacao)
    {
        return $this->dtAvaliacao = $dtAvaliacao;
    }

    public function getIdCandidato()
    {
        return $this->idCandidato;
    }

    public function setIdCandidato($idCandidato)
    {
        return $this->idCandidato = $idCandidato;
    }

    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa)
    {
        return $this->idEmpresa = $idEmpresa;
    }


}//fim da Avaliacao

?>
<?php

require_once 'Conexao.php';

class Vaga{

    private $con;
    private $idVaga;
    private $cargo;
    private $descVaga;
    private $salarioVaga;
    private $dtInicio;
    private $dtFim;
    private $horarioTrabalho;
    private $zonaVaga;
    private $cepVaga;
    private $enderecoVaga;
    private $numeroVaga;
    private $complementoVaga;
    private $bairroVaga;
    private $cidade;
    private $ativoVaga;
    private $idEmpresa;
    

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarVaga($idEmpr){//cadatrar vaga

        $erro = New Erro();
        $cargo = htmlentities(addslashes($_POST['txCargo']));
        $descVaga = htmlentities(addslashes($_POST['txDescVaga']));
        $salario = htmlentities(addslashes($_POST['txSalario']));
        $dtInicio = htmlentities(addslashes($_POST['txDtInicio']));
        $dtFim = htmlentities(addslashes($_POST['txDtFim']));
        $horario = htmlentities(addslashes($_POST['txHorario']));
        $cep = htmlentities(addslashes($_POST['txCepVaga']));
        $endereco = htmlentities(addslashes($_POST['txEndereco']));
        $numero = htmlentities(addslashes($_POST['txNumero']));
        $complemento = htmlentities(addslashes($_POST['txComplemento']));
        $bairro = htmlentities(addslashes($_POST['txBairro']));
        $cidade = htmlentities(addslashes($_POST['txCidade']));
        $idEmpresa = htmlentities(addslashes($idEmpr));

        //Verficar se esta preenchido
        if(!empty($cargo) && !empty($descVaga) && !empty($salario) && !empty($dtInicio) 
         && !empty($horario) && !empty($cep) && !empty($endereco) && !empty($numero)
          && !empty($bairro) && !empty($cidade))
         {
            
            $v = New Vaga();
            $v->setCargo($cargo);
            $v->setDescVaga($descVaga);
            $v->setSalarioVaga($salario);
            $v->setDtInicio($dtInicio);
            $v->setDtFim($dtFim);
            $v->setHorarioTrabalho($horario);
            $v->setCepVaga($cep);
            $v->setEnderecoVaga($endereco);
            $v->setNumeroVaga($numero);
            $v->setComplementoVaga($complemento);
            $v->setBairroVaga($bairro);
            $v->setCidade($cidade);
            $v->setIdEmpresa($idEmpresa);
            
            $v->cadastrar($v);

            $_POST['txCargo'] = '';
            $_POST['txDescVaga'] = '';
            $_POST['txSalario'] = '';
            $_POST['txDtInicio'] = '';
            $_POST['txDtFim'] = '';
            $_POST['txHorario'] = '';
            $_POST['txCepVaga'] = '';
            $_POST['txEndereco'] = '';
            $_POST['txNumero'] = '';
            $_POST['txComplemento'] = '';
            $_POST['txBairro'] = '';
            $_POST['txCidade'] = '';

            $erro->sucesso();

         }else
         {  
             $erro->campoVazioFeed();
         }


    }

    public function cadastrar($vaga){//cadatrar vaga
                 
            $stmt = $this->con->prepare("INSERT INTO tbVaga (cargo,descVaga,salarioVaga,
                                        dtInicio,dtFim,horarioTrabalho,cepVaga
                                        ,enderecoVaga,numeroVaga,complementoVaga
                                        ,bairroVaga,cidadeVaga,ativoVaga,idEmpresa)
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindValue(1, $vaga->getCargo());
            $stmt->bindValue(2, $vaga->getDescVaga());
            $stmt->bindValue(3, $vaga->getSalarioVaga());
            $stmt->bindValue(4, $vaga->getDtInicio());
            $stmt->bindValue(5, $vaga->getDtFim());
            $stmt->bindValue(6, $vaga->getHorarioTrabalho());
            $stmt->bindValue(7, $vaga->getCepVaga());
            $stmt->bindValue(8, $vaga->getEnderecoVaga());
            $stmt->bindValue(9, $vaga->getNumeroVaga());
            $stmt->bindValue(10, $vaga->getComplementoVaga());
            $stmt->bindValue(11, $vaga->getBairroVaga());
            $stmt->bindValue(12, $vaga->getCidade());
            $stmt->bindValue(13, "s");
            $stmt->bindValue(14, $vaga->getIdEmpresa());
            $stmt->execute();
            return true;
            //return 'Cadastro realizado com sucesso';

    }
    public function mostraNomeVaga($id)
    {
        $resultado = array();
        $stmt = $this->con->prepare("SELECT cargo,idVaga FROM tbvaga                      
                                        WHERE idVaga = ?");
        $stmt->bindValue(1, $id->getIdVaga());
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado; 
    }

    public function mostraVaga($id){//Mostra um Candidato

        $resultado = array();
        $stmt = $this->con->prepare("SELECT idVaga,descVaga,cargo,dtInicio,dtFim,cepVaga,enderecoVaga,numeroVaga,complementoVaga,bairroVaga,cidadeVaga,zonaVaga,horarioTrabalho,salarioVaga,ativoVaga,nomeEmpresa 
                                        FROM tbvaga
                                        INNER JOIN tbempresa 
                                        on tbvaga.idEmpresa = tbempresa.idEmpresa
                                        WHERE idVaga = ?");
        
        $stmt->bindValue(1, $id->getIdVaga());
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function delete($id){//Apagar um vaga

        $stmt = $this->con->prepare("UPDATE tbVaga
                                    SET ativoVaga = ?
                                     WHERE idVaga = ?");

        $stmt->bindValue(1, 'n');
        $stmt->bindValue(2, $id->getIdVaga());
        $stmt->execute();
        header("Location: /newjobs/feed");
        //return 'Apagado com sucesso';
    }


    public function updateVaga($id){//cadatrar vaga

        $erro = New Erro();
        $cargo = htmlentities(addslashes($_POST['txCargoVaga']));
        $descVaga = htmlentities(addslashes($_POST['txDescVaga']));
        $salario = htmlentities(addslashes($_POST['txSalario']));
        $dtInicio = htmlentities(addslashes($_POST['txDtInicio']));
        $dtFim = htmlentities(addslashes($_POST['txDtFim']));
        $horario = htmlentities(addslashes($_POST['txHorario']));
        $cep = htmlentities(addslashes($_POST['txCepVaga']));
        $endereco = htmlentities(addslashes($_POST['txEndereco']));
        $numero = htmlentities(addslashes($_POST['txNumero']));
        $complemento = htmlentities(addslashes($_POST['txComplemento']));
        $bairro = htmlentities(addslashes($_POST['txBairro']));
        $cidade = htmlentities(addslashes($_POST['txCidade']));

        //Verficar se esta preenchido
        if(!empty($cargo) && !empty($descVaga) && !empty($salario) && !empty($dtInicio)
         && !empty($horario) && !empty($cep) && !empty($endereco) && !empty($numero)
          && !empty($bairro) && !empty($cidade))
         {

            $v = New Vaga();
            $v->setCargo($cargo);
            $v->setDescVaga($descVaga);
            $v->setSalarioVaga($salario);
            $v->setDtInicio($dtInicio);
            $v->setDtFim($dtFim);
            $v->setHorarioTrabalho($horario);
            $v->setCepVaga($cep);
            $v->setEnderecoVaga($endereco);
            $v->setNumeroVaga($numero);
            $v->setComplementoVaga($complemento);
            $v->setBairroVaga($bairro);
            $v->setCidade($cidade);
            $v->setIdVaga($id);
            
            $v->update($v);

         }else
         {  
             $erro->campoVazioFeed();
         }


    }


    
    public function update($atualizar){//Atualizar

        $erro = New Erro();
            $stmt = $this->con->prepare("UPDATE tbvaga SET cargo = ?,descVaga = ?,salarioVaga = ?,
                                        dtInicio = ?,dtFim = ?,horarioTrabalho = ?,cepVaga = ?
                                        ,enderecoVaga = ?,numeroVaga = ?,complementoVaga = ?
                                        ,bairroVaga = ?,cidadeVaga = ?

                                        WHERE idVaga = ?");
           
            $stmt->bindValue(1, $atualizar->getCargo());
            $stmt->bindValue(2, $atualizar->getDescVaga());
            $stmt->bindValue(3, $atualizar->getSalarioVaga());
            $stmt->bindValue(4, $atualizar->getDtInicio());
            $stmt->bindValue(5, $atualizar->getDtFim());
            $stmt->bindValue(6, $atualizar->getHorarioTrabalho());
            $stmt->bindValue(7, $atualizar->getCepVaga());
            $stmt->bindValue(8, $atualizar->getEnderecoVaga());
            $stmt->bindValue(9, $atualizar->getNumeroVaga());
            $stmt->bindValue(10, $atualizar->getComplementoVaga());
            $stmt->bindValue(11, $atualizar->getBairroVaga());
            $stmt->bindValue(12, $atualizar->getCidade());
            $stmt->bindValue(13, $atualizar->getIdVaga());
            $stmt->execute();
            $erro->atualizadoFeed();
            //header("Location: /newjobs/feed#fecharedit");
            // $dado = $stmt->fetch();
            // return $dado;
            //return true;
            //return 'Atualização realizado com sucesso';


    }  

    // SET da Classe
    public function getIdVaga(){
        return $this->idVaga;
    }
    public function getDescVaga(){
        return $this->descVaga;
    }
    public function getCargo(){  
        return $this->cargo;
    }
    public function getDtInicio(){
        return $this->dtInicio;
    }
    public function getDtFim(){
        return $this->dtFim;
    }
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    public function getSalarioVaga()
    {
        return $this->salarioVaga;
    }
    public function getHorarioTrabalho()
    {
        return $this->horarioTrabalho;
    }
    public function getZonaVaga()
    {
        return $this->zonaVaga;
    }
    public function getCepVaga()
    {
        return $this->cepVaga;
    }
    public function getEnderecoVaga()
    {
        return $this->enderecoVaga;
    }
    public function getNumeroVaga()
    {
        return $this->numeroVaga;
    }
    public function getComplementoVaga()
    {
        return $this->complementoVaga;
    }
    public function getBairroVaga()
    {
        return $this->bairroVaga;
    }
    public function getAtivoVaga()
    {
        return $this->ativoVaga;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
   

    // GET da CLASSE

    public function setIdVaga($id){
        $this->idVaga = $id;
    }
    public function setDescVaga($vaga){
        $this->descVaga = $vaga;
    }
    public function setCargo($cargo){
        $this->cargo = $cargo;
    }
    public function setDtInicio($data){
        $this->dtInicio = $data;
    }
    public function setDtFim($dtfim){
        $this->dtFim = $dtfim;
    }
    public function setIdEmpresa($empresa){
        $this->idEmpresa = $empresa;
    }
    public function setSalarioVaga($salarioVaga)
    {
        $this->salarioVaga = $salarioVaga;

        return $this;
    }
    public function setHorarioTrabalho($horarioTrabalho)
    {
        $this->horarioTrabalho = $horarioTrabalho;

        return $this;
    }
    public function setZonaVaga($zonaVaga)
    {
        $this->zonaVaga = $zonaVaga;

        return $this;
    }
    public function setCepVaga($cepVaga)
    {
        $this->cepVaga = $cepVaga;

        return $this;
    }
    public function setEnderecoVaga($enderecoVaga)
    {
        $this->enderecoVaga = $enderecoVaga;

        return $this;
    }
    public function setNumeroVaga($numeroVaga)
    {
        $this->numeroVaga = $numeroVaga;

        return $this;
    }
    public function setComplementoVaga($complementoVaga)
    {
        $this->complementoVaga = $complementoVaga;

        return $this;
    }
    public function setBairroVaga($bairroVaga)
    {
        $this->bairroVaga = $bairroVaga;

        return $this;
    }
    public function setAtivoVaga($ativoVaga)
    {
        $this->ativoVaga = $ativoVaga;

        return $this;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }
}//fim da a class Vaga
?>
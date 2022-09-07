<?php

require_once 'Conexao.php';

class Candidato{

    private $con;
    private $id;
    private $nome;
    private $cpf;
    private $dtNascto;
    private $estadoCivil;
    private $nascionalidade;
    private $usuario;
    private $email;
    private $senha;
    private $endereco;
    private $numero;
    private $complemento;
    private $cep;
    private $bairro;
    private $cidade;
    private $idFoneCandidato;
    private $foneCandidato;
    private $zona;
    private $ativo;

 
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarC()
    {
            $erro = New Erro();
            $nome = htmlentities(addslashes($_POST['txNomeCandi']));
            $cpf = htmlentities(addslashes($_POST['txCpfCandi']));
            $nascto = htmlentities(addslashes($_POST['txdtNascto']));
            $estadoCivil = htmlentities(addslashes($_POST['txEstadoCivil']));
            $nascionalidade = htmlentities(addslashes($_POST['txNascionalidade']));
            $usuario = htmlentities(addslashes($_POST['txUsuario']));
            $email = htmlentities(addslashes($_POST['txEmail']));
            $senha = htmlentities(addslashes($_POST['txSenha']));
            $confirmarSenha = htmlentities(addslashes($_POST['txConfirmarSenha']));
            $cep = htmlentities(addslashes($_POST['cep']));
            $rua = htmlentities(addslashes($_POST['rua']));
            $numero = htmlentities(addslashes($_POST['txNumero']));
            $complemento = htmlentities(addslashes($_POST['txComplemento']));
            $bairro = htmlentities(addslashes($_POST['bairro']));
            $cidade = htmlentities(addslashes($_POST['cidade']));
           
    
            //Verficar se esta preenchido
            if(!empty($nome) && !empty($cpf) && !empty($nascto) && !empty($estadoCivil) &&
            !empty($nascionalidade) && !empty($usuario) && !empty($email) && !empty($senha) &&
            !empty($confirmarSenha) && !empty($cep) && !empty($rua) && !empty($numero) &&
             !empty($bairro) && !empty($cidade))
             {
                 $cpf = preg_replace('/[^0-9]/','',$cpf);
                 $CpfM = new CpfCnpj();
                 if(strlen($cpf)<11)
                 {  
                    $_POST['txCpfCandi'] = '';
                    $erro->digitoCpf();

                 }elseif($CpfM->validarCpf($cpf))
                 {
                        if($senha == $confirmarSenha)
                        {  
                        
                            $c = new Candidato();
                            $c->setNomeCandidato($nome);
                            $c->setCpfCandidato($cpf);
                            $c->setDtNascto($nascto);
                            $c->setEstadoCivil($estadoCivil);
                            $c->setNascionalidade($nascionalidade);
                            $c->setUsuario($usuario);
                            $c->setEmail($email);
                            $c->setSenha($senha);
                            $c->setEndereco($rua);
                            $c->setNumero($numero);
                            $c->setComplemento($complemento);
                            $c->setCep($cep);
                            $c->setBairro($bairro);
                            $c->setCidade($cidade);
                            
            
                            if($c->cadastrar($c))
                            {
                                $_POST['txNomeCandi'] = '';
                                $_POST['txCpfCandi'] = '';
                                $_POST['txdtNascto'] = '';
                                $_POST['txEstadoCivil'] = '';
                                $_POST['txNascionalidade'] = '';
                                $_POST['txUsuario'] = '';
                                $_POST['txEmail'] = '';
                                $_POST['txSenha'] = '';
                                $_POST['txConfirmarSenha'] = '';
                                $_POST['cep'] = '';
                                $_POST['rua'] = '';
                                $_POST['txNumero'] = '';
                                $_POST['txComplemento'] = '';
                                $_POST['bairro'] = '';
                                $_POST['cidade'] = '';
                               
                                session_start();
                                $_SESSION['sucesso'] = true;
                                
                                header("Location: login");

                            }else
                            {  
                                $_POST['txUsuario'] = '';
                                $erro->erroUsuario();

                            }
                   
                        }else
                        {   
                            $erro->senhaErro();
                        }
                    

                    }else
                    {   
                        $erro->cpfInvalido();
                    }
                
    
             }else
             {  
                $erro->campoVazio();
               
             }
        

    }//fim da cadastrarC
    
//cadatrar Candidato
    public function cadastrar($candidato)
    {
        $stmt = $this->con->prepare("SELECT idEmpresa FROM tbempresa
                                                WHERE usuarioEmpresa = ?");

        $stmt->bindValue(1, $candidato->getUsuario());
        $stmt->execute();

        if($stmt->rowCount()>0)
        {   
            return false;

        }else
        {
            $stmt = $this->con->prepare("SELECT idRecrutador FROM tbrecrutador
                                                    WHERE usuarioRecrutador = ?");
    
            $stmt->bindValue(1, $candidato->getUsuario());
            $stmt->execute();
    
            if($stmt->rowCount()>0)
            {
                return false;

            }else
            {
                $stmt = $this->con->prepare("SELECT idCandidato FROM tbcandidato 
                                                        WHERE usuarioCandidato = ?");

                $stmt->bindValue(1,$candidato->getUsuario());
                $stmt->execute();

                if($stmt->rowCount()>0)
                {
                    return false;

                }else
                {   
                    $stmt = $this->con->prepare("INSERT INTO tbcandidato (nomeCandidato, cpfCandidato
                                                        ,dtNascto,estadoCivil
                                                        ,nascionalidade,usuarioCandidato
                                                        ,emailCandidato,senhaCandidato,enderecoCandidato
                                                        ,numeroCandidato,complementoCandidato
                                                        ,cepCandidato,bairroCandidato,cidadeCandidato,ativoCandidato)
                                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bindValue(1, $candidato->getNomeCandidato());
                    $stmt->bindValue(2, $candidato->getCpfCandidato());
                    $stmt->bindValue(3, $candidato->getDtNascto());
                    $stmt->bindValue(4, $candidato->getEstadoCivil());
                    $stmt->bindValue(5, $candidato->getNascionalidade());
                    $stmt->bindValue(6, $candidato->getUsuario());
                    $stmt->bindValue(7, $candidato->getEmail());
                    $stmt->bindValue(8, password_hash($candidato->getSenha(),PASSWORD_BCRYPT,['cost'=>13]));
                    $stmt->bindValue(9, $candidato->getEndereco());
                    $stmt->bindValue(10, $candidato->getNumero());
                    $stmt->bindValue(11, $candidato->getComplemento());
                    $stmt->bindValue(12, $candidato->getCep());
                    $stmt->bindValue(13, $candidato->getBairro());
                    $stmt->bindValue(14, $candidato->getCidade());
                    $stmt->bindValue(15, "s");
                    $stmt->execute();
                    return true;
                    //return 'Cadastro realizado com sucesso';
                }
            }
            
        }
    }

    public function delete($id){//Apagar um Candidato

        $stmt = $this->con->prepare("UPDATE tbcandidato SET ativoCandidato = 'n' WHERE idCandidato = ?");
        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();
        //return 'Apagado com sucesso';
    }

    public function mostraCliente($id){//Mostra um Candidato

        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbcandidato
                                         WHERE idCandidato = ?");
        
        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function mostraInforClie($id){//Mostra um Candidato

        $resultado = array();
        $stmt = $this->con->prepare("SELECT nomeCandidato,estadoCivil,nascionalidade
                                    ,emailCandidato,bairroCandidato,zonaCandidato
                                    FROM tbcandidato
                                         WHERE idCandidato = ?");
        
        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function atualizarFoneC($id,$idFoCadi)
    {
        $erro = New Erro(); 
        $tele = htmlentities(addslashes($_POST['txEditFoneCandidato']));      

        //Verficar se esta preenchido
        if(!empty($tele) && !empty($id))
         {
            $c = new Candidato();
            $c->setFoneCandidato($tele);
            $c->setIdFoneCandidato($id);
            $c->setIdCandidato($idFoCadi);
            
            $c->updateFone($c); 

         }else
         {
            $erro->campoVazio();
         }

    }

    public function updateFone($atualizar)//Atualizar
    {   
        $stmt = $this->con->prepare("SELECT foneCandidato,idCandidato FROM tbfonecandidato
                                    WHERE foneCandidato = ? AND idCandidato = ?");

        $stmt->bindValue(1, $atualizar->getFoneCandidato());
        $stmt->bindValue(2, $atualizar->getIdCandidato());
        $stmt->execute();

        $erro = New Erro(); 
        if($stmt->rowCount()>0)
        {   
            $erro->jaCadastradoFone();
            //return false;

        }else
        {
            $erro = New Erro(); 
            $stmt = $this->con->prepare("UPDATE tbfonecandidato SET foneCandidato = ?    
                                            WHERE idFoneCandidato = ? ");

            $stmt->bindValue(1, $atualizar->getFoneCandidato());
            $stmt->bindValue(2, $atualizar->getIdFoneCandidato());
            $stmt->execute();

            $erro->atualizadoPerfil();
        }

    }


    public function cadastrarFoneC($id)
    {
        $erro = New Erro(); 
        $tele = htmlentities(addslashes($_POST['txFoneCandidato']));
        

        //Verficar se esta preenchido
        if(!empty($tele) && !empty($id))
         {
            $c = new Candidato();
            $c->setFoneCandidato($tele);
            $c->setIdCandidato($id);

            $c->cadastrarFone($c);

         }else
         {
            $erro->campoVazio();
         }

    }//fim do cadastrarFoneE

    public function cadastrarFone($fone)
    {
        $stmt = $this->con->prepare("SELECT foneCandidato,idCandidato FROM tbfonecandidato
                                        WHERE foneCandidato = ? AND idCandidato = ?");

        $stmt->bindValue(1, $fone->getFoneCandidato());
        $stmt->bindValue(2, $fone->getIdCandidato());
        $stmt->execute();

        $erro = New Erro(); 
        if($stmt->rowCount()>0)
        {   
            $erro->jaCadastradoFone();
            return false;

        }else
        {
            $stmt = $this->con->prepare("INSERT INTO tbfonecandidato (foneCandidato,idCandidato)
                                                VALUES (?,?)");
            
            $stmt->bindValue(1, $fone->getFoneCandidato());
            $stmt->bindValue(2, $fone->getIdCandidato());
            $stmt->execute();
            
            $erro->sucessoPerfil();

            return true;
        }
    }

    public function mostraFone($fone)
    {
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbfonecandidato
                                    WHERE idCandidato = ?");
        
        $stmt->bindValue(1, $fone->getIdCandidato());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function mostraTelefone($fone)
    {
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbfonecandidato
                                    WHERE idFoneCandidato = ?");
        
        $stmt->bindValue(1, $fone->getIdFoneCandidato());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;   
    }

    public function deleteFone($id){//Apagar um Empresa

        $stmt = $this->con->prepare("DELETE FROM tbfonecandidato WHERE idFoneCandidato = ?");
        $stmt->bindValue(1, $id->getIdFoneCandidato());
        $stmt->execute();
        header("Location: perfil");
        //return 'Apagado com sucesso';
    }



    public function editarC($idC)
    {
            $erro = New Erro();
            $nome = htmlentities(addslashes($_POST['txNomeCandi']));
            $cpf = htmlentities(addslashes($_POST['txCpfCandi']));
            $nascto = htmlentities(addslashes($_POST['txdtNascto']));
            $estadoCivil = htmlentities(addslashes($_POST['txEstadoCivil']));
            $nascionalidade = htmlentities(addslashes($_POST['txNascionalidade']));
            $email = htmlentities(addslashes($_POST['txEmail']));
            $cep = htmlentities(addslashes($_POST['cep']));
            $rua = htmlentities(addslashes($_POST['rua']));
            $numero = htmlentities(addslashes($_POST['txNumero']));
            $complemento = htmlentities(addslashes($_POST['txComplemento']));
            $bairro = htmlentities(addslashes($_POST['bairro']));
            $cidade = htmlentities(addslashes($_POST['cidade']));
            $id = htmlentities(addslashes($idC));
    
            //Verficar se esta preenchido
            if(!empty($nome) && !empty($cpf) && !empty($nascto) && !empty($estadoCivil) &&
            !empty($nascionalidade) && !empty($email) && !empty($cep) && !empty($rua) && !empty($numero) &&
             !empty($bairro) && !empty($cidade))
             {
                 $cpf = preg_replace('/[^0-9]/','',$cpf);
                 $CpfM = new CpfCnpj();
                 if(strlen($cpf)<11)
                 {  
                    $_POST['txCpfCandi'] = '';
                    $erro->digitoCpf();

                 }elseif($CpfM->validarCpf($cpf))
                 {
                    
                    $c = new Candidato();
                    $c->setNomeCandidato($nome);
                    $c->setCpfCandidato($cpf);
                    $c->setDtNascto($nascto);
                    $c->setEstadoCivil($estadoCivil);
                    $c->setNascionalidade($nascionalidade);
                    $c->setEmail($email);
                    $c->setEndereco($rua);
                    $c->setNumero($numero);
                    $c->setComplemento($complemento);
                    $c->setCep($cep);
                    $c->setBairro($bairro);
                    $c->setCidade($cidade);
                    $c->setIdCandidato($id);

                    $c->update($c);
                                     
                    

                    }else
                    {   
                        $erro->cpfInvalido();
                    }
    
             }else
             {  
                $erro->campoVazio();
             }
        

    }//fim da cadastrarC

    public function update($atualizar){//Atualizar

        $stmt = $this->con->prepare("UPDATE tbCandidato SET nomeCandidato = :n,cpfCandidato = :cp
                                        ,dtNascto = :dt,estadoCivil = :es
                                        ,nascionalidade = :nas
                                        ,enderecoCandidato = :ende
                                        ,numeroCandidato = :num,complementoCandidato = :com
                                        ,cepCandidato = :ce,bairroCandidato= :bai,cidadeCandidato = :cid
                                        WHERE idCandidato = :idCa");
           
            $stmt->bindValue(":n", $atualizar->getNomeCandidato());
            $stmt->bindValue("cp", $atualizar->getCpfCandidato());
            $stmt->bindValue(":dt", $atualizar->getDtNascto());
            $stmt->bindValue(":es", $atualizar->getEstadoCivil());
            $stmt->bindValue(":nas", $atualizar->getNascionalidade());
            $stmt->bindValue(":ende", $atualizar->getEndereco());
            $stmt->bindValue(":num", $atualizar->getNumero());
            $stmt->bindValue(":com", $atualizar->getComplemento());
            $stmt->bindValue(":ce", $atualizar->getCep());
            $stmt->bindValue(":bai", $atualizar->getBairro());
            $stmt->bindValue(":cid", $atualizar->getCidade());
            $stmt->bindValue(":idCa", $atualizar->getIdCandidato());
            $stmt->execute();

            $erro = New Erro();
            $erro->atualizadoPerfil();
            // $dado = $stmt->fetch();
            // return $dado;
            //return true;
            //return 'Atualização realizado com sucesso';


    }

    // GET da CLASSE
    public function getIdCandidato(){
        return $this->id;
    }
    public function getNomeCandidato(){
        return $this->nome;
    }
    public function getCpfCandidato(){  
        return $this->cpf;
    }
    public function getDtNascto(){
        return $this->dtNascto;
    }
    public function getEstadoCivil(){
        return $this->estadoCivil;
    }
    public function getNascionalidade(){
        return $this->nascionalidade;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function getComplemento(){
        return $this->complemento;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCidade(){
        return $this->cidade;
    }

    public function getFoneCandidato()
    {
        return $this->foneCandidato;
    }

    public function getIdFoneCandidato()
    {
        return $this->idFoneCandidato;
    }

    public function getZona()
    {
        return $this->zona;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    
        // SET da Classe
    public function setIdCandidato($id){
        $this->id = $id;
    }
    public function setNomeCandidato($Nome){
        $this->nome = $Nome;
    }
    public function setCpfCandidato($cpf){
        $this->cpf = $cpf;
    }
    public function setDtNascto($data){
        $this->dtNascto = $data;
    }
    public function setEstadoCivil($estado){
        $this->estadoCivil = $estado;
    }
    public function setNascionalidade($nacio){
        $this->nascionalidade = $nacio;
    }
    public function setUsuario($Usuario){
        $this->usuario = $Usuario;
    }
    public function setEmail($Email){
        $this->email = $Email;
    }
    public function setSenha($Senha){
        $this->senha = $Senha;
    }
    public function setEndereco($Endereco){
        $this->endereco = $Endereco;
    }
    public function setNumero($Numero){
        $this->numero = $Numero;
    }
    public function setComplemento($Complemento){
        $this->complemento = $Complemento;
    }
    public function setCep($Cep){
        $this->cep = $Cep;
    }
    public function setBairro($Bairro){
        $this->bairro = $Bairro;
    }
    public function setCidade($Cidade){
        $this->cidade = $Cidade;
    }

    public function setFoneCandidato($fone)
    {
        $this->foneCandidato = $fone;
    }

    public function setIdFoneCandidato($id)
    {
        $this->idFoneCandidato = $id;
    }
    
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

}//fim do Candidato
?>
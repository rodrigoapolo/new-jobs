<?php

require_once 'Conexao.php';

class Recrutador{
    private $con;
    private $idRecrutador;
    private $nomeRecrutador;
    private $cpfRecrutador;
    private $email;
    private $usuario;
    private $senha;
    private $idEmpresa;

    // $this->setIdRecrutador($id);
    // $this->setNomeRecrutador($nomeRecrutador);
    // $this->setCpfRecrutador($cpfRecrutador);
    // $this->setUsuario($usuario);
    // $this->setEmailRecrutador($email);
    // $this->setSenha($senha);
    // $this->setIdEmpresa($idEmpresa);

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarR()
    {
            $erro = New Erro();
            $nome = htmlentities(addslashes($_POST['NomeRecrutador']));
            $cpf = htmlentities(addslashes($_POST['CpfRecrutador']));
            $email = htmlentities(addslashes($_POST['EmailRecrutador']));
            $usuario = htmlentities(addslashes($_POST['UsuarioRecrutador']));
            $senha = htmlentities(addslashes($_POST['SenhaRecrutador']));
            $confirmarSenha = htmlentities(addslashes($_POST['ConfirmarSenha']));
    
            //Verficar se esta preenchido
            if(!empty($nome) && !empty($cpf) && !empty($usuario) && !empty($email)
            && !empty($senha) && !empty($confirmarSenha)
            )
             {
                 $cpf = preg_replace('/[^0-9]/','',$cpf);
                 $valiCpf = New CpfCnpj;
                 
                 if(strlen($cpf)<11)
                 {  
                    $_POST['CpfRecrutador'] = '';
                 
                    $erro->digitoCpfFeed();

                 }elseif($valiCpf->validarCpf($cpf))
                 {
                         if($senha == $confirmarSenha)
                         {  
                            $r = New Recrutador();
                            $r->setNomeRecrutador($nome);
                            $r->setCpfRecrutador($cpf);
                            $r->setUsuario($usuario);
                            $r->setEmailRecrutador($email);
                            $r->setSenha($senha);
                            $r->setIdEmpresa($_SESSION['idEmpresa']);
            
                            if($r->cadastrar($r))
                            {
                                $_POST['NomeRecrutador'] = '';
                                $_POST['CpfRecrutador'] = '';
                                $_POST['UsuarioRecrutador'] = '';
                                $_POST['EmailRecrutador'] = '';
                                $_POST['SenhaRecrutador'] = '';
                                $_POST['ConfirmarSenha'] = '';

                                $erro->sucesso();

                            }else
                            {  
                                $_POST['UsuarioRecrutador'] = '';
                                $erro->erroUsuarioFeed();

                            }
                        }else
                        {   
                           $erro->senhaErroFeed();
                        }
                    

                    }else
                    {   
                        $erro->cpfInvalidoFeed();
                    }
                
    
             }else
             {  
                 $erro->campoVazioFeed();
             }
        

    }//fim da cadastrarR

    public function cadastrar($recrutador)//cadatrar Recrutador
    {
        $stmt = $this->con->prepare("SELECT idCandidato FROM tbcandidato 
                                        WHERE usuarioCandidato = ?");
            
        $stmt->bindValue(1, $recrutador->getUsuario());
        $stmt->execute();
            
        if($stmt->rowCount()>0)
        {
            return false;
                
        }else
        {   
            $stmt = $this->con->prepare("SELECT idEmpresa FROM tbempresa
                                                WHERE usuarioEmpresa = ?");

            $stmt->bindValue(1,$recrutador->getUsuario());
            $stmt->execute();

            if($stmt->rowCount()>0)
            {   
                return false;

            }else
            {

                $stmt = $this->con->prepare("SELECT idRecrutador FROM tbrecrutador
                                                    WHERE usuarioRecrutador = ?");
    
                $stmt->bindValue(1, $recrutador->getUsuario());
                $stmt->execute();
    
                if($stmt->rowCount()>0)
                {
                    return false;

                }else
                {
                    $stmt = $this->con->prepare("INSERT INTO tbRecrutador (nomeRecrutador,cpfRecrutador
                                                        ,usuarioRecrutador,emailRecrutador,senhaRecrutador
                                                        ,idEmpresa)
                                                        VALUES (?,?,?,?,?,?)");
                    $stmt->bindValue(1, $recrutador->getNomeRecrutador());
                    $stmt->bindValue(2, $recrutador->getCpfRecrutador());
                    $stmt->bindValue(3, $recrutador->getUsuario());
                    $stmt->bindValue(4, $recrutador->getEmailRecrutador());
                    $stmt->bindValue(5, password_hash($recrutador->getSenha(),PASSWORD_BCRYPT,['cost'=>13]));
                    $stmt->bindValue(6, $recrutador->getIdEmpresa());

                    $stmt->execute();
                    return true;
                            // return 'Cadastro realizado com sucesso';
                }
            }
        }
          
        
    }

    public function delete($id){//Apagar um Recrutador
 
        $stmt = $this->con->prepare("DELETE FROM tbrecrutador WHERE idRecrutador = ?");
        $stmt->bindValue(1, $id->getIdRecrutador());
        $stmt->execute();
        
        
        header("Location: /newjobs/feed");
        //return 'Apagado com sucesso';
    }

    public function mostraRecrutador($id){//Mostra um Recrutador

        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbrecrutador
                                         WHERE idRecrutador = ?");
        
        $stmt->bindValue(1, $id->getIdRecrutador());
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        //$_POST['txEditRecru']='';
        return $resultado;   
    }

    public function mostraRecrEmpre($id){//Mostra um Recrutador

        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbrecrutador
                                         WHERE idRecrutador = ?");
        
        $stmt->bindValue(1, $id->getIdRecrutador());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$_POST['txEditRecru']='';
        return $resultado;   
    }

    public function updateRe($id)
    {
            $erro = New Erro();
            $nomeR = htmlentities(addslashes($_POST['txEditNomeRecr']));
            $cpfR = htmlentities(addslashes($_POST['txEditCpfRecr']));
            $emailR = htmlentities(addslashes($_POST['txEditEmailRecr']));

    
            //Verficar se esta preenchido
            if(!empty($nomeR) && !empty($cpfR) && !empty($emailR))
             {
                $cpfR = preg_replace('/[^0-9]/','',$cpfR);
                $valiCpf = New CpfCnpj;
                
                if(strlen($cpfR)<11)
                {  
                   $_POST['CpfRecrutador'] = '';
                
                   $erro->digitoCpfFeed();

                }elseif($valiCpf->validarCpf($cpfR))
                {   
                    $rec = New Recrutador();
                    $rec->setNomeRecrutador($nomeR);
                    $rec->setCpfRecrutador($cpfR);
                    $rec->setEmailRecrutador($emailR);
                    $rec->setIdRecrutador($id);
                    $rec->update($rec);        
                   
                   
                }else
                {
                    $erro->cpfInvalidoFeed();
                }
             }else
             {  
                 $erro->campoVazioFeed();
             }
        

    }//fim da cadastrarR

    public function update($atualizar){//Atualizar

        $stmt = $this->con->prepare("UPDATE tbRecrutador SET nomeRecrutador = ?,cpfRecrutador = ?
                                        ,emailRecrutador = ?
                                        WHERE idRecrutador = ?");
           
            $stmt->bindValue(1, $atualizar->getNomeRecrutador());
            $stmt->bindValue(2, $atualizar->getCpfRecrutador());
            $stmt->bindValue(3, $atualizar->getEmailRecrutador());
            $stmt->bindValue(4, $atualizar->getIdRecrutador());
            $stmt->execute();
            $erro = New Erro();
            $erro->atualizadoFeed();

            //header("Location: /newjobs/feed#fecharedit");
            // $dado = $stmt->fetch();
            // return $dado;
            //return true;
            //return 'Atualização realizado com sucesso';


    }


    // SET da Classe
    public function getIdRecrutador(){
        return $this->idRecrutador;
    }
    public function getNomeRecrutador(){
        return $this->nomeRecrutador;
    }
    public function getCpfRecrutador(){  
        return $this->cpfRecrutador;
    }
    public function getEmailRecrutador(){
        return $this->email;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }                 
   
    // GET da CLASSE

    public function setIdRecrutador($id){
        $this->idRecrutador = $id;
    }
    public function setNomeRecrutador($nome){
        $this->nomeRecrutador = $nome;
    }
    public function setCpfRecrutador($cpf){
        $this->cpfRecrutador = $cpf;
    }
    public function setEmailRecrutador($email){
        $this->email = $email;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function setSenha($Senha){
        $this->senha = $Senha;
    }
    public function setIdEmpresa($Endereco){
        $this->idEmpresa = $Endereco;
    }           
  
}
?>
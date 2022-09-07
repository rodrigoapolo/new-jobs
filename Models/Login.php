<?php 

require_once 'Conexao.php';

class Login{

    private $con;
    private $usuario;
    private $senha;

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function logar($usuario){//Fazer o Login e Abre a Session

        $stmt = $this->con->prepare("SELECT idCandidato, senhaCandidato, usuarioCandidato FROM tbcandidato
                                            WHERE usuarioCandidato = ?");
        
        $stmt->bindValue(1, $usuario->getUsuario());
        $stmt->execute();
        
        if($stmt->rowCount()>0)
        {   
            $dado = $stmt->fetch();
            if($usuario->getUsuario() == $dado[2] && password_verify($usuario->getSenha(),$dado[1]))
            {
                session_start();
                $_SESSION['idCandidato'] = $dado ['idCandidato'];
                return true;
            }else
            {
                return false;
            }

        }else
        {   
            $stmt = $this->con->prepare("SELECT idEmpresa, senhaEmpresa, usuarioEmpresa FROM tbempresa
                                            WHERE usuarioEmpresa = ?");

            $stmt->bindValue(1, $usuario->getUsuario());
            $stmt->execute();

            if($stmt->rowCount()>0)
            {
                $dado = $stmt->fetch();
                if($usuario->getUsuario() == $dado[2] && password_verify($usuario->getSenha(),$dado[1]))
                {
                    session_start();
                    $_SESSION['idEmpresa'] = $dado ['idEmpresa'];
                    return true;
                }else
                {
                    return false;
                }
            }else
            {
                $stmt = $this->con->prepare("SELECT idRecrutador, senhaRecrutador, 	usuarioRecrutador FROM tbrecrutador
                                                WHERE usuarioRecrutador = ?");

                $stmt->bindValue(1, $usuario->getUsuario());
                $stmt->execute();

                if($stmt->rowCount()>0)
                {
                    $dado = $stmt->fetch();
                    if($usuario->getUsuario() == $dado[2] && password_verify($usuario->getSenha(),$dado[1]))
                    {
                        session_start();
                        $_SESSION['idRecrutador'] = $dado ['idRecrutador'];
                        return true;
                    }else
                    {
                        return false;
                    }
                }else
                {
                    return false;
                }

            }
            
            
        } 

    }//Fim do Logar

    public function verificarLogin()
    {
        $erro = New Erro(); 
        $usuario = addslashes($_POST['txUsuario']);
        $senha = addslashes($_POST['txSenha']);

        if(!empty($usuario) && !empty($senha))
        {   
            $l = new Login();
            $l->setUsuario($usuario);
            $l->setSenha($senha);
            
            if($l->logar($l))
            {   
                session_start();

                if(isset($_SESSION['idCandidato']) || isset($_SESSION['idEmpresa']) || isset($_SESSION['idRecrutador']))
                {
                    header("Location:  ../feed");  
                }

            }else
            {  
                $erro->emailSenha();
            }
        }else
        {   
            $erro->campoVazio();
        }
    }   

}//fim da Class

?>
<?php

require_once 'Conexao.php';

class Empresa
{
    private $con;

    private $id;
    private $nome;
    private $cnpj;
    private $email;
    private $usuario;
    private $senha;
    private $rua;
    private $numero;
    private $complemento;
    private $cep;
    private $bairro;
    private $cidade;
    private $zona;
    private $ativoEmpres;
    private $idFoneEmpresa;
    private $foneEmpresa;




    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarE()
    {
        $erro = new Erro();
        $nome = htmlentities(addslashes($_POST['txNomeEmpresa']));
        $cnpj = htmlentities(addslashes($_POST['txCnpf']));
        $email = htmlentities(addslashes($_POST['txEmail']));
        $usuario = htmlentities(addslashes($_POST['txUsuario']));
        $senha = htmlentities(addslashes($_POST['txSenha']));
        $confirmarSenha = htmlentities(addslashes($_POST['txConfirmarSenha']));
        $rua = htmlentities(addslashes($_POST['rua']));
        $numero = htmlentities(addslashes($_POST['txNumero']));
        $complemento = htmlentities(addslashes($_POST['txComplemento']));
        $cep = htmlentities(addslashes($_POST['cep']));
        $bairro = htmlentities(addslashes($_POST['bairro']));
        $cidade = htmlentities(addslashes($_POST['cidade']));

        //Verficar se esta preenchido
        if (
            !empty($nome) && !empty($cnpj) && !empty($email) && !empty($usuario) &&
            !empty($senha) && !empty($confirmarSenha) && !empty($rua) && !empty($numero) && !empty($cep) &&
            !empty($bairro) && !empty($cidade)
        ) {
            $cnpj = preg_replace('/\D/', '', $cnpj);
            $CnpjM = new CpfCnpj();
            if (strlen($cnpj) != 14) {
                $erro->digitoCnpj();
                return false;
            } else {
                if ($CnpjM->validarCnpj($cnpj)) {

                    if ($senha == $confirmarSenha) {
                    
                            $e = new Empresa();
                            $e->setNomeEmpresa($nome);
                            $e->setCnpjEmpresa($cnpj);
                            $e->setEmailEmpresa($email);
                            $e->setUsuario($usuario);
                            $e->setSenha($senha);
                            $e->setRua($rua);
                            $e->setNumero($numero);
                            $e->setComplemento($complemento);
                            $e->setCep($cep);
                            $e->setBairro($bairro);
                            $e->setCidade($cidade);
                            //cadatrar Empresa
                            if ($e->cadastrar($e)) {
                                $_POST['txNomeEmpresa'] = '';
                                $_POST['txCnpf'] = '';
                                $_POST['txEmail'] = '';
                                $_POST['txUsuario'] = '';
                                $_POST['txSenha'] = '';
                                $_POST['txConfirmarSenha'] = '';
                                $_POST['rua'] = '';
                                $_POST['txNumero'] = '';
                                $_POST['txComplemento'] = '';
                                $_POST['cep'] = '';
                                $_POST['bairro'] = '';
                                $_POST['cidade'] = '';
                                session_start();
                                $_SESSION['sucesso'] = true;

                                header("Location: login");
                            } else {
                                $_POST['txUsuario'] = '';
                                $erro->erroUsuario();
                            }
                 
                    } else {
                        $_POST['txSenha'] = '';
                        $_POST['txConfirmarSenha'] = '';
                        $erro->senhaErro();
                    }
                } else {
                    $erro->cnpjInvalido();
                }
            }
        } else {
            $erro->campoVazio();
        }
    } //fim do cadastrarE

    //cadatrar Empresa
    public function cadastrar($empresa)
    {
        $stmt = $this->con->prepare("SELECT idCandidato FROM tbcandidato 
                                                    WHERE usuarioCandidato = ?");

        $stmt->bindValue(1, $empresa->getUsuario());
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            $stmt = $this->con->prepare("SELECT idRecrutador FROM tbrecrutador
                                                    WHERE usuarioRecrutador = ?");

            $stmt->bindValue(1, $empresa->getUsuario());
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $stmt = $this->con->prepare("SELECT idEmpresa FROM tbempresa 
                                        WHERE usuarioEmpresa = ?");

                $stmt->bindValue(1, $empresa->getUsuario());
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    return false;
                } else {
                    $stmt = $this->con->prepare("INSERT INTO tbempresa (nomeEmpresa,cnpjEmpresa
                                                ,emailEmpresa,usuarioEmpresa,senhaEmpresa
                                                ,enderecoEmpresa,numeroEmpresa
                                                ,complementoEmpresa,cepEmpresa
                                                ,bairroEmpresa,cidadeEmpresa,ativoEmpresa)
                                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bindValue(1, $empresa->getNomeEmpresa());
                    $stmt->bindValue(2, $empresa->getCnpjEmpresa());
                    $stmt->bindValue(3, $empresa->getEmailEmpresa());
                    $stmt->bindValue(4, $empresa->getUsuario());
                    $stmt->bindValue(5, password_hash($empresa->getSenha(), PASSWORD_BCRYPT, ['cost' => 13]));
                    $stmt->bindValue(6, $empresa->getRua());
                    $stmt->bindValue(7, $empresa->getNumero());
                    $stmt->bindValue(8, $empresa->getComplemento());
                    $stmt->bindValue(9, $empresa->getCep());
                    $stmt->bindValue(10, $empresa->getBairro());
                    $stmt->bindValue(11, $empresa->getCidade());
                    $stmt->bindValue(12, "s");
                    $stmt->execute();

                    return true;
                }
            }
        }
    }

    public function delete($id)
    { //Apagar um Empresa

        $stmt = $this->con->prepare("UPDATE tbempresa SET ativoEmpresa = 'n' WHERE idEmpresa = ?");
        $stmt->bindValue(1, $id->getIdEmpresa());
        $stmt->execute();
        //return 'Apagado com sucesso';
    }

    public function mostraCliente($id)
    { //Mostra um Empresa

        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbempresa WHERE idEmpresa = ?");

        $stmt->bindValue(1, $id->getIdEmpresa());
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function cadastrarFoneE($id)
    {
        $erro = new Erro();
        $tele = htmlentities(addslashes($_POST['txFoneEmpresa']));


        //Verficar se esta preenchido
        if (!empty($tele) && !empty($id)) {
            $e = new Empresa();
            $e->setFoneEmpresa($tele);
            $e->setIdEmpresa($id);

            ///////////////////////////
            $e->cadastrarFone($e);
        } else {
            $erro->campoVazio();
        }
    } //fim do cadastrarFoneE

    public function cadastrarFone($fone)
    {
        $stmt = $this->con->prepare("SELECT foneEmpresa,idEmpresa FROM tbfoneempresa
                                        WHERE foneEmpresa = ? AND idEmpresa = ?");

        $stmt->bindValue(1, $fone->getFoneEmpresa());
        $stmt->bindValue(2, $fone->getIdEmpresa());
        $stmt->execute();

        $erro = new Erro();
        if ($stmt->rowCount() > 0) {
            $erro->jaCadastradoFone();
            return false;
        } else {
            $stmt = $this->con->prepare("INSERT INTO tbfoneempresa (foneEmpresa,idEmpresa)
                                                VALUES (?,?)");

            $stmt->bindValue(1, $fone->getFoneEmpresa());
            $stmt->bindValue(2, $fone->getIdEmpresa());
            $stmt->execute();
            $erro = new Erro();
            $erro->sucessoPerfil();
            return true;
        }
    }

    public function mostraFone($fone)
    {
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbfoneempresa
                                    WHERE idEmpresa = ?");

        $stmt->bindValue(1, $fone->getIdEmpresa());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function mostraTele($fone)
    {
        $resultado = array();
        $stmt = $this->con->prepare("SELECT * FROM tbfoneempresa
                                    WHERE idFoneEmpresa = ?");

        $stmt->bindValue(1, $fone->getIdFoneEmpresa());
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function deleteFone($id)
    { //Apagar um Empresa

        $stmt = $this->con->prepare("DELETE FROM tbfoneempresa WHERE idFoneEmpresa = ?");
        $stmt->bindValue(1, $id->getIdFoneEmpresa());
        $stmt->execute();
        header("Location: perfil");
        //return 'Apagado com sucesso';
    }


    public function atuliazaFoneE($idEmpre, $idFoneEmpresa)
    {
        $erro = new Erro();
        $tele = htmlentities(addslashes($_POST['txEditFoneEmpresa']));


        //Verficar se esta preenchido
        if (!empty($tele)) {
            $e = new Empresa();
            $e->setFoneEmpresa($tele);
            $e->setIdEmpresa($idEmpre);
            $e->setIdFoneEmpresa($idFoneEmpresa);

            $e->updateFone($e);
        } else {
            $erro->campoVazio();
        }
    } //fim do cadastrarFoneE

    public function updateFone($atualizar) //Atualizar
    {
        $stmt = $this->con->prepare("SELECT foneEmpresa,idEmpresa FROM tbfoneempresa
                                        WHERE foneEmpresa = ? AND idEmpresa = ?");

        $stmt->bindValue(1, $atualizar->getFoneEmpresa());
        $stmt->bindValue(2, $atualizar->getIdEmpresa());
        $stmt->execute();

        $erro = new Erro();
        if ($stmt->rowCount() > 0) {
            $erro->jaCadastradoFone();
            //return false;

        } else {
            $stmt = $this->con->prepare("UPDATE tbfoneempresa SET foneEmpresa = ?    
                                            WHERE idFoneEmpresa = ? ");

            $stmt->bindValue(1, $atualizar->getFoneEmpresa());
            $stmt->bindValue(2, $atualizar->getIdFoneEmpresa());
            $stmt->execute();

            $erro->atualizadoPerfil();
            //header("Location: perfil");
            //return true;
        }
    }

    public function editarE($idE)
    {
        $erro = new Erro();
        $nome = htmlentities(addslashes($_POST['txNomeEmpresa']));
        $cnpj = htmlentities(addslashes($_POST['txCnpf']));
        $email = htmlentities(addslashes($_POST['txEmail']));
        $rua = htmlentities(addslashes($_POST['rua']));
        $numero = htmlentities(addslashes($_POST['txNumero']));
        $complemento = htmlentities(addslashes($_POST['txComplemento']));
        $cep = htmlentities(addslashes($_POST['cep']));
        $bairro = htmlentities(addslashes($_POST['bairro']));
        $cidade = htmlentities(addslashes($_POST['cidade']));
        $id = htmlentities(addslashes($idE));

        //Verficar se esta preenchido
        if (
            !empty($nome) && !empty($cnpj) && !empty($email)
            && !empty($rua) && !empty($numero) && !empty($cep) &&
            !empty($bairro) && !empty($cidade)
        ) {
            $cnpj = preg_replace('/\D/', '', $cnpj);
            $CnpjM = new CpfCnpj();
            if (strlen($cnpj) != 14) {
                $erro->digitoCnpj();
                return false;
            } else {
                if ($CnpjM->validarCnpj($cnpj)) {
                  
                    $e = new Empresa();
                    $e->setNomeEmpresa($nome);
                    $e->setCnpjEmpresa($cnpj);
                    $e->setEmailEmpresa($email);
                    $e->setRua($rua);
                    $e->setNumero($numero);
                    $e->setComplemento($complemento);
                    $e->setCep($cep);
                    $e->setBairro($bairro);
                    $e->setCidade($cidade);
                    $e->setIdEmpresa($id);
                    //cadatrar Empresa
                    $e->update($e);

      
                } else {
                    $erro->cnpjInvalido();
                }
            }
        } else {
            $erro->campoVazio();
        }
    } //fim do cadastrarE

    public function update($atualizar)
    { //Atualizar

        $erro = new Erro();
        $stmt = $this->con->prepare("UPDATE tbEmpresa SET nomeEmpresa = :n,cnpjEmpresa = :cp
                                        ,emailEmpresa = :ema,enderecoEmpresa = :ende
                                        ,numeroEmpresa = :num,complementoEmpresa = :com
                                        ,cepEmpresa = :ce,bairroEmpresa = :bai,cidadeEmpresa = :cid
                                        WHERE idEmpresa = :idCa");

        $stmt->bindValue(":n", $atualizar->getNomeEmpresa());
        $stmt->bindValue("cp", $atualizar->getCnpjEmpresa());
        $stmt->bindValue(":ema", $atualizar->getEmailEmpresa());
        $stmt->bindValue(":ende", $atualizar->getEmailEmpresa());
        $stmt->bindValue(":num", $atualizar->getNumero());
        $stmt->bindValue(":com", $atualizar->getComplemento());
        $stmt->bindValue(":ce", $atualizar->getCep());
        $stmt->bindValue(":bai", $atualizar->getBairro());
        $stmt->bindValue(":cid", $atualizar->getCidade());
        $stmt->bindValue(":idCa", $atualizar->getIdEmpresa());
        $stmt->execute();
        $erro->atualizadoPerfil();
        // $dado = $stmt->fetch();
        // return $dado;
        //return true;
        //return 'Atualização realizado com sucesso';


    }


    // GET da CLASSE
    public function getIdEmpresa()
    {
        return $this->id;
    }
    public function getNomeEmpresa()
    {
        return $this->nome;
    }
    public function getCnpjEmpresa()
    {
        return $this->cnpj;
    }
    public function getEmailEmpresa()
    {
        return $this->email;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getFoneEmpresa()
    {
        return $this->foneEmpresa;
    }

    public function getIdFoneEmpresa()
    {
        return $this->idFoneEmpresa;
    }

    public function getZona()
    {
        return $this->zona;
    }

    public function getAtivoEmpres()
    {
        return $this->ativoEmpres;
    }

    // SET da CLASSE

    public function setIdEmpresa($id)
    {
        $this->id = $id;
    }
    public function setNomeEmpresa($nome)
    {
        $this->nome = $nome;
    }
    public function setCnpjEmpresa($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function setEmailEmpresa($Email)
    {
        $this->email = $Email;
    }
    public function setUsuario($Usuario)
    {
        $this->usuario = $Usuario;
    }
    public function setSenha($Senha)
    {
        $this->senha = $Senha;
    }
    public function setRua($rua)
    {
        $this->rua = $rua;
    }
    public function setNumero($Numero)
    {
        $this->numero = $Numero;
    }
    public function setComplemento($Complemento)
    {
        $this->complemento = $Complemento;
    }
    public function setCep($Cep)
    {
        $this->cep = $Cep;
    }
    public function setBairro($Bairro)
    {
        $this->bairro = $Bairro;
    }
    public function setCidade($Cidade)
    {
        $this->cidade = $Cidade;
    }
    public function setFoneEmpresa($fone)
    {
        $this->foneEmpresa = $fone;
    }

    public function setIdFoneEmpresa($id)
    {
        $this->idFoneEmpresa = $id;
    }

    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    public function setAtivoEmpres($ativoEmpres)
    {
        $this->ativoEmpres = $ativoEmpres;

        return $this;
    }
}

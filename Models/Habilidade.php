<?php

require_once 'Conexao.php';

class Habilidade
{
    private $con;
    private $idHabilidade;
    private $descHabilidade;
    private $idHabiCandidato;
    private $idCandidato;
    private $idHabiCandi;

   
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function cadastrarHabili($id)
    {
        $erro = New Erro(); 
        $habi = htmlentities(addslashes($_POST['txHabilidade']));

        //Verficar se esta preenchido
        if(!empty($habi) && !empty($id))
         {
                $h = New Habilidade();
                $h->setDescHabilidade($habi);
                $h->setIdCandidato($id);

                $h->cadastrar($h);
         }else
         {
            $erro->campoVazio();
         }

    }//fim do cadastrarHabili

    public function cadastrar($nome)
    {
            $erro = New Erro(); 
            $resu = array();
            $stmt = $this->con->prepare("SELECT idhabilidade FROM tbhabilidade
                                        WHERE nomehabilidade = ?");

            $stmt->bindValue(1, $nome->getDescHabilidade());
            $stmt->execute();
            $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount()>0)
            {  


                $stmt = $this->con->prepare("SELECT idCandidato,idHabilidade FROM tbhabicandi
                                                WHERE idCandidato = ? AND  idHabilidade =?");

                $stmt->bindValue(1, $nome->getIdCandidato());
                $stmt->bindValue(2, $resu[0]['idhabilidade']);
                $stmt->execute();

                if($stmt->rowCount()>0)
                {
                    $erro->jaCadastradoHabi();
                }else{

                    $stmt = $this->con->prepare("INSERT INTO tbhabicandi (idCandidato,idHabilidade)
                                                    VALUES (?,?)");
                    $stmt->bindValue(1, $nome->getIdCandidato());
                    $stmt->bindValue(2, $resu[0]['idhabilidade']);
                    $stmt->execute();
                    $erro->sucessoPerfil();
                    //header("Location: perfil");
                }
                

            }else
            {
                $stmt = $this->con->prepare("INSERT INTO tbhabilidade (nomehabilidade)
                                             VALUES (?)");

                $stmt->bindValue(1, $nome->getDescHabilidade());
                $stmt->execute();

                $stmt = $this->con->prepare("SELECT MAX(idHabilidade) FROM tbhabilidade");
                $stmt->execute();
                $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $stmt = $this->con->prepare("INSERT INTO tbhabicandi (idCandidato,idHabilidade)
                VALUES (?,?)");
                $stmt->bindValue(1, $nome->getIdCandidato());
                $stmt->bindValue(2, $resu[0]['MAX(idHabilidade)']);
                $stmt->execute();
                $erro->sucessoPerfil();
                //header("Location: perfil");

            }
    }


    public function mostraHabilidade()
    {
        $resu = array();
        $stmt = $this->con->prepare("SELECT * FROM tbhabilidade");
        $stmt->execute();
        $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resu;   
    }

    public function mostraHabiCadi($id)
    {
        $resu = array();
        $stmt = $this->con->prepare("SELECT nomeHabilidade, idHabiCandi,tbhabicandi.idHabilidade, idCandidato FROM tbhabilidade
                                        INNER JOIN tbhabicandi
                                            ON tbhabilidade.idHabilidade = tbhabicandi.idHabilidade
                                                WHERE idCandidato = ?");

        $stmt->bindValue(1, $id->getIdCandidato());
        $stmt->execute();
        $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resu;   
    }

    public function mostraHabi($id)
    {
        $resu = array();
        $stmt = $this->con->prepare("SELECT * FROM tbhabilidade
                                        WHERE idHabilidade = ?");

        $stmt->bindValue(1, $id->getIdHabilidade());
        $stmt->execute();
        $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resu;   
    }

    public function deleteHabiCad($id){//Apagar um Empresa

        $stmt = $this->con->prepare("DELETE FROM tbhabicandi WHERE idHabiCandi = ?");
        $stmt->bindValue(1, $id->getIdHabiCandi());
        $stmt->execute();
        header("Location: perfil");
        //return 'Apagado com sucesso';
    }

    public function deleteHabiCadUpa($id){//Apagar um Empresa

        $stmt = $this->con->prepare("DELETE FROM tbhabicandi WHERE idHabiCandi = ?");
        $stmt->bindValue(1, $id->getIdHabiCandi());
        $stmt->execute();
       
        //return 'Apagado com sucesso';
    }

    public function atualiHabili($idHabi,$idCandidato,$idHaCa)
    {
        $erro = New Erro(); 
        $habi = htmlentities(addslashes($_POST['txEditHabilidade']));

        //Verficar se esta preenchido
        if(!empty($habi) && !empty($idHabi))
         {
                $h = New Habilidade();
                $h->setDescHabilidade($habi);
                $h->setIdHabiCandi($idHabi);
                $h->setIdCandidato($idCandidato);
                $h->setIdHabiCandi($idHaCa);

                $h->updateHabilidade($h);
         }else
         {
            $erro->campoVazio();
         }

    }//fim do cadastrarHabili

    public function updateHabilidade($nome)
    {
            $erro = New Erro(); 
            $resu = array();
            $stmt = $this->con->prepare("SELECT idhabilidade FROM tbhabilidade
                                        WHERE nomehabilidade = ?");

            $stmt->bindValue(1, $nome->getDescHabilidade());
            $stmt->execute();
            $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount()>0)
            {  
                $stmt = $this->con->prepare("SELECT idCandidato,idHabilidade FROM tbhabicandi
                                                WHERE idCandidato = ? AND  idHabilidade =?");

                $stmt->bindValue(1, $nome->getIdCandidato());
                $stmt->bindValue(2, $resu[0]['idhabilidade']);
                $stmt->execute();
               
                if($stmt->rowCount()>0)
                {
                    $erro->jaCadastradoHabi();
                }else
                {
                    $stmt = $this->con->prepare("UPDATE tbhabicandi SET idHabilidade = ?
                                                    WHERE idHabiCandi = ?");
                    
                    $stmt->bindValue(1, $resu[0]['idhabilidade']);
                    $stmt->bindValue(2, $nome->getIdHabiCandi());
                    $stmt->execute();
                    $erro->atualizadoPerfil();
                    //header("Location: perfil");
                }
                

            }else
            {
                $stmt = $this->con->prepare("INSERT INTO tbhabilidade (nomehabilidade)
                                             VALUES (?)");

                $stmt->bindValue(1, $nome->getDescHabilidade());
                $stmt->execute();

                $stmt = $this->con->prepare("SELECT MAX(idHabilidade) FROM tbhabilidade");
                $stmt->execute();
                $resu = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $hab = New Habilidade();
                $hab->deleteHabiCadUpa($nome);

                $stmt = $this->con->prepare("INSERT INTO tbhabicandi (idCandidato,idHabilidade)
                VALUES (?,?)");
                $stmt->bindValue(1, $nome->getIdCandidato());
                $stmt->bindValue(2, $resu[0]['MAX(idHabilidade)']);
                $stmt->execute();
                $erro->sucessoPerfil();
                //header("Location: perfil");

            }
    }

        //get da Class
    public function getIdCandidato()
    {
        return $this->idCandidato;
    }

    public function getIdHabiCandidato()
    {
        return $this->idHabiCandidato;
    }

    public function getDescHabilidade()
    {
        return $this->descHabilidade;
    }

    public function getIdHabilidade()
    {
        return $this->idHabilidade;
    }

    public function getIdHabiCandi()
    {
        return $this->idHabiCandi;
    }


    //set da Class

    public function setIdCandidato($id)
    {
        $this->idCandidato = $id;
    }

    public function setIdHabiCandidato($id)
    {
        $this->idHabiCandidato = $id;
    }

    public function setIdHabilidade($id)
    {
        $this->idHabilidade = $id;
    }

    public function setDescHabilidade($desc)
    {
        $this->descHabilidade = $desc;
    }

    public function setIdHabiCandi($idHabiCandi)
    {
        $this->idHabiCandi = $idHabiCandi;

        return $this;
    }
}
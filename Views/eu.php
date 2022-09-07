<?php

if(isset($_SESSION['idCandidato']))
{
    $data = New Formulario();

    $foneC = New Candidato();
    $foneC->setIdCandidato($idCandidato);
    $teleC = $foneC->mostraFone($foneC);

    $HabMo = New Habilidade();
    $mostHali = $HabMo->mostraHabilidade();
    $HabMo->setIdCandidato($idCandidato);
    $habiCad = $HabMo->mostraHabiCadi($HabMo);

    $exper = New Experiencia();
    $exper->setIdCandidato($idCandidato);
    $mostExper = $exper->mostraExperiencia($exper);
}
if(isset($_SESSION['idEmpresa']))
{
    $foneE = New Empresa();
    $foneE->setIdEmpresa($idEmpresa);
    $teleE = $foneE->mostraFone($foneE);
}
?>

<script src="../JS/Cep.js"></script>
<link rel="stylesheet" href="../Formatacao/estiloPerfil.css">

<nav class="menu">        
    
    <ul>
      <li> <a href="#">CONFIGURAÇÕES</a>
               <ul>
                  <li><a href="../feed">FEED</a></li>
                  <li><a href="../conta/sair">SAIR</a></li>
               </ul>
      </li>
    </ul>
    <div class="logo"> <img src="../Midia/img/LogoB.png" ></div>
</nav>
               <!-- Perfil empresa -->
<?php 

  if(isset($_POST['txNomeEmpresa']))
  {
   $em = new Empresa();
    $em->editarE($idEmpresa);
  }

  if(isset($_POST['txFoneEmpresa']))
  {
    $em = new Empresa();
    $em->cadastrarFoneE($idEmpresa);
  }
  if(isset($_POST['txApagarFoneEmpr']))
  {
    $em = new Empresa();
    $em->setIdFoneEmpresa($_POST['txApagarFoneEmpr']);
    $em->deleteFone($em);
    $_POST['txApagarFoneEmpr']= '';
  }
  if(isset($_POST['txEdiTeleEmpres']))
  {
    $em = new Empresa();
    $em->atuliazaFoneE($_POST['txidFoneEmpres'],$_POST['txEdiTeleEmpres']);

  }

?>
            <!-- Perfil Candidato -->       
<?php

if(isset($_POST['txNomeCandi']))
{
  $c = new Candidato();
  $c->editarC($idCandidato);
}

if(isset($_POST['txFoneCandidato']))
{
  $c = new Candidato();
  $c->cadastrarFoneC($idCandidato);
}
if(isset($_POST['txApagarFoneCadi']))
{
  $c = new Candidato();
  $c->setIdFoneCandidato($_POST['txApagarFoneCadi']);
  $c->deleteFone($c);
  $_POST['txApagarFoneCadi']= '';
}

if(isset($_POST['btEditaTeleCandi']))
{
  $c = new Candidato();
  $c->atualizarFoneC($_POST['btEditaTeleCandi'], $_POST['txidFoneCandi']);

}

if(isset($_POST['btEditarForma']))
{
  $for = new Formacao();
  $for->atualiForm($_POST['btEditarForma']);
}


if(isset($_POST['txNomeCurso']))
{
  $for = new Formacao();
  $for->cadastrarF($idCandidato);
}

if(isset($_POST['txApagarFormacao']))
{
  $for = new Formacao();
  $for->setIdFormacao($_POST['txApagarFormacao']);
  $for->delete($for);
  $_POST['txApagarFormacao']= '';
}

if(isset($_POST['txHabilidade']))
{
  $hab = new Habilidade();
  $hab->cadastrarHabili($idCandidato);
  $_POST['txHabilidade']= '';
}

if(isset($_POST['txApagarHibi']))
{
  $hab = new Habilidade();
  $hab->setIdHabiCandi($_POST['txApagarHibi']);
  $hab->deleteHabiCad($hab);

}

if(isset($_POST['txEditarHabilCandi']))
{
  $hab = new Habilidade();
  $hab->atualiHabili($_POST['txEditarHabilCandi'],$_POST['txidHalCand'],$_POST['txIDHabiCandi']);

}

if(isset($_POST['btCadasExperi']))
{
  $exp = new Experiencia();
  $exp->cadastrarExperi($_POST['btCadasExperi']);
}

if(isset($_POST['btApagaExper']))
{
  $exp = new Experiencia();
  $exp->setIdExperiencia($_POST['btApagaExper']);
  $exp->delete($exp);
}

if(isset($_POST['btEditarExperi']))
{
  $exp = new Experiencia();
  $exp->updateExperi($_POST['btEditarExperi']);

}
?>

<div class="perfil">
    <div class="planofundo">
       <div class="ftpergilinfo">
          
         <?php if(isset($_SESSION['idEmpresa'])){ ?>
            <div class="ftperfil"> <img src="../Midia/img/empre.jpg"></div>
         <?php } else { ?>
            <div class="ftperfil"> <img src="../Midia/img/candi.jpg"></div>
         <?php } ?>

         <div class="nome"><h1><?php if(isset($_SESSION['idCandidato'])){echo $nomeCandidato;} ?></h1></div>
    
         <div class="nome"><h1><?php if(isset($_SESSION['idRecrutador'])){echo $nomeRecrutador;} ?></h1></div> 

         <div class="nome"><h1><?php if(isset($_SESSION['idEmpresa'])){echo $nomeEmpresa;} ?></h1></div> 



         <!-- <div class="editarinfo">
         <?php if(isset($_SESSION['idCandidato']) || isset($_SESSION['idEmpresa'])) { ?>
            <h2><b> Editar Informações</b></h2>
         <?php } ?>






         </div> -->
      </div>


    </div>

    
    <!-- <div class="navperfil">
        <h1>Suas Informações</h1>
    </div> -->
    

    <div class="conteudoperfil">
   <div class="infoperfilpai">
      <div class="infoperfil">
         


         <?php if(isset($_SESSION['idCandidato'])){ ?>
            <div><h2><b>Informações de Cadastro </b> </h2></div>
            <br>
            <b>CPF: </b><?php if(isset($_SESSION['idCandidato'])){echo $cpfCandidato;} ?><br>
            <b>Data de Nascimento: </b><?php if(isset($_SESSION['idCandidato'])){echo $data->traduzData($dtNascto); } ?><br>
            <b>Estado Civil: </b><?php if(isset($_SESSION['idCandidato'])){echo $estadoCivil;} ?><br>
            <b>Nascionalidade: </b><?php if(isset($_SESSION['idCandidato'])){echo $nascionalidade;} ?><br>
            <b>Email: </b><?php if(isset($_SESSION['idCandidato'])){echo $emailCandidato;} ?><br>
            <b>Endereço: </b><?php if(isset($_SESSION['idCandidato'])){echo $enderecoCandidato;} ?><br>
            <b>Numero: </b><?php if(isset($_SESSION['idCandidato'])){echo $numeroCandidato;} ?><br>
            <b>Complemento: </b><?php if(isset($_SESSION['idCandidato'])){echo $complementoCandidato;} ?><br>
            <b>CEP: </b><?php if(isset($_SESSION['idCandidato'])){echo $cepCandidato;} ?><br>
            <b>Bairro: </b><?php if(isset($_SESSION['idCandidato'])){echo $bairroCandidato;} ?><br>
            <b>Cidade: </b><?php if(isset($_SESSION['idCandidato'])){echo $cidadeCandidato;} ?><br>
           
            <br>
      
         <?php } ?>


         <?php if(isset($_SESSION['idEmpresa'])){ ?>
            <div><h2><b>Informações de Cadastro </b> </h2></div>
            
            <b>CNPJ: </b><?php if(isset($_SESSION['idEmpresa'])){echo $cnpjEmpresa;} ?><br>
            <b>Email: </b><?php if(isset($_SESSION['idEmpresa'])){echo $emailEmpresa;} ?><br>
            <b>Endereço: </b><?php if(isset($_SESSION['idEmpresa'])){echo $enderecoEmpresa;} ?><br>
            <b>Numero: </b><?php if(isset($_SESSION['idEmpresa'])){echo $numeroEmpresa;} ?><br>
            <b>Complemento: </b><?php if(isset($_SESSION['idEmpresa'])){echo $complementoEmpresa;} ?><br>
            <b>CEP: </b><?php if(isset($_SESSION['idEmpresa'])){echo $cepEmpresa;} ?><br>
            <b>Bairro: </b><?php if(isset($_SESSION['idEmpresa'])){echo $bairroEmpresa;} ?><br>
            <b>Cidade: </b><?php if(isset($_SESSION['idEmpresa'])){echo $cidadeEmpresa;} ?><br>
         <?php } ?>

         <?php if(isset($_SESSION['idRecrutador'])){ ?>
            <div><h2><b>Informações de Cadastro </b> </h2></div>
            <b>Nome: </b><?php if(isset($_SESSION['idRecrutador'])){echo $nomeRecrutador;} ?><br>
            <b>CPF: </b><?php if(isset($_SESSION['idRecrutador'])){echo $cpfRecrutador;} ?><br>
            <b>Email: </b><?php if(isset($_SESSION['idRecrutador'])){echo $emailRecrutador;} ?><br>                       
         <?php } ?>
      
            <?php if(isset($_SESSION['idCandidato'])){ ?>
                <a href="#container"><button class="btedtperfil">Editar Suas Informações</button></a> <br><br>
            <?php } ?>

            <?php if(isset($_SESSION['idEmpresa'])){ ?>
                <a href="#container"><button class="btedtperfil">Editar Suas Informações</button></a>  <br><br>
         
            <?php } ?>
      </div>
   </div>

   <div class="infoformaetele">
   <div class="infofeed1">

      <?php if(isset($_SESSION['idCandidato'])){ ?>
      <div class="infotelefone">

         <?php if(isset($_SESSION['idCandidato'])){ ?>
            <div><h2><b>Telefone </b></h2></div>

            <br>
            
         <?php if(isset($_SESSION['idCandidato'])) foreach ($teleC as $te) { ?> 
            <b>Telefone:</b>
            <?php echo $te['foneCandidato']; ?>
            <form action="#containertelconfirm" method="POST">
            <button class="apagar" > Apagar </button> 
            </form>
            <form action="#containerteledit" method="POST">
               <button name="editaFoneCandi" value="<?php echo $te['idFoneCandidato']; ?>" class="editar">Editar</button>
            </form>
            <?php } ?>
            <a href="#containertel"><button class="btedtperfil">Cadastrar Telefone</button></a> <br><br>
            </div> <br>
         
         <?php } ?>

         <?php if(isset($_SESSION['idCandidato'])) { ?> 
            <div class="infohabpai">
               <div class="infohabilidade">
               <div><h2><b>Habilidade </b></h2> </div>    
                  <?php foreach ($habiCad as $ha) { ?>
                     <h5><?php echo $ha['nomeHabilidade'] ?></h5>
                     <Form action="#containerHABconfirm" method="POST">
                     <button class="apagar" > Apagar </button>             
                     </Form>
                     <form action="#containerhabedit" method="POST">
                     <input type="hidden" name="txidHabiCandi" value="<?php echo $ha['idHabiCandi']; ?>" >
                     <input type="hidden" name="txidCandiHabili" value="<?php echo $ha['idCandidato']; ?>" >
                        <button name="editarHabili" value="<?php echo $ha['idHabilidade']?>" class="editar">Editar</button>
                     </form>            
                  <?php } ?>
               </div>
               <a href="#containerhab"><button class="btedtperfil">Cadastrar Habilidade</button></a> <br><br>
            </div>
      <?php } ?>


      

      <br>

   

      
      <?php } ?>

      <?php if(isset($_SESSION['idEmpresa'])){ ?>
         <div class="infotelefone">
            <div><h2><b>Telefone </b></h2></div>
            <br>
            
         <?php if(isset($_SESSION['idEmpresa'])) { foreach ($teleE as $te) { ?>
            <b>Telefone: </b>
            <?php  echo $te['foneEmpresa'];?>
            <form action="#containertelconfirm" method="POST">
            <button class="apagar"> Apagar </button> 
            </form>
            <form action="#containerteledit" method="POST">
               <button name="editarFoneEmpresa" value="<?php echo $te['idFoneEmpresa']; ?>" class="editar">Editar</button>
            </form>
            <?php } ?>
                  
            <?php } ?>
            <a href="#containertel"><button class="btedtperfil">Cadastrar Telefone</button></a><br><br>
         </div>
         <?php } ?>


      <br>
   </div>
   
   <div class="infofeed2">
   <?php if(isset($_SESSION['idCandidato'])){ ?>
   <div class="infoformaçao">
      <div><h2><b>Formação </b></h2></div>

         <?php if(isset($_SESSION['idCandidato'])) {
            foreach ($this->dados2 as $linha) { ?>

                  <b>Nome do Curso: </b><?php echo $linha['nomeCurso']; ?>  <br/>
                  <b>Instituição: </b><?php echo $linha['nomeInstituicao']; ?>  <br/>
                  <b>Data de Inicio: </b><?php echo $data->traduzData($linha['dtInicio']); ?>  <br/>
                  <b>Data de Termino: </b><?php echo $data->traduzData($linha['dtFinal']); ?>  <br/>
                  <b>Diploma: </b><?php echo $linha['diploma']; ?>   <br/>
               
             <form action="#containerFORconfirm" method="POST">
             <button class="apagar" > Apagar </button> 
             </form>
             <form action="#containerforedit" method="POST">
               <button name="editarFormacao" value="<?php echo $linha['idFormacao']; ?>" class="editar">Editar</button>
             </form>

             <?php  } ?>

            <?php } ?>
            <a href="#containerfor"><button class="btedtperfil">Cadastrar Formação</button></a> <br><br>
      </div>

         <br>

         
         <div class="infoexperiencia">
            
            <div><h2><b>Experiência </b></h2></div>   
            <?php foreach($mostExper as $mosEx) { ?>
            <b>Nome da Empresa: </b> <?php echo $mosEx['nomeEmpresa']; ?> <br/>
            <b>Cargo: </b> <?php echo $mosEx['cargo']; ?> <br/>
            <b>Especielidade: </b> <?php echo $mosEx['especialidade']; ?> <br/>
            <b>Data de Inicio: </b> <?php echo $data->traduzData($mosEx['dtInicio']); ?> <br/>
            <b>Data de Saida: </b><?php echo $data->traduzData($mosEx['dtSaida']); ?> <br/>

            <form action="#containerEXconfirm" method="POST">
               <button  class="apagar">Apagar</button> 
            </form>
            <form action="#containerexedit" method="POST">
               <button name="btEditarExprerincia" value="<?php echo $mosEx['idExperiencia']; ?>" class="editar">Editar</button>
            </form>
               <?php } ?>
               <a href="#containerex"><button class="btedtperfil">Cadastrar Experiência</button></a> <br><br>
         </div>
         <?php } ?>



    
    
   </div>
   </div>
</div>
</div>

         <!-- MODAIS CADASTRAR E EDITAR EXPERIENCIA -->

<div id="containerex" class="containerex">
   <div class="modalexperiencia">
      <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
      <div class="txanunciado"><h1>Cadastrar Experiência</h1></div>
      <form method="POST">
            <label>Nome Empresa:</label><br>
            <input type="text" id="txNomeEmp" name="txNomeEmp" placeholder="Nome Empresa"/>
            <br/><br>
            <label>Cargo</label><br>
            <input type="text" id="txCargo" name="txCargo" placeholder="Cargo"/>
            <br/><br>

            <label>Especialidade</label><br>
            <input type="text" id="txEspecialidade" name="txEspecialidade" placeholder="Especialidade"/>
            <br/><br>

            <label>Data Entrada:</label><br>
            <input type="date" id="txDtInicio" name="txDtInicio"/>
            <br/><br>

            <label>Data Saida:</label><br>
            <input type="date" id="txDtFinal" name="txDtFinal"/>
            <br/><br>
            <button name="btCadasExperi" value="<?php echo $_SESSION['idCandidato']; ?>" class="bteditar">Cadastrar</button>
      </form>

   </div>
</div>

                  <!-- EDITAR EXPERIENCIA -->
<div id="containerexedit" class="containerexedit">
   <div class="modaleditarlexperiencia">

      <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
      <div class="txanunciado"><h1>Editar Experiência</h1></div>
      <?php
         if(empty($_POST['btEditarExprerincia']))
         {
            $_POST['btEditarExprerincia'] = $_SESSION['btEditarExprerincia']; 
         }
         if(isset($_POST['btEditarExprerincia'])){
            $editaExperi = New Experiencia();
            $_SESSION['btEditarExprerincia'] = $_POST['btEditarExprerincia']; 
            $editaExperi->setIdExperiencia($_POST['btEditarExprerincia']);
            $mostExperi =$editaExperi->mostraExpe($editaExperi);
   ?>
      <form method="POST">
            <?php foreach($mostExperi as $mosExpe) { ?>
            <label>Nome Empresa:</label>
            <input type="text" id="txNomeEmpes" name="txNomeEmpes" value="<?php echo $mosExpe['nomeEmpresa']; ?>" placeholder="Nome empresa"/>
            <br/><br>
            <label>Carga</label>
            <input type="text" id="txCargo" name="txCargo" value="<?php echo $mosExpe['cargo']; ?>" placeholder="Carga"/>
            <br/><br>

            <label>Especialidade</label>
            <input type="text" id="txEspecialidade" name="txEspecialidade" value="<?php echo $mosExpe['especialidade']; ?>" />
            <br/><br>

            <label>Data Entrada:</label>
            <input type="date" id="txDtInicio" name="txDtInicio" value="<?php echo $mosExpe['dtInicio']; ?>" />
            <br/><br>

            <label>Data Saida:</label>
            <input type="date" id="txDtFinal" name="txDtFinal" value="<?php echo $mosExpe['dtSaida']; ?>" />
            <br/><br>
            <button name="btEditarExperi" value="<?php echo $mosExpe['idExperiencia']; ?>" class="bteditar">Editar</button>
      </form>
      <?php } } ?>

   </div>
</div>


         <!-- MODAIS CADASTRAR E EDITAR HABILIDADE -->

<?php if(isset($_SESSION['idCandidato'])) { ?> 
      <div id="containerhab"class="containerhab">
         <div class="modalhabilidade">
         <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>

         <div class="txanunciado"><h1>Cadastrar Habilidade</h1></div>
            <form method="POST">
               <label>Habilidade:</label><br>
               <input type="text" id="txHabilidade" name="txHabilidade" list="listaHabilidade" placeholder="EX: Boa Comunicação"/>      
               <datalist id="listaHabilidade">
               <?php foreach ($mostHali as $lista) { ?>
                  <option value="<?php echo $lista['nomeHabilidade'] ?>"></option>
               <?php } ?>
               </datalist>
               <br/><br>
               <button class="bteditar">Cadastrar</button> <Br/> 
            </form>
         </div>
      </div>

                  <!-- EDITAR HABILIDADE-->

   <div id="containerhabedit" class="containerhabedit">
   <div class="modaleditarlhabilidade">

            <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>

            <?php
         if(empty($_POST['editarHabili']))
         {
            $_POST['editarHabili'] = $_SESSION['editarHabili'];
            $_POST['txidHabiCandi'] = $_SESSION['txidHabiCandi'];
            $_POST['txidCandiHabili'] = $_SESSION['txidCandiHabili'];
         }
         if(isset($_POST['editarHabili'])){
            $editaHabi = New Habilidade();
            $_SESSION['editarHabili'] = $_POST['editarHabili'];
            $_SESSION['txidHabiCandi'] = $_POST['txidHabiCandi'];
            $_SESSION['txidCandiHabili'] = $_POST['txidCandiHabili'];
            $editaHabi->setIdHabilidade($_POST['editarHabili']);
            $mostHabi = $editaHabi->mostraHabi($editaHabi);
         
         ?>
               <div class="txanunciado"><h1>Editar Habilidade</h1></div>
               <form method="POST">
                  <?php foreach ($mostHabi as $mosHa) { ?>
                  <label>Habilidade:</label> 
                  <input type="text"  id="txEditHabilidade" name="txEditHabilidade" value="<?php echo $mosHa['nomeHabilidade']; ?>" list="listaHabilidade" />
                  <datalist id="listaHabilidade">
                  <?php foreach ($mostHali as $lista) { ?>
                     <option value="<?php echo $lista['nomeHabilidade'] ?>"></option>
                  <?php } ?>
                  </datalist>      
                  <br/><br>
                  <input type="hidden" name="txIDHabiCandi" value="<?php echo $_POST['txidHabiCandi']; ?>" >
                  <input type="hidden" name="txidHalCand" value="<?php echo $_POST['txidCandiHabili']; ?>" >
                  <button name="txEditarHabilCandi" value="<?php echo $mosHa['idHabilidade']; ?>" class="bteditar">Cadastrar</button> <Br/> 
                  <?php } ?>
               </form>
            <?php } ?>
   </div>
   </div>
<?php } ?>


            <!-- MODAIS CADASTRAR E EDITAR FORMAÇAO -->

<div id="containerfor"class="containerfor">
<div class="modalformaçao">
   <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
   <div class="txanunciado"><h1>Cadastrar Formação</h1></div>
            
            <form method="POST">
               <label>Nome Curso:</label><br>
               <input type="text" id="txNomeCurso" name="txNomeCurso" placeholder="Nome Curso"/>
               <br/><br>
               <label>Nome Instituicao:</label><br>
               <input type="text" id="txNomeInstituicao" name="txNomeInstituicao" placeholder="Nome Instituicao"/>
               <br/><br>
               <label>Data Inicio:</label><br>
               <input type="date" id="txDtInicio" name="txDtInicio"/>
               <br/><br>
               <label>Data Final:</label><br>
               <input type="date" id="txDtFinal" name="txDtFinal"/>
               <br/><br>
               <label>Diploma:</label><br>
               <input type="text" id="txDiploma" name="txDiploma" placeholder="Diploma"/>
               <br/><br>
               <button class="bteditar">Cadastrar</button>
            </form>
   
</div>
</div>

                  <!-- EDITAR FORMAÇAO -->
<div id="containerforedit"class="containerforedit">
   <div class="modaleditarfor">


      <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
      <div class="txanunciado"><h1>Editar Formação </h1></div>

      <?php 

         if(empty($_POST['editarFormacao']))
         {
            $_POST['editarFormacao'] = $_SESSION['editarFormacao'];
         }
         if(isset($_POST['editarFormacao'])){
            $editaFormac = New Formacao();
            $_SESSION['editarFormacao'] = $_POST['editarFormacao'];
            $editaFormac->setIdFormacao($_POST['editarFormacao']);
            $mostForm = $editaFormac->mostrForma($editaFormac);    
      ?>
               
               <form method="POST">
               <?php foreach ($mostForm as $mosFo) { ?>
                  <label>Nome Curso:</label>
                  <input type="text" id="txEditNomeCurso" name="txEditNomeCurso" value="<?php echo $mosFo['nomeCurso']; ?>" placeholder="Nome Curso"/>
                  <br/><br>
                  <label>Nome Instituicao:</label>
                  <input type="text" id="txEditNomeInstituicao" name="txEditNomeInstituicao" value="<?php echo $mosFo['nomeInstituicao']; ?>" placeholder="Nome Instituicao"/>
                  <br/><br>
                  <label>Data Inicio:</label>
                  <input type="date" id="txEditDtInicio" value="<?php echo $mosFo['dtInicio']; ?>" name="txEditDtInicio"/>
                  <br/><br>
                  <label>Data Final:</label>
                  <input type="date" id="txEditDtFinal" value="<?php echo $mosFo['dtFinal']; ?>" name="txEditDtFinal"/>
                  <br/><br>
                  <label>Diploma:</label>
                  <input type="text" id="txEditDiploma" name="txEditDiploma" value="<?php echo $mosFo['diploma']; ?>" placeholder="Diploma"/>
                  <br/><br>
                  <button name="btEditarForma" value="<?php echo $mosFo['idFormacao']; ?>" class="bteditar">Editar</button>
                  <?php } ?>
               </form>
      <?php } ?>
   </div>
</div>




            <!-- MODAIS CADASTRAR E EDITAR TELEFONE -->

<div id="containertel"class="containertel">
<div class="modaltelefone">
      <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
      <div class="txanunciado"><h1>Cadastrar Telefone</h1></div>
      <?php if(isset($_SESSION['idEmpresa'])){ ?>
            <form action="" method="POST">
                <label>Telefone:</label>
                <input type="text" id="txFoneEmpresa" onkeypress="mascara_telefone(this);" name="txFoneEmpresa"  placeholder="Telefone"/>
                <br><br>
                <button class="bteditar">cadastrar</button>
            </form>
        <?php } ?>

        <?php if(isset($_SESSION['idCandidato'])){ ?>
            <form action="" method="POST">
                <label>Telefone:</label><br>
                <input type="text" id="txFoneCandidato" onkeypress="mascara_telefone(this);" name="txFoneCandidato"  placeholder="Telefone"/>
                <br><br>
                <button class="bteditar">cadastrar</button>
            </form>
         <?php } ?>
</div>
</div>

            <!-- EDITAR TELEFONE-->
<div id="containerteledit" class="containerteledit">
<div class="modaleditartelefone">
      <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
      <div class="txanunciado"><h1>Editar Telefone</h1></div>
      <?php if(isset($_SESSION['idEmpresa'])){
         if(empty($_POST['editarFoneEmpresa']))
         {
            $_POST['editarFoneEmpresa'] = $_SESSION['editarFoneEmpresa'];
         }
               if(isset($_POST['editarFoneEmpresa'])){
                  $editaFoneEmpre = New Empresa();
                  $_SESSION['editarFoneEmpresa'] =  $_POST['editarFoneEmpresa'];
                  $editaFoneEmpre->setIdFoneEmpresa($_POST['editarFoneEmpresa']);
                  $mostFoneEmpr = $editaFoneEmpre->mostraTele($editaFoneEmpre);   
         ?>
            <form method="POST">
            <?php foreach ($mostFoneEmpr as $mosFoEm) { ?>
                <label>Telefone:</label>
                <input type="text" id="txEditFoneEmpresa" onkeypress="mascara_telefone(this);" name="txEditFoneEmpresa" value="<?php echo $mosFoEm['foneEmpresa']; ?>"  placeholder="Telefone"/>
                <br><br>
                <input type="hidden" name="txidFoneEmpres"  value="<?php echo $mosFoEm['idEmpresa']; ?>" >
                <button name="txEdiTeleEmpres" value="<?php echo $mosFoEm['idFoneEmpresa']; ?>" class="bteditar">Editar</button>
                <?php } ?>
            </form>
        <?php  } } ?>

        <?php if(isset($_SESSION['idCandidato'])){
           if(empty($_POST['editaFoneCandi']))
           {
               $_POST['editaFoneCandi'] = $_SESSION['editaFoneCandi'];
           }
            if(isset($_POST['editaFoneCandi'])){
            $editaFone = New Candidato();
            $_SESSION['editaFoneCandi'] = $_POST['editaFoneCandi'];
            $editaFone->setIdFoneCandidato($_POST['editaFoneCandi']);
            $mostTele = $editaFone->mostraTelefone($editaFone);


         ?>
            <form method="POST">
                <label>Telefone:</label>
                <?php foreach ($mostTele as $mosT) { ?>
                <input type="text" id="txEditFoneCandidato" onkeypress="mascara_telefone(this);" name="txEditFoneCandidato" value="<?php echo $mosT['foneCandidato']; ?>"  placeholder="Telefone"/>
                <br><br>
                <input type="hidden" name="txidFoneCandi"  value="<?php echo $mosT['idCandidato']; ?>" >
                <button name="btEditaTeleCandi" value="<?php echo $mosT['idFoneCandidato']; ?>" class="bteditar">Editar</button>
            </form>
         <?php } } } ?>
</div>
</div>



         <!-- MODAL EDITAR PERFIL -->

<div id="container"class="container">
<div class="modaleditar">
    <a href="/newjobs/feed/perfil"><button class="fechar">X</button></a>
    <div class="txanunciado"><h1>Editar Perfil</h1></div>
    
    <div class="editarperfil">
        <?php if(isset($_SESSION['idEmpresa'])){ ?>
            <form action="" method="POST">
                <label>Nome Empresa:</label><br>
                <input type="text" id="txNomeEmpresa" name="txNomeEmpresa"  placeholder="Nome Empresa" value="<?php if(isset($_SESSION['idEmpresa'])){echo $nomeEmpresa;} ?>"/>
                <br><br>

                <label>CNPJ:</label><br>
                <input type="text" id="txCnpf" name="txCnpf" placeholder="CNPJ" value="<?php if(isset($_SESSION['idEmpresa'])){echo $cnpjEmpresa;} ?>"/>
                <br><br>

                <label>Email:</label><br>
                <input type="text" id="txEmail" name="txEmail" placeholder="Email" value="<?php if(isset($_SESSION['idEmpresa'])){echo $emailEmpresa;} ?>"/>
                <br><br>

                <!-- <label>Zona:</label><br>
                <select id="txZona" name="txZona">
                <?php if($zonaEmpresa)
                  { 
                     $zonaHabi = New Formulario();
                     $zonaHabi->zonaHa($zonaEmpresa);      
                     
                  }else
                  { ?>
                        <option value="selecionar...">selecionar...</option>
                        <option value="Centro">Centro</option>
                        <option value="Leste 1">Leste 1</option>
                        <option value="Leste 2">Leste 2</option>
                        <option value="Norte 1">Norte 1</option>
                        <option value="Norte 2">Norte 2</option>
                        <option value="Oeste">Oeste</option>
                        <option value="Sul 1">Sul 1</option>
                        <option value="Sul 2">Sul 2</option>
                  </select>
                  <?php } ?>
                <br><br> -->

                <label>CEP:</label><br>
                <input type="text" id="cep" name="cep" onblur="pesquisacep(this.value);" maxlength="9" placeholder="CEP" value="<?php if(isset($_SESSION['idEmpresa'])){echo $cepEmpresa;} ?>"/>
                <br><br>

                <label>Endereço:</label><br>
                <input type="text" id="rua" name="rua" size="60" placeholder="Endereço" value="<?php if(isset($_SESSION['idEmpresa'])){echo $enderecoEmpresa;} ?>"/>
                <br><br>

                <label>Numero:</label><br>
                <input type="text" id="txNumero" name="txNumero" placeholder="Numero" value="<?php if(isset($_SESSION['idEmpresa'])){echo $numeroEmpresa;} ?>"/>
                <br><br>

                <label>Complemento:</label><br>
                <input type="text" id="txComplemento" name="txComplemento" placeholder="Complemento" value="<?php if(isset($_SESSION['idEmpresa'])){echo $complementoEmpresa;} ?>"/>
                <br><br>

                <label>Bairro:</label><br>
                <input type="text" id="bairro" name="bairro" size="40" placeholder="Bairro" value="<?php if(isset($_SESSION['idEmpresa'])){echo $bairroEmpresa;} ?>"/>
                <br><br>

                <!-- <label>Cidade:</label><br> -->
                <input type="hidden" id="cidade" name="cidade" size="40" placeholder="Cidade" value="<?php if(isset($_SESSION['idEmpresa'])){echo $cidadeEmpresa;} ?>"/>
                <br><br>

                
                
                <button class="bteditar">Editar</button>

            </form>
        <?php } ?>
            
        <?php if(isset($_SESSION['idCandidato'])){ ?>
            <form action="" method="POST">
                <label>Nome:</label><br>
                <input type="text" id="txNomeCandi" name="txNomeCandi" placeholder="Nome" value="<?php if(isset($_SESSION['idCandidato'])){echo $nomeCandidato;} ?>"/>
                <br><br>

                <label>CPF:</label><br>
                <input type="text" id="txCpfCandi" name="txCpfCandi" maxlength="14" placeholder="CPF" value="<?php if(isset($_SESSION['idCandidato'])){echo $cpfCandidato;} ?>"/>
                <br><br>

                <label>Data Nasc:</label><br>
                <input type="date" id="txdtNascto" name="txdtNascto" placeholder="Data Nascimento" value="<?php if(isset($_SESSION['idCandidato'])){echo $dtNascto;} ?>"/>
                <br><br>

                <label>Estado Civil:</label><br>
                <select id="txEstadoCivil" name="txEstadoCivil">
                <?php if(isset($estadoCivil))
                  { 
                     $estadoCi = New Formulario();
                     $estadoCi->estadoCivil($estadoCivil);
                    
                  }else
                  { ?>
                        <option value="selecionar...">selecionar...</option>
                        <option value="Casado (a)">Casado (a)</option>
                        <option value="Solteiro">Solteiro (a)</option>
                        <option value="Viuvo (a)">Viúvo (a)</option>
                        
                  </select>
                  <?php } ?>
                <br><br>

                <label>Nascionalidade:</label><br>
                <input type="text" id="txNascionalidade" name="txNascionalidade" placeholder="Nascionalidade" value="<?php if(isset($_SESSION['idCandidato'])){echo $nascionalidade;} ?>"/>
                <br><br>

                <label>Email:</label><br>
                <input type="text" id="txEmail" name="txEmail" placeholder="Email" value="<?php if(isset($_SESSION['idCandidato'])){echo $emailCandidato;} ?>"/>
                <br><br>

                <label>CEP:</label><br>
                <input type="text" id="cep" name="cep" placeholder="CEP" onblur="pesquisacep(this.value);" size="10" maxlength="9" value="<?php if(isset($_SESSION['idCandidato'])){echo $cepCandidato;} ?>"/>
                <br><br>

                <label>Endereço:</label><br>
                <input type="text" id="rua" name="rua" onblur="pesquisacep(this.value);" size="10" maxlength="9" placeholder="Endereço" value="<?php if(isset($_SESSION['idCandidato'])){echo $enderecoCandidato;} ?>"/>
                <br><br>

                <label>Numero:</label><br>
                <input type="text" id="txNumero" name="txNumero" placeholder="Numero" value="<?php if(isset($_SESSION['idCandidato'])){echo $numeroCandidato;} ?>"/>
                <br><br>

                <label>Complemento:</label><br>
                <input type="text" id="txComplemento" name="txComplemento" placeholder="Complemento" value="<?php if(isset($_SESSION['idCandidato'])){echo $complementoCandidato;} ?>"/>
                <br><br>

                <label>Bairro:</label><br>
                <input type="text" id="bairro" name="bairro" size="40" placeholder="Bairro" value="<?php if(isset($_SESSION['idCandidato'])){echo $bairroCandidato;} ?>"/>
                <br><br>

                <!-- <label>Cidade:</label><br> -->
                <input type="hidden" id="cidade" name="cidade"  size="40" placeholder="Cidade" value="<?php if(isset($_SESSION['idCandidato'])){echo $cidadeCandidato;} ?>"/>
                <br><br>

                <button class="bteditar">Editar</button>

            </form>
        <?php } ?>

    </div>

    

    </div>
    </div>

</div>

                     <!-- MENSAGENS DE COMFIRMAR APAGAR -->

                     <!-- TELEFONE -->
<div id="containertelconfirm"class="containertelconfirm">
      <div class="modalconfirmtelefone">
         <div class="txexluir"> DESEJA EXCLUIR ESSE TELEFONE? </div>
      <div class="campoconfirmar">
      <?php if(isset($_SESSION['idEmpresa'])){ ?>
         <Form action="/newjobs/feed/perfil" method="POST">
            <button class="apagar" id="txApagarFoneEmpr" name="txApagarFoneEmpr" value="<?php echo $te['idFoneEmpresa']; ?>"> Apagar </button>             
         </Form>
         <form action="/newjobs/feed/perfil" method="POST">
            <button class="cancelar">Cancelar</button>
         </form>
      <?php } ?>
      <?php if(isset($_SESSION['idCandidato'])){ ?>
         <Form action="/newjobs/feed/perfil" method="POST">
            <button class="apagar" id="txApagarFoneCadi" name="txApagarFoneCadi" value="<?php echo $te['idFoneCandidato']; ?>"> Apagar </button>             
         </Form>
         <form action="/newjobs/feed/perfil" method="POST">
            <button class="cancelar">Cancelar</button>
         </form>
      <?php } ?>
      </div>
   </div>
</div>

                     <!-- FORMAÇÃO -->
<div id="containerFORconfirm"class="containerFORconfirm">
      <div class="modalconfirmformacao">
         <div class="txexluir"> DESEJA EXCLUIR ESSA FORMAÇÃO? </div>
      <div class="campoconfirmar">
         <Form action="/newjobs/feed/perfil" method="POST">
            <button class="apagar" id="txApagarFormacao" name="txApagarFormacao" value="<?php echo $linha['idFormacao']; ?>"> Apagar </button>             
         </Form>
         <form action="/newjobs/feed/perfil" method="POST">
            <button class="cancelar">Cancelar</button>
         </form>
      </div>
   </div>
</div>

                     <!-- EXPERIENCIA -->
<div id="containerEXconfirm"class="containerEXconfirm">
      <div class="modalconfirmexperiencia">
         <div class="txexluir"> DESEJA EXCLUIR ESSA EXPERIENCIA? </div>
      <div class="campoconfirmar">
         <Form action="/newjobs/feed/perfil" method="POST">
            <button class="apagar" name="btApagaExper" value="<?php echo $mosEx['idExperiencia']; ?>"> Apagar </button>             
         </Form>
         <form action="/newjobs/feed/perfil" method="POST">
            <button class="cancelar">Cancelar</button>
         </form>
      </div>
   </div>
</div>

                     <!-- HABILIDADE -->
<div id="containerHABconfirm" class="containerHABconfirm">
      <div class="modalconfirmhabilidade">
         <div class="txexluir"> DESEJA EXCLUIR ESSA HABILIDADE? </div>
      <div class="campoconfirmar">
         <Form action="/newjobs/feed/perfil" method="POST">
            <button class="apagar" id="txApagarHibi" name="txApagarHibi" value="<?php echo $ha['idHabiCandi']?>" > Apagar </button>             
         </Form>
         <form action="/newjobs/feed/perfil" method="POST">
            <button class="cancelar">Cancelar</button>
         </form>
      </div>
   </div>
</div>
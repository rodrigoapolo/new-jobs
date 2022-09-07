<link rel="stylesheet" href="../Formatacao/estiloCandidatos.css">

<nav class="menu">
    <ul>
        <li> <a href="#">CONFIGURAÇÕES</a>
            <ul>
                <li><a href="../feed">FEED</a></li>
                <li><a href="../feed/perfil">PERFIL</a></li>
                <li><a href="../conta/sair">SAIR</a></li>
            </ul>
        </li>
    </ul>

    <form class="pesquisa" method="POST">
        <input type="text" id="txPesq" name="txPesq" class="pesquisatx" placeholder="Pesquisar Dados"/>             
            
        <button class="pesbt" ><img src="../Midia/img/search.png" alt="Lupa" width="25" height="25"></button>  
    </form>

    <div class="logo"><img src="../Midia/img/LogoB.png" ></div>
</nav>
<?php
        
        
        if(isset($_POST['txPesq']) && !empty($_POST['txPesq']))
        {
                $_SESSION['CanBusca'] = $_POST['txPesq']; 
                $busc = New Feed();
                $busc->setIdVaga($idVaga);
                $busc->setBusca($_SESSION['CanBusca']);
                $in= $busc->buscarInteresse($busc);
        
        }elseif(empty($_POST['txPesq']))
        { 
            $in = $this->dados2;
        }
              
         

?>

<div class="anunciadocandidatos">CANDIDATOS DA VAGA <?php echo strtoupper($cargo); ?> </div> 
    <hr>
    
<div class="pag">
    <div class="candidatos">
        <br>
        
        <?php
            if($in)
            {
            foreach ($in as $intCa) { 
        ?>
        <div class="padding">
            <div class="infocandidato">
                <form action="#modalcandidatos" method="POST" >
                    <button name="txInfoCandi" value="<?php echo $intCa['idCandidato']; ?>" class="button">
                    <div class="ftcandidato"><img src="../Midia/img/candi.jpg" width="100%" height="100%"></div> 
                    <div class="conteudocandidato">
                        <h3><?php echo $intCa['nomeCandidato']; ?></h3>
                        <h4>Email</h4> <b><?php echo $intCa['emailCandidato']; ?></b>
                        <h4>Bairro</h4> <b><?php echo $intCa['bairroCandidato']; ?></b>
                    </div>
                    </button>
                    <input type="hidden" name="txPesq" value="<?php if(isset($_POST['txPesq'])){ echo $_POST['txPesq']; } ?>" >
                </form>
            </div>
        </div>
        <?php }
        }else
        {
            ?><h1>Nenhum candidato interessado</h1><?php 
        } ?>


      

    </div>
    <div class="maisinformacoes">
        <h1>Selecione um candidato para mais informações</h1>
    </div>

</div>

    <!-- MODAL CANDIDATOS -->

    <?php if(isset($_POST['txInfoCandi'])){ 
        
        $infoC = New Candidato();
        $infoC->setIdCandidato($_POST['txInfoCandi']);
        $ifc = $infoC->mostraInforClie($infoC);
        $inforCa = $infoC->mostraFone($infoC);
        $inforFor = New Formacao();
        $inforFor->setIdCandidato($_POST['txInfoCandi']);
        $iForFor = $inforFor->mostraFormacao( $inforFor);
        
        ?>
        <div id="modalcandidatos" class="modalcandidatos">
        
        <div class="ftinfocandidato"><img src="../Midia/img/candi.jpg"></div> 
                    <div class="conteudoinfocandidato">
                    <?php foreach ($ifc as $fCandi) { ?>
                        <div class="conteudocandi">
                            <h3><?php echo $fCandi['nomeCandidato']; ?></h3>
                            <br>
                            <h4><b>Estado Civil: </b><?php echo $fCandi['estadoCivil']; ?></h4>
                            <h4><b>Nascionalidade: </b><?php echo $fCandi['nascionalidade']; ?></h4>
                            <h4><b>Email: </b><?php echo $fCandi['emailCandidato']; ?></h4>
                            <h4><b>Bairro: </b><?php echo $fCandi['bairroCandidato']; ?></h4>

                        </div>
                        <?php }  ?>
                        <?php foreach ($inforCa as $iForCan) { ?>
                        <div class="conteudocandi">
                            <h4><b>Telefone: </b><?php echo $iForCan['foneCandidato']; ?></h4>
                        </div>
                        <?php }  
            
                        $data = New Formulario();

                        foreach ($iForFor as $forFor) { 

                        ?>
                        <div class="conteudocandi">
                            <h4><b>Curso: </b><?php echo $forFor['nomeCurso']; ?></h4>
                            <h4><b>Instituação: </b><?php echo $forFor['nomeInstituicao']; ?></h4>
                            <h4><b>Data de Inicio: </b><?php echo $data->traduzData($forFor['dtInicio']); ?></h4>
                            <h4><b>Dta de Termino: </b><?php echo $data->traduzData($forFor['dtFinal']); ?></h4>
                            <h4><b>Diploma: </b><?php echo $forFor['diploma']; ?></h4>
                        </div>
                        <?php }  ?>
                    </div>
                   
        </div>
        <?php }  ?>
    


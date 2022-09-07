<link rel="stylesheet" href="Formatacao/estiloFeed.css">
<script src="JS/Cep.js"></script>

<?php if (isset($_POST['txInteresse'])) {
    $i = new Interesse();
    $i->cadastrarInteresse($_POST['txInteresse'], $idCandidato);
}
?>

<?php if (isset($_POST['txApagarVaga'])) {
    $apaVa = new Vaga();
    $apaVa->setIdVaga($_POST['txApagarVaga']);
    $apaVa->delete($apaVa);
}
?>
<?php if (isset($_POST['txEVaga'])) {
    $eV = new Vaga();
    $eV->updateVaga($_POST['txEVaga']);
}
?>

<?php if (isset($_POST['txEditNomeRecr'])) {
    $recru = new Recrutador();
    $recru->updateRe($_POST['txEditaR']);
}
?>



<nav class="menu">
    <ul>
        <li> <a href="#">CONFIGURAÇÕES</a>
            <ul>
                <li><a href="feed/perfil">PERFIL</a></li>
                <li><a href="conta/sair">SAIR</a></li>
            </ul>
        </li>
    </ul>

    <?php if (isset($_SESSION['idCandidato'])) {

    ?>
        <div>


            <form class="pesquisa" method="POST">
                <input type="text" id="txPesq" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                        echo $_POST['txPesq'];
                                                                    } ?>" class="pesquisatx" placeholder="Pesquisar Cargos">
                <button class="pesbt"><img src="Midia/img/search.png" alt="Lupa" width="25" height="25"></button>
            </form>

        </div>
    <?php } elseif (isset($_SESSION['idEmpresa'])) { ?>

        <div>


            <form class="pesquisa" method="POST">
                <input type="text" id="txPesq" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                        echo $_POST['txPesq'];
                                                                    } ?>" class="pesquisatx" placeholder="Pesquisar Recrutadores">
                <button class="pesbt"><img src="Midia/img/search.png" alt="Lupa" width="25" height="25"></button>
            </form>

        </div>
        <ul>
            <li class="li"> <a href="#modalr">CADASTRAR RECRUTADOR</a></li>
        </ul>

    <?php } else { ?>

        <div>


            <form class="pesquisa" method="POST">
                <input type="text" id="txPesq" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                        echo $_POST['txPesq'];
                                                                    } ?>" class="pesquisatx" placeholder="Pesquisar Vagas">
                <button class="pesbt"><img src="Midia/img/search.png" alt="Lupa" width="25" height="25"></button>

            </form>

        </div>
        <ul>
            <li class="li"> <a href="#modal">CADASTRAR VAGA</a></li>
        </ul>
    <?php } ?>

    <div class="logo"><img src="Midia/img/LogoB.png"></div>
</nav>

<?php if (isset($_SESSION['idCandidato'])) { ?>
    <div class="filtro">
        <div class="anunciadoft">
            <h2 class="txanunciado">Filtros</h2>
        </div>
        <div class="ft1">
            <h4>FAIXA SALARIAL:</h4>
            <div class="ft2">
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="check1" type="checkbox" />
                    <label for="check1">De R$: 300 - R$: 1.000</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="check2" type="checkbox" />
                    <label for="check2">De R$: 1.000 - R$: 2.500</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="check3" type="checkbox" />
                    <label for="check3">De R$: Acima de R$: 3.000</label>
                </div>
            </div>
        </div>

        <div class="ft1">
            <h4>ZONAS DE SÃO PAULO:</h4>
            <div class="ft2">
                <div class="formg1">

                    <input class="checkbox" name="checkbox" id="zona1" type="checkbox" />
                    <label for="zona1">Centro</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona2" type="checkbox" />
                    <label for="zona2">Leste 1</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona3" type="checkbox" />
                    <label for="zona3">Leste 2</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona4" type="checkbox" />
                    <label for="zona4">Norte 1</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona5" type="checkbox" />
                    <label for="zona5">Norte 2</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona6" type="checkbox" />
                    <label for="zona6">Oeste</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona7" type="checkbox" />
                    <label for="zona7">Sul 1</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="zona8" type="checkbox" />
                    <label for="zona8">Sul 2</label>
                </div>
            </div>
        </div>

        <div class="ft1">
            <h4>DATA DE PUBLIÇÃO:</h4>
            <div class="ft2">
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="data1" type="checkbox" />
                    <label for="data1">Hoje</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="data2" type="checkbox" />
                    <label for="data2">Ultimos 3 dias</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="data3" type="checkbox" />
                    <label for="data3">Ultima semana</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="data4" type="checkbox" />
                    <label for="data4">Ultimos 15 dias</label>
                </div>
                <div class="formg1">
                    <input class="checkbox" name="checkbox" id="data5" type="checkbox" />
                    <label for="data5">Ultimo mês</label>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


<!-- MODAL DOS CANDIDATOS CADASTRADOS NA VAGA -->


<?php if (isset($_SESSION['idRecrutador'])) { ?>

    <?php if (isset($_POST['txMostCandi'])) {

        if (!empty($_POST['txMostCandi'])) {

            $int = new Interesse();
            $int->setIdVaga($_POST['txMostCandi']);
            $in = $int->mostraInteresse($int);

    ?>
            <div id="modalcandidatospai" class="divcandidatospai">
                <div class="Candidatosinteressados">
                    <h1>Candidatos</h1>
                </div>

                <form action="/newjobs/feed" method="POST">
                    <button name="txMostCandi" id="txMostCandi" value="" class="fecharcandiinte">X</button>

                </form>
                <?php if ($in) {
                    foreach ($in as $intCa) { ?>
                        <div class="candidatopai">
                            <form action="#modalcandidatos" method="POST">
                                <button id="txInfoCandi" name="txInfoCandi" value="<?php echo $intCa['idCandidato']; ?>" class="azinho">
                                    <div class="conteudocandipai">
                                        <div class="ftcandipai"><img src="Midia/img/candi.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                                        <h1><?php echo $intCa['nomeCandidato']; ?></h1>
                                        <h3><?php echo $intCa['emailCandidato']; ?></h3>
                                        <h3><?php echo $intCa['bairroCandidato']; ?></h3>
                                        <h3><?php echo $intCa['zonaCandidato']; ?></h3>
                                    </div>
                                </button>
                                <input type="hidden" name="txMostCandi" value="<?php echo $_POST['txMostCandi']; ?>">
                            </form>
                        </div>
                        <br>
                    <?php }
                } else { ?>
                    <div class="candidatopai">
                        <div class="conteudocandipai">
                            <div class="ftcandipai"><img src="Midia/img/semcand.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                            <br>
                            <h1>Nenhum candidato cadastrado</h1>
                        </div>
                    </div>
                    <br>
                <?php }  ?>

            </div>

    <?php



        }
    } ?>

    <?php if (isset($_POST['txInfoCandi'])) {

        $infoC = new Candidato();
        $infoC->setIdCandidato($_POST['txInfoCandi']);
        $ifc = $infoC->mostraInforClie($infoC);
        $inforCa = $infoC->mostraFone($infoC);
        $inforFor = new Formacao();
        $inforFor->setIdCandidato($_POST['txInfoCandi']);
        $iForFor = $inforFor->mostraFormacao($inforFor);

    ?>
        <div id="modalcandidatos" class="divcandidatos">

            <div class="candidatos">
                <div class="ftCandi"><img src="Midia/img/candi.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>

                <?php foreach ($ifc as $fCandi) { ?>
                    <div class="conteudocandi">
                        <h3><?php echo $fCandi['nomeCandidato']; ?></h3>
                        <br>
                        <h4><b>Estado Civil: </b><?php echo $fCandi['estadoCivil']; ?></h4>
                        <h4><b>Nascionalidade: </b><?php echo $fCandi['nascionalidade']; ?></h4>
                        <h4><b>Email: </b><?php echo $fCandi['emailCandidato']; ?></h4>
                        <h4><b>Bairro: </b><?php echo $fCandi['bairroCandidato']; ?></h4>
                        <h4><b>Zona: </b><?php echo $fCandi['zonaCandidato']; ?></h4>
                    </div>
                <?php }  ?>

                <?php foreach ($inforCa as $iForCan) { ?>
                    <div class="conteudocandi">
                        <h4><b>Telefone: </b><?php echo $iForCan['foneCandidato']; ?></h4>
                    </div>
                <?php }  ?>

                <?php

                $data = new Formulario();

                foreach ($iForFor as $forFor) { ?>
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
<?php } ?>


<!-- FEED DE VAGAS/ RECRUTADORES -->


<div class="pag">

    <?php if (isset($_SESSION['idEmpresa'])) { ?>

        <?php if (isset($_POST['txApagarRecrutador'])) {

            $apaRe = new Recrutador();
            $apaRe->setIdRecrutador($_POST['txApagarRecrutador']);
            $apaRe->delete($apaRe);
        } ?>

        <div class="anunciadovagas">
            <h2 class="txanunciado">Recrutador Cadastrado</h2>
        </div>

        <?php

        if (isset($_POST['txPesq']) && !empty($_POST['txPesq'])) {
            if (isset($_SESSION['idEmpresa'])) {
                $_SESSION['Busca'] = $_POST['txPesq'];
                $busc = new Feed();
                $busc->setBusca($_SESSION['Busca']);
                $busc->setIdEmpresa($idEmpresa);
                $vagasFeed = $busc->buscaEmpresa($busc);
            }
        } elseif (empty($_POST['txPesq'])) {
            $vagasFeed = $this->dados2;
        }



        ?>


        <?php if ($vagasFeed) {
            foreach ($vagasFeed as $l) { ?>
                <div class="vagas">
                    <div class="ftempresa">
                        <div class="fte"><img src="Midia/img/candi.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                    </div>
                    <div class="conteudovg">
                        <h1><?php echo $l['nomeRecrutador']; ?></h1>
                        <h4><?php echo $l['cpfRecrutador']; ?></h4>
                        <h3><?php echo $l['emailRecrutador']; ?></h3>
                    </div>
                    <div class="ap-ed">

                        <br />
                        <form action="#containerexcluirrecrutador" method="POST">
                            <button class="btap">Apagar</button>
                        </form>
                        <form action="#editmodalr" method="POST">
                            <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                            echo $_POST['txPesq'];
                                                                        } ?>">
                            <button name="txEdiRecru" value="<?php echo $l['idRecrutador'] ?>" class="bted">Editar</button>
                        </form>
                    </div>
                </div>
                <br />
            <?php }
        } else { ?>
            <div class="vd">
                <h1>Nenhum Recrutador encontrado!</h1>
            </div>
    <?php }
    } ?>

    <?php if (isset($_SESSION['idCandidato']) || isset($_SESSION['idRecrutador'])) { ?>
        <?php if (isset($_SESSION['idCandidato'])) { ?>
            <div class="anunciadovagas">
                <h2 class="txanunciado">Vagas Disponiveis</h2>
            </div>
        <?php } else { ?>
            <div class="anunciadovagas">
                <h2 class="txanunciado">Vagas Cadatradas</h2>
            </div>
        <?php } ?>

        <?php


        if (isset($_POST['txPesq']) && !empty($_POST['txPesq'])) {
            if (isset($_SESSION['idCandidato'])) {
                $_SESSION['Busca'] = $_POST['txPesq'];
                $busc = new Feed();
                $busc->setBusca($_SESSION['Busca']);
                $vagasFeed = $busc->busca($busc);
            } elseif (isset($_SESSION['idRecrutador'])) {
                $_SESSION['Busca'] = $_POST['txPesq'];
                $busc = new Feed();
                $busc->setBusca($_SESSION['Busca']);
                $busc->setIdEmpresa($idEmpresa);
                $vagasFeed = $busc->buscaRecru($busc);
            }
        } elseif (empty($_POST['txPesq'])) {
            $vagasFeed = $this->dados2;
        }

        ?>


        <?php if ($vagasFeed) {


            foreach ($vagasFeed as $l) { ?>
                <div class="vagas">

                    <div class="ftempresa">

                        <div class="fte"><img src="Midia/img/empre.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                    </div>
                    <div class="conteudovg">
                        <h1><?php echo $l['cargo']; ?></h1>
                        <h4><?php echo $l['nomeEmpresa']; ?></h4>
                        <h3><?php echo $l['descVaga']; ?></h3>
                    </div>

                    <div class="ap-ed">
                        <?php if (isset($_SESSION['idCandidato'])) { ?>
                            <form action="#infovagas" method="POST">
                                <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                echo $_POST['txPesq'];
                                                                            } ?>">
                                <button class="vermais" name="txVerMais" value="<?php echo $l['idVaga']; ?>">Ver Mais Sobre..</button>
                                <!-- <a class="vermais" href="#infovagas">Ver Mais Sobre..</a> -->
                            </form>
                            <form method="POST">
                                <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                echo $_POST['txPesq'];
                                                                            } ?>">
                                <button class="candidatar" name="txInteresse" value="<?php echo $l['idVaga'] ?>">Candidatar-se</button>
                            </form>
                        <?php } ?>


                        <?php if (isset($_SESSION['idRecrutador'])) { ?>
                            <form action="feed/candidato" method="POST">
                                <button name="txMostCandi" id="txMostCandi" value="<?php echo $l['idVaga'] ?>" class="candidatar">Candidatos</button>
                            </form>
                            <form action="#containerexcluirvaga" method="POST">
                                <button class="btap2">Apagar</button>
                            </form>

                            <form action="#editmodalv" method="POST">
                                <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                echo $_POST['txPesq'];
                                                                            } ?>">
                                <button name="txEditVaga" value="<?php echo $l['idVaga'] ?>" class="bted2">Editar</button>
                            </form>

                        <?php } ?>
                    </div>

                </div>
                <br />
            <?php } ?>

            <?php if (isset($_SESSION['idCandidato'])) {

                if (!isset($_POST['txPesq']) && empty($_POST['txPesq'])) {
                    $vagasem = new Feed();
                    $vagasem->setBairroVaga($bairroCandidato);
                    $semVaga = $vagasem->todaVagaSem($vagasem);

                    foreach ($semVaga as $l) { ?>
                        <div class="vagas">

                            <div class="ftempresa">

                                <div class="fte"><img src="Midia/img/empre.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                            </div>
                            <div class="conteudovg">
                                <h1><?php echo $l['cargo']; ?></h1>
                                <h4><?php echo $l['nomeEmpresa']; ?></h4>
                                <h3><?php echo $l['descVaga']; ?></h3>
                            </div>

                            <div class="ap-ed">
                                <form action="#infovagas" method="POST">
                                    <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                    echo $_POST['txPesq'];
                                                                                } ?>">
                                    <button class="vermais" name="txVerMais" value="<?php echo $l['idVaga']; ?>">Ver Mais Sobre..</button>
                                    <!-- <a class="vermais" href="#infovagas">Ver Mais Sobre..</a> -->
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                    echo $_POST['txPesq'];
                                                                                } ?>">
                                    <button class="candidatar" name="txInteresse" value="<?php echo $l['idVaga'] ?>">Candidatar-se</button>
                                </form>
                            </div>

                        </div>
                        <br />
            <?php }
                }
            } ?>



            <?php } else {
            if (isset($_SESSION['idCandidato'])) { ?>


                <?php if (!isset($_POST['txPesq']) && empty($_POST['txPesq'])) {
                    $vagasem = new Feed();
                    $vagasem->setBairroVaga($bairroCandidato);
                    $semVaga = $vagasem->todaVagaSem($vagasem);

                    foreach ($semVaga as $l) { ?>
                        <div class="vagas">

                            <div class="ftempresa">

                                <div class="fte"><img src="Midia/img/empre.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                            </div>
                            <div class="conteudovg">
                                <h1><?php echo $l['cargo']; ?></h1>
                                <h4><?php echo $l['nomeEmpresa']; ?></h4>
                                <h3><?php echo $l['descVaga']; ?></h3>
                            </div>

                            <div class="ap-ed">
                                <form action="#infovagas" method="POST">
                                    <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                    echo $_POST['txPesq'];
                                                                                } ?>">
                                    <button class="vermais" name="txVerMais" value="<?php echo $l['idVaga']; ?>">Ver Mais Sobre..</button>
                                    <!-- <a class="vermais" href="#infovagas">Ver Mais Sobre..</a> -->
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                    echo $_POST['txPesq'];
                                                                                } ?>">
                                    <button class="candidatar" name="txInteresse" value="<?php echo $l['idVaga'] ?>">Candidatar-se</button>
                                </form>
                            </div>

                        </div>
                        <br />
                    <?php }
                } elseif (isset($_POST['txPesq']) && empty($_POST['txPesq'])) {


                    $vagasem = new Feed();
                    $vagasem->setBairroVaga($bairroCandidato);
                    $semVaga = $vagasem->todaVagaSem($vagasem);

                    foreach ($semVaga as $l) { ?>
                        <div class="vagas">

                            <div class="ftempresa">

                                <div class="fte"><img src="Midia/img/empre.jpg" alt="Foto da Empresa" width="100%" height="100%"></div>
                            </div>
                            <div class="conteudovg">
                                <h1><?php echo $l['cargo']; ?></h1>
                                <h4><?php echo $l['nomeEmpresa']; ?></h4>
                                <h3><?php echo $l['descVaga']; ?></h3>
                            </div>

                            <div class="ap-ed">
                                <form action="#infovagas" method="POST">
                                    <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                    echo $_POST['txPesq'];
                                                                                } ?>">
                                    <button class="vermais" name="txVerMais" value="<?php echo $l['idVaga']; ?>">Ver Mais Sobre..</button>
                                    <!-- <a class="vermais" href="#infovagas">Ver Mais Sobre..</a> -->
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                                    echo $_POST['txPesq'];
                                                                                } ?>">
                                    <button class="candidatar" name="txInteresse" value="<?php echo $l['idVaga'] ?>">Candidatar-se</button>
                                </form>
                            </div>

                        </div>
                        <br />
                <?php }
                }
            } else { ?>
                <div class="vd">
                    <h1>Nenhuma vaga cadastrada!</h1>
                </div>
    <?php }
        }
    } ?>
</div>


<!-- CADASTRO RECRUTADOR-->

<div id="modalr" class="modalr">
    <?php
    if (isset($_POST['NomeRecrutador'])) {
        $c = new Recrutador();
        echo $c->cadastrarR();
    }
    ?>
    <div class="modalcontent">
        <a href="/newjobs/feed"><button class="fechar">X</button></a>

        <h1 class="mdtitulo">CADASTRO RECRUTADOR</h1>
        <div class="card1">
            <form action="" method="POST">
                <label>Nome Recrutador:</label>
                <div class="label-float">
                    <input type="text" id="NomeR" name="NomeRecrutador" value="<?php if (isset($_POST['NomeRecrutador'])) {
                                                                                    echo $_POST['NomeRecrutador'];
                                                                                } ?>" />
                </div>

                <label>CPF Recrutador:</label>
                <div class="label-float">
                    <input type="text" id="CpfR" name="CpfRecrutador" value="<?php if (isset($_POST['CpfRecrutador'])) {
                                                                                    echo $_POST['CpfRecrutador'];
                                                                                } ?>" />
                </div>

                <label>Email Recrutador:</label>
                <div class="label-float">
                    <input type="email" id="EmailR" name="EmailRecrutador" value="<?php if (isset($_POST['EmailRecrutador'])) {
                                                                                        echo $_POST['EmailRecrutador'];
                                                                                    } ?>" />
                </div>

                <label>Usuário Recrutador:</label>
                <div class="label-float">
                    <input type="text" id="UsuarioR" name="UsuarioRecrutador" value="<?php if (isset($_POST['UsuarioRecrutador'])) {
                                                                                            echo $_POST['UsuarioRecrutador'];
                                                                                        } ?>" />
                </div>

                <label>Senha Recrutador:</label>
                <div class="label-float">
                    <input type="password" id="SenhaR" name="SenhaRecrutador" value="<?php if (isset($_POST['SenhaRecrutador'])) {
                                                                                            echo $_POST['SenhaRecrutador'];
                                                                                        } ?>" />
                </div>

                <label>Confirmar Senha:</label>
                <div class="label-float">
                    <input type="password" id="CSenha" name="ConfirmarSenha" value="<?php if (isset($_POST['ConfirmarSenha'])) {
                                                                                        echo $_POST['ConfirmarSenha'];
                                                                                    } ?>" />
                </div>
                <input type="submit" class="concluir">
            </form>
        </div>



    </div>
</div>





<!-- INFORMAÇÕES DA VAGA -->


<?php if (isset($_SESSION['idCandidato'])) { ?>

    <div id="infovagas" class="infovagas">
        <?php
        if (isset($_POST['txVerMais'])) {

            $mostVaga = new Vaga();
            $mostVaga->setIdVaga($_POST['txVerMais']);
            $mosVaga = $mostVaga->mostraVaga($mostVaga);
            $data = new Formulario();
            foreach ($mosVaga as $moV) {
        ?>
                <div class="infovagas2">

                    <form action="" method="POST">
                        <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                        echo $_POST['txPesq'];
                                                                    } ?>">
                        <a href="/newjobs/feed"><button class="fechar">X</button></a>
                    </form>

                    <div class="nomevaga">VAGA</div>

                    <div class="couteudoinfovagas">
                        <h2>Cargo:</h2>
                        <h3><?php echo $moV['cargo']; ?></h3>
                    </div>
                    <div class="couteudoinfovagas">
                        <h2>Empresa:</h2>
                        <h3><?php echo $moV['nomeEmpresa']; ?></h3>
                    </div>

                    <div class="couteudoinfovagas">
                        <h2>Horário:</h2>
                        <h3><?php echo $moV['horarioTrabalho']; ?> horas</h3>
                    </div>

                    <div class="couteudoinfovagas">
                        <h2>Salário:</h2>
                        <h3>R$ <?php echo $moV['salarioVaga']; ?>,00</h3>
                    </div>

                    <div class="couteudoinfovagas">
                        <h2>Bairro:</h2>
                        <h3><?php echo $moV['bairroVaga']; ?></h3>
                    </div>

                    <hr>

                    <div class="infodescvaga">
                        <h2>Descrição:</h2>
                        <h4><?php echo $moV['descVaga']; ?>
                        </h4>
                    </div>



                    <form method="POST">
                        <input type="hidden" name="txPesq" value="<?php if (isset($_POST['txPesq'])) {
                                                                        echo $_POST['txPesq'];
                                                                    } ?>">
                        <button class="candidatar2" name="txInteresse" value="<?php echo $moV['idVaga']; ?>">Candidatar-se</button>
                    </form>

                </div>
    </div>
<?php }
        }
    } ?>





<!-- EDITAR RECRUTADOR -->

<?php if (isset($_SESSION['idEmpresa'])) { ?>
    <div id="editmodalr" class="editmodalr">
        <?php
        if (empty($_POST['txEdiRecru'])) {
            $_POST['txEdiRecru'] = $_SESSION['txEdiRecru'];
        }
        if (isset($_POST['txEdiRecru'])) {
            $ediRecru = new Recrutador();
            $_SESSION['txEdiRecru'] = $_POST['txEdiRecru'];
            $ediRecru->setIdRecrutador($_POST['txEdiRecru']);
            $MosRec = $ediRecru->mostraRecrEmpre($ediRecru);
            // echo "<pre>";
            // var_dump($MosRec);
            // echo "<pre/>";  
            foreach ($MosRec as $mosRE) {
        ?>

                <h1 class="mdtitulo">Editar Recrutador <?php echo $mosRE['nomeRecrutador']; ?></h1>
                <a href="/newjobs/feed"><button class="fecharedit">X</button></a>
                <form action="" method="POST">
                    <label>Nome Recrutador:</label>
                    <div class="label-float">
                        <input type="text" id="txEditNomeRecr" name="txEditNomeRecr" value="<?php echo $mosRE['nomeRecrutador']; ?>" />
                    </div>

                    <label>CPF Recrutador:</label>
                    <div class="label-float">
                        <input type="text" id="txEditCpfRecr" name="txEditCpfRecr" value="<?php echo $mosRE['cpfRecrutador']; ?>" />
                    </div>

                    <label>Email Recrutador:</label>
                    <div class="label-float">
                        <input type="email" id="txEditEmailRecr" name="txEditEmailRecr" value="<?php echo $mosRE['emailRecrutador']; ?>" />
                    </div>

                    <button class="concluir" id="txEditaR" name="txEditaR" value="<?php echo $mosRE['idRecrutador']; ?>">Editar</button>
                </form>
    </div>

<?php }
        }
    } ?>


<!-- CADASTRO VAGA -->

<div id="modal" class="md-container">
    <?php
    if (isset($_POST['txCargo'])) {
        $c = new Vaga();
        echo $c->cadastrarVaga($idEmpresa);
    }
    ?>
    <div class="modal">
        <a href="/newjobs/feed"><button class="fechar">X</button></a>
        <h1 class="mdtitulo">CADASTRO VAGA</h1>
        <div class="card1">
            <form action="" method="POST">
                <label>Cargo:</label>
                <div class="label-float">

                    <input type="text" id="txCargo" name="txCargo" value="<?php if (isset($_POST['txCargo'])) {
                                                                                echo $_POST['txCargo'];
                                                                            } ?>" />

                </div>

                <label>Descrição da Vaga:</label>
                <div class="label-float">
                    <input type="text" id="txDescVaga" name="txDescVaga" value="<?php if (isset($_POST['txDescVaga'])) {
                                                                                    echo $_POST['txDescVaga'];
                                                                                } ?>" />
                </div>

                <label>Sálario:</label>
                <div class="label-float">
                    <input type="text" id="txSalario" name="txSalario" value="<?php if (isset($_POST['txSalario'])) {
                                                                                    echo $_POST['txSalario'];
                                                                                } ?>">
                </div>

                <div class="juntarcampos">

                    <div class="campodt">
                        <label>Data de Publicação da vaga:</label>
                        <input type="date" id="txDtInicio" name="txDtInicio" value="<?php if (isset($_POST['txDtInicio'])) {
                                                                                        echo $_POST['txDtInicio'];
                                                                                    } ?>">
                    </div>

                    <div class="campodt">
                        <label>Data de encerramento da Publicação:</label>
                        <input type="date" id="txDtFim" name="txDtFim" paceholder="<?php if (isset($_POST['txDtFim'])) {
                                                                                        echo $_POST['txDtFim'];
                                                                                    } ?>">
                    </div>
                </div>

                <label>Horário:</label>
                <div class="label-float">
                    <input type="text" id="txHorario" name="txHorario" value="<?php if (isset($_POST['txHorario'])) {
                                                                                    echo $_POST['txHorario'];
                                                                                } ?>">
                </div>

                <label>CEP:</label>
                <div class="label-float">
                    <input type="text" id="cep" name="txCepVaga" onblur="pesquisacep(this.value);" size="10" maxlength="9" value="<?php if (isset($_POST['txCepVaga'])) {
                                                                                                                                        echo $_POST['txCepVaga'];
                                                                                                                                    } ?>">
                </div>

                <label>Endereço da Vaga:</label>
                <div class="label-float">
                    <input type="text" id="rua" name="txEndereco" value="<?php if (isset($_POST['txEndereco'])) {
                                                                                echo $_POST['txEndereco'];
                                                                            } ?>">
                </div>


                <label>Numero:</label>
                <div class="label-float">
                    <input type="text" id="txNumero" name="txNumero" size="60" maxlength="number" value="<?php if (isset($_POST['txNumero'])) {
                                                                                                                echo $_POST['txNumero'];
                                                                                                            } ?>">
                </div>

                <label>Complemento:</label>
                <div class="label-float">
                    <input type="text" id="txComplemento" name="txComplemento" value="<?php if (isset($_POST['txComplemento'])) {
                                                                                            echo $_POST['txComplemento'];
                                                                                        } ?>">
                </div>

                <label>Bairro:</label>
                <div class="label-float">
                    <input type="text" id="bairro" name="txBairro" size="40" value="<?php if (isset($_POST['txBairro'])) {
                                                                                        echo $_POST['txBairro'];
                                                                                    } ?>">
                </div>

                <!-- <label>Cidade:</label> -->
                <div class="label-float">
                    <input type="hidden" id="cidade" name="txCidade" size="40" value="<?php if (isset($_POST['txCidade'])) {
                                                                                        echo $_POST['txCidade'];
                                                                                    } ?>">
                </div>


                <input type="submit" class="concluir">
            </form>
        </div>

    </div>
</div>


<!-- EDITAR VAGA -->

<?php if (isset($_SESSION['idRecrutador'])) { ?>
    <div id="editmodalv" class="editmodalv">
        <?php
        if (empty($_POST['txEditVaga'])) {
            $_POST['txEditVaga'] = $_SESSION['txEditVaga'];
        }
        if (isset($_POST['txEditVaga'])) {
            $ediVaga = new Vaga();
            $_SESSION['txEditVaga'] =  $_POST['txEditVaga'];
            $ediVaga->setIdVaga($_POST['txEditVaga']);
            $MoVaga = $ediVaga->mostraVaga($ediVaga);
            foreach ($MoVaga as $MV) {

        ?>
                <h1 class="mdtitulo">Editar Vaga: <br><?php echo $MV['cargo']; ?></h1>
                <a href="/newjobs/feed"><button class="fecharedit">X</button></a>
                <form action="" method="POST">
                    <label>Cargo:</label>
                    <div class="label-float">
                        <input type="text" id="txCargo" name="txCargoVaga" value="<?php echo $MV['cargo']; ?>" />

                    </div>

                    <label>Descrição da Vaga:</label>
                    <div class="label-float">
                        <input type="text" id="txDescVaga" name="txDescVaga" value="<?php echo $MV['descVaga']; ?>" />
                    </div>

                    <label>Sálario:</label>
                    <div class="label-float">
                        <input type="text" id="txSalario" name="txSalario" value="<?php echo $MV['salarioVaga']; ?>" />
                    </div>


                    <label>Data de Inicio:</label>
                    <div class="label-float">
                        <input type="date" id="txDtInicio" name="txDtInicio" value="<?php echo $MV['dtInicio']; ?>" />
                    </div>


                    <label>Data de Termino:</label>
                    <div class="label-float">
                        <input type="date" id="txDtFim" name="txDtFim" value="<?php echo $MV['dtFim']; ?>" />
                    </div>

                    <label>Horário:</label>
                    <div class="label-float">
                        <input type="text" id="txHorario" name="txHorario" value="<?php echo $MV['horarioTrabalho']; ?>" />
                    </div>

                    <label>CEP:</label>
                    <div class="label-float">
                        <input type="text" id="cep" name="txCepVaga" onblur="pesquisacep(this.value);" size="10" maxlength="9" value="<?php echo $MV['cepVaga']; ?>" />
                    </div>

                    <label>Endereço da Vaga:</label>
                    <div class="label-float">
                        <input type="text" id="rua" name="txEndereco" value="<?php echo $MV['enderecoVaga']; ?>" />
                    </div>


                    <label>Numero:</label>
                    <div class="label-float">
                        <input type="text" id="txNumero" name="txNumero" size="60" maxlength="number" value="<?php echo $MV['numeroVaga']; ?>" />
                    </div>

                    <label>Complemento:</label>
                    <div class="label-float">
                        <input type="text" id="txComplemento" name="txComplemento" value="<?php echo $MV['complementoVaga']; ?>" />
                    </div>

                    <label>Bairro:</label>
                    <div class="label-float">
                        <input type="text" id="bairro" name="txBairro" size="40" value="<?php echo $MV['bairroVaga']; ?>" />
                    </div>

                    <!-- <label>Cidade:</label> -->
                    <div class="label-float">
                        <input type="hidden" id="cidade" name="txCidade" size="40" value="<?php echo $MV['cidadeVaga']; ?>" />
                    </div>

                    <button name="txEVaga" value="<?php echo $MV['idVaga']; ?>" class="concluir">Editar</button>

                </form>


    </div>

<?php }
        }
    } ?>

<!-- CONFIRMAR EXCLUIR -->

<!-- VAGA -->
<?php if (isset($_SESSION['idRecrutador'])) { ?>
    <div id="containerexcluirvaga" class="containerexcluirvaga">
        <div class="modalexcluirvaga">
            <div class="txexluir"> DESEJA APAGAR ESSA VAGA? </div>
            <div class="campoconfirmar">
                <form action="/newjobs/feed" method="POST">
                    <button class="apagar" name="txApagarVaga" value="<?php echo $l['idVaga'] ?>"> Apagar </button>
                </form>
                <form action="/newjobs/feed" method="POST">
                    <button class="cancelar">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- RECRUTADOR -->
<?php if (isset($_SESSION['idEmpresa'])) { ?>
    <div id="containerexcluirrecrutador" class="containerexcluirrecrutador">
        <div class="modalexcluirreceutador">
            <div class="txexluir"> DESEJA APAGAR ESSE RECRUTADOR? </div>
            <div class="campoconfirmar">
                <Form action="/newjobs/feed" method="POST">
                    <button class="apagar" name="txApagarRecrutador" value="<?php echo $l['idRecrutador'] ?>"> Apagar </button>
                </Form>
                <form action="/newjobs/feed" method="POST">
                    <button class="cancelar">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
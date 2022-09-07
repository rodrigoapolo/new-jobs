<?php

class Erro
{

    public function erroUsuario()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Usuario ja cadastrado!</h1>
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function erroUsuarioFeed()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Usuario ja cadastrado!</h1>
        <img src ="Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function campoVazio()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Prencha todos os campos!</h1>
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <form action="#msgError" method="POST">
            <button class="fecharmodal">OK</button>
        </form>
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div>  <?php
    }

    public function campoVazioFeed()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Prencha todos os campos!</h1>
        <img src ="Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div>  <?php
    }

    public function cpfInvalido()
    {
        ?> <div id="msgError" class="msgError">
        <h1>CPF inválido!</h1>
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <form action="#msgError" method="POST">
            <button class="fecharmodal">OK</button>
        </form>
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function cpfInvalidoFeed()
    {
        ?> <div id="msgError" class="msgError">
        <h1>CPF inválido!</h1>
        <img src ="Midia/img/erro.jpg"  width="100" height="100">
        <form action="#msgError" method="POST">
            <button class="fecharmodal">OK</button>
        </form>
        </div> <?php
    }

    public function digitoCpf()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Digite os 11 digito do CPF!</h1>
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <form action="#msgError" method="POST">
            <button class="fecharmodal">OK</button>
        </form>
        </div> <?php
    }

    public function digitoCpfFeed()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Digite os 11 digito do CPF!</h1>
        <img src ="Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function cnpjInvalido()
    {
        ?> <div id="msgError" class="msgError">
        <h1>CNPJ inválido!</h1> 
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function digitoCnpj()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Digite os 14 digito do CNPJ!</h1>
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function senhaErro()
    {
        ?><div id="msgError" class="msgError2">
        <h1>Senha e confirmar senha não correspondem!</h1>
        <img class="img" src ="../Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function senhaErroFeed()
    {
        ?><div id="msgError" class="msgError2">
        <h1>Senha e confirmar senha não correspondem!</h1>
        <img class="img2" src ="Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }

    public function emailSenha()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Email e/ou senha estão incorretos!</h1> 
        <img src ="../Midia/img/erro.jpg"  width="100" height="100"> 
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }
       
    public function sucesso()
    {
        ?>
        
        <div id="msgSucess" class="msgSucess">
          <h1>Cadastro Bem Sucedido!</h1>
          <img class="correto" src="Midia/img/correto.jpg" width="100" height="100">
          <a href="/newjobs/feed"><button class="fecharmodal">OK</button></a>
        </div> 
        
        <?php
    }

    public function sucessoCandidatar()
    {
        ?>
        <div id="msgSucess" class="msgSucess">
          <h1>Você se candidator-se!</h1>
          <img class="correto" src="Midia/img/correto.jpg" width="100" height="100">
          <form action="/newjobs/feed" method="POST">
            <input type="hidden" name="txPesq" value="<?php if(isset($_POST['txPesq'])){ echo $_POST['txPesq']; } ?>" >
            <button class="fecharmodal">OK</button>
        </form>
        </div> 
        
        <?php
    }

    public function sucessoLogin()
    {
        ?>
        
        <div id="modal" class="modal">
          <h1>Cadastro Bem Sucedido!</h1>
          <img class="correto" src="../Midia/img/correto.jpg" width="100" height="100">
          <a href="#modal"><button class="fecharmodal">OK</button></a>
        </div>
        
        <?php
    }

    public function sucessoPerfil()
    {
        ?>
        
        <div id="modal" class="modal">
          <h1>Cadastro Bem Sucedido!</h1>
          <img class="correto" src="../Midia/img/correto.jpg" width="100" height="100">
          <a href="/newjobs/feed/perfil"><button class="fecharmodal">OK</button></a>
        </div>
        
        <?php
    }

    public function atualizadoPerfil()
    {
        ?>
        
        <div id="modal" class="modal">
          <h1>Atualizado com Sucesso!</h1>
          <img class="correto" src="../Midia/img/correto.jpg" width="100" height="100">
          <a href="/newjobs/feed/perfil"><button class="fecharmodal">OK</button></a>
        </div>
        
        <?php
    }

    public function atualizadoFeed()
    {
        ?>
        
        <div id="modal" class="msgSucess">
          <h1>Atualizado com Sucesso!</h1>
          <img class="correto" src="Midia/img/correto.jpg" width="100" height="100">
          <a href="/newjobs/feed"><button class="fecharmodal">OK</button></a>
        </div>
        
        <?php
    }

    public function jaCadastrado()
    {
        ?>
        <div id="msgError" class="msgError2">
        <h1>Você já está cadastrado nessa vaga</h1>
        <img class="img2" src ="Midia/img/erro.jpg"  width="100" height="100">
        <form action="/newjobs/feed" method="POST">
            <input type="hidden" name="txPesq" value="<?php if(isset($_POST['txPesq'])){ echo $_POST['txPesq']; } ?>" >
            <button class="fecharmodal">OK</button>
        </form>
        </div> 
        
        <?php
    }

    public function jaCadastradoFone()
    {
        ?>
        <div id="msgError" class="msgError2">
        <h1>Já está cadastrado esse telefone</h1>
        <img class="img2" src ="../Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> 
        
        <?php
    }

    public function jaCadastradoHabi()
    {
        ?>
        <div id="msgError" class="msgError2">
        <h1>Você já tem essa habilidade no seu perfil</h1>
         <img class="img2" src ="../Midia/img/erro.jpg"  width="100" height="100"> 
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> 
        
        <?php
    }
    
    public function cidadeErrada()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Não atendemos essa cidade!</h1>
        <img src ="../Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }
    public function cidadeErradaFeed()
    {
        ?> <div id="msgError" class="msgError">
        <h1>Não atendemos essa cidade!</h1>
        <img src ="Midia/img/erro.jpg"  width="100" height="100">
        <!-- <a href="#msgError"><button class="fecharmodal">OK</button></a> -->
        </div> <?php
    }
}


?>
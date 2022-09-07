
<link rel="stylesheet" href="../Formatacao/estiloLogin.css">

        <nav class="menu">
            
            <div class="logo"> <img src="../Midia/img/LogoB.png" ></div>
            <ul>
                <li><a href="#">CADASTRAR</a>
                    <ul>
                        <li><a href="cadastrarcandidato">CANDITATO</a></li>
                        <li><a href='cadastrarempresa'>EMPRESA</a></li>
                    </ul>
                </li>
                <li><a href="../index">HOME</a></li>
            </ul>
        </nav>



        <?php
      session_start();

     if(isset($_SESSION['sucesso']) && $_SESSION['sucesso']) {
      
      $erro = New Erro();
      $erro->sucessoLogin();
       ?>

        
        <!-- <div id="modal" class="modal">
          <h1>Cadastro Bem Sucedido!</h1>
          <img class="correto" src="../midia/img/correto.jpg" width="100" height="100">
          <a href="#modal"><button class="fecharmodal">OK</button></a>
        </div>  -->
      <?php 
              unset($_SESSION['sucesso']);
              session_destroy();
      } ?>
  

  <div class='container'>
    <div class="login">

      <div class='card'>
        <h1> Login </h1>
        
        <form action="login" method="POST">
        <label>Usuario</label>
        <div class='label-float'>
          <input type='text' id='txUsuario' name="txUsuario">
      
        </div>
        <label>Senha</label>
        <div class='label-float'>
          <input type='password' id='txSenha' name="txSenha">
      
          <i class="fa fa-eye" aria-hidden="true"></i>
        </div>
        <!-- <a class="ES" href="">Esqueceu a senha?</a> -->
        
        <div class="btentrar">
          <button >Entrar</button>
        </div>
        </form>
        
        <div class='justify-center'>
          <hr>
        </div>
        
        <p>Cadastrar como Candidato
          <a href='cadastrarcandidato'> Cadastre-se </a>
        </p>
        <p> Cadastrar Empresa
          <a href='cadastrarempresa'>Cadastre-se </a>
        </p>
        
      </div>
      <div class="loginimg">
        <img src="../Midia/img/login.jpg">
      </div>
    </div>
  </div>
  <?php 

  if(isset($_POST['txUsuario']))
  {
    $u = new Login();
    echo $u->verificarLogin();
  }

?>

    

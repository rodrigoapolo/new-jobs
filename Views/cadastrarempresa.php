  <link rel="stylesheet" href="../Formatacao/estiloCadastrarEmpresa.css">
  <script src="../JS/Cep.js"></script>
<?php 

  if(isset($_POST['txNomeEmpresa']))
  {
    $c = new Empresa();
    echo $c->cadastrarE();
  }

?>

<nav class="menu">

  <div class="logo"><img src="../Midia/img/LogoB.png" ></div>
      <ul>
         <li><a href="#">MAIS..</a>
               <ul>
                  <li><a href="../conta/login">LOGIN</a></li>
                  <li><a href="../conta/cadastrarcandidato">CANDIDATO</a></li>
               </ul>
         </li>
         <li><a href="../index">HOME</a></li>      
      </ul>
</nav>

  <div class='container'>

        <h1> Cadastro da empresa </h1>
      <div class='card'>

        
        <form action="" method="POST">
        <label>Nome Empresa:</label>
            <div class="label-float">
              <input type="text"  id="txNomeEmpresa" value="<?php if(isset($_POST['txNomeEmpresa'])){ echo $_POST['txNomeEmpresa'];} ?>" name="txNomeEmpresa"/>
              <label id="labeltxNomeEmpresa" for="txNomeEmpresa"></label>
            </div>



            <label>CNPJ:</label>
            <div class="label-float">
              <input type="text"  id="txCnpf" onkeyup="mascara_cnpj();" name="txCnpf" value="<?php if(isset($_POST['txCnpf'])){ echo $_POST['txCnpf'];} ?>" maxlength="18"/>
              <label id="labeltxCNPJ" for="txCNPJ"></label>
              </div>
              <label>Email:</label>
            <div class="label-float"> 
              <input type="email" id="txEmail" name="txEmail" value="<?php if(isset($_POST['txEmail'])){ echo $_POST['txEmail'];} ?>"/>
              <label id="labeltxEmail" for="txtxEmail"></label> 
              </div>
              <label>Usuario:</label>
            <div class="label-float">  
              <input type="text"  id="txUsuario" name="txUsuario" value="<?php if(isset($_POST['txUsuario'])){ echo $_POST['txUsuario'];} ?>"/>
              <label id="labeltxUsuario" for="txUsuario"></label>
              </div>
              <label>Senha:</label>
            <div class="label-float">
              <input type="password" id="txSenha" name="txSenha" />
              <label id="txSenha" for="txSenha"></label>
              </div>
              <label>Confirmar Senha:</label>
            <div class="label-float">
              <input type="password" id="txConfirmarSenha" name="txConfirmarSenha" />
              <label id="txConfirmarSenha" for="txSenha"></label>
            </div>

      </div>
      <div class='card2'>
            <!-- <label>Zona Habitada</label>
            <div class="label-float1">
                  <br>
               <select id="txZona" name="txZona">
               <?php if(isset($_POST['txZona']))
                  { 
                    $zonaHabi = New Formulario();
                    $zonaHabi->zonaHa($_POST['txZona']);      
                    
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
 
 
            </div> -->
            <label>CEP:</label>
            <div class="label-float">
              <input name="cep" type="text" id="cep" value="<?php if(isset($_POST['cep'])){ echo $_POST['cep'];} ?>" size="10" maxlength="9"
              onblur="pesquisacep(this.value);" />
              <label id="CEP" for="CEP"></label>
              </div>
              <label>Rua:</label>
            <div class="label-float">
              <input name="rua" type="text" id="rua" value="<?php if(isset($_POST['rua'])){ echo $_POST['rua'];} ?>" size="60" />
              <label id="rua" for="rua"></label>
              </div>
              <label>Numero:</label>
            <div class="label-float">
              <input type="text"  id="txNumero" name="txNumero" value="<?php if(isset($_POST['txNumero'])){ echo $_POST['txNumero'];} ?>"/>
              <label id="txNumero" for="txNumero"></label>  
              </div>
              <label>Complemento:</label>
            <div class="label-float">
              <input type="text"  id="txComplemento" name="txComplemento" value="<?php if(isset($_POST['txComplemento'])){ echo $_POST['txComplemento'];} ?>" />
              <label id="txComplemento" for="txComplemento"></label>
              </div>
              <label>Bairro:</label>
            <div class="label-float">
            <input name="bairro" type="text" id="bairro" size="40" value="<?php if(isset($_POST['bairro'])){ echo $_POST['bairro'];} ?>" />
            <label id="txbairro" for="txbairro"></label>
            </div>
            <!-- <label>Cidade:</label> label-float -->
            <div class="">
            <input name="cidade" type="hidden" id="cidade" size="40" value="<?php if(isset($_POST['cidade'])){ echo $_POST['cidade'];} ?>" />
            <label id="cidade" for="cidade"></label>                
            </div>              

            <div class='justify-center'>
                  <button >cadastrar</button>
                  
            </div>
      </div>
</div>
  
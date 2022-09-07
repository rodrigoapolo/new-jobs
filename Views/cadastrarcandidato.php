<link rel="stylesheet" href="../Formatacao/estiloCadastrorCandidato.css">
<script src="../JS/Cep.js"></script>



<?php

if(isset($_POST['txNomeCandi']))
{
  $c = new Candidato();
  echo $c->cadastrarC();
}

?>


<nav class="menu">

   <div class="logo"><img src="../Midia/img/LogoB.png" ></div>
      <ul>
         <li><a href="#">MAIS..</a>
               <ul>
                  <li><a href="../conta/login">LOGIN</a></li>
                  <li><a href="../conta/cadastrarempresa"> EMPRESA</a></li>
               </ul>
         </li>
         <li><a href="../index">HOME</a></li>      
      </ul>
</nav>


<div class='container'> 
   <h1> Cadastro do Candidato (a) </h1>

  <div  class='card'> 
      <form action="" method="POST">
      <label>Nome Candidato:</label>
         <div class="label-float">
            <input type="text" id="txNomeCandi" name="txNomeCandi"  value="<?php if(isset($_POST['txNomeCandi'])){ echo $_POST['txNomeCandi'];} ?>" />           
            </div>

            <label>CPF:</label>
            <div class="label-float">
            <input type="text" id="txCpfCan" onkeyup="mascara_cpf();"  name="txCpfCandi" maxlength="14" value="<?php if(isset($_POST['txCpfCandi'])){ echo $_POST['txCpfCandi'];} ?>" />            
            </div>

            <label>Data De Nascimento:</label>
            <div class="label-float">
            <input type="date" id="txdataNascto" name="txdtNascto" value="<?php if(isset($_POST['txdtNascto'])){ echo $_POST['txdtNascto'];} ?>"/>
            </div>
            <label>Estado civil</label>
            <div class="label-float1">
                  <br>
               <select id="txEstadoCivil" name="txEstadoCivil">
                  <?php if(isset($_POST['txEstadoCivil']))
                  { 
                     $estadoCi = New Formulario();
                     $estadoCi->estadoCivil($_POST['txEstadoCivil']);
                     
                  }else
                  { ?>
                        <option value="selecionar...">selecionar...</option>
                        <option value="Casado (a)">Casado (a)</option>
                        <option value="Solteiro">Solteiro (a)</option>
                        <option value="Viuvo (a)">Viúvo (a)</option>
                        
                  </select>
                  <?php } ?>
               </div>
               <br>

            <label>Usuario:</label>
            <div class="label-float">                   
            <input type="text" id="txUsuario" name="txUsuario" value="<?php if(isset($_POST['txUsuario'])){ echo $_POST['txUsuario']; } ?>" />
            
            </div>
            <label>Email:</label>
            <div class="label-float">
            <input type='email' id="txEmail" name="txEmail" value="<?php if(isset($_POST['txEmail'])){ echo $_POST['txEmail'];} ?>" />
            
            </div>
            <label>Senha:</label>
            <div class="label-float">
            <input type="password" id="txSenha" name="txSenha" />
            
            </div>
            <label>Confirmar Senha:</label>
            <div class="label-float">
            <input type="password" id="txConfirmarSenha" name="txConfirmarSenha" />            
            </div>

   </div>
   <div  class='card2'>        


            <label>Nascionalidade:</label>
            <div class="label-float2">
            <br><input type="text" id="txNascionalidade" name="txNascionalidade" value="<?php if(isset($_POST['txNascionalidade'])){ echo $_POST['txNascionalidade'];} ?>" />
            </div>

            <!-- <label>Zona Habitada</label>
            <div class="label-float3">
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
            <input type="text" id="cep" name="cep" onblur="pesquisacep(this.value);" value="<?php if(isset($_POST['cep'])){ echo $_POST['cep'];} ?>" size="10" maxlength="9" />
            
            </div>
            <label>Rua:</label>
            <div class="label-float">
               <input name="rua" type="text" id="rua" size="60" value="<?php if(isset($_POST['rua'])){ echo $_POST['rua'];} ?>" />
               
            </div>
            <label>Numero:</label>
            <div class="label-float">
            <input type="text" id="txNumero" name="txNumero" value="<?php if(isset($_POST['txNumero'])){ echo $_POST['txNumero'];} ?>" />
            
            </div>
            <label>Complemento:</label>
            <div class="label-float">
            <input type="text" id="txComplemento" name="txComplemento" value="<?php if(isset($_POST['txComplemento'])){ echo $_POST['txComplemento'];} ?>" />
            
            </div>
            <label>Bairro:</label>
            <div class="label-float">
            <input type="text"  id="bairro" name="bairro" size="40" value="<?php if(isset($_POST['bairro'])){ echo $_POST['bairro'];} ?>" />
            
            </div>
            <!-- <label>Cidade:</label> nome da class da div cidade label-float -->
            <div class="">
               <input type="hidden" id="cidade" name="cidade" size="40"  value="<?php if(isset($_POST['cidade'])){ echo $_POST['cidade'];} ?>" />
               
            </div>
            <div class='justify-center'>
               <button>Cadastrar</button>
            </div>
         
            </form>
            <br/>
            
  </div>
</div>





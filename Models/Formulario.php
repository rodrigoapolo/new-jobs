<?php

class Formulario{

   public function traduzData($data)
   {
      if ($data == "" or $data == "0000-00-00") {
         return "";
      }
      $dados = explode("-", $data);
      $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
      return $data_exibir;
   }

   public function estadoCivil($estado)
   {
      switch ($estado)
                     {

                        case "Casado (a)":
                           ?>
                           <option value="Casado (a)" selected >Casado (a)</option>
                           <option value="Solteiro">Solteiro (a)</option>
                           <option value="Viuvo (a)">Viúvo (a)</option>
                           </select>
                           <?php
                           break;
                        
                        case "Solteiro":
                           ?>
                           <option value="Casado (a)">Casado (a)</option>
                           <option value="Solteiro" selected >Solteiro (a)</option>
                           <option value="Viuvo (a)">Viúvo (a)</option>
                           </select>
                           <?php
                           break;

                        case "Viuvo (a)":
                           ?>
                           <option value="Casado (a)">Casado (a)</option>
                           <option value="Solteiro">Solteiro (a)</option>
                           <option value="Viuvo (a)" selected >Viúvo (a)</option>
                           </select>
                           <?php
                           break;

                        default:
                           ?>
                           <option value="selecionar...">selecionar...</option>
                           <option value="Casado (a)">Casado (a)</option>
                           <option value="Solteiro">Solteiro (a)</option>
                           <option value="Viuvo (a)">Viúvo (a)</option>
                           
                           </select>
                           <?php
                           break;
                         
                     }
   }

    public function zonaHa($zona)
    {
        switch ($zona)
                     {

                        case "Centro":
                           ?>
                           <option value="Centro" selected >Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;
                        
                        case "Leste 1":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1" selected >Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;

                        case "Leste 2":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2" selected >Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;
                        
                        case "Norte 1":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1" selected >Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;

                        case "Norte 2":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2" selected >Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;
                        
                        case "Oeste":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste" selected >Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;
                        
                        case "Sul 1":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1" selected >Sul 1</option>
                           <option value="Sul 2">Sul 2</option>
                           </select>
                           <?php
                           break;
                        
                        case "Sul 2":
                           ?>
                           <option value="Centro">Centro</option>
                           <option value="Leste 1">Leste 1</option>
                           <option value="Leste 2">Leste 2</option>
                           <option value="Norte 1">Norte 1</option>
                           <option value="Norte 2">Norte 2</option>
                           <option value="Oeste">Oeste</option>
                           <option value="Sul 1">Sul 1</option>
                           <option value="Sul 2" selected >Sul 2</option>
                           </select>
                           <?php
                           break;

                        default:
                        ?>
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
                           <?php
                           break;
                         
                     }
    }



}//fim da class

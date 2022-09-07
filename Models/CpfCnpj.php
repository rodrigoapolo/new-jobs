<?php 

class CpfCnpj{

public function validarCpf($Cpf)
    {  
        $cpf = $Cpf;
       
        $d1 = 0;
        $d2 = 0;

        for ($i=0, $x = 10; $i < 9; $i++, $x--)
        { 
            $d1 += $cpf[$i] * $x;
        }

        for ($i=0, $x = 11; $i <10; $i++, $x--)
        { 
            if (str_repeat($i,11) == $cpf)
            {
                return false;   
            }
            $d2 += $cpf[$i] * $x;
        }

        $digitoUm = (($d1%11)<2) ? 0 : 11-($d1%11);
        $digitoDois = (($d2%11)<2) ? 0 : 11-($d2%11);

        if ($digitoUm != $cpf[9] || $digitoDois != $cpf[10]) 
        {   
            return false;

        }else
        {   
            return true;
        }

    }//fim da validadrCpf

    public static function validarCnpj($cnpj)
    {
        $cnpjValidacap = substr($cnpj,0,12);

        $cnpjValidacap .= self::calcularDigitoVerificador($cnpjValidacap);
        $cnpjValidacap .= self::calcularDigitoVerificador($cnpjValidacap);

        return $cnpjValidacap == $cnpj;

    }//fim do validar Cnpj

    public static function calcularDigitoVerificador($base)
    {
        $tamanho = strlen($base);
        $multiplicador = 9;

        $soma = 0;

        for ($i= $tamanho - 1; $i >=0 ; $i--) { 
            
            $soma += $base[$i] * $multiplicador;

            $multiplicador--;
            $multiplicador = $multiplicador < 2 ? 9 : $multiplicador;
        }

        return $soma%11;

    }//fim do calcularDigitoVerificador


}
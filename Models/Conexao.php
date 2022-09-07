<?php 

Class Conexao{

    private static $instancia;

    private function __construct(){}

    public static function getConexao()
    {
        if(!isset(self::$instancia))
        {
            $dbname = 'bdnewjobs';
            $host = 'localhost';
            $user = 'root';
            $senha = '';

            try
            {                                         
                self::$instancia = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$senha);
            }catch (Exception $e)
            {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }catch(PDOException $e){
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            
            }
        }

        return self::$instancia;
    }


}//fim da Conexao


?>
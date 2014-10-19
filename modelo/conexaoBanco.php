<?php
/*
$servidor = 'localhost';
$banco      = 'projeto_estufa';
$usuario  = 'root';
$senha    = '';
return $link     = mysql_connect($servidor, $usuario, $senha);
return $db          = mysql_select_db($banco,$link);

if(!$link)
{
    echo "erro ao conectar ao banco de dados!";exit();
}
*/


Class Connect_MySql{
     
     
     var $host = "localhost";
     var $user = "root";
     var $pass = "";
     var $db = "projeto_estufa";
     var $con = "";
     var $sql;
             

     public function connectDB() {
          $this->con = mysql_connect($this->host, $this->user, $this->pass, $this->db) or die ('Erro na rotina de conexao: '.  mysql_error());
         
     }
    
     function selectDB(){
         $sel = mysql_select_db($this->db) or die ('Erro: '.  mysql_error());
         if($sel)
              return TRUE;
         else
               return FALSE;
     }
     function queryDB($query){
         $resultQuery = mysql_query($this->sql, $query) or die ('Erro na consulta '.mysql_error());
         return $resultQuery;
     }
     
     function set($prop, $value){
         $this->$prop = $value;
     }
     
     function getSQL(){
         return $this->sql;
     }
     
     function closeDB(){
         return mysql_close($this->con);
     }
 }
?>



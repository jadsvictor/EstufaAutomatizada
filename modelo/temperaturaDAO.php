<?php
$servidor = 'localhost';
$banco      = 'projeto_estufa';
$usuario  = 'root';
$senha    = '';
$link     = mysql_connect($servidor, $usuario, $senha);
$db          = mysql_select_db($banco,$link);

 

$date=new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d-H-i-s');
// Obtem o conteudo do arquivo (arquivo.txt)

$dados = file_get_contents('temperatura.txt');

    if ($dados != null){
        
        // Quebra o conteudo do arquivo usando o separador \n (quebra de linha)
$itens = explode("\n", $dados);

// Inicio um array nesta variavel
 $dado = array();

// Intrução inicial do MySQL. Será unida com o resto da consulta no foreach() abaixo
$sql  = "INSERT INTO `condutividade` (`idCondutividade`, `valorCondutividade`, `data/hora`) VALUES";

// Quebro cada item que chega do array $itens, para serem insidos no MySQL
foreach ( $itens as $item ) {
    $dados = explode(';', $item);
 
    // Como os campos nome e data tinham um espaço antes, usei a função trim() em cada dado para retirar esses espaços
    foreach ( $dados as $dadoTmp ) {
        $dado = trim($dadoTmp);
    }

    $sql .= " ('', '".$dado."', '$result'),";
}

// Retira a virgula que sobrou no final da consulta
$sql = substr($sql, 0, -1);

// Executa a query, inserindo os dados.
$resultado = mysql_query($sql) or die(mysql_error());

    }
        
    else{
        echo ("arquivo nao encontrado");
    }
mysql_close();


?>
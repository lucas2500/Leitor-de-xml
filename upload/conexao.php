 <?php

 //--------------------------------------------------------------------------------------------

//Conexão que retorna os dados do xml do banco
 $dbhost    = 'localhost';
 $dbnome    = 'nfe';
 $dbusuario = 'root';
 $dbsenha   = '';

 $connect = mysqli_connect($dbhost, $dbusuario, $dbsenha) or die("Unable to Connect to '$dbhost'");
 mysqli_select_db($connect, $dbnome) or die("Não foi possível abrir o banco: '$dbnome'");
 $test_query = "SHOW TABLES FROM $dbnome";
 $result = mysqli_query($connect, $test_query);


//--------------------------------------------------------------------------------------------



//Conexão para salvar os dados do xml no banco
$db = new PDO('mysql:host=localhost;dbname=nfe','root','');


 ?>


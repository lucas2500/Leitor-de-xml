
<!DOCTYPE html>
<html>
<head>
	<title>Lendo notas fiscals xml com php</title>

	<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>
<div align="center">
	<h1>Leitor de notas fiscais xml</h1>
</div>
</head>
<body>

	<form action="upload/uploads.php" method="POST" enctype="multipart/form-data">
		<input class="button" type="file" id="arquivo" required name="arquivo" multiple>
	</p>
	<input type="submit" name="arquivo" value="Salvar"  class="btn btn-success" >
</form>
<br />



<?php
//Estabelece conexão com o banco de dados
include("upload/conexao.php");

//Retorna os dados do banco
$sql_code = "SELECT * FROM Nota_fiscal";
$sql_query = $connect ->query($sql_code) or die ($connect ->error);
$linha = $sql_query->fetch_assoc(); 
?>

<div class="table-responsive">
	<table>
		<thead>	
			<tr>
				<th>Nº da nota </th>
				<th>Valor da nota</th>
				<th>Nome do cliente</th>
				<th>Cidade de destino</th>
				<th>Bairro de destino</th>
				<th>Placa do veículo</th>
				<th>UF</th>
			</tr>
		</thead>
		<tbody>
			<?php
		do{
			?>
			<tbody>
				<tr>
					<td><?php echo $linha['Numero_nota']?></td>
					<td>R$ <?php echo $linha['Valor_nota']?></td>
					<td><?php echo $linha['Nome_cliente']?></td>
					<td><?php echo $linha['cidade_destino']?></td>
					<td><?php echo $linha['Bairro_destino']?></td>
					<td><?php echo $linha['Placa_veic']?></td>
					<td><?php echo $linha['UF']?></td>
				</tr>
				<?php } while($linha = $sql_query->fetch_assoc());?>
		</tbody>
	</table>
</body>
</html>
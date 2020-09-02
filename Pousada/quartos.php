<?php

	require_once('conexao.php');

	if(isset($_POST['num_porta']) && $_POST['num_porta'] != ""){

		$id = $_POST['id'];
		$num_porta = $_POST['num_porta'];
		$tipo_quarto = $_POST['tipo_quarto'];
		$valor_diaria = $_POST['valor_diaria'];
		$status = $_POST['status'];

		if($id == ""){
			$sql = "insert into pousada (num_porta, tipo_quarto, valor_diaria, status)
				values ('$num_porta', '$tipo_quarto', '$valor_diaria', '$status')
			";
		}else{
			$sql = "update pousada set num_porta = '$num_porta', tipo_quarto = '$tipo_quarto', valor_diaria = '$valor_diaria', status = '$status'
					where id = ".$id;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $id==""){
			$_GET['msg'] = 'Dados inseridos com sucesso';
			$_POST = null;
		}elseif($resultado && $id!=""){
			$_GET['msg'] = 'Dados alterados com sucesso';
			$_POST = null;
		}elseif(!$resultado){
			$_GET['msg'] = 'Falha ao inserir a mensagem';
		}
	}
	
	if(isset($_GET['msg']) && $_GET['msg'] != ""){
		echo $_GET['msg'];
	}
 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Pousada</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h2 align=center>Quartos:</h2>
    <p align=center> <a href="formulario.php">Cadastrar</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="num_porta">Numero do Quarto:</label></td>
        <td><label for="tipo_quarto">Tipo do Quarto:</label></td>
        <td><label for="valor_diaria">Valor da Diária:</label></td>        
        <td><label for="status">Status:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select id, num_porta, tipo_quarto, valor_diaria, status from pousada ";
		$resultado = mysqli_query($conexao, $sql);

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['num_porta'].'</td>
				  <td>'.$dados['tipo_quarto'].'</td>
				  <td>'.$dados['valor_diaria'].'</td>        
				  <td>'.$dados['status'].'</td>
				  <td>
					<a href="excluir.php?id='.$dados['id'].'">Excluir</a>
					<a href="formulario.php?id='.$dados['id'].'">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="formulario.php">Cadastrar</a></p>
</body>
</html>
<?php

	require_once('conexao.php');

	if(isset($_POST['nome_cliente']) && $_POST['nome_cliente'] != ""){

		$id = $_POST['id'];
		$nome_cliente = $_POST['nome_cliente'];
		$documento = $_POST['documento'];
		$data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

		if($id == ""){
			$sql = "insert into clientes (nome_cliente, documento, data_nascimento, cidade, estado)
				values ('$nome_cliente', '$documento', '$data_nascimento', '$cidade', '$estado')
			";
		}else{
			$sql = "update clientes set nome_cliente = '$nome_cliente', documento = '$documento', data_nascimento = '$data_nascimento', cidade = '$cidade', estado = '$estado' 
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
    <h2 align=center>Clientes:</h2>
    <p align=center> <a href="formulario_quartos.php">Cadastrar</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="nome_cliente">Nome do Cliente:</label></td>
        <td><label for="documento">Documento:</label></td>
        <td><label for="data_nascimento">Data de Nascimento:</label></td>        
        <td><label for="cidade">Cidade:</label></td>
        <td><label for="estado">Estado:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select id, nome_cliente, documento, data_nascimento, cidade, estado from clientes ";
		$resultado = mysqli_query($conexao, $sql);

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['nome_cliente'].'</td>
				  <td>'.$dados['documento'].'</td>
				  <td>'.$dados['data_nascimento'].'</td>        
          <td>'.$dados['cidade'].'</td>
          <td>'.$dados['estado'].'</td>
				  <td>
					<a href="excluir_clientes.php?id='.$dados['id'].'">Excluir</a>
					<a href="formulario_clientes.php?id='.$dados['id'].'">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="formulario_quartos.php">Cadastrar</a></p>
</body>
</html>
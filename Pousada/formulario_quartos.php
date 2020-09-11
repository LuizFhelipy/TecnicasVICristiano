  <?php

  require_once('conexao.php');

  $num_porta = '';
  $tipo_quarto = '';
  $valor_diaria = '';
  $status = '';
  $id = '';

  if (isset($_GET['id']) && $_GET['id'] != "") {
    $sql = "select * from quartos where id = " . $_GET['id'];
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
      $dados = mysqli_fetch_array($resultado);
      $num_porta = $dados['num_porta'];
      $tipo_quarto = $dados['tipo_quarto'];
      $valor_diaria = $dados['valor_diaria'];
      $status = $dados['status'];
      $id = $dados['id'];
    }
  }

  ?>


  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <title>Formulário</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>

  <body>
    <?php include_once("index.php"); ?>
    <div width=60% align=center>
      <form class="formulario" method="post" action="quartos.php" align=left>
        <p> Envie uma mensagem preenchendo o formulário abaixo</p>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="field">
          <label for="num_porta">Número da Porta:</label>
          <input type="text" id="num_porta" name="num_porta" value="<?php echo $num_porta; ?>" placeholder="Digite o número da porta*" required>
        </div>

        <div class="field">
          <label for="tipo_quarto">Tipo do Quarto:</label>
          <input type="text" id="tipo_quarto" name="tipo_quarto" value="<?php echo $tipo_quarto; ?>" placeholder="Digite o tipo do quarto*">
        </div>

        <div class="field">
          <label for="valor_diaria">Valor da Diária:</label>
          <input type="text" id="valor_diaria" name="valor_diaria" value="<?php echo $valor_diaria; ?>" placeholder="Digite o valor da diária*" required>
        </div>
        <div class="field">
          <label for="status">Status do Quarto:</label>
          <input type="text" id="status" name="status" value="<?php echo $status; ?>" placeholder="Digite o status do quarto*">
        </div>

        <input type="submit" name="quartos" value="Enviar">
      </form>
    </div>
  </body>

  </html>
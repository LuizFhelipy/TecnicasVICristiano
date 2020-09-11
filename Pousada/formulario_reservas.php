  <?php

  require_once('conexao.php');

  $id_quarto = '';
  $id_cliente = '';
  $data_entrada = '';
  $data_saida = '';
  $valor_reserva = '';
  $status_reserva = '';
  $id = '';

  if (isset($_GET['id']) && $_GET['id'] != "") {
    $sql = "select * from reservas where id = " . $_GET['id'];
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
      $dados = mysqli_fetch_array($resultado);
      $id_quarto = $dados['id_quarto'];
      $id_cliente = $dados['id_cliente'];
      $data_entrada = $dados['data_entrada'];
      $data_saida = $dados['data_saida'];
      $valor_reserva = $dados['valor_reserva'];
      $status_reserva = $dados['status_reserva'];
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

  <body background-color="gray">
    <div width=60% align=center>
      <form class="formulario" method="post" action="reservas.php" align=left>
        <p> Envie uma mensagem preenchendo o formulário abaixo</p>

        <input type="hidden" name="id" value="<?= $id; ?>">

        <div class="field">
          <label for="id_quarto">Número do Quarto:</label>
          <select name="id_quarto" id="id_quarto">
            <?php
            $sql = "select id, num_porta, valor_diaria, status from quartos ";
            $resultado = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_array($resultado)) {
              if ($dados['status'] == 'livre' || $dados['status'] == 'Livre') {
                $num_porta = $dados['num_porta'];
                echo "<option value=" . $dados['id'] . ">" . $num_porta . "</option>";
            ?>

            <?php
              }
            }
            ?>
          </select>
        </div>

        <div class="field">
          <label for="id_cliente">Nome do Cliente:</label>
          <select name="id_cliente" id="id_cliente">
            <?php
            $sql = "select id, nome_cliente from clientes ";
            $resultado = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_array($resultado)) {
              $nome_cliente = $dados['nome_cliente'];
              echo "<option value=" . $dados['id'] . ">" . $nome_cliente . "</option>";
            }
            ?>
          </select>
        </div>

        <div class="field">
          <label for="data_entrada">Data de Entrada:</label>
          <input type="date" id="data_entrada" name="data_entrada" value="<?= $data_entrada; ?>" placeholder="Digite a data de entrada*" required>
        </div>
        <div class="field">
          <label for="data_saida">Data de Saída:</label>
          <input type="date" id="data_saida" name="data_saida" value="<?= $data_saida; ?>" placeholder="Digite a data de saida*" required>
        </div>
        <div class="field">
          <label for="status_reserva">Status da Reserva:</label>
          <input type="text" id="status_reserva" name="status_reserva" value="<?= $status_reserva; ?>" placeholder="Digite status da reserva*" required>
        </div>

        <input type="submit" name="reservas" value="Enviar">
      </form>
    </div>
  </body>

  </html>
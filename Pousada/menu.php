<div class="header">
  <a href="#default" class="logo">Pousada</a>
  <div class="header-right">
    <a href="formulario_clientes.php">Formulário Clientes</a>
    <a href="clientes.php">Clientes</a>
    <a href="formulario_quartos.php">Formulário Quartos</a>
    <a href="quartos.php">Quartos</a>
    <a href="formulario_reservas.php">Formulário Reservas</a>
    <a href="reservas.php">Reservas</a>
  </div>
</div>

<style>
  .header {
    overflow: hidden;
    background-color: #f1f1f1;
    padding: 20px 10px;
  }

  .header a {
    float: left;
    color: black;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
    border-radius: 4px;
  }

  /* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
  .header a.logo {
    font-size: 25px;
    font-weight: bold;
  }

  /* Change the background color on mouse-over */
  .header a:hover {
    background-color: #ddd;
    color: black;
  }

  /* Style the active/current link*/
  .header a.active {
    background-color: dodgerblue;
    color: white;
  }

  /* Float the link section to the right */
  .header-right {
    float: right;
  }
</style>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFOOD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- inicio do nav -->
    <nav>
        <ul>
            <a href="index.html"><img id="Logo" src="img/Logo.png" alt="" srcset=""></a>
        </ul>
        <ul>
            <h1>IFOOD</h1>
        </ul>
    </nav>
    <!-- fim nav -->
    <!-- inico topicos -->
    <div class="topicos">
        <ul>
            <a href="#Salgados">Salgados</a>
        </ul>
        <ul>
            <a href="#Doces">Doces</a>
        </ul>
        <ul>
            <a href="#Combos">Combos</a>
        </ul>
        <ul>
            <a href="./add.php">Cardapio</a>
        </ul>
    </div>
    <!-- fim topicos -->
    <!-- Protudo inicio  -->
    <div class="container">
<div class="cardapio">
  <?php
include "conexao.php";
$categorias = ["Salgados", "Doces", "Combos"];

foreach ($categorias as $cat) {
  echo "<h2 id='$cat'>$cat</h2>";
  echo "<div class='$cat'>";

  $resultado = $conn->query("SELECT * FROM pratos WHERE categoria='$cat' ORDER BY id DESC");

  while ($prato = $resultado->fetch_assoc()) {
    echo "<div class='sobre'>";
    echo "<img id='imgProduto' src='" . $prato["imagem"] . "' alt='" . $prato["nome"] . "'>";
    echo "<div class='nomeProduto'>";
    echo "<h3>" . $prato["nome"] . "</h3>";
    echo "<button id='valor'>R$ " . $prato["preco"] . "</button>";
    echo "</div>";
    echo "</div>";
  }

  echo "</div>";
}
?>
</div>

    </div>

    <footer class="rodape">
  <p>&copy; 2025 - Todos os direitos reservados</p>
  <nav id="info">
    <a href="#">Início</a> |
    <a href="#">Sobre</a> |
    <a href="#">Contato</a>
  </nav>
</footer>

    <!-- Protudo fim  -->
     <script src="script.js"></script>
</body>

</html>
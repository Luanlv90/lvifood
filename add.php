<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Prato</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 id="addA">Adicionar Prato</h1>
  <a href="./index.php">ínicio</a>
  <form class="container" id="add" action="add.php" method="POST" enctype="multipart/form-data">
  <select id="addCategoria" name="categoria" required>
  <option value="">Escolha a categoria</option>
  <option value="Salgados">Salgados</option>
  <option value="Doces">Doces</option>
  <option value="Combos">Combos</option>
</select>
    <input id="addNome" type="text" name="nome" placeholder="Nome do prato" required><br>
    <input id="addPreço" type="text" name="preco" placeholder="Preço" required><br>
    <input id="addImg" type="file" name="imagem" accept="image/*" required><br>
    <button type="submit">Salvar</button>
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $preco = $_POST["preco"];
  $categoria = $_POST["categoria"];
  $imagem = $_FILES["imagem"];

  $nomeImagem = uniqid() . "-" . $imagem["name"];
  $caminho = "upload/" . $nomeImagem;

  if (move_uploaded_file($imagem["tmp_name"], $caminho)) {
   $sql = "INSERT INTO pratos (nome, preco, imagem, categoria) VALUES ('$nome', '$preco', '$caminho', '$categoria')";
    if ($conn->query($sql) === TRUE) {
      echo "<p>Prato adicionado com sucesso!</p>";
    } else {
      echo "<p>Erro ao salvar no banco.</p>";
    }
  } else {
    echo "<p>Erro ao enviar imagem.</p>";
  }
}
?>
</body>
</html>
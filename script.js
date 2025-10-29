function adicionarPrato() {
  const nome = document.getElementById("nome").value.trim();
  const preco = document.getElementById("preco").value.trim();
  const imagemInput = document.getElementById("imagem");
  const arquivo = imagemInput.files[0];

  if (nome && preco && arquivo) {
    const leitor = new FileReader();

    leitor.onload = function(evento) {
      const imagemURL = evento.target.result;

      const cardapio = document.getElementById("cardapio");

      const prato = document.createElement("div");
      prato.className = "prato";

      const img = document.createElement("img");
      img.src = imagemURL;
      img.alt = nome;

      const info = document.createElement("div");
      info.className = "prato-info";
      info.innerHTML = `<strong>${nome}</strong><br>Preço: R$ ${preco}`;

      prato.appendChild(img);
      prato.appendChild(info);
      cardapio.appendChild(prato);

      // Limpar campos
      document.getElementById("nome").value = "";
      document.getElementById("preco").value = "";
      imagemInput.value = "";
    };

    leitor.readAsDataURL(arquivo); // Converte a imagem para base64
  }
}
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vamos Arborizar?</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">

  <script type="module" src="Components/Elements/calculadora.js"></script>
  <script type="module" src="Components/Elements/conversor.js"></script>

  <script type="module" src="Components/Elements/acessibilidade.js"></script>
  <script type="module" src="Components/Elements/menu.js"></script>
  <script type="module" src="Components/Elements/ferramentas.js"></script>
</head>

<body>

  <header>
    <a href=".">
      <img src="img/3.gif" width="1300" alt="Imagem animada de boas-vindas">
    </a>
    <h1>Arborização</h1>
  </header>
  
  <ferramentas-x></ferramentas-x>

  <menu-x></menu-x>

  <calc-modal></calc-modal>

  <conversor-modal></conversor-modal>

  <acessibilidade-x></acessibilidade-x>

  <section class="intro">
    <h1>🌱 VOCÊ SABIA?</h1>
    <p>Árvores no perímetro urbano podem trazer muitos benefícios! Veja só:</p>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 2rem;">
      
      <!-- Coluna do vídeo -->
      <div style="flex: 1 1 45%; min-width: 300px;">
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px;">
          <iframe src="https://www.youtube.com/embed/cM7UL9snXL8?si=g-hUkPwKKBkct9tt" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
          </iframe>
        </div>
      </div>

      <!-- Coluna do texto -->
      <div style="flex: 1 1 45%; min-width: 300px; text-align: justify;">
        <p>🌳 <strong>Oferecem sombra</strong> e deixam o ambiente mais fresco</p>
        <p>💧 <strong>Ajudam a absorver</strong> a água da chuva</p>
        <p>🌬️ <strong>Melhoram a qualidade</strong> do ar</p>
        <p>❄️ <strong>Ambientes mais frescos</strong> reduzem o uso de ar-condicionado e economizam energia</p>
      </div>

    </div>
  </section>

  <section class="intro">
    <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 2rem;">
      <h3>
        O crescimento das cidades está reduzindo as áreas verdes
      </h3>
      <!-- Coluna do texto -->
      <div style="flex: 1 1 45%; min-width: 300px; text-align: justify;">

        <p>
          Já percebeu que os lugares com muito concreto, prédios e asfalto são mais quentes? Isso acontece porque o
          cimento e o asfalto esquentam muito com o sol e não deixam o solo “respirar”.<br>
          Quando cortamos muitas árvores para construir ruas, casas ou estacionamentos, a sombra e o ar fresquinho que
          elas davam desaparecem.<br>
          Além disso, o ar fica mais seco e poluído, e os animais perdem seus lugares para morar. Muitos passarinhos,
          insetos e até pequenos mamíferos deixam de aparecer.<br>
          E tem mais: como o chão não consegue mais absorver a água da chuva, ela escorre pelas ruas e pode causar
          alagamentos e enchentes.<br>
          Por isso, é tão importante cuidar das árvores e pensar em maneiras de trazer mais verde para perto da gente!
          🌳💧
        </p>
      </div>

      <!-- Coluna da imagem -->
      <div style="flex: 1 1 45%; min-width: 300px; text-align: center;">
        <img src="img/Reflorestamento.png" alt="Imagem sobre urbanização"
          style="width: 100%; max-width: 400px; border-radius: 12px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
      </div>

    </div>
  </section>

  <section class="intro">
    <h2>🌳 Exemplos de árvores:</h2>

    <div class="gallery-images">
      <div class="activity">
        <img src="img/Araucaria.png" alt="Araucária Angustifolia">
        <p class="section-title">Araucária Angustifolia</p>
      </div>
      <div class="activity">
        <img src="img/Ipe.png" alt="Ipê-Amarelo">
        <p class="section-title">Ipê-Amarelo</p>
      </div>
      <div class="activity">
        <img src="img/pinheiro.png" alt="Pinheiro">
        <p class="section-title">Pinheiro</p>
      </div>
      <div class="activity">
        <img src="img/aroeira.png" alt="Aroeira">
        <p class="section-title">Aroeira</p>
      </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center; margin-top: 2rem;">
      <!-- Coluna 1: Questionamentos -->
      <div style="flex: 1 1 300px; min-width: 250px;">
        <h3>Investiguem com seus professores ou na internet</h3>
        <div style="text-align: justify;">
          <ul>
            <li>Essas árvores podem ser plantadas lado a lado?</li>
            <li>É melhor plantar só uma espécie ou misturar?</li>
            <li>Quantas cabem no espaço que vocês têm?</li>
          </ul>
          <p><strong>🌱 A matemática e a natureza podem andar juntas!</strong> Façam suas descobertas e compartilhem com
            a turma!</p>
        </div>
      </div>

      <!-- Coluna 2: Ideias -->
      <div style="flex: 1 1 300px; min-width: 250px;">
        <h3>💡 Ideias para inspirar:</h3>
        <div style="text-align: justify;">
          <ul>
            <li>Criar uma maquete da escola com árvores em miniatura.</li>
            <li>Fazer entrevistas com jardineiros ou paisagistas da região.</li>
            <li>Usar aplicativos de medição de espaço para planejar os plantios.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="desen">
    <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 2rem;">

      <!-- Coluna do texto "Como é a sua escola?" -->
      <div style="flex: 1 1 45%; min-width: 300px; text-align: justify;">
        <h2>🌿 Como é a sua escola?</h2>
        <ul>
          <li>Ela tem muitas árvores ou é mais urbanizada?</li>
          <li>Será que existe algum espaço que poderia ser arborizado?</li>
          <li>Você sabe o que é <strong>arborização</strong>? Converse com seus amigos!</li>
        </ul>
      </div>

      <!-- Coluna do texto "Investigue!" -->
      <div style="flex: 1 1 45%; min-width: 300px;">
        <h2>🔍 INVESTIGAÇÃO!</h2>
        <div style="text-align: justify;">
          <p>Que tal vocês investigarem:</p>
          <p><strong>Quantas árvores poderiam ser plantadas ao redor da escola?</strong></p>
        </div>
      </div>

    </div>
  </section>

  <section class="math-tips bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center mb-4">📐 Dicas Matemáticas</h2>

    <p class="mb-4 text-justify">
      Vocês sabiam que a matemática pode ser uma grande aliada na hora de arborizar um lugar? Com ela, é possível medir,
      calcular, planejar e até prever o crescimento das árvores.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm md:text-base">
      <!-- Coluna 1 -->
      <div class="rounded-lg p-4 bg-gray-50 shadow-sm">
        <h3 class="font-semibold mb-2">📏 Medindo o Espaço</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Meça os espaços ao redor da escola.</li>
          <li>Calcule quanto mede cada lado disponível.</li>
          <li>Use régua, trena ou aplicativo de medição.</li>
        </ul>
      </div>

      <!-- Coluna 2 -->
      <div class="rounded-lg p-4 bg-gray-50 shadow-sm">
        <h3 class="font-semibold mb-2">🧠 Planejando</h3>
        <p>Pesquise informações sobre quais árvores são adequadas para arborização, serpa que é possível plantar qualquer árvore</p>
      </div>

      <!-- Coluna 3 -->
      <div class="rounded-lg p-4 bg-gray-50 shadow-sm">
        <h3 class="font-semibold mb-2">📊 Calculando e Analisando</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>As árvores podem ser plantadas lado a lado</li>
          <li>Quantas árvores cabem se cada uma precisa de 3m</li>
        </ul>
      </div>
    </div>

    <p class="mt-6 text-center text-lg font-medium">
      🌳 A matemática também pode ajudar a salvar o planeta! Bora usar esse superpoder? ✨
    </p>
  </section>

  <!-- <div class="floating-menu">
    <div class="menu-options" id="menuOptions">
      <a href="lixo" title="Lixo na Escola">🗑️</a>
      <a href="petroleo" title="Petróleo">⛽</a>
      <a href="agua" title="Desperdício de Água">💧</a>
      <a href="arborizacao" title="Arborização">🌳</a>
      <a href="sobre" title="Quem Somos">👩‍🏫</a>
      <a href="." title="Início">🏠</a>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
  </div> -->
  <div class="fala-container">
    <button id="close-assistant" onclick="closeAssistant()">×</button>
    <div class="fala">Oiê! Que tal descobrir como plantar mais árvores na sua escola? 🌳</div>
    <div class="fala">Você pode usar a matemática pra calcular o espaço e planejar tudo direitinho! 📏📐</div>
    <div class="fala">Vamos juntos nessa missão verde? 🍃✨</div>
    <div class="fala">Sabia que árvores ajudam até a refrescar o ambiente? 🧊☀️</div>
    <div class="fala">Cada árvore precisa de um espaço pra crescer saudável. Já mediu aí? 📐🌱</div>
    <div class="fala">Misturar espécies diferentes pode deixar tudo mais bonito e equilibrado! 🌸🌳🌼</div>
    <div class="fala">Vamos fazer um mapa com os lugares onde podemos plantar? 🗺️🪴</div>
    <div class="fala">Será que cabe uma floresta em miniatura perto da escola? Vamos investigar! 🔍🏫</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">
  
  <section class="intro" style="margin-top: 3rem; text-align: center;">
  <h2>🗺️ Vamos usar o Google Earth?</h2>

  <p style="font-size: 1.2rem;">
    Descubra no mapa onde podemos plantar árvores na escola! 🌳  
    Depois, volte aqui e faça o cálculo!
  </p>

  <a href="https://earth.google.com/web/" target="_blank" 
     style="display:inline-block; background:#4CAF50; color:white; padding:12px 20px; border-radius:10px; font-size:1.4rem; text-decoration:none; margin:1rem;">
    📍 Abrir Google Earth
  </a>

  <hr style="margin: 2rem 0;">

  <h2>🧮 Quantas árvores cabem?</h2>

<p>
Digite o tamanho do espaço que vocês mediram e escolha o espaço para cada árvore
</p>

<button onclick="toggleCalculadora()" style="
background:#ffd54f;
border:none;
padding:10px 16px;
border-radius:12px;
font-size:1.4rem;
cursor:pointer;">
💡 Mostrar calculadora
</button>


<div id="calculadoraArvores" style="
display:none;
margin:2rem auto;
max-width:400px;
padding:1rem;
background:#f0fff0;
border-radius:12px;
">

<label>📏 Tamanho do espaço (em metros)</label>

<input id="espaco" type="number" placeholder="Ex: 30"
style="width:100%;font-size:1.3rem;padding:8px;border-radius:8px;margin-top:5px;">

<br><br>

<label>🌳 Espaço para cada árvore (em metros)</label>

<input id="distancia" type="number" value="3"
style="width:100%;font-size:1.3rem;padding:8px;border-radius:8px;margin-top:5px;">

<br><br>

<button onclick="calcularArvores()" style="
background:#28a745;
color:white;
border:none;
padding:12px;
width:100%;
font-size:1.3rem;
border-radius:10px;">
✨ Calcular
</button>

<h3 id="resultado" style="margin-top:1.5rem;font-size:1.8rem;"></h3>
  </div>

  <hr style="margin: 2rem 0;">

  <h2>💡 Sua Resposta!</h2>

  <p style="font-size: 1.1rem;">
    Agora escreva o que você descobriu! 😊
  </p>

  <textarea id="respostaAluno" placeholder="Ex: Acho que cabem 12 árvores perto do muro da quadra..."
    style="width:90%; height:120px; font-size:1.2rem; padding:10px; border-radius:12px; border:3px solid #28a745; resize:none; margin-top:10px;">
  </textarea>

  <br><br>

  <button onclick="baixarPDF()" 
    style="background:#1e88e5; color:white; padding:12px 18px; border-radius:10px; font-size:1.3rem; border:none; cursor:pointer">
    💾 Baixar minha Resposta
  </button>

  <p id="confirmacao" style="margin-top:15px; font-weight:bold;"></p>

  <hr style="margin: 2rem 0;">
  </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
function calcularArvores() {
  const espaco = Number(document.getElementById("espaco").value);
  const distancia = Number(document.getElementById("distancia").value);
  const total = Math.floor(espaco / distancia);

  document.getElementById("resultado").innerText =
    total > 0 
    ? `🌳 Cabem aproximadamente ${total} árvores!`
    : "⚠️ Coloque números maiores!";
}

function toggleCalculadora(){

  const calc = document.getElementById("calculadoraArvores")

  if(calc.style.display === "none"){
    calc.style.display = "block"
  }else{
    calc.style.display = "none"
  }

}

function baixarPDF(){

const { jsPDF } = window.jspdf

const resposta = document.getElementById("respostaAluno").value

if(!resposta){
  document.getElementById("confirmacao").innerText =
"X Escreva sua resposta primeiro!"
return
}

const pdf = new jsPDF()

const data = new Date().toLocaleDateString("pt-BR")

let y = 20

pdf.setFontSize(18)
pdf.text("Relatório de Arborização",20,y)

y += 15

pdf.setFontSize(12)
pdf.text("Data: "+data,20,y)

y += 20

pdf.setFontSize(14)
pdf.text("Resposta do aluno:",20,y)

y += 10

const linhas = pdf.splitTextToSize(resposta,170)

pdf.text(linhas,20,y)

pdf.save("resposta_arborizacao.pdf")

document.getElementById("confirmacao").innerText =
"✔ Sua resposta foi salva!"

}
</script>



  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
  </footer>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <a href="sobre" class="link-somos">Quem somos?</a>
</body>

</html>
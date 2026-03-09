<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desperdício de Água</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script type="module" src="Components/Elements/calculadora.js"></script>
  <script type="module" src="Components/Elements/conversor.js"></script>

  <script type="module" src="Components/Elements/acessibilidade.js"></script>
  <script type="module" src="Components/Elements/menu.js"></script>
  <script type="module" src="Components/Elements/ferramentas.js"></script>
  <script type="module" src="Components/Elements/tabelatest.js"></script>
</head>

<body>
  <style>
    :root{--accent:#0ea5a4;--bg:#f8fafc}
body{font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; margin:0;padding:0;background:var(--bg);color:#0f172a}
header{background:#ffffff;padding:1rem 1.25rem;border-bottom:1px solid #e6eef0}
header h1{margin:0;font-family:'Fredoka One',sans-serif}
main{max-width:1100px;margin:1.25rem auto;padding:1rem}


/* Form e inputs estilo lixo.php */
.form-card{background:#fff;border-radius:12px;padding:16px;box-shadow:0 6px 18px rgba(2,6,23,0.06);margin-bottom:1rem}
label{display:block;margin-bottom:6px;font-weight:600}
.grid-3{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:12px}
input[type=text], input[type=number], input[type=date]{width:100%;padding:10px;border:1px solid #d1e8e6;border-radius:8px;font-size:0.95rem}
.menu-toggle{background:var(--accent);color:#fff;border:none;padding:10px 14px;border-radius:10px;cursor:pointer;font-weight:700}
.menu-toggle:disabled{opacity:0.6;cursor:not-allowed}


table{width:100%;border-collapse:collapse;background:#fff;border-radius:8px;overflow:hidden}
th,td{padding:10px;border-bottom:1px solid #eef6f6;text-align:center}
thead th{background:#e6f6f5;font-weight:700}


.row-actions{display:flex;gap:8px;justify-content:center}


/* Chart container */
.chart-card{background:#fff;padding:12px;border-radius:12px;box-shadow:0 6px 18px rgba(2,6,23,0.06)}
  </style>
  <header>
    <a href=".">
      <img src="img/3.gif" width="1300" alt="Imagem animada de boas-vindas">
    </a>
    <h1>Desperdício de Água</h1>
  </header>
  
  <ferramentas-x></ferramentas-x>

  <menu-x></menu-x>

  <calc-modal></calc-modal>

  <conversor-modal></conversor-modal>

  <acessibilidade-x></acessibilidade-x>

  <section class="intro">
    <h1>VAMOS FALAR SOBRE O DESPERDÍCIO DE ÁGUA?</h1>
    <div
      style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 700px; margin: 1.5rem auto; border-radius: 12px;">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/pvGts9ktQoQ?si=dHI4Co4N_2jNyIfq"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
      </iframe>
    </div>
    <p>Fonte: WWF-Brasil (Youtube)</p>
  </section>

  <section class="intro">
    <h2>O desperdício de água acontece de muitas formas</h2>
    <p>E às vezes as pessoas estão tão acostumadas a fazer isso que não se dão conta do quanto de água estão gastando.
    </p>
    <p><strong>Olhe alguns exemplos:</strong></p>
    <div class="exemplos-container">
      <div class="exemplo">
        <img src="img/Desperdício de agua.png" alt="Lavando calçada" />
        <p>Deixar a torneira aberta ao lavar a calçada</p>
      </div>
      <div class="exemplo">
        <img src="img/Escovar.png" alt="Escovando os dentes com a torneira ligada" />
        <p>Escovar os dentes com a torneira ligada</p>
      </div>
      <div class="exemplo">
        <img src="img/torneira.png" alt="Torneira pingando" />
        <p>A torneira não é fechada corretamente e fica pingando</p>
      </div>
      <div class="exemplo">
        <img src="img/Lavando carro.png" alt="Lavando o carro com mangueira" />
        <p>Lavar o carro com excesso de água da mangueira</p>
      </div>
    </div>
  </section>

  <section class="desen">
    <h2>Como são as suas práticas em relação ao desperdício de água?</h2>
    <div class="duas-colunas">
      <div class="coluna-imagem">
        <img src="img/Garrafinhas.png" alt="Garrafinhas de água" />
      </div>
      <div class="coluna-texto">
        <p>Vamos pensar em um exemplo prático do seu uso de água na escola!</p>
        <p>Quando você está na escola, você usa sua própria garrafinha de água?</p>
        <p>E você troca a água dessa garrafinha, quando ela está quente?</p>
        <p>Como é realizada essa troca?</p>
        <p><strong>Vamos investigar se a água da sua garrafinha é desperdiçada?</strong></p>
      </div>
    </div>
  </section>

  <section class="intro">
    <h2>Una-se aos seus amigos e conversem sobre este assunto:</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; text-align: justify; gap: 1rem;">

      <div style="flex: 1; min-width: 250px; border: 1px solid #e0e0e0; padding: 1rem; border-radius: 8px;">
        <p><strong>Perguntas para pensar:</strong></p>
        <ul>
          <li>Você bebe toda a água da sua garrafinha?</li>
          <li>Quando a água fica quente, você ainda bebe ou joga fora?</li>
          <li>Você já emprestou sua garrafinha para um amigo?</li>
          <li>Quantas vezes por dia você enche a garrafinha?</li>
          <li>Você cuida bem da sua garrafinha?</li>
        </ul>
      </div>

      <div style="flex: 1; min-width: 250px; border: 1px solid #e0e0e0; padding: 1rem; border-radius: 8px;">
        <p><strong>Vamos descobrir juntos:</strong></p>
        <ul>
          <li>No seu grupo, alguém já jogou água fora?</li>
          <li>Isso acontece muitas vezes?</li>
          <li>Você acha que isso é desperdício?</li>
          <li>O que a gente pode fazer para usar melhor a água?</li>
          <li>Será que outras turmas também jogam água fora?</li>
        </ul>
      </div>

      <div style="flex: 1; min-width: 250px; border: 1px solid #e0e0e0; padding: 1rem; border-radius: 8px;">
        <p><strong>Vamos ter ideias juntos!</strong></p>
        <ul>
          <li>Que tal fazer um cartaz sobre como economizar água?</li>
          <li>Vocês poderiam contar isso para outras salas?</li>
          <li>Dá pra fazer um desenho ou uma música sobre o tema?</li>
          <li>Quais dicas você pode dar para seus amigos?</li>
          <li>Se precisar, chame seu professor para ajudar!</li>
        </ul>
      </div>

    </div>
  </section>

  <section class="math-tips bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center mb-4">💧 Agora vamos usar a Matemática para Investigar o Uso da Água?</h2>

    <p class="mb-4 text-justify">
      Observar, anotar, medir e calcular! <br>
      A matemática pode ajudar a entender melhor como usamos (ou desperdiçamos!) a
      água no dia a dia. Bora investigar?
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm md:text-base">
      <!-- Coluna 1: Observação e Medição -->
      <div class="rounded-lg p-4 bg-blue-50 shadow-sm">
        <h3 class="font-semibold mb-2">🔍 Observação e Medição</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>🍼 Veja quantos <strong>ml ou litros</strong> cabem na sua garrafinha.</li>
          <li>📏 Você enche até o topo ou só pela metade?</li>
          <li>🌡️ Quando a água esquenta, você joga fora? <strong>Anote quanto!</strong></li>
        </ul>
      </div>

      <!-- Coluna 2: Registro e Coleta de Dados -->
      <div class="rounded-lg p-4 bg-blue-50 shadow-sm">
        <h3 class="font-semibold mb-2">📅 Registros</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Anote por um periodo de tempo, isso pode te ajudar:</li>
          <ul class="list-circle pl-6">
            <li>💧 Quanta água foi usada</li>
            <li>🗑️ Quanta água foi desperdiçada</li>
          </ul>
          <li>👨‍👩‍👧‍👦 Pergunte aos amigos da sala:</li>
          <li><strong>Quantos também desperdiçam?</strong></li>
        </ul>
      </div>

      <!-- Coluna 3: Análise e Apresentação -->
      <div class="rounded-lg p-4 bg-blue-50 shadow-sm">
        <h3 class="font-semibold mb-2">📊 Análise os seus Dados:</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>➕ Conte tudo o que foi usado e jogado fora.</li>
          <li>✖️ Realize operações matemáticas:
            <br><em>“Se eu desperdiço 100ml por dia, quanto em 2 ou 3 dias?”</em>
          </li>
          <li>🎤 Apresente o que descobriu para a turma!</li>
        </ul>
      </div>
    </div>

    <p class="mt-6 text-center text-lg font-medium">
      Com números e ideias, a gente aprende a cuidar da água! 💦✨
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
    <div class="fala">Oiê! Você já parou pra pensar se está desperdiçando água na escola? 💧</div>
    <div class="fala">Vamos investigar juntos e usar a matemática para descobrir como melhorar isso? 🧽</div>
    <div class="fala">Toda a ajuda conta pra cuidar do planeta! 🌱</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">


  <water-tracker></water-tracker>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  <script src="script.js"></script>
  <script>
    document.getElementById("add-row").addEventListener("click", () => {
      const tbody = document.querySelector("#tabela-agua tbody");
      const row = document.createElement("tr");
      row.innerHTML = `
        <td><input type="text" placeholder="Dia"></td>
        <td><input type="number" min="0"></td>
        <td><input type="number" min="0"></td>`;
      tbody.appendChild(row);
    });

    // PDF
    document.getElementById("baixar-pdf").addEventListener("click", () => {
      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF();
      pdf.html(document.querySelector(".atividade"), {
        callback: () => pdf.save("relatorio_agua.pdf")
      });
});
</script>
<script src="script.js"></script>

<!-- html2canvas necessário para gerar imagem da página -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
document.getElementById("add-row").addEventListener("click", () => {
  const tbody = document.querySelector("#tabela-agua tbody");
  const row = document.createElement("tr");

  row.innerHTML = `
    <td><input type="text" placeholder="Dia"></td>
    <td><input type="number" min="0"></td>
    <td><input type="number" min="0"></td>
  `;

  tbody.appendChild(row);
});


// GERAR PDF MELHORADO
document.getElementById("baixar-pdf").onclick = async function gerarPDF() {

  const elemento = document.querySelector(".atividade");

  const canvas = await html2canvas(elemento, {
    scale: 2,
    useCORS: true
  });

  const imgData = canvas.toDataURL("image/png");

  const { jsPDF } = window.jspdf;
  const pdf = new jsPDF("p", "mm", "a4");

  const pageWidth = pdf.internal.pageSize.getWidth();
  const pageHeight = pdf.internal.pageSize.getHeight();

  const imgWidth = pageWidth;
  const imgHeight = (canvas.height * imgWidth) / canvas.width;

  let heightLeft = imgHeight;
  let position = 0;

  pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
  heightLeft -= pageHeight;

  while (heightLeft > 0) {
    position = heightLeft - imgHeight;
    pdf.addPage();
    pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
    heightLeft -= pageHeight;
  }

  pdf.save("relatorio_agua.pdf");
};
</script>

</body>

</html>
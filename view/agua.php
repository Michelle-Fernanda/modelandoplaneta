<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desperdício de Água</title>
  <?php include 'Components/head.php'; ?>
  <link rel="stylesheet" href="view/agua.css">
</head>

<body>

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
    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;max-width:700px;margin:1.5rem auto;border-radius:12px">
      <iframe src="https://www.youtube.com/embed/pvGts9ktQoQ?si=dHI4Co4N_2jNyIfq"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
        style="position:absolute;top:0;left:0;width:100%;height:100%">
      </iframe>
    </div>
    <p>Fonte: WWF-Brasil (Youtube)</p>
  </section>

  <section class="intro">
    <h2>O desperdício de água acontece de muitas formas</h2>
    <p>E às vezes as pessoas estão tão acostumadas a fazer isso que não se dão conta do quanto de água estão gastando.</p>
    <p><strong>Olhe alguns exemplos:</strong></p>
    <div class="exemplos-container">
      <div class="exemplo">
        <img src="img/Desperdício de agua.png" alt="Lavando calçada">
        <p>Deixar a torneira aberta ao lavar a calçada</p>
      </div>
      <div class="exemplo">
        <img src="img/Escovar.png" alt="Escovando os dentes com a torneira ligada">
        <p>Escovar os dentes com a torneira ligada</p>
      </div>
      <div class="exemplo">
        <img src="img/torneira.png" alt="Torneira pingando">
        <p>A torneira não é fechada corretamente e fica pingando</p>
      </div>
      <div class="exemplo">
        <img src="img/Lavando carro.png" alt="Lavando o carro com mangueira">
        <p>Lavar o carro com excesso de água da mangueira</p>
      </div>
    </div>
  </section>

  <section class="desen">
    <h2>Como são as suas práticas em relação ao desperdício de água?</h2>
    <div class="duas-colunas">
      <div class="coluna-imagem">
        <img src="img/Garrafinhas.png" alt="Garrafinhas de água">
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
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;text-align:justify;gap:1rem">
      <div style="flex:1;min-width:250px;border:1px solid #e0e0e0;padding:1rem;border-radius:8px">
        <p><strong>Perguntas para pensar:</strong></p>
        <ul>
          <li>Você bebe toda a água da sua garrafinha?</li>
          <li>Quando a água fica quente, você ainda bebe ou joga fora?</li>
          <li>Você já emprestou sua garrafinha para um amigo?</li>
          <li>Quantas vezes por dia você enche a garrafinha?</li>
          <li>Você cuida bem da sua garrafinha?</li>
        </ul>
      </div>
      <div style="flex:1;min-width:250px;border:1px solid #e0e0e0;padding:1rem;border-radius:8px">
        <p><strong>Vamos descobrir juntos:</strong></p>
        <ul>
          <li>No seu grupo, alguém já jogou água fora?</li>
          <li>Isso acontece muitas vezes?</li>
          <li>Você acha que isso é desperdício?</li>
          <li>O que a gente pode fazer para usar melhor a água?</li>
          <li>Será que outras turmas também jogam água fora?</li>
        </ul>
      </div>
      <div style="flex:1;min-width:250px;border:1px solid #e0e0e0;padding:1rem;border-radius:8px">
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
      Observar, anotar, medir e calcular!<br>
      A matemática pode ajudar a entender melhor como usamos (ou desperdiçamos!) a água no dia a dia. Bora investigar?
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm md:text-base">
      <div class="rounded-lg p-4 bg-blue-50 shadow-sm">
        <h3 class="font-semibold mb-2">🔍 Observação e Medição</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>🍼 Veja quantos <strong>ml ou litros</strong> cabem na sua garrafinha.</li>
          <li>📏 Você enche até o topo ou só pela metade?</li>
          <li>🌡️ Quando a água esquenta, você joga fora? <strong>Anote quanto!</strong></li>
        </ul>
      </div>
      <div class="rounded-lg p-4 bg-blue-50 shadow-sm">
        <h3 class="font-semibold mb-2">📅 Registros</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Anote por um período de tempo, isso pode te ajudar:</li>
          <ul class="list-circle pl-6">
            <li>💧 Quanta água foi usada</li>
            <li>🗑️ Quanta água foi desperdiçada</li>
          </ul>
          <li>👨‍👩‍👧‍👦 Pergunte aos amigos da sala:</li>
          <li><strong>Quantos também desperdiçam?</strong></li>
        </ul>
      </div>
      <div class="rounded-lg p-4 bg-blue-50 shadow-sm">
        <h3 class="font-semibold mb-2">📊 Analise os seus Dados:</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>➕ Conte tudo o que foi usado e jogado fora.</li>
          <li>✖️ Realize operações matemáticas:
            <br><em>"Se eu desperdiço 100ml por dia, quanto em 2 ou 3 dias?"</em>
          </li>
          <li>🎤 Apresente o que descobriu para a turma!</li>
        </ul>
      </div>
    </div>

    <p class="mt-6 text-center text-lg font-medium">Com números e ideias, a gente aprende a cuidar da água! 💦✨</p>
  </section>

  <div class="fala-container">
    <button id="close-assistant" onclick="closeAssistant()">×</button>
    <div class="fala">Oiê! Você já parou pra pensar se está desperdiçando água na escola? 💧</div>
    <div class="fala">Vamos investigar juntos e usar a matemática para descobrir como melhorar isso? 🧽</div>
    <div class="fala">Toda a ajuda conta pra cuidar do planeta! 🌱</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">

  <tabela-agua></tabela-agua>

  <enviar-email id="emailSender" endpoint="enviar_email.php"></enviar-email>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  <?php include 'Components/scripts.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script>
    // Quando <tabela-agua> dispara 'solicitaremail', repassa os dados
    // para o <enviar-email> e abre o modal.
    document.addEventListener('solicitaremail', (e) => {
      const emailSender = document.getElementById('emailSender');
      emailSender.setDados(e.detail);
      emailSender.abrir();
    });
  </script>

</body>
</html>
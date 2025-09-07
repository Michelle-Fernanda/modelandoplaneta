<?php
// Caminho do arquivo JSON
$jsonFile = __DIR__ . '/lixo.json';

// Função para ler os dados do arquivo JSON
function lerUsuarios($jsonFile) {
  if (!file_exists($jsonFile)) {
    return [];
  }
  $json = file_get_contents($jsonFile);
  return json_decode($json, true) ?: [];
}

// Função para salvar os dados no arquivo JSON
function salvarUsuarios($jsonFile, $usuarios) {
  file_put_contents($jsonFile, json_encode($usuarios, JSON_PRETTY_PRINT));
}

// Processa o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tipo = $_POST["tipoLixo"];
  $quantidade = $_POST["quantidade"];
  $data = $_POST["data"];

  $usuarios = lerUsuarios($jsonFile);
  $usuarios[] = [
    'tipoLixo' => $tipo,
    'quantidade' => $quantidade,
    'data' => $data
  ];
  salvarUsuarios($jsonFile, $usuarios);

  header("Location: lixo");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lixo na Escola</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <a href="">
      <img src="img/3.gif" width="1300" alt="Imagem animada de boas-vindas">
    </a>
    <h1>Lixo na Escola</h1>
  </header>

  <section class="intro"
    style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center; align-items: flex-start; text-align: justify;">
    <!-- Coluna da imagem e texto -->
    <div style="flex: 1; min-width: 300px; max-width: 450px;">
      <img src="img/Lixo.png" alt="Imagem ilustrativa de lixo na escola"
        style="width: 100%; border-radius: 12px; margin-bottom: 1rem;">
      <p>
        Nas escolas podemos perceber que diferentes tipos de lixo são gerados. Na cozinha temos o lixo orgânico,
        nas salas temos lixos recicláveis como papel e plástico. E no pátio e ao redor da escola pode ser encontrado
        diferentes tipos de lixo. Aliás, não apenas na escola, o lixo está presente em muitos lugares!
      </p>
      <p>🧹 A gente aprende que o lixo deve ser jogado no lugar certo...</p>
      <p>Mas você já parou pra pensar o que acontece com ele depois disso? 🤔</p>
    </div>

    <!-- Coluna do vídeo e perguntas -->
    <div style="flex: 1; min-width: 300px; max-width: 450px;">
      <div
        style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px; margin-bottom: 1rem;">
        <iframe src="https://www.youtube.com/embed/MiuIckYJfQY?si=kkrpXX2f2ckzIB6k" title="Vídeo sobre o lixo"
          allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;">
        </iframe>
      </div>
      <p>
        🗑️ <strong>Você sabe para onde vai o lixo depois que jogamos fora?</strong><br><br>
        🎬 Neste vídeo animado, você vai acompanhar a jornada do lixo desde a lixeira até o final do seu caminho.
        Vai entender o que são os <strong>resíduos sólidos</strong> e por que é importante cuidar deles com atenção.
        ♻️<br><br>
        🌱 Também vai conhecer ideias e projetos que já existem no Brasil e que ajudam a proteger o meio ambiente!
        Quem sabe você e seus amigos não criam algo parecido na escola? 💡👧🧑
      </p>

    </div>

  </section>

  <section class="desen" style="text-align: justify;">
    <h2 style="text-align: center;">Vamos refletir juntos? 🤔</h2>
    <p>Que tal formar um grupo com seus colegas e investigar o que acontece com o lixo na sua escola?</p>
    <p>Vocês podem conversar com professores, com o pessoal da limpeza e com outros funcionários da escola. Perguntem:
    </p>
    <ul style="max-width: 800px; margin: 0 auto; text-align: left;">
      <li>Para onde vai o lixo que a escola produz?</li>
      <li>Existe separação dos resíduos, como papel, plástico e restos de comida?</li>
      <li>Alguma parte desse lixo é reciclada?</li>
    </ul>
    <p>🕵️‍♀️🕵️‍♂️ Depois dessa investigação inicial, vocês terão uma missão muito importante:</p>
    <p>Descobrir qual é a quantidade de lixo que a escola gera por dia ou por semana.</p>
    <p>Usem a matemática para ajudar nessa tarefa, fazendo anotações, registros e até gráficos!</p>
    <p>Vamos nessa? 💪🌱</p>
  </section>

  <section class="math-tips bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center mb-4">🗑️ Investigando o Lixo na Escola com a Matemática</h2>

    <p class="mb-4 text-justify" style="text-align: justify;">
      Depois de bater um papo com seus colegas e investigar o que acontece com o lixo da sua escola, que tal usar a
      matemática para descobrir mais sobre essa história? 📊🗑️ Ela pode ajudar a entender quanto lixo é gerado, onde
      ele aparece com mais frequência e como podemos melhorar isso juntos! 🤝💡
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm md:text-base">
      <!-- Coluna 1 -->
      <div class="border border-gray-200 rounded-lg p-4">
        <h3 class="font-semibold mb-2">🔍 Coletando dados</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Escolha um tipo de lixo para observar (orgânico, reciclável, do pátio ou das salas).</li>
          <li>Anote tudo o que conseguir: quantos sacos foram coletados? Qual o peso deles?</li>
          <li>Registre também o que descobriram nas entrevistas com funcionários ou colegas.</li>
        </ul>
      </div>

      <!-- Coluna 2 -->
      <div class="border border-gray-200 rounded-lg p-4">
        <h3 class="font-semibold mb-2">📏 Como medir o lixo?</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Vocês podem pesar o lixo com balança (em gramas ou quilos).</li>
          <li>Ou usar um balde medidor para saber o volume (em litros).</li>
          <li>Quantos sacos de lixo cabem em uma lixeira da escola?</li>
          <li>Quantos sacos são cheios por dia?</li>
        </ul>
      </div>

      <!-- Coluna 3 -->
      <div class="border border-gray-200 rounded-lg p-4">
        <h3 class="font-semibold mb-2">📐 Fazendo contas e descobertas</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Quantos quilos de lixo são gerados por semana?</li>
          <li>Qual o total por sala ou por grupo de alunos?</li>
          <li>Se cada aluno produz X gramas por dia, quanto será no mês?</li>
          <li>Façam um gráfico com os resultados para comparar os dias ou os tipos de lixo.</li>
        </ul>
      </div>
    </div>

    <p class="mt-6 text-center text-lg font-medium" style="text-align: justify;">
      Com a ajuda da matemática, vocês podem entender melhor o problema e ajudar a escola a produzir menos lixo! ♻️📊
    </p>
  </section>

  <div class="floating-menu">
    <div class="menu-options" id="menuOptions">
      <a href="lixo" title="Lixo na Escola">🗑️</a>
      <a href="petroleo" title="Petróleo">⛽</a>
      <a href="agua" title="Desperdício de Água">💧</a>
      <a href="arborizacao" title="Arborização">🌳</a>
      <a href="sobre" title="Quem Somos">👩‍🏫</a>
      <a href="" title="Início">🏠</a>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
  </div>

  <div class="fala-container">
    <button id="close-assistant" onclick="closeAssistant()">×</button>
    <div class="fala">Oiê! Bora descobrir quanto lixo sua escola produz?</div>
    <div class="fala">A matemática pode ajudar a resolver esse problemão! 🧮</div>
    <div class="fala">Vamos nessa missão juntos? 🌱</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">

  <style>
    .resultados {
      max-width: 700px;
      margin: 2rem auto;
      background-color: #fff5e6;
      border-radius: 16px;
      padding: 1.5rem 2rem;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
      font-family: 'Fredoka One', cursive;
    }

    .resultados h2,
    .resultados h3 {
      text-align: center;
      color: #4caf50;
      margin-bottom: 1rem;
    }

    #formResultados {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    #formResultados label {
      flex-basis: 100%;
      font-weight: bold;
      color: #289728;
    }

    #formResultados section {
      width: 60%;
      display: flex;
      justify-content: space-between;
    }

    #formResultados select,
    #formResultados input[type="number"],
    #formResultados input[type="date"] {
      padding: 0.5rem;
      border-radius: 8px;
      border: 1px solid #4caf50;
      font-size: 1rem;
    }

    #formsResultados input[type="number"] {
      width: 200px;
    }

    #formResultados button {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 0.7rem 1.2rem;
      border-radius: 12px;
      cursor: pointer;
      font-weight: bold;
      font-size: 1rem;
      transition: background-color 0.3s;
      width: 100%;
      max-width: 160px;
    }

    #formResultados button:hover {
      background-color: #388e3c;
    }

    #tabelaResultados {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    #tabelaResultados th,
    #tabelaResultados td {
      border: 1px solid #4caf50;
      padding: 0.5rem;
      text-align: center;
    }

    #tabelaResultados thead {
      background-color: #dcffcf;
      color: #2e7d32;
    }
  </style>

  <section class="math-tips bg-white p-6 rounded-xl shadow-md">
    <h2 class="font-semibold mb-2">📋 Anote seus Resultados</h2>
    <form id="formResultados" method="post" action="lixo">
      <section>
        <label for="tipoLixo">Tipo de lixo:</label>
        <select id="tipoLixo" name="tipoLixo" required>
          <option value="">Selecione</option>
          <option value="Orgânico">Orgânico</option>
          <option value="Reciclável">Reciclável</option>
          <option value="Restos do Pátio">Restos do Pátio</option>
          <option value="Outros">Outros</option>
        </select>
      </section>

      <section>
        <label for="quantidade">Quantidade (kg):</label>
        <input type="number" name="quantidade" id="quantidade" min="0" step="0.01" placeholder="Ex: 1.5" required>
      </section>

      <section>
        <label for="data">Data da coleta:</label>
        <input type="date" name="data" id="data" required>
      </section>

      <button type="submit">Adicionar Resultado</button>
    </form>

    <h3>Resultados Anotados</h3>
    <table id="tabelaResultados">
      <thead>
        <tr>
          <th>Tipo de Lixo</th>
          <th>Quantidade (kg)</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody id="tabelaUsuários">
        <?php
          $usuarios = lerUsuarios($jsonFile);

          for( $i = 0; $i < count($usuarios); $i++ ) {
            echo "<tr>";
            echo "<td>" . $usuarios[$i]['tipoLixo'] . "</td>";
            echo "<td>" . $usuarios[$i]['quantidade'] . "</td>";
            echo "<td>" . $usuarios[$i]['data'] . "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </section>
  <script>
    document.getElementById('formResultados').addEventListener('submit', function(event) {
      // 1. Previne a recarga da página
      event.preventDefault();

      // 2. Coleta os dados do formulário
      const form = event.target;
      const formData = new FormData(form);

      // 3. Envia os dados para o PHP via POST usando fetch
      fetch(form.action, {
          method: 'POST',
          body: formData,
      });

      let tabela = document.getElementById("tabelaUsuários");

      tabela.innerHTML += `
      <tr>
        <td>${document.getElementById("tipoLixo").value}</td>
        <td>${document.getElementById("quantidade").value}</td>
        <td>${document.getElementById("data").value}</td>
      </tr>
      `;
    })
  </script>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  <script src="script.js"></script>
</body>

</html>
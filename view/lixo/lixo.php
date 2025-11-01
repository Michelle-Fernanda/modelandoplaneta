<?php
  // Inclua o código das funções de manipulação de JSON do seu arquivo anterior (post.php)
// Se você está incluindo este código dentro de uma estrutura maior, ajuste o include/require.

// Caminho do arquivo JSON
$jsonFile = __DIR__ . '/lixo.json';
  // Funções para ler os dados do arquivo JSON
  function lerUsuarios($jsonFile) {
      if (!file_exists($jsonFile)) {
          return [];
      }
      $json = file_get_contents($jsonFile);
      return json_decode($json, true) ?: [];
  }

  // -------------------------------------------------------------------------
  // LÓGICA PARA LER O JSON E GERAR AS LINHAS DA TABELA
  // -------------------------------------------------------------------------

  $usuarios = lerUsuarios($jsonFile);
  $tabela_html = '';

  if (!empty($usuarios)) {
      // Itera sobre cada registro no JSON
      foreach ($usuarios as $registro) {
          $tipoLixo = htmlspecialchars($registro['tipoLixo'] ?? 'N/A');
          $quantidade = htmlspecialchars($registro['quantidade'] ?? 'N/A');
          $data = htmlspecialchars($registro['data'] ?? 'N/A');

          // Formata a data para exibir no formato DD/MM/AAAA, mas mantém o formato YYYY-MM-DD para o input type="date"
          $dataDisplay = date('d/m/Y', strtotime($data));
          
          // Constrói a linha da tabela (tr)
          // Nota: Removi os inputs da tabela de resultados, pois ela deve ser apenas para visualização. 
          // Manter inputs em uma tabela gerada dinamicamente pelo PHP que não tem função de edição
          // no frontend causa problemas de formatação e lógica. Se precisar de edição, o JS/PHP precisa ser mais complexo.
          $tabela_html .= "
              <tr>
                  <td>{$tipoLixo}</td>
                  <td>{$quantidade}</td>
                  <td>{$dataDisplay}</td>
              </tr>
          ";
      }
  } else {
      $tabela_html = '<tr><td colspan="3" style="text-align: center;">Nenhum resultado anotado ainda.</td></tr>';
  }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lixo na Escola</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="view/lixo/lixo.css">

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
    <h1>Lixo na Escola</h1>
  </header>

  <ferramentas-x></ferramentas-x>

  <menu-x></menu-x>

  <calc-modal></calc-modal>

  <conversor-modal></conversor-modal>

  <acessibilidade-x></acessibilidade-x>

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
    <div class="fala">Oiê! Bora descobrir quanto lixo sua escola produz?</div>
    <div class="fala">A matemática pode ajudar a resolver esse problemão! 🧮</div>
    <div class="fala">Vamos nessa missão juntos? 🌱</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">

  <section class="math-tips bg-white p-6 rounded-xl shadow-md">
    <h2 class="font-semibold mb-2">📋 Anote seus Resultados</h2>
    <form id="formResultados" method="POST" action="enviar_email.php" enctype="multipart/form-data" rel="noopener">
        
        <section>
            <label for="gmail">E-mail do Professor:</label>
            <input type="text" name="gmail" id="gmail" placeholder="prof@gmail.com" required>
        </section>
    
        <section>
            <label for="tipoLixo">Tipo de lixo:</label>
            <input type="text" name="tipoLixo" id="tipoLixo" placeholder="Orgânico" required>
        </section>

        <section>
            <label for="quantidade">Quantidade (kg):</label>
            <input type="number" name="quantidade" id="quantidade" min="0" step="0.01" placeholder="Ex: 1.5" required>
        </section>

        <section>
            <label for="data">Data da coleta:</label>
            <input type="date" name="data" id="data" required>
        </section>

        <div style="display: flex; gap: 16px; align-items: center; margin-bottom: 1rem; margin-top: 1rem;" id="addResult">
          <button class="menu-toggle" type="button" onclick="" id="btnSubmit">
              Adicionar Resultado
          </button>
          
          <label for="file-upload" class="labelAnexo"
          id="labelAnexo">
            <span id="anexoIcone" >
              
              <div id="clipe-container">
                <img id="clipe-aberto" class="clipe-icone" 
                  src="img/clip-de-papel.png" 
                  alt="Clipe com Olhos Abertos">
                  
                <img id="clipe-fechado" class="clipe-icone" 
                  src="img/clip-de-papel-fechado.png" 
                  alt="Clipe com Olhos Abertos">

                <img id="clipe-espera-joinha" class="clipe-icone" 
                  src="img/clip-de-papel-joia.png"  
                  alt="Clipe com Joinha e Cara Engraçada">

                <img id="clipe-click" class="clipe-icone" 
                  src="img/clip-de-papel-click.png"  
                  alt="Clipe Piscando">
                <!-- <span class="emoji-fallback clipe-icone">📎</span> -->
              </div>
            </span>
 

            <input name="anexo[]" id="file-upload" type="file" style="display: none;" multiple accept="image/*">
          </label>

        </div>
        <div id="previsualizacoes" 
          style="width: 100%; display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; justify-content: center;">
        </div>
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
      <tbody id="tabelaUsuarios">
        <?php echo $tabela_html; ?>
      </tbody>
    </table>
  </section>
  <script src="script.js"></script>
  <script>document.addEventListener('DOMContentLoaded', () => {

    // Elementos do DOM do assistente visual
    const clipeAberto = document.getElementById('clipe-aberto');
    const clipeFechado = document.getElementById('clipe-fechado');
    const clipeJoinha = document.getElementById('clipe-espera-joinha');
    const clipeClick = document.getElementById('clipe-click');
    const labelAnexo = document.getElementById('labelAnexo');

    // Elementos do DOM do formulário
    const form = document.getElementById('formResultados');
    const submitButtonElement = document.getElementById('btnSubmit'); 
    const tabelaBody = document.getElementById("tabelaUsuarios");
    const fileInput = document.getElementById('file-upload');
    const previsualizacoesContainer = document.getElementById('previsualizacoes');

    // Variável para controlar o loop de piscar
    let blinkInterval;


    // --- FUNÇÕES DO ASSISTENTE VISUAL (CLIP) ---

    /**
     * Define a opacidade dos três estados do clipe.
     * @param {boolean} aberto - Se o clipe aberto deve ser visível.
     * @param {boolean} fechado - Se o clipe fechado deve ser visível.
     * @param {boolean} joinha - Se o clipe de joinha deve ser visível.
     * * @param {boolean} click - Se o clipe de click deve ser visível.
     */
    function showState(aberto, fechado, joinha, click) {
        clipeAberto.style.opacity = aberto ? 1 : 0;
        clipeFechado.style.opacity = fechado ? 1 : 0;
        clipeJoinha.style.opacity = joinha ? 1 : 0;
        clipeClick.style.opacity = click ? 1 : 0;
    }

    /**
     * Inicia a animação de piscar do clipe.
     */
    function startBlinking() {
        // Garante o estado inicial (aberto)
        showState(true, false, false, false); 
        clearInterval(blinkInterval); // Limpa qualquer loop anterior
        blink(); // Inicia o novo loop
    }

    /**
     * Realiza um único ciclo de piscar e agenda o próximo.
     */
    function blink() {
        // 1. Fecha o olho
        showState(false, true, false, false);
        const tempoFechado = 100;

        blinkInterval = setTimeout(() => {
            // 2. Abre o olho
            showState(true, false, false, false);
            // 3. Define um tempo de espera aleatório antes do próximo piscar (2s a 6s)
            const tempoEspera = Math.random() * 4000 + 2000;
            setTimeout(blink, tempoEspera);
        }, tempoFechado);
    }

    /**
     * Exibe o clipe de joinha e agenda o retorno ao piscar.
     */
    function showJoinha() {
        clearInterval(blinkInterval); // Para o piscar
        showState(false, false, true, false); // Mostra o Joinha
        // NOTA: O retorno ao piscar é feito no bloco 'finally' do handleSubmit.
        // Se a chamada for feita aqui (setTimeout(startBlinking, 2000)), o clipe pode
        // voltar a piscar antes do fetch() terminar. Mantenha a chamada no finally.
    }

    function showClick() {
        clearInterval(blinkInterval); // Para o piscar
        showState(false, false, false, true); // Mostra o Clipe de Click
        
        // Volta a piscar imediatamente após um micro-atraso, simulando o "soltar" o clique
        // setTimeout(startBlinking, 2000); 
    }

    // Inicia a animação de piscar no carregamento
    startBlinking();



    /**
     * Processa a pré-visualização de arquivos anexados.
     */
    function handleFileChange() {
        previsualizacoesContainer.innerHTML = ''; // Limpa anterior

          // 2. Feedback e Bloqueio
        showJoinha(); // <-- GARANTE QUE O JOINHA É MOSTRADO

        setTimeout(startBlinking, 1000);

        Array.from(this.files).forEach(file => {
            const itemDiv = document.createElement('div');
            // Adiciona um estilo básico para visualização
            itemDiv.style.cssText = 'display: flex; align-items: center; gap: 5px; border: 1px solid #ccc; padding: 5px; border-radius: 5px; max-width: 100%; overflow: hidden;';

            const nameSpan = document.createElement('span');
            nameSpan.textContent = file.name;
            nameSpan.style.cssText = 'flex-shrink: 1; min-width: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Miniatura de imagem';
                    img.style.cssText = 'width: 40px; height: 40px; object-fit: cover; border-radius: 3px; flex-shrink: 0;';
                    itemDiv.appendChild(img);
                    itemDiv.appendChild(nameSpan);
                };
                reader.readAsDataURL(file);
            } else {
                const iconSpan = document.createElement('span');
                iconSpan.textContent = '📄';
                iconSpan.style.cssText = 'font-size: 1.5rem; flex-shrink: 0;';
                itemDiv.appendChild(iconSpan);
                itemDiv.appendChild(nameSpan);
            }

            previsualizacoesContainer.appendChild(itemDiv);
        });
    }

    /**
     * Lida com a submissão assíncrona do formulário.
     */
    async function handleSubmit(event) {
        event.preventDefault();

        // 1. Validação
        if(!form.reportValidity()) {
            return;
        }
        
        submitButtonElement.disabled = true;
        submitButtonElement.textContent = 'Enviando...';
        
        // 3. Captura dos valores
        const formsData = {
            gmail: document.getElementById("gmail").value,
            tipo: document.getElementById("tipoLixo").value,
            quantidade: document.getElementById("quantidade").value,
            data: document.getElementById("data").value
        };
        
        const formData = new FormData(form);

        try {
            // 4. Envio Assíncrono
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            const result = await response.text(); 
            
            if (response.ok) {
                // 5. Sucesso: Atualiza Tabela e Limpa Formulário
                form.reset();
                previsualizacoesContainer.innerHTML = '';
                alert("Sucesso: " + result); 

                window.location.reload();
            } else {
                // 6. Falha do Servidor
                alert("Erro do Servidor PHP: " + result); 
            }

        } catch (error) {
            // 7. Erro de Rede
            alert("❌ Erro de rede ou servidor: " + error.message);
        } finally {
            // 8. Desbloqueio e Restauração da Animação
            submitButtonElement.disabled = false;
            submitButtonElement.textContent = 'Adicionar Resultado';
        }
    }

    labelAnexo.addEventListener('click', showClick);

    // --- Anexação de Listeners ---
    submitButtonElement.addEventListener('click', handleSubmit);
    fileInput.addEventListener('change', handleFileChange);

});</script>


  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  
</body>

</html>
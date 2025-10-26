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
            <label for="gmail">Gmail do Professor:</label>
            <input type="text" name="gmail" id="gmail" min="0" step="0.01" placeholder="nome@gmail.com" required>
        </section>

        <section>
            <label for="teste2">Gmail do Professor:</label>
            <select id="teste2" name="teste2" required>
                <option value="">Selecione</option>
                <option value="Orgânico">Ariel C. da Silva</option>
                <option value="Inorgânico">Michelle F. da Silva</option>
            </select>
        </section>
    
        <section>
            <label for="tipoLixo">Tipo de lixo:</label>
            <select id="tipoLixo" name="tipoLixo" required>
                <option value="">Selecione</option>
                <option value="Orgânico">Orgânico</option>
                <option value="Inorgânico">Inorgânico</option>
                <option value="Rejeitos">Rejeitos</option>
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

        <div style="display: flex; gap: 16px; align-items: center; margin-bottom: 1rem; margin-top: 1rem;">
          <button class="menu-toggle" type="button" onclick="" id="btnSubmit">
              Adicionar Resultado
          </button>
          
          <label for="file-upload" class="labelAnexo"
          >
            <span id="anexoIcone">📎</span>
            

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
          <th>Gmail</th>
          <th>Tipo de Lixo</th>
          <th>Quantidade (kg)</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody id="tabelaUsuarios">
      </tbody>
    </table>
  </section>
  <script src="script.js"></script>
 <script>
    // É MELHOR DECLARAR O LISTENER DEPOIS QUE O DOM CARREGA.
    document.addEventListener('DOMContentLoaded', () => {

        const form = document.getElementById('formResultados');
        const submitButtonElement = document.getElementById('btnSubmit'); 
        const tabela = document.getElementById("tabelaUsuarios");
        
        // --- 1. Verificação de Elementos ---
        if (!submitButtonElement || !form || !tabela) {
            console.error("ERRO JS: Elementos essenciais (Botão, Formulário ou Tabela) não encontrados.");
            // Não anexa o listener se elementos críticos estiverem faltando
            return; 
        }

        // --- 2. Listener do Botão (type="button" no HTML!) ---
        submitButtonElement.addEventListener('click', async function(event) {
            event.preventDefault(); // Impede qualquer comportamento padrão do click

            // 3. Validação - Usa a validação do formulário HTML
            if(!form.reportValidity()) {
                return // Sai se a validação do navegador falhar
            }
            
            // 4. Captura dos valores (antes do envio)
            const formsData = {
                gmail: document.getElementById("gmail").value,
                tipo: document.getElementById("tipoLixo").value,
                quantidade: document.getElementById("quantidade").value,
                data: document.getElementById("data").value
            }

            // 5. BLOQUEIO
            submitButtonElement.disabled = true;
            submitButtonElement.textContent = 'Enviando...';
            
            const formData = new FormData(form);

            try {
                // Envia os dados
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });

                const result = await response.text(); 
                
                if (response.ok) {
                    // SUCESSO: Adiciona a linha na tabela
                    tabela.innerHTML += `
                        <tr>
                            <td>${formsData.gmail}</td>
                            <td>${formsData.tipo}</td>
                            <td>${formsData.quantidade}</td>
                            <td>${formsData.data}</td>
                        </tr>
                    `;
                    
                    form.reset(); // Limpa os campos visíveis

                    document.getElementById('previsualizacoes').innerHTML = '';

                    alert("Sucesso: " + result); 
                    
                } else {
                    // FALHA: Se o PHP retornou erro (ex: 500)
                    alert("Erro do Servidor PHP: " + result); 
                }

            } catch (error) {
                alert("❌ Erro de rede ou servidor: " + error.message);
            } finally {
                // 6. DESBLOQUEIO
                submitButtonElement.disabled = false;
                submitButtonElement.textContent = 'Adicionar Resultado';
                // AQUI, a página não é mais redirecionada, pois o comportamento padrão foi cortado no início.
            }
        });

        // --- 1. Feedback Visual do Anexo ---
      document.getElementById('file-upload').addEventListener('change', function() {
        const previsualizacoesContainer = document.getElementById('previsualizacoes');

        // Limpa a visualização anterior
        previsualizacoesContainer.innerHTML = '';

        // Processa cada arquivo selecionado
        Array.from(this.files).forEach(file => {
            
            // 1. Cria o contêiner do item de miniatura
            const itemDiv = document.createElement('div');
            itemDiv.className = 'miniatura-item';

            // 2. Cria o span para o nome do arquivo
            const nameSpan = document.createElement('span');
            nameSpan.className = 'nome-arquivo';
            nameSpan.textContent = file.name;

            // 3. Adiciona o nome ao contêiner
            itemDiv.appendChild(nameSpan);

            // Verifica se é uma imagem para criar a miniatura
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                
                // Quando a leitura do arquivo estiver completa
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Miniatura de imagem';
                    
                    // Insere a imagem ANTES do nome (para que fique na esquerda)
                    itemDiv.insertBefore(img, nameSpan); 
                };
                
                // Inicia a leitura do arquivo como URL de dados (necessário para a miniatura)
                reader.readAsDataURL(file);
            
            } else {
                // Se não for imagem, adiciona um ícone genérico ou texto
                const iconSpan = document.createElement('span');
                iconSpan.style.marginRight = '8px';
                iconSpan.textContent = '📄'; // Ícone de documento genérico
                itemDiv.insertBefore(iconSpan, nameSpan);
            }

            // Adiciona o item de miniatura ao contêiner principal
            previsualizacoesContainer.appendChild(itemDiv);
        });
    });
  });
    </script>


  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  
</body>

</html>
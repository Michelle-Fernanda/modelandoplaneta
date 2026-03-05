<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lixo na Escola</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

  <!-- Seus estilos existentes (mantive referências) -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="view/lixo/lixo.css">

  <!-- Componentes (mantive suas imports) -->
  <script type="module" src="Components/Elements/calculadora.js"></script>
  <script type="module" src="Components/Elements/conversor.js"></script>
  <script type="module" src="Components/Elements/acessibilidade.js"></script>
  <script type="module" src="Components/Elements/menu.js"></script>
  <script type="module" src="Components/Elements/ferramentas.js"></script>

  <style>
    /* ---------- Modal Email ---------- */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.45);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      padding: 20px;
      backdrop-filter: blur(2px);
    }

    .modal-box {
      width: 100%;
      max-width: 460px;
      background: linear-gradient(180deg, #ffffff 0%, #f7f9fc 100%);
      border-radius: 14px;
      padding: 20px 20px 18px 20px;
      box-shadow: 0 10px 30px rgba(19,35,64,0.12);
      transform: translateY(-10px) scale(.98);
      opacity: 0;
      animation: modalIn 250ms ease forwards;
      font-family: "Fredoka One", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    @keyframes modalIn {
      to { transform: translateY(0) scale(1); opacity: 1; }
    }

    .modal-box h2 {
      margin: 0 0 8px 0;
      font-size: 1.15rem;
      letter-spacing: 0.2px;
    }

    .modal-desc {
      color: #444;
      font-size: 0.95rem;
      margin-bottom: 12px;
    }

    .modal-input-wrap {
      position: relative;
      margin-bottom: 12px;
    }

    .modal-box input[type="email"] {
      width: 100%;
      padding: 12px 12px;
      font-size: 0.98rem;
      border-radius: 10px;
      border: 2px solid #e6e9ef;
      outline: none;
      transition: border-color .18s ease, box-shadow .18s ease, transform .08s ease;
      box-sizing: border-box;
    }

    .modal-box input[type="email"]:focus {
      border-color: #4caf50;
      box-shadow: 0 6px 18px rgba(76,175,80,0.12);
    }

    .invalid {
      border-color: #f44336 !important;
      box-shadow: 0 6px 18px rgba(244,67,54,0.10) !important;
      animation: shake .28s ease;
    }

    @keyframes shake {
      0% { transform: translateX(0) }
      20% { transform: translateX(-6px) }
      40% { transform: translateX(6px) }
      60% { transform: translateX(-4px) }
      80% { transform: translateX(4px) }
      100% { transform: translateX(0) }
    }

    .error-text {
      color: #b00020;
      font-size: .85rem;
      margin-top: 6px;
      display: none;
    }
    .error-text.show { display: block; }

    .modal-buttons {
      display: flex;
      gap: 10px;
      margin-top: 6px;
    }

    .modal-btn {
      flex: 1;
      padding: 10px 12px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-weight: 700;
      letter-spacing: 0.2px;
      transition: transform .08s ease, box-shadow .12s ease;
    }

    .modal-btn:active { transform: translateY(1px); }

    .btn-cancel {
      background: #f5f5f7;
      color: #222;
      box-shadow: 0 6px 16px rgba(10,10,10,0.03);
    }

    .btn-send {
      background: linear-gradient(90deg, #4caf50, #2ea44f);
      color: white;
      box-shadow: 0 8px 18px rgba(46,164,79,0.18);
    }

    .btn-send[disabled] {
      opacity: .7;
      cursor: default;
    }

    /* ---------- Top Notification ---------- */
    .top-notification {
      position: fixed;
      left: 50%;
      transform: translateX(-50%) translateY(-10px);
      top: 12px;
      z-index: 10001;
      min-width: 260px;
      max-width: calc(100% - 40px);
      padding: 12px 16px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
      display: none;
      align-items: center;
      gap: 10px;
      font-weight: 700;
      color: white;
      font-family: "Fredoka One", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    .top-notification.success { background: linear-gradient(90deg,#4CAF50,#2EA44F); }
    .top-notification.error   { background: linear-gradient(90deg,#f44336,#e53935); }

    .top-notification.show {
      display: flex;
      animation: notifyIn .28s ease forwards;
    }

    @keyframes notifyIn {
      from { transform: translateX(-50%) translateY(-20px) scale(.98); opacity: 0; }
      to   { transform: translateX(-50%) translateY(0) scale(1); opacity: 1; }
    }

    /* small helper for loading spinner in button */
    .spinner {
      border: 2px solid rgba(255,255,255,0.25);
      border-left-color: rgba(255,255,255,0.9);
      width: 14px;
      height: 14px;
      border-radius: 50%;
      display: inline-block;
      vertical-align: middle;
      animation: spin 0.8s linear infinite;
      margin-right: 8px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* Keep the rest of your page layout responsive */
    @media (max-width: 420px) {
      .modal-box { padding: 16px; border-radius: 12px; }
    }
  </style>
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
    <!-- Conteúdo original (mantido) -->
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
    <p>Descobrir qual é a quantidade de lixo gerado na sua escola!</p>
    <p>Será que é possivel usar a matemática para ajudar nessa missão</p>
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
      <!-- ... mantive suas colunas originais ... -->
      <div class="border border-gray-200 rounded-lg p-4">
        <h3 class="font-semibold mb-2">🔍 Coletando dados</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Escolha um tipo de lixo para observar (orgânico e recicláveis).</li>
          <li>Anote tudo o que conseguir: quantos sacos foram coletados? Qual o peso deles?</li>
          <li>Registre também o que descobriram nas entrevistas com funcionários ou colegas.</li>
        </ul>
      </div>

      <div class="border border-gray-200 rounded-lg p-4">
        <h3 class="font-semibold mb-2">📏 Como medir o lixo?</h3>
        <ul class="list-disc pl-4 space-y-1">
          <li>Vocês podem pesar o lixo com balança (em gramas ou quilos).</li>
          <li>Ou usar um balde medidor para saber o volume (em litros).</li>
          <li>Quantos sacos de lixo cabem em uma lixeira da escola?</li>
          <li>Quantos sacos são cheios por dia?</li>
        </ul>
      </div>
    </div>

    <p class="mt-6 text-center text-lg font-medium" style="text-align: justify;">
      Com a ajuda da matemática, vocês podem entender melhor o problema e ajudar a escola a produzir menos lixo! ♻️📊
    </p>
  </section>

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
          <button class="menu-toggle" type="button" id="btnSubmit">
              Adicionar Resultado
          </button>

          <label for="file-upload" class="labelAnexo" id="labelAnexo">
            <span id="anexoIcone" >
              <div id="clipe-container">
                <img id="clipe-aberto" class="clipe-icone" src="img/clip-de-papel.png" alt="Clipe com Olhos Abertos">
                <img id="clipe-fechado" class="clipe-icone" src="img/clip-de-papel-fechado.png" alt="Clipe com Olhos Fechados">
                <img id="clipe-espera-joinha" class="clipe-icone" src="img/clip-de-papel-joia.png" alt="Clipe Joinha">
                <img id="clipe-click" class="clipe-icone" src="img/clip-de-papel-click.png" alt="Clipe Click">
              </div>
            </span>
            <input name="anexo[]" id="file-upload" type="file" style="display: none;" multiple accept="image/*">
          </label>
        </div>

        <div id="previsualizacoes"
          style="width: 100%; display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; justify-content: center;">
        </div>
    </form>

    <h2>Resultados Anotados</h2>

    <div id="tabelaResultados" class="Tabela">
      <center>
        <div id="tituloWrapper" style="display: inline-flex; align-items: center; gap: 8px;">
          <h1 id="titulotabela" style="margin: 0;">Sem título</h1>
          <span id="editarTitulo" style="cursor: pointer;">✏️</span>
        </div>
      </center>
      <table>
        <thead>
          <tr>
            <th>Tipo de Lixo</th>
            <th>Quantidade (kg)</th>
            <th>Data</th>
          </tr>
        </thead>
          <tbody id="tabelaUsuarios">
            <!-- Aqui o PHP poderia inserir linhas salvas (mantive placeholder) -->
            <?php
              // $jsonFile = __DIR__ . '/lixo.json';
              // inclui a lógica de leitura do JSON e monta $tabela_html
              // echo $tabela_html;
            ?>
          </tbody>
      </table>
    </div>

    <center style="margin-top: 12px;">
      <button id="pdf">Baixar PDF</button>
      <button id="envemail">Enviar por Email</button>
    </center>
  </section>

  <!-- ---------- MODAL EMAIL ---------- -->
  <div id="modalEmail" class="modal-overlay" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <h2 id="modalTitle">📧 Enviar relatório para o professor</h2>
      <div class="modal-desc">Digite o e-mail do professor para enviar os resultados e os anexos.</div>

      <div class="modal-input-wrap">
        <input id="emailProfessorModal" type="email" placeholder="professor@escola.com" autocomplete="email" />
        <div id="errorEmail" class="error-text">Digite um e-mail válido (ex: prof@escola.com).</div>
      </div>

      <div style="display:flex; justify-content:center;" class="modal-buttons">
        <button id="cancelarEmail" class="modal-btn btn-cancel">Cancelar</button>
        <button id="confirmarEnvio" class="modal-btn btn-send">Enviar</button>
      </div>
    </div>
  </div>

  <!-- ---------- NOTIFICAÇÃO TOPO ---------- -->
  <div id="topNotification" class="top-notification success" role="status" aria-live="polite"></div>

  <!-- Scripts externos -->
  <script src="script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script>
  // ---------- DOMContentLoaded ----------
  document.addEventListener('DOMContentLoaded', () => {
    // Assistente CLIP - mantenho sua lógica visual (simplificada)
    const clipeAberto = document.getElementById('clipe-aberto');
    const clipeFechado = document.getElementById('clipe-fechado');
    const clipeJoinha = document.getElementById('clipe-espera-joinha');
    const clipeClick = document.getElementById('clipe-click');
    const labelAnexo = document.getElementById('labelAnexo');

    function showState(aberto, fechado, joinha, click) {
      if (clipeAberto) clipeAberto.style.opacity = aberto ? 1 : 0;
      if (clipeFechado) clipeFechado.style.opacity = fechado ? 1 : 0;
      if (clipeJoinha) clipeJoinha.style.opacity = joinha ? 1 : 0;
      if (clipeClick) clipeClick.style.opacity = click ? 1 : 0;
    }

    let blinkTimeout;
    function startBlinking() {
      showState(true,false,false,false);
      if (blinkTimeout) clearTimeout(blinkTimeout);
      blink();
    }
    function blink(){
      showState(false,true,false,false);
      blinkTimeout = setTimeout(()=> {
        showState(true,false,false,false);
        const tempoEspera = Math.random()*4000 + 2000;
        setTimeout(blink, tempoEspera);
      },100);
    }
    function showJoinha(){ clearTimeout(blinkTimeout); showState(false,false,true,false); }
    function showClick(){ clearTimeout(blinkTimeout); showState(false,false,false,true); setTimeout(startBlinking, 800); }

    startBlinking();

    // PREVIEW arquivos
    const fileInput = document.getElementById('file-upload');
    const previsualizacoesContainer = document.getElementById('previsualizacoes');

    fileInput.addEventListener('change', function handleFileChange() {
      previsualizacoesContainer.innerHTML = '';
      showJoinha();
      setTimeout(startBlinking, 900);

      Array.from(this.files).forEach(file => {
        const itemDiv = document.createElement('div');
        itemDiv.style.cssText = 'display:flex;align-items:center;gap:6px;border:1px solid #e6e9ef;padding:6px;border-radius:6px;max-width:180px;overflow:hidden;background:#fff';

        const nameSpan = document.createElement('span');
        nameSpan.textContent = file.name;
        nameSpan.style.cssText = 'font-size:0.86rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;';

        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function(e){
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Miniatura';
            img.style.cssText = 'width:48px;height:48px;object-fit:cover;border-radius:6px;flex-shrink:0';
            itemDiv.appendChild(img);
            itemDiv.appendChild(nameSpan);
          };
          reader.readAsDataURL(file);
        } else {
          const iconSpan = document.createElement('span');
          iconSpan.textContent = '📄';
          iconSpan.style.cssText = 'font-size:1.4rem;flex-shrink:0';
          itemDiv.appendChild(iconSpan);
          itemDiv.appendChild(nameSpan);
        }
        previsualizacoesContainer.appendChild(itemDiv);
      });
    });

    // Tabela & resultados
    const btnAdd = document.getElementById('btnSubmit');
    const tabelaBody = document.getElementById('tabelaUsuarios');

    let resultados = []; // vai conter os resultados adicionados na sessão

    function adicionarLinhaTabela(dado) {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${escapeHtml(String(dado.tipo))}</td>
        <td>${escapeHtml(String(dado.quantidade))}</td>
        <td>${escapeHtml(String(dado.data))}</td>
      `;
      tabelaBody.appendChild(tr);
    }

    function escapeHtml(text) {
      return text.replace(/[&<>"'`=\/]/g, function (s) {
        return ({
          '&': '&amp;',
          '<': '&lt;',
          '>': '&gt;',
          '"': '&quot;',
          "'": '&#39;',
          '/': '&#x2F;',
          '`': '&#x60;',
          '=': '&#x3D;'
        })[s];
      });
    }

    function adicionarResultado() {
      const tipo = document.getElementById("tipoLixo").value.trim();
      const quantidade = document.getElementById("quantidade").value;
      const data = document.getElementById("data").value;

      if (!tipo || !quantidade || !data) {
        alert("Preencha todos os campos antes de adicionar.");
        return;
      }

      const dataDigitada = new Date(data);
      const dataFormatada = dataDigitada.toLocaleDateString('pt-BR', { timeZone: 'UTC' });

      const novoResultado = {
        tipo,
        quantidade: parseFloat(quantidade),
        data: dataFormatada
      };

      resultados.push(novoResultado);
      adicionarLinhaTabela(novoResultado);

      document.getElementById("formResultados").reset();
    }

    btnAdd.addEventListener('click', (e) => {
      e.preventDefault();
      adicionarResultado();
    });

    // TITULO EDITÁVEL (mantive sua lógica)
    const titulo = document.getElementById("titulotabela");
    const editarBtn = document.getElementById("editarTitulo");
    editarBtn.addEventListener("click", () => {
      const input = document.createElement("input");
      input.type = "text";
      input.value = titulo.innerText;
      input.style.fontSize = "2rem";
      input.style.fontWeight = "bold";
      input.style.textAlign = "center";
      input.style.border = "2px solid #4caf50";
      input.style.borderRadius = "8px";
      input.style.padding = "4px 8px";
      input.style.width = "100%";

      titulo.replaceWith(input);
      editarBtn.style.display = "none";
      input.focus();

      function salvar() {
        titulo.innerText = input.value.trim() || "Sem título";
        input.replaceWith(titulo);
        editarBtn.style.display = "inline";
      }

      input.addEventListener("blur", salvar);
      input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") input.blur();
      });
    });

    // PDF - mantive seu código
    document.getElementById("pdf").onclick = async function gerarPDF() {
      document.getElementById("editarTitulo").style.display = "none";
      const div = document.getElementById("tabelaResultados");
      const canvas = await html2canvas(div);
      const imgData = canvas.toDataURL("image/png");

      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF("p", "mm", "a4");

      const pageWidth = pdf.internal.pageSize.getWidth();
      const imgWidth = pageWidth;
      const imgHeight = (canvas.height * imgWidth) / canvas.width;

      pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
      pdf.save("relatorio.pdf");
      document.getElementById("editarTitulo").style.display = "inline";
    }

    // ---------- MODAL EMAIL ----------
    const btnEnviar = document.getElementById("envemail");
    const modal = document.getElementById("modalEmail");
    const cancelar = document.getElementById("cancelarEmail");
    const confirmar = document.getElementById("confirmarEnvio");
    const emailInput = document.getElementById("emailProfessorModal");
    const errorEmail = document.getElementById("errorEmail");
    const topNotification = document.getElementById("topNotification");

    function openModal() {
      modal.style.display = "flex";
      modal.setAttribute('aria-hidden', 'false');
      emailInput.value = "";
      errorEmail.classList.remove('show');
      emailInput.classList.remove('invalid');
      setTimeout(()=> emailInput.focus(), 120);
    }
    function closeModal() {
      modal.style.display = "none";
      modal.setAttribute('aria-hidden', 'true');
    }

    btnEnviar.addEventListener("click", (e) => {
      e.preventDefault();
      openModal();
    });

    cancelar.addEventListener("click", (e) => {
      e.preventDefault();
      closeModal();
    });

    // valida e envia via AJAX
    function isValidEmail(email) {
      // regex simples e robusta o suficiente para validação básica
      return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email);
    }

    function showTopNotification(message, type = 'success', timeout = 4200) {
      topNotification.textContent = message;
      topNotification.className = 'top-notification ' + (type === 'success' ? 'success' : 'error');
      topNotification.classList.add('show');

      clearTimeout(topNotification._hideTimer);
      topNotification._hideTimer = setTimeout(() => {
        topNotification.classList.remove('show');
      }, timeout);
    }

    confirmar.addEventListener("click", async (e) => {
      e.preventDefault();

      const email = emailInput.value.trim();

      if (!isValidEmail(email)) {
        emailInput.classList.add('invalid');
        errorEmail.classList.add('show');
        emailInput.focus();
        return;
      }

      // Se não existir nenhum resultado, perguntar ao usuário se quer enviar mesmo assim
      if (resultados.length === 0) {
        const ok = confirm("Nenhum resultado foi adicionado. Deseja enviar o formulário vazio mesmo assim?");
        if (!ok) {
          return;
        }
      }

      // Construir FormData
      const formElement = document.getElementById('formResultados');
      const fd = new FormData();

      // Adiciona o email do professor
      fd.append('gmail', email);

      // Adiciona resultados em JSON
      fd.append('resultados', JSON.stringify(resultados));

      // Adiciona também os arquivos do input (se houver)
      const files = document.getElementById('file-upload').files;
      for (let i = 0; i < files.length; i++) {
        fd.append('anexo[]', files[i]);
      }

      // Opcional: também enviar o título
      const tituloTexto = document.getElementById('titulotabela').innerText || 'Sem título';
      fd.append('titulo', tituloTexto);

      // Feedback visual: desabilita botão e mostra spinner
      confirmar.disabled = true;
      const originalTxt = confirmar.innerHTML;
      confirmar.innerHTML = '<span class="spinner" aria-hidden="true"></span> Enviando...';
      showClick(); // animação do clipe

      try {
        const resp = await fetch(formElement.action || 'enviar_email.php', {
          method: 'POST',
          body: fd,
        });

        // tenta interpretar JSON
        let json;
        try { json = await resp.json(); } catch (err) { json = null; }

        if (resp.ok) {
          // se o backend retornar { success: true/false }
          if (json && typeof json.success !== 'undefined') {
            if (json.success) {
              showTopNotification(json.message || 'E-mail enviado com sucesso!', 'success');
              // limpa UI local apenas se envio deu certo (melhora UX)
              resultados = [];
              tabelaBody.innerHTML = '';
              previsualizacoesContainer.innerHTML = '';
              formElement.reset();
            } else {
              showTopNotification(json.message || 'O envio não foi concluído.', 'error');
            }
          } else {
            // sem JSON estruturado - assume sucesso pelo código 2xx
            showTopNotification('E-mail enviado com sucesso!', 'success');
            resultados = [];
            tabelaBody.innerHTML = '';
            previsualizacoesContainer.innerHTML = '';
            formElement.reset();
          }
        } else {
          // resposta não-ok
          const txt = (json && json.message) ? json.message : `Erro no envio (status ${resp.status})`;
          showTopNotification(txt, 'error');
        }
      } catch (err) {
        console.error('Erro ao enviar:', err);
        showTopNotification('Falha ao conectar com o servidor. Tente novamente.', 'error');
      } finally {
        confirmar.disabled = false;
        confirmar.innerHTML = originalTxt;
        closeModal();
        startBlinking(); // volta ao piscar do clipe
      }
    });

    // Fecha modal ao clicar fora da caixa
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal();
    });

    // Enter no input envia
    emailInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault();
        confirmar.click();
      }
    });

    // Remove estado invalid quando digita
    emailInput.addEventListener('input', () => {
      if (emailInput.classList.contains('invalid')) {
        if (isValidEmail(emailInput.value.trim())) {
          emailInput.classList.remove('invalid');
          errorEmail.classList.remove('show');
        }
      }
    });

    // Helper: função de voltar ao piscar (redefinição)
    function startBlinking() {
      // já definida acima — reutilizo
      if (typeof window.startBlinking === 'function') window.startBlinking();
      // se não, chamo localmente:
      showState(true,false,false,false);
    }

  }); // DOMContentLoaded
  </script>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>
</body>
</html>
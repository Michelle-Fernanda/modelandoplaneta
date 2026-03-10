<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lixo na Escola</title>
  <?php include 'Components/head.php'; ?>
  <link rel="stylesheet" href="view/lixo/lixo.css">
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

  <!-- ── Introdução ────────────────────────────────────────────────────────── -->
  <section class="intro" style="display:flex;flex-wrap:wrap;gap:2rem;justify-content:center;align-items:flex-start;text-align:justify;">
    <div style="flex:1;min-width:300px;max-width:450px;">
      <img src="img/Lixo.png" alt="Ilustração de lixo na escola" style="width:100%;border-radius:12px;margin-bottom:1rem;">
      <p>Nas escolas podemos perceber que diferentes tipos de lixo são gerados. Na cozinha temos o lixo orgânico, nas salas temos lixos recicláveis como papel e plástico. E no pátio e ao redor da escola pode ser encontrado diferentes tipos de lixo. Aliás, não apenas na escola, o lixo está presente em muitos lugares!</p>
      <p>🧹 A gente aprende que o lixo deve ser jogado no lugar certo...</p>
      <p>Mas você já parou pra pensar o que acontece com ele depois disso? 🤔</p>
    </div>

    <div style="flex:1;min-width:300px;max-width:450px;">
      <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:12px;margin-bottom:1rem;">
        <iframe src="https://www.youtube.com/embed/MiuIckYJfQY?si=kkrpXX2f2ckzIB6k"
          title="Vídeo sobre o lixo" allowfullscreen
          style="position:absolute;top:0;left:0;width:100%;height:100%;border:none;">
        </iframe>
      </div>
      <p>🗑️ <strong>Você sabe para onde vai o lixo depois que jogamos fora?</strong><br><br>
        🎬 Neste vídeo animado, você vai acompanhar a jornada do lixo desde a lixeira até o final do seu caminho.
        Vai entender o que são os <strong>resíduos sólidos</strong> e por que é importante cuidar deles com atenção. ♻️<br><br>
        🌱 Também vai conhecer ideias e projetos que já existem no Brasil e que ajudam a proteger o meio ambiente!
      </p>
    </div>
  </section>

  <!-- ── Reflexão ──────────────────────────────────────────────────────────── -->
  <section class="desen" style="text-align:justify;">
    <h2 style="text-align:center;">Vamos refletir juntos? 🤔</h2>
    <p>Que tal formar um grupo com seus colegas e investigar o que acontece com o lixo na sua escola?</p>
    <p>Vocês podem conversar com professores, com o pessoal da limpeza e com outros funcionários da escola. Perguntem:</p>
    <ul style="max-width:800px;margin:0 auto;text-align:left;">
      <li>Para onde vai o lixo que a escola produz?</li>
      <li>Existe separação dos resíduos, como papel, plástico e restos de comida?</li>
      <li>Alguma parte desse lixo é reciclada?</li>
    </ul>
    <p>🕵️‍♀️🕵️‍♂️ Depois dessa investigação inicial, vocês terão uma missão muito importante:</p>
    <p>Descobrir qual é a quantidade de lixo gerado na sua escola!</p>
    <p>Será que é possível usar a matemática para ajudar nessa missão?</p>
    <p>Vamos nessa? 💪🌱</p>
  </section>

  <!-- ── Dicas Matemáticas ─────────────────────────────────────────────────── -->
  <section class="math-tips">
    <h2>🗑️ Investigando o Lixo na Escola com a Matemática</h2>
    <p style="text-align:justify;">Depois de bater um papo com seus colegas e investigar o que acontece com o lixo da sua escola, que tal usar a matemática para descobrir mais sobre essa história? 📊🗑️ Ela pode ajudar a entender quanto lixo é gerado, onde ele aparece com mais frequência e como podemos melhorar isso juntos! 🤝💡</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div class="border border-gray-200 rounded-lg p-4">
        <h3>🔍 Coletando dados</h3>
        <ul>
          <li>Escolha um tipo de lixo para observar (orgânico e recicláveis).</li>
          <li>Anote tudo o que conseguir: quantos sacos foram coletados? Qual o peso deles?</li>
          <li>Registre também o que descobriram nas entrevistas com funcionários ou colegas.</li>
        </ul>
      </div>
      <div class="border border-gray-200 rounded-lg p-4">
        <h3>📏 Como medir o lixo?</h3>
        <ul>
          <li>Vocês podem pesar o lixo com balança (em gramas ou quilos).</li>
          <li>Ou usar um balde medidor para saber o volume (em litros).</li>
          <li>Quantos sacos de lixo cabem em uma lixeira da escola?</li>
          <li>Quantos sacos são cheios por dia?</li>
        </ul>
      </div>
    </div>

    <p style="text-align:justify;margin-top:1.5rem;">Com a ajuda da matemática, vocês podem entender melhor o problema e ajudar a escola a produzir menos lixo! ♻️📊</p>
  </section>

  <!-- ── Assistente ────────────────────────────────────────────────────────── -->
  <div class="fala-container">
    <button id="close-assistant" onclick="closeAssistant()">×</button>
    <div class="fala">Oiê! Bora descobrir quanto lixo sua escola produz?</div>
    <div class="fala">A matemática pode ajudar a resolver esse problemão! 🧮</div>
    <div class="fala">Vamos nessa missão juntos? 🌱</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">

  <!-- ── Formulário de Resultados ──────────────────────────────────────────── -->
  <section class="math-tips">
    <h2>📋 Anote seus Resultados</h2>

    <form id="formResultados" method="POST" action="enviar_email.php" enctype="multipart/form-data">
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

      <div id="addResult">
        <button type="button" id="btnSubmit">Adicionar Resultado</button>

        <label for="file-upload" class="labelAnexo" id="labelAnexo" title="Anexar imagens">
          <span id="anexoIcone">
            <div id="clipe-container">
              <img id="clipe-aberto"        class="clipe-icone" src="img/clip-de-papel.png"         alt="Clipe aberto">
              <img id="clipe-fechado"       class="clipe-icone" src="img/clip-de-papel-fechado.png" alt="Clipe fechado">
              <img id="clipe-espera-joinha" class="clipe-icone" src="img/clip-de-papel-joia.png"    alt="Clipe joinha">
              <img id="clipe-click"         class="clipe-icone" src="img/clip-de-papel-click.png"   alt="Clipe click">
            </div>
          </span>
          <input name="anexo[]" id="file-upload" type="file" style="display:none;" multiple accept="image/*">
        </label>
      </div>

      <div id="previsualizacoes" style="width:100%;display:flex;flex-wrap:wrap;gap:10px;margin-top:10px;justify-content:center;"></div>
    </form>

    <!-- ── Tabela ────────────────────────────────────────────────────────── -->
    <h2>Resultados Anotados</h2>
    <div id="tabelaResultados" class="Tabela">
      <center>
        <div id="tituloWrapper" style="display:inline-flex;align-items:center;gap:8px;">
          <h1 id="titulotabela" style="margin:0;">Sem título</h1>
          <span id="editarTitulo" style="cursor:pointer;">✏️</span>
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
          <?php
            $jsonFile = __DIR__ . '/lixo.json';
            if (file_exists($jsonFile)) {
              $dados = json_decode(file_get_contents($jsonFile), true) ?? [];
              foreach ($dados as $d) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($d['tipo']       ?? '') . "</td>";
                echo "<td>" . htmlspecialchars($d['quantidade'] ?? '') . "</td>";
                echo "<td>" . htmlspecialchars($d['data']       ?? '') . "</td>";
                echo "</tr>";
              }
            }
          ?>
        </tbody>
      </table>
    </div>

    <center style="margin-top:12px;">
      <button id="pdf">Baixar PDF</button>
      <button id="envemail">Enviar por Email</button>
    </center>
  </section>

  <!-- ── Modal Email ───────────────────────────────────────────────────────── -->
  <div id="modalEmail" class="modal-overlay" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <h2 id="modalTitle">📧 Enviar relatório para o professor</h2>
      <p class="modal-desc">Digite o e-mail do professor para enviar os resultados e os anexos.</p>
      <div class="modal-input-wrap">
        <input id="emailProfessorModal" type="email" placeholder="professor@escola.com" autocomplete="email">
        <div id="errorEmail" class="error-text">Digite um e-mail válido (ex: prof@escola.com).</div>
      </div>
      <div class="modal-buttons">
        <button id="cancelarEmail" class="modal-btn btn-cancel">Cancelar</button>
        <button id="confirmarEnvio" class="modal-btn btn-send">Enviar</button>
      </div>
    </div>
  </div>

  <!-- ── Notificação ───────────────────────────────────────────────────────── -->
  <div id="topNotification" class="top-notification success" role="status" aria-live="polite"></div>

  <?php include 'Components/scripts.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', () => {

    // ── Clipe ──────────────────────────────────────────────────────────────

    const clipes = {
      aberto:  document.getElementById('clipe-aberto'),
      fechado: document.getElementById('clipe-fechado'),
      joinha:  document.getElementById('clipe-espera-joinha'),
      click:   document.getElementById('clipe-click'),
    };

    let blinkTimeout;

    const showClipe = (estado) =>
      Object.entries(clipes).forEach(([key, el]) => {
        if (el) el.style.opacity = key === estado ? 1 : 0;
      });

    const blink = () => {
      showClipe('fechado');
      blinkTimeout = setTimeout(() => {
        showClipe('aberto');
        setTimeout(blink, Math.random() * 4000 + 2000);
      }, 100);
    };

    const startBlinking = () => { clearTimeout(blinkTimeout); showClipe('aberto'); blink(); };
    const showJoinha    = () => { clearTimeout(blinkTimeout); showClipe('joinha'); };
    const showClick     = () => { clearTimeout(blinkTimeout); showClipe('click'); setTimeout(startBlinking, 800); };

    startBlinking();

    // ── Preview de arquivos ────────────────────────────────────────────────

    const fileInput = document.getElementById('file-upload');
    const previews  = document.getElementById('previsualizacoes');

    fileInput.addEventListener('change', function () {
      previews.innerHTML = '';
      showJoinha();
      setTimeout(startBlinking, 900);

      Array.from(this.files).forEach(file => {
        const wrap = document.createElement('div');
        wrap.style.cssText = 'display:flex;align-items:center;gap:6px;border:1px solid #e6e9ef;padding:6px;border-radius:6px;max-width:180px;overflow:hidden;background:#fff';

        const name = document.createElement('span');
        name.textContent = file.name;
        name.style.cssText = 'font-size:.86rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;';

        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Miniatura';
            img.style.cssText = 'width:48px;height:48px;object-fit:cover;border-radius:6px;flex-shrink:0';
            wrap.append(img, name);
          };
          reader.readAsDataURL(file);
        } else {
          const icon = document.createElement('span');
          icon.textContent = '📄';
          icon.style.cssText = 'font-size:1.4rem;flex-shrink:0';
          wrap.append(icon, name);
        }
        previews.appendChild(wrap);
      });
    });

    // ── Tabela ────────────────────────────────────────────────────────────

    const tabelaBody = document.getElementById('tabelaUsuarios');
    let resultados   = [];

    const escapeHtml = (str) => String(str).replace(/[&<>"'`=/]/g, s => ({
      '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;',
      '/':'&#x2F;','`':'&#x60;','=':'&#x3D;'
    })[s]);

    const adicionarLinha = ({ tipo, quantidade, data }) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${escapeHtml(tipo)}</td><td>${escapeHtml(quantidade)}</td><td>${escapeHtml(data)}</td>`;
      tabelaBody.appendChild(tr);
    };

    document.getElementById('btnSubmit').addEventListener('click', (e) => {
      e.preventDefault();
      const tipo       = document.getElementById('tipoLixo').value.trim();
      const quantidade = document.getElementById('quantidade').value;
      const data       = document.getElementById('data').value;

      if (!tipo || !quantidade || !data) return alert('Preencha todos os campos antes de adicionar.');

      const dataFormatada = new Date(data).toLocaleDateString('pt-BR', { timeZone: 'UTC' });
      const novo = { tipo, quantidade: parseFloat(quantidade), data: dataFormatada };

      resultados.push(novo);
      adicionarLinha(novo);
      document.getElementById('formResultados').reset();
    });

    // ── Título editável ───────────────────────────────────────────────────

    const titulo    = document.getElementById('titulotabela');
    const editarBtn = document.getElementById('editarTitulo');

    editarBtn.addEventListener('click', () => {
      const input = document.createElement('input');
      input.type  = 'text';
      input.value = titulo.innerText;
      Object.assign(input.style, {
        fontSize: '2rem', fontWeight: 'bold', textAlign: 'center',
        border: '2px solid #4caf50', borderRadius: '8px',
        padding: '4px 8px', width: '100%'
      });

      titulo.replaceWith(input);
      editarBtn.style.display = 'none';
      input.focus();

      const salvar = () => {
        titulo.innerText = input.value.trim() || 'Sem título';
        input.replaceWith(titulo);
        editarBtn.style.display = 'inline';
      };

      input.addEventListener('blur', salvar);
      input.addEventListener('keydown', (e) => { if (e.key === 'Enter') input.blur(); });
    });

    // ── PDF ───────────────────────────────────────────────────────────────

    document.getElementById('pdf').addEventListener('click', async () => {
      editarBtn.style.display = 'none';
      const canvas  = await html2canvas(document.getElementById('tabelaResultados'));
      const imgData = canvas.toDataURL('image/png');
      const { jsPDF } = window.jspdf;
      const pdf     = new jsPDF('p', 'mm', 'a4');
      const w       = pdf.internal.pageSize.getWidth();
      pdf.addImage(imgData, 'PNG', 0, 0, w, (canvas.height * w) / canvas.width);
      pdf.save('relatorio.pdf');
      editarBtn.style.display = 'inline';
    });

    // ── Modal Email ───────────────────────────────────────────────────────

    const modalEl    = document.getElementById('modalEmail');
    const emailInput = document.getElementById('emailProfessorModal');
    const errorEmail = document.getElementById('errorEmail');
    const confirmar  = document.getElementById('confirmarEnvio');
    const topNotif   = document.getElementById('topNotification');

    const isValidEmail = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v);

    const openModal  = () => {
      modalEl.style.display = 'flex';
      modalEl.setAttribute('aria-hidden', 'false');
      emailInput.value = '';
      errorEmail.classList.remove('show');
      emailInput.classList.remove('invalid');
      setTimeout(() => emailInput.focus(), 120);
    };

    const closeModal = () => {
      modalEl.style.display = 'none';
      modalEl.setAttribute('aria-hidden', 'true');
    };

    const showNotif = (msg, type = 'success', ms = 4200) => {
      topNotif.textContent = msg;
      topNotif.className   = `top-notification ${type} show`;
      clearTimeout(topNotif._t);
      topNotif._t = setTimeout(() => topNotif.classList.remove('show'), ms);
    };

    document.getElementById('envemail').addEventListener('click',    (e) => { e.preventDefault(); openModal(); });
    document.getElementById('cancelarEmail').addEventListener('click',(e) => { e.preventDefault(); closeModal(); });
    modalEl.addEventListener('click', (e) => { if (e.target === modalEl) closeModal(); });

    emailInput.addEventListener('input', () => {
      if (emailInput.classList.contains('invalid') && isValidEmail(emailInput.value.trim())) {
        emailInput.classList.remove('invalid');
        errorEmail.classList.remove('show');
      }
    });

    emailInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') { e.preventDefault(); confirmar.click(); }
    });

    confirmar.addEventListener('click', async (e) => {
      e.preventDefault();
      const email = emailInput.value.trim();

      if (!isValidEmail(email)) {
        emailInput.classList.add('invalid');
        errorEmail.classList.add('show');
        emailInput.focus();
        return;
      }

      if (resultados.length === 0 && !confirm('Nenhum resultado foi adicionado. Deseja enviar mesmo assim?')) return;

      const fd = new FormData();
      fd.append('gmail',      email);
      fd.append('resultados', JSON.stringify(resultados));
      fd.append('titulo',     document.getElementById('titulotabela').innerText || 'Sem título');
      Array.from(document.getElementById('file-upload').files).forEach(f => fd.append('anexo[]', f));

      confirmar.disabled  = true;
      const original      = confirmar.innerHTML;
      confirmar.innerHTML = '<span class="spinner"></span> Enviando...';
      showClick();

      try {
        const resp = await fetch('enviar_email.php', { method: 'POST', body: fd });
        const json = await resp.json().catch(() => null);

        if (resp.ok && json?.success !== false) {
          showNotif(json?.message || 'E-mail enviado com sucesso!', 'success');
          resultados = [];
          tabelaBody.innerHTML = '';
          previews.innerHTML   = '';
          document.getElementById('formResultados').reset();
        } else {
          showNotif(json?.message || `Erro no envio (status ${resp.status})`, 'error');
        }
      } catch {
        showNotif('Falha ao conectar com o servidor. Tente novamente.', 'error');
      } finally {
        confirmar.disabled  = false;
        confirmar.innerHTML = original;
        closeModal();
        startBlinking();
      }
    });

  }); // DOMContentLoaded
  </script>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>
</body>
</html>

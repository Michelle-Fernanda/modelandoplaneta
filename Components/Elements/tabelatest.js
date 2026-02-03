class WaterTracker extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: 'open' });
  }

  connectedCallback() {
    this.render();
    this.setupEvents();
  }

  getStyles() {
    return `
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        
        :host {
          display: block;
          font-family: Inter, system-ui, Arial, sans-serif;
          --accent: #0ea5a4;
          --bg: #f8fafc;
          --text: #0f172a;
          --success: #16a34a;
          --primary: #2563eb;
          --danger: #ef4444;
          color: var(--text);
          background: var(--bg);
          padding: 1rem;
        }

        .form-card {
          background: #fff;
          border-radius: 12px;
          padding: 16px;
          box-shadow: 0 6px 18px rgba(2,6,23,0.06);
          margin-bottom: 1rem;
        }

        h2 { margin-top: 0; font-family: 'Fredoka One', sans-serif; color: var(--accent); }
        h3 { margin: 1rem 0 0.5rem 0; font-size: 1.1rem; color: #64748b; }

        .btn {
          color: #fff;
          border: none;
          padding: 10px 14px;
          border-radius: 8px;
          cursor: pointer;
          font-weight: 700;
          font-size: 0.9rem;
          transition: opacity 0.2s, transform 0.1s;
          display: inline-flex;
          align-items: center;
          gap: 6px;
        }
        .btn:hover { opacity: 0.9; }
        .btn:active { transform: scale(0.98); }

        .btn-accent { background: var(--accent); }
        .btn-success { background: var(--success); }
        .btn-primary { background: var(--primary); }
        .btn-danger { background: var(--danger); }

        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 12px;
          background: #fff;
          font-size: 0.95rem;
        }

        th, td {
          border: 1px solid #e5e7eb;
          padding: 10px;
          text-align: center;
        }
        
        th { background: #f1f5f9; color: #475569; }

        /* Estilo dos inputs gerais */
        input {
          width: 100%;
          padding: 8px;
          border: 1px solid #cbd5e1;
          border-radius: 6px;
          box-sizing: border-box;
        }

        /* Estilo específico para o Título do Relatório */
        .input-titulo {
          font-size: 1.2rem;
          padding: 10px;
          border: 2px solid var(--accent);
          margin-bottom: 15px;
          font-weight: bold;
          color: var(--accent);
        }
        .input-titulo::placeholder { color: #94a3b8; font-weight: normal; }

        .grid-quadro {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 16px;
          background: #f8fafc;
          padding: 16px;
          border-radius: 8px;
          border: 1px dashed #cbd5e1;
        }

        .action-bar {
          margin-top: 16px;
          display: flex;
          gap: 10px;
          flex-wrap: wrap;
        }

        .lista-acumulada {
          margin-top: 20px;
          border-top: 2px solid #e2e8f0;
          padding-top: 10px;
        }

        @media (max-width: 600px) {
          .grid-quadro { grid-template-columns: 1fr; }
          .action-bar { flex-direction: column; }
          .btn { width: 100%; justify-content: center; }
        }

        .hidden { display: none; }
      </style>
    `;
  }

  render() {
    this.shadowRoot.innerHTML = `
      ${this.getStyles()}
      
      <section class="form-card">
        <h2>📌 Escolha o Modo</h2>
        <div style="display:flex; gap:12px;">
          <button id="nav-quadro" class="btn btn-success">🧾 Modo Lançamento</button>
          <button id="nav-tabela" class="btn btn-accent">📋 Modo Tabela Simples</button>
        </div>
      </section>

      <section id="view-quadro" class="form-card">
        <h2>🧾 Lançamento de Dados</h2>
        
        <div id="area-impressao-quadro">
          <input type="text" id="titulo-quadro" class="input-titulo" placeholder="Dê um título ao relatório (Ex: Turma 5B)">
          
          <div class="lista-acumulada">
            <table id="tabela-resumo">
              <thead>
                <tr>
                  <th>Dia</th>
                  <th>Ingerida</th>
                  <th>Desperdiçada</th>
                  <th>Obs</th>
                  <th width="50" class="no-print">Ação</th>
                </tr>
              </thead>
              <tbody id="tbody-resumo">
                </tbody>
            </table>
            <p id="msg-vazio" style="text-align:center; color:#94a3b8; font-style:italic; padding:10px;">
              A lista está vazia. Use o formulário abaixo para adicionar itens.
            </p>
          </div>
        </div>

        <hr style="border:0; border-top:1px dashed #ccc; margin: 20px 0;">

        <h3>Adicionar Novo Item:</h3>
        <div class="grid-quadro">
          <div><label>📅 Dia / Data</label><br><input type="text" id="q-dia" placeholder="Ex: 12/08"></div>
          <div><label>💧 Ingerida (ml)</label><br><input type="number" id="q-ing" placeholder="0"></div>
          <div><label>🗑️ Desperdiçada (ml)</label><br><input type="number" id="q-desp" placeholder="0"></div>
          <div><label>📝 Observações</label><br><input type="text" id="q-obs" placeholder="..."></div>
        </div>
        
        <div style="margin-top:12px; text-align:right;">
           <button id="btn-adicionar" class="btn btn-success">➕ Adicionar à Lista</button>
        </div>

        <div class="action-bar">
          <button id="btn-pdf-quadro" class="btn btn-primary">📄 Baixar PDF</button>
          <button id="btn-email-quadro" class="btn btn-accent">📧 Enviar Email</button>
        </div>
      </section>

      <section id="view-tabela" class="form-card hidden">
        <h2>📋 Tabela de Edição Direta</h2>
        
        <div id="area-impressao-tabela">
          <input type="text" id="titulo-tabela" class="input-titulo" placeholder="Título da Tabela (Ex: Consumo Semanal)">
          
          <table id="tabela-simples">
            <thead>
              <tr>
                <th>Dia</th>
                <th>Ingerida (ml)</th>
                <th>Desperdiçada (ml)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" placeholder="Dia..."></td>
                <td><input type="number"></td>
                <td><input type="number"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="action-bar">
          <button id="add-row-simple" class="btn btn-success">➕ Nova Linha</button>
          <button id="btn-pdf-simple" class="btn btn-primary">📄 Baixar PDF</button>
          <button id="btn-email-simple" class="btn btn-accent">📧 Enviar Email</button>
        </div>
      </section>
    `;
  }

  setupEvents() {
    const shadow = this.shadowRoot;

    // --- Navegação ---
    shadow.getElementById('nav-tabela').addEventListener('click', () => {
      shadow.getElementById('view-tabela').classList.remove('hidden');
      shadow.getElementById('view-quadro').classList.add('hidden');
    });

    shadow.getElementById('nav-quadro').addEventListener('click', () => {
      shadow.getElementById('view-quadro').classList.remove('hidden');
      shadow.getElementById('view-tabela').classList.add('hidden');
    });

    // ==========================================
    // LÓGICA DO QUADRO (ACUMULADOR)
    // ==========================================
    
    // Adicionar linha
    shadow.getElementById('btn-adicionar').addEventListener('click', () => {
      const dia = shadow.getElementById('q-dia').value;
      const ing = shadow.getElementById('q-ing').value;
      const desp = shadow.getElementById('q-desp').value;
      const obs = shadow.getElementById('q-obs').value;

      if (!dia && !ing && !desp) return alert("Preencha pelo menos um dado!");

      const tbody = shadow.getElementById('tbody-resumo');
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${dia}</td>
        <td>${ing || 0} ml</td>
        <td>${desp || 0} ml</td>
        <td>${obs}</td>
        <td class="no-print"><button class="btn-remove" style="background:none;border:none;cursor:pointer;">❌</button></td>
      `;

      row.querySelector('.btn-remove').addEventListener('click', () => {
        row.remove();
        if(tbody.children.length === 0) shadow.getElementById('msg-vazio').style.display = 'block';
      });

      tbody.appendChild(row);
      shadow.getElementById('msg-vazio').style.display = 'none';

      // Limpar formulário
      ['q-dia', 'q-ing', 'q-desp', 'q-obs'].forEach(id => shadow.getElementById(id).value = '');
      shadow.getElementById('q-dia').focus();
    });

    // PDF Quadro
    shadow.getElementById('btn-pdf-quadro').addEventListener('click', () => {
      const element = shadow.getElementById('area-impressao-quadro').cloneNode(true);
      // Remove elementos marcados com no-print (coluna de ação)
      element.querySelectorAll('.no-print').forEach(el => el.remove());
      
      // Ajuste visual pro PDF
      const titulo = element.querySelector('input');
      const h3 = document.createElement('h3');
      h3.innerText = titulo.value || "Relatório sem Título";
      titulo.parentNode.replaceChild(h3, titulo);

      this.generatePDF(element, "relatorio_quadro.pdf");
    });

    // Email Quadro
    shadow.getElementById('btn-email-quadro').addEventListener('click', () => {
      const titulo = shadow.getElementById('titulo-quadro').value || "Relatório de Água";
      const rows = shadow.querySelectorAll('#tbody-resumo tr');
      
      if (rows.length === 0) return alert("Lista vazia!");

      let body = `RELATÓRIO: ${titulo}\n\n`;
      rows.forEach(row => {
        const cols = row.querySelectorAll('td');
        body += `📅 ${cols[0].innerText} | 💧 ${cols[1].innerText} | 🗑️ ${cols[2].innerText} | 📝 ${cols[3].innerText}\n`;
      });
      
      this.sendEmail(titulo, body);
    });


    // ==========================================
    // LÓGICA DA TABELA SIMPLES
    // ==========================================

    // Adicionar Linha
    shadow.getElementById('add-row-simple').addEventListener('click', () => {
      const tbody = shadow.querySelector("#tabela-simples tbody");
      const row = document.createElement("tr");
      row.innerHTML = `<td><input type="text"></td><td><input type="number"></td><td><input type="number"></td>`;
      tbody.appendChild(row);
    });

    // PDF Tabela
    shadow.getElementById('btn-pdf-simple').addEventListener('click', () => {
      const element = shadow.getElementById('area-impressao-tabela').cloneNode(true);
      
      // Converte inputs em texto estático para o PDF ficar bonito
      const inputs = element.querySelectorAll('input');
      inputs.forEach(input => {
        const span = document.createElement('span');
        span.innerText = input.value;
        if(input.classList.contains('input-titulo')) {
             const h3 = document.createElement('h3');
             h3.innerText = input.value || "Tabela sem Título";
             input.parentNode.replaceChild(h3, input);
        } else {
             input.parentNode.replaceChild(span, input);
        }
      });

      this.generatePDF(element, "tabela_simples.pdf");
    });

    // Email Tabela (Lógica Nova)
    shadow.getElementById('btn-email-simple').addEventListener('click', () => {
       const titulo = shadow.getElementById('titulo-tabela').value || "Tabela de Consumo";
       const rows = shadow.querySelectorAll('#tabela-simples tbody tr');
       
       let body = `RELATÓRIO: ${titulo}\n\n`;
       let hasData = false;

       rows.forEach(row => {
         const inputs = row.querySelectorAll('input');
         // Pega valores dos inputs (Dia, Ingerida, Desperdiçada)
         const d = inputs[0].value;
         const i = inputs[1].value;
         const w = inputs[2].value;

         if(d || i || w) {
           body += `📅 Dia: ${d} | 💧 Ingerido: ${i}ml | 🗑️ Desperdício: ${w}ml\n`;
           hasData = true;
         }
       });

       if(!hasData) return alert("Preencha a tabela antes de enviar.");
       
       this.sendEmail(titulo, body);
    });
  }

  // --- Funções Auxiliares ---

  sendEmail(subject, body) {
    const encodedSubject = encodeURIComponent(subject);
    const encodedBody = encodeURIComponent(body + "\n\nGerado via Web App.");
    window.location.href = `mailto:?subject=${encodedSubject}&body=${encodedBody}`;
  }

  generatePDF(element, filename) {
    if (!window.jspdf) return alert("Erro: jsPDF não carregado.");
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();
    
    pdf.html(element, {
      callback: (doc) => doc.save(filename),
      x: 10, y: 10, width: 190, windowWidth: 900
    });
  }
}

customElements.define('water-tracker', WaterTracker);
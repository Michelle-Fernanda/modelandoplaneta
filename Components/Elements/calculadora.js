import "../Classes/menuModal.js"

class Calculadora extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.shadowRoot.innerHTML = `
      <style>
        /* CSS MINIMALISTA */
        .calc-wrapper {
          display: flex;
          flex-direction: column;
          gap: 12px; /* Aumentei um pouco o gap para espaçamento */
          padding: 10px; /* Adiciona um padding interno, se necessário */
          font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        input {
          padding: 8px 10px;
          font-size: 15px;
          border: 1px solid #ccc;
          border-radius: 4px; /* Mantém um pequeno raio para os inputs */
          transition: border 0.3s;
        }

        input:focus {
          border-color: #008905; /* Cor verde para combinar com o FloatingMenu */
          outline: none;
        }

        .buttons {
          display: flex;
          gap: 6px;
          flex-wrap: wrap;
        }

        /* OPÇÕES EM FORMATO QUADRADO */
        .buttons button {
          flex: 1;
          /* Garante que o botão seja quadrado e se estenda */
          min-width: 40px; 
          height: 40px; 
          
          padding: 0; /* Remove padding que interfere na altura */
          border: 1px solid #ccc;
          background: #f0f0f0; /* Fundo cinza suave */
          color: #333;
          border-radius: 4px; /* QUASE QUADRADO: Raio menor ou 0 */
          cursor: pointer;
          font-size: 18px; /* Texto maior para os operadores */
          font-weight: bold;
          transition: background 0.2s, box-shadow 0.2s;
        }

        .buttons button:hover {
          background: #e0e0e0;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        p {
          margin-top: 10px;
          font-weight: bold;
          font-size: 16px;
        }
      </style>

      <menu-modal title="Calculadora">
        <div class="calc-wrapper">
          Escolha uma operação:
          <div class="buttons">
            <button data-op="+">+</button>
            <button data-op="-">−</button>
            <button data-op="*">×</button>
            <button data-op="/">÷</button>
          </div>
          <input type="number" class="n1" placeholder="Número 1">
          <input type="number" class="n2" placeholder="Número 2">
          <p>Resultado: <span class="resultado">-</span></p>
        </div>
      </menu-modal>
    `;
  }

  connectedCallback() {
    const n1 = this.shadowRoot.querySelector(".n1");
    const n2 = this.shadowRoot.querySelector(".n2");
    const resultado = this.shadowRoot.querySelector(".resultado");

    // Adiciona o listener de click aos botões de operação
    this.shadowRoot.querySelectorAll("button[data-op]").forEach(btn => {
      btn.addEventListener("click", () => {
        let a = parseFloat(n1.value) || 0;
        let b = parseFloat(n2.value) || 0;
        let r;
        switch (btn.dataset.op) {
          case "+": r = a + b; break;
          case "-": r = a - b; break;
          case "*": r = a * b; break;
          case "/": r = b !== 0 ? a / b : "Erro"; break;
        }
        // Formata o número para exibir apenas duas casas decimais se for float
        resultado.textContent = (typeof r === 'number') ? r.toFixed(2).replace(/\.00$/, '') : r;
      });
    });

    const modal = this.shadowRoot.querySelector("menu-modal");
    
    // delega open/close
    this.open = () => modal.open();
    this.close = () => modal.close();
  }
}

customElements.define("calc-modal", Calculadora);
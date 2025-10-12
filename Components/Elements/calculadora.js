import "../Classes/menuModal.js"

class Calculadora extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.shadowRoot.innerHTML = `
      <style>
        .calc-wrapper {
          display: flex;
          flex-direction: column;
          gap: 10px;
        }

        input {
          padding: 8px 10px;
          font-size: 14px;
          border: 1px solid #ccc;
          border-radius: 8px;
          transition: border 0.3s;
        }

        input:focus {
          border-color: #007bff;
          outline: none;
        }

        .buttons {
          display: flex;
          gap: 6px;
          flex-wrap: wrap;
        }

        button {
          flex: 1;
          padding: 8px 12px;
          border: none;
          background: #007bff;
          color: white;
          border-radius: 8px;
          cursor: pointer;
          font-size: 14px;
          transition: background 0.3s;
        }

        button:hover {
          background: #0056b3;
        }

        p {
          margin-top: 10px;
          font-weight: bold;
          font-size: 15px;
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
        resultado.textContent = r;
      });
    });

    const modal = this.shadowRoot.querySelector("menu-modal");
    
    // delega open/close
    this.open = () => modal.open();
    this.close = () => modal.close();
  }


}

customElements.define("calc-modal", Calculadora);

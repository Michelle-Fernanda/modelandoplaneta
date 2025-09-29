import "../Classes/menuModal.js"

class Conversor extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.shadowRoot.innerHTML = `
      <style>
        .conv-wrapper {
          display: flex;
          flex-direction: column;
          gap: 16px;
          padding: 16px;
          background: #f8f9fa;
          border-radius: 12px;
          box-shadow: 0 4px 20px rgba(0,0,0,0.1);
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .row {
          display: flex;
          gap: 12px;
          flex-wrap: wrap;
        }

        label {
          font-weight: 600;
          font-size: 14px;
        }

        input[type="number"] {
          flex: 1;
          padding: 10px;
          border-radius: 10px;
          border: 1px solid #ccc;
          font-size: 14px;
          transition: 0.3s;
        }

        input[type="number"]:focus {
          outline: none;
          border-color: #007bff;
          box-shadow: 0 0 6px rgba(0,123,255,0.3);
        }

        select {
          flex: 1;
          padding: 10px;
          border-radius: 10px;
          border: 1px solid #ccc;
          background: #fff;
          font-size: 14px;
          transition: 0.3s;
        }

        select:focus {
          outline: none;
          border-color: #007bff;
          box-shadow: 0 0 6px rgba(0,123,255,0.3);
        }

        button {
          padding: 10px 20px;
          border: none;
          border-radius: 10px;
          background: #28a745;
          color: #fff;
          font-weight: 600;
          cursor: pointer;
          transition: 0.3s;
        }

        button:hover {
          background: #218838;
        }

        .resultado {
          font-size: 16px;
          font-weight: bold;
          color: #333;
          margin-top: 8px;
          text-align: center;
        }

        @media(max-width: 480px){
          .row {
            flex-direction: column;
          }
        }
      </style>

      <menu-modal title="Conversor de Unidades">
        <div class="conv-wrapper">
          <div class="row">
            <label for="valor">Valor:</label>
            <input id="valor" type="number" placeholder="Digite um número" class="valor">
          </div>

          <div class="row">
            <label>De:</label>
            <select class="from">
              <option value="m">Metros</option>
              <option value="cm">Centímetros</option>
              <option value="mm">Milímetros</option>
            </select>

            <label>Para:</label>
            <select class="to">
              <option value="m">Metros</option>
              <option value="cm">Centímetros</option>
              <option value="mm">Milímetros</option>
            </select>
          </div>

          <button class="converter">Converter</button>
          <div class="resultado">Resultado: <span class="res">-</span></div>
        </div>
      </menu-modal>
    `;
  }

  connectedCallback() {
    const valor = this.shadowRoot.querySelector(".valor");
    const from = this.shadowRoot.querySelector(".from");
    const to = this.shadowRoot.querySelector(".to");
    const res = this.shadowRoot.querySelector(".res");
    const btn = this.shadowRoot.querySelector(".converter");

    const factors = { m: 1, cm: 100, mm: 1000 };

    btn.addEventListener("click", () => {
      let v = parseFloat(valor.value) || 0;
      let base = v / factors[from.value];
      let converted = base * factors[to.value];
      res.textContent = converted;
    });

    // delega open/close para o próprio elemento
    const modal = this.shadowRoot.querySelector("menu-modal");
    this.open = () => modal.open();
    this.close = () => modal.close();
  }
}

customElements.define("conversor-modal", Conversor);

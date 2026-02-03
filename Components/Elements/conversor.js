import "../Classes/menuModal.js";

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
          border-radius: 14px;
          font-family: "Segoe UI", Tahoma, sans-serif;
        }

        .row {
          display: flex;
          gap: 12px;
          flex-wrap: wrap;
          align-items: center;
        }

        label {
          font-weight: 700;
          font-size: 14px;
          color: #444;
        }

        input[type="number"],
        select {
          flex: 1;
          padding: 10px;
          border-radius: 10px;
          border: 1px solid #28a745;
          font-size: 14px;
        }

        input:focus,
        select:focus {
          outline: none;
          box-shadow: 0 0 6px rgba(40,167,69,0.4);
        }

        button {
          margin-top: 8px;
          padding: 12px;
          border: none;
          border-radius: 12px;
          background: linear-gradient(135deg, #3ed303, #1ae23b);
          color: #fff;
          font-weight: 700;
          font-size: 15px;
          cursor: pointer;
        }

        .resultado {
          margin-top: 12px;
          text-align: center;
        }

        .res-num {
          font-size: 30px;
          font-weight: 800;
          color: #ff7a00;
        }

        .res-unit {
          font-size: 15px;
          font-weight: 700;
          margin-left: 6px;
          color: #28a745;
        }

        @media (max-width: 480px) {
          .row {
            flex-direction: column;
            align-items: stretch;
          }
        }
      </style>

      <menu-modal title="Conversor de Unidades">
        <div class="conv-wrapper" tabindex="0">

          <div class="row">
            <label>Tipo</label>
            <select class="tipo">
              <option value="comprimento">Comprimento</option>
              <option value="peso">Peso</option>
              <option value="volume">Volume</option>
            </select>
          </div>

          <div class="row">
            <label>Valor</label>
            <input type="number" class="valor" placeholder="Digite um número">
          </div>

          <div class="row">
            <label>De</label>
            <select class="from"></select>

            <label>Para</label>
            <select class="to"></select>
          </div>

          <button class="converter">Converter</button>

          <div class="resultado">
            <span class="res-num">0</span>
            <span class="res-unit"></span>
          </div>

        </div>
      </menu-modal>
    `;
  }

  connectedCallback() {
    const wrapper = this.shadowRoot.querySelector(".conv-wrapper");

    const onKeyDown = (e) => {
      if (!this.isOpen) return;

      if (e.key === "Enter") {
        e.preventDefault();
        btn.click();
      }

      if (e.key === "Escape") {
        e.preventDefault();
        modal.close();
      }
    };


    const valor = this.shadowRoot.querySelector(".valor");
    const tipo = this.shadowRoot.querySelector(".tipo");
    const from = this.shadowRoot.querySelector(".from");
    const to = this.shadowRoot.querySelector(".to");
    const btn = this.shadowRoot.querySelector(".converter");
    const resNum = this.shadowRoot.querySelector(".res-num");
    const resUnit = this.shadowRoot.querySelector(".res-unit");
    const modal = this.shadowRoot.querySelector("menu-modal");

    // ===== UNIDADES =====
    const units = {
      comprimento: {
        base: "m",
        items: {
          mm: { label: "Milímetros", factor: 1000 },
          cm: { label: "Centímetros", factor: 100 },
          m:  { label: "Metros", factor: 1 }
        }
      },
      peso: {
        base: "g",
        items: {
          mg: { label: "Miligrama", factor: 1000 },
          g:  { label: "Grama", factor: 1 },
          t:  { label: "Tonelada", factor: 0.000001 }
        }
      },
      volume: {
        base: "l",
        items: {
          ml: { label: "Mililitro", factor: 1000 },
          l:  { label: "Litro", factor: 1 }
        }
      }
    };

    // ===== FUNÇÕES =====
    const preencherSelect = (select, grupo) => {
      select.innerHTML = "";
      Object.entries(units[grupo].items).forEach(([value, data]) => {
        const opt = document.createElement("option");
        opt.value = value;
        opt.textContent = data.label;
        select.appendChild(opt);
      });
    };

    const syncSelects = () => {
      const v = from.value;

      [...to.options].forEach(opt => {
        opt.hidden = opt.value === v;
      });

      if (to.value === v) {
        const firstVisible = [...to.options].find(o => !o.hidden);
        if (firstVisible) to.value = firstVisible.value;
      }
    };

    const animarNumero = (el, inicio, fim, duracao = 400) => {
      const start = performance.now();

      const frame = (time) => {
        const p = Math.min((time - start) / duracao, 1);
        const v = inicio + (fim - inicio) * p;
        el.textContent = v.toFixed(2);

        if (p < 1) requestAnimationFrame(frame);
      };

      requestAnimationFrame(frame);
    };

    const converter = () => {
      const v = parseFloat(valor.value);
      if (isNaN(v)) return;

      const grupo = tipo.value;
      const fromUnit = units[grupo].items[from.value];
      const toUnit = units[grupo].items[to.value];

      const base = v / fromUnit.factor;
      const convertido = base * toUnit.factor;

      resUnit.textContent = toUnit.label;
      animarNumero(resNum, 0, convertido);
    };

    // ===== EVENTOS =====
    tipo.addEventListener("change", () => {
      preencherSelect(from, tipo.value);
      preencherSelect(to, tipo.value);
      syncSelects();
    });

    from.addEventListener("change", syncSelects);
    to.addEventListener("change", syncSelects);
    btn.addEventListener("click", converter);

    // ===== INIT =====
    preencherSelect(from, "comprimento");
    preencherSelect(to, "comprimento");
    syncSelects();

    this.isOpen = false;

    this.open = () => {
      modal.open();
      this.isOpen = true;

      wrapper.focus();
      wrapper.addEventListener("keydown", onKeyDown);
    };

    this.close = () => {
      modal.close();
      this.isOpen = false;

      wrapper.removeEventListener("keydown", onKeyDown);
    };

  }
}

customElements.define("conversor-modal", Conversor);

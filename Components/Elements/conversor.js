import "../Classes/menuModal.js";

const STYLES = `
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

  input[type="number"], select {
    flex: 1;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #28a745;
    font-size: 14px;
  }

  input:focus, select:focus {
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
    .row { flex-direction: column; align-items: stretch; }
  }
`;

// Todos os fatores relativos à unidade base de cada grupo
const UNITS = {
  comprimento: {
    mm: { label: "Milímetros",  factor: 1000   },
    cm: { label: "Centímetros", factor: 100    },
    m:  { label: "Metros",      factor: 1      },
    km: { label: "Quilômetros", factor: 0.001  },
  },
  peso: {
    mg: { label: "Miligrama",   factor: 1e6    },
    g:  { label: "Grama",       factor: 1000   },
    kg: { label: "Quilograma",  factor: 1      },
    t:  { label: "Tonelada",    factor: 0.001  },
  },
  volume: {
    ml: { label: "Mililitro",   factor: 1000   },
    l:  { label: "Litro",       factor: 1      },
    m3: { label: "Metro cúbico",factor: 0.001  },
  },
};

const TEMPLATE = `
  <style>${STYLES}</style>
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
        <label>De</label>   <select class="from"></select>
        <label>Para</label> <select class="to"></select>
      </div>

      <button class="converter">Converter</button>

      <div class="resultado">
        <span class="res-num">0</span>
        <span class="res-unit"></span>
      </div>

    </div>
  </menu-modal>
`;

class Conversor extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.shadowRoot.innerHTML = TEMPLATE;
  }

  connectedCallback() {
    const root    = this.shadowRoot;
    const modal   = root.querySelector("menu-modal");
    const wrapper = root.querySelector(".conv-wrapper");
    const valor   = root.querySelector(".valor");
    const tipo    = root.querySelector(".tipo");
    const from    = root.querySelector(".from");
    const to      = root.querySelector(".to");
    const btn     = root.querySelector(".converter");
    const resNum  = root.querySelector(".res-num");
    const resUnit = root.querySelector(".res-unit");

    // ── Helpers ───────────────────────────────────────────────────────────────

    const fillSelect = (select, grupo) => {
      select.innerHTML = "";
      Object.entries(UNITS[grupo]).forEach(([value, { label }]) => {
        const opt = document.createElement("option");
        opt.value = value;
        opt.textContent = label;
        select.appendChild(opt);
      });
    };

    const syncSelects = () => {
      [...to.options].forEach(opt => { opt.hidden = opt.value === from.value; });
      if (to.value === from.value) {
        const first = [...to.options].find(o => !o.hidden);
        if (first) to.value = first.value;
      }
    };

    const animateNumber = (el, from, to, duration = 400) => {
      const start = performance.now();
      const tick = (now) => {
        const p = Math.min((now - start) / duration, 1);
        el.textContent = (from + (to - from) * p).toFixed(2);
        if (p < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    };

    const convert = () => {
      const v = parseFloat(valor.value);
      if (isNaN(v)) return;
      const grupo     = tipo.value;
      const fromUnit  = UNITS[grupo][from.value];
      const toUnit    = UNITS[grupo][to.value];
      const resultado = (v / fromUnit.factor) * toUnit.factor;
      resUnit.textContent = toUnit.label;
      animateNumber(resNum, 0, resultado);
    };

    const onKeyDown = (e) => {
      if (!this.isOpen) return;
      if (e.key === "Enter")  { e.preventDefault(); btn.click(); }
      if (e.key === "Escape") { e.preventDefault(); this.close(); }
    };

    // ── Eventos ───────────────────────────────────────────────────────────────

    tipo.addEventListener("change", () => {
      fillSelect(from, tipo.value);
      fillSelect(to, tipo.value);
      syncSelects();
    });

    from.addEventListener("change", syncSelects);
    btn.addEventListener("click", convert);

    // ── Init ──────────────────────────────────────────────────────────────────

    fillSelect(from, "comprimento");
    fillSelect(to,   "comprimento");
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

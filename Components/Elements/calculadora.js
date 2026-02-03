import "../Classes/menuModal.js";

class Calculadora extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.current = "";
    this.previous = "";
    this.operator = null;
    this.isOpen = false;

    this.shadowRoot.innerHTML = `
      <style>
        .calc-wrapper {
          display: grid;
          grid-template-columns: repeat(4, 1fr);
          gap: 8px;
          outline: none;
        }

        .display {
          grid-column: span 4;
          background: #111;
          color: #0f0;
          padding: 10px 12px;
          border-radius: 8px;
          font-family: monospace;
          display: flex;
          flex-direction: column;
          align-items: flex-end;
          gap: 4px;
        }

        .expr {
          font-size: 12px;
          color: #8f8;
          min-height: 14px;
        }

        .value {
          font-size: 22px;
        }

        button {
          padding: 12px;
          font-size: 16px;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          background: #007bff;
          color: white;
        }

        button:hover { background: #0056b3; }

        .op { background: #ff9800; }
        .op:hover { background: #e68900; }

        .equal { background: #28a745; }
        .equal:hover { background: #218a39; }

        .clear { background: #dc3545; }
        .clear:hover { background: #b42a38; }

        .span2l { grid-row: span 2; }
        .span2c { grid-column: span 2; }
      </style>

      <menu-modal title="Calculadora">
        <div class="calc-wrapper" tabindex="0">
          <div class="display">
            <div class="expr"></div>
            <div class="value">0</div>
          </div>

          <button class="clear">C</button>
          <button class="op" data-op="/">÷</button>
          <button class="op" data-op="*">×</button>
          <button class="op" data-op="-">−</button>

          <button data-num="7">7</button>
          <button data-num="8">8</button>
          <button data-num="9">9</button>
          <button class="op span2l" data-op="+">+</button>

          <button data-num="4">4</button>
          <button data-num="5">5</button>
          <button data-num="6">6</button>

          <button data-num="1">1</button>
          <button data-num="2">2</button>
          <button data-num="3">3</button>

          <button data-num=".">.</button>
          <button data-num="0" class="span2c">0</button>
          <button class="equal span2c">=</button>
        </div>
      </menu-modal>
    `;
  }

  connectedCallback() {
    const modal = this.shadowRoot.querySelector("menu-modal");
    const wrapper = this.shadowRoot.querySelector(".calc-wrapper");
    const exprEl = this.shadowRoot.querySelector(".expr");
    const valueEl = this.shadowRoot.querySelector(".value");

    /* ===== DISPLAY ===== */
    const updateValue = (v = this.current) => {
      valueEl.textContent = v || "0";
    };

    const updateExpr = () => {
      exprEl.textContent =
        this.previous && this.operator ? `${this.previous} ${this.operator}` : "";
    };

    /* ===== LÓGICA ===== */
    const compute = () => {
      const a = parseFloat(this.previous);
      const b = parseFloat(this.current);
      if (isNaN(a) || isNaN(b)) return null;

      switch (this.operator) {
        case "+": return a + b;
        case "-": return a - b;
        case "*": return a * b;
        case "/": return b !== 0 ? a / b : "Erro";
      }
    };

    const inputNumber = (n) => {
      if (n === "." && this.current.includes(".")) return;
      this.current += n;
      updateValue();
    };

    const inputOperator = (op) => {
      if (this.previous && !this.current) {
        this.operator = op;
        updateExpr();
        return;
      }

      if (!this.current && !this.previous) return;

      if (this.previous && this.current) {
        this.previous = compute().toString();
      } else {
        this.previous = this.current;
      }

      this.current = "";
      this.operator = op;
      updateExpr();
      updateValue("0");
    };

    const backspace = () => {
      if (!this.current) return;
      this.current = this.current.slice(0, -1);
      updateValue(this.current || "0");
    };

    const equal = () => {
      if (!this.operator || !this.previous || !this.current) return;
      this.current = compute().toString();
      this.previous = "";
      this.operator = null;
      exprEl.textContent = "";
      updateValue();
    };

    const clear = () => {
      this.current = "";
      this.previous = "";
      this.operator = null;
      exprEl.textContent = "";
      updateValue();
    };

    /* ===== BOTÕES ===== */
    this.shadowRoot.querySelectorAll("[data-num]").forEach(b =>
      b.addEventListener("click", () => {
        inputNumber(b.dataset.num);
        wrapper.focus();
      })
    );

    this.shadowRoot.querySelectorAll("[data-op]").forEach(b =>
      b.addEventListener("click", () => {
        inputOperator(b.dataset.op);
        wrapper.focus();
      })
    );

    this.shadowRoot.querySelector(".equal").addEventListener("click", () => {
      equal();
      wrapper.focus();
    });

    this.shadowRoot.querySelector(".clear").addEventListener("click", () => {
      clear();
      wrapper.focus();
    });

    /* ===== ⌨️ TECLADO (FOCO REAL) ===== */
    const onKeyDown = (e) => {
      if (!this.isOpen) return;

      if (e.key >= "0" && e.key <= "9") inputNumber(e.key);
      else if (e.key === ".") inputNumber(".");
      else if (["+", "-", "*", "/"].includes(e.key)) inputOperator(e.key);
      else if (e.key === "Enter" || e.key === "=") {
        e.preventDefault();
        equal();
      }
      else if (e.key === "Backspace") backspace();
      else if (e.key === "Escape") this.close();
    };

    /* ===== OPEN / CLOSE ===== */
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

customElements.define("calc-modal", Calculadora);

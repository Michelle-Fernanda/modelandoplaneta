const STYLES = `
  .menu-container {
    position: fixed;
    top: 32px;
    right: 32px;
    z-index: 1200;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
  }

  .menu-toggle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: linear-gradient(135deg, #43a047 60%, #1b5e20 100%);
    box-shadow: 0 4px 24px rgba(0,0,0,0.22);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: box-shadow 0.2s, background 0.2s, transform 0.2s;
    position: relative;
  }

  .menu-toggle:hover {
    background: linear-gradient(135deg, #388e3c 80%, #43a047 100%);
    box-shadow: 0 8px 32px rgba(0,0,0,0.28);
    transform: scale(1.08) rotate(-8deg);
  }

  .menu-toggle img {
    width: 40px;
    height: 40px;
    transition: transform 0.3s;
  }

  .menu-toggle:hover img { transform: rotate(-20deg) scale(1.15); }

  .menu-toggle::after {
    content: attr(data-tooltip);
    position: absolute;
    right: 70px;
    top: 50%;
    transform: translateY(-50%);
    background: #222;
    color: #fff;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 0.95rem;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s;
    white-space: nowrap;
  }

  .menu-toggle:hover::after { opacity: 1; }

  .menu-box {
    min-width: 240px;
    background: rgba(34, 49, 63, 0.97);
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.32);
    padding: 20px 24px 18px;
    margin-top: 12px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    opacity: 0;
    pointer-events: none;
    transform: translateX(120px);
    transition: opacity 0.35s, transform 0.35s cubic-bezier(.77,.2,.25,1);
  }

  .menu-box.open {
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
  }

  .menu-title {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 1.28rem;
    font-weight: 600;
    color: #fff;
    margin-bottom: 18px;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px #0006;
  }

  .menu-list {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .menu-option {
    display: flex;
    align-items: center;
    gap: 14px;
    background: linear-gradient(90deg, #43a047 70%, #1b5e20 100%);
    color: #fff;
    border-radius: 10px;
    padding: 12px 18px;
    font-size: 1.08rem;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,0.13);
    border: none;
    outline: none;
    transition: background 0.22s, transform 0.18s, box-shadow 0.18s;
  }

  .menu-option-icon {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 1.4rem;
    transition: transform 0.18s, background 0.18s;
  }

  .menu-option:hover {
    background: linear-gradient(90deg, #388e3c 80%, #43a047 100%);
    transform: translateX(-8px) scale(1.04);
    box-shadow: 0 4px 16px rgba(0,0,0,0.18);
  }

  .menu-option:hover .menu-option-icon {
    transform: scale(1.18) rotate(-8deg);
  }

  .menu-option:active {
    background: linear-gradient(90deg, #1b5e20 90%, #388e3c 100%);
    transform: scale(0.98);
  }

  /* Alto contraste */
  .contraste .menu-toggle,
  .contraste .menu-box,
  .contraste .menu-option {
    background: #222 !important;
    color: #fff !important;
    box-shadow: 2px 2px 8px rgba(255,255,255,0.2) !important;
  }

  .contraste .menu-option:hover  { background: #444 !important; }
  .contraste .menu-option-icon   { background: #444 !important; color: #fff !important; }
  .contraste .menu-title         { color: #fff !important; }
`;

const OPTIONS = [
  { icon: "🧮", label: "Calculadora", color: "#ffb300", action: () => document.querySelector("calc-modal")?.open()         },
  { icon: "🔄", label: "Conversor",   color: "#29b6f6", action: () => document.querySelector("conversor-modal")?.open()    },
  { icon: "❓", label: "Ajuda",       color: "#ab47bc", action: () => window.location.href = "/sobre"                      },
];

class FerramentasMenu extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    const style = document.createElement("style");
    style.textContent = STYLES;

    const container = document.createElement("div");
    container.className = "menu-container";
    container.innerHTML = `
      <button class="menu-toggle" data-tooltip="Ferramentas">
        <img src="img/chave-inglesa.png" alt="Ferramentas">
      </button>
      <div class="menu-box">
        <div class="menu-title">Ferramentas</div>
        <div class="menu-list"></div>
      </div>
    `;

    this.shadowRoot.append(style, container);

    this._container = container;
    this._menuBox   = container.querySelector(".menu-box");
    this._list      = container.querySelector(".menu-list");
    this._toggle    = container.querySelector(".menu-toggle");
  }

  connectedCallback() {
    // Opções
    OPTIONS.forEach(({ icon, label, color, action }) => {
      const btn = document.createElement("button");
      btn.className = "menu-option";
      btn.innerHTML = `
        <span class="menu-option-icon" style="background:${color}22;color:${color}">${icon}</span>
        <span>${label}</span>
      `;
      btn.addEventListener("click", action);
      this._list.appendChild(btn);
    });

    // Toggle
    this._toggle.addEventListener("click", () =>
      this._menuBox.classList.toggle("open")
    );

    // Alto contraste
    const syncContraste = () =>
      this._container.classList.toggle("contraste", document.body.classList.contains("contraste"));

    syncContraste();
    new MutationObserver(syncContraste)
      .observe(document.body, { attributes: true, attributeFilter: ["class"] });
  }
}

customElements.define("ferramentas-x", FerramentasMenu);

class FerramentasMenu extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.shadowRoot.innerHTML = `
      <style>
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
        .menu-toggle svg {
          width: 36px;
          height: 36px;
          transition: transform 0.3s;
        }
        .menu-toggle:hover svg {
          transform: rotate(-20deg) scale(1.15);
        }
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
        .menu-toggle:hover::after {
          opacity: 1;
        }
        .menu-box {
          min-width: 240px;
          background: rgba(34, 49, 63, 0.97);
          border-radius: 18px;
          box-shadow: 0 8px 32px rgba(0,0,0,0.32);
          padding: 20px 24px 18px 24px;
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
        .menu-title-icon {
          width: 32px;
          height: 32px;
          display: flex;
          align-items: center;
          justify-content: center;
          background: linear-gradient(135deg, #43a047 60%, #1b5e20 100%);
          border-radius: 50%;
          box-shadow: 0 2px 8px rgba(0,0,0,0.18);
        }
        .menu-title-icon svg {
          width: 22px;
          height: 22px;
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
          position: relative;
          overflow: hidden;
        }
        .menu-option-icon {
          width: 28px;
          height: 28px;
          display: flex;
          align-items: center;
          justify-content: center;
          border-radius: 50%;
          background: #fff2;
          font-size: 1.4rem;
          transition: transform 0.18s, background 0.18s;
        }
        .menu-option:hover {
          background: linear-gradient(90deg, #388e3c 80%, #43a047 100%);
          transform: translateX(-8px) scale(1.04);
          box-shadow: 0 4px 16px rgba(0,0,0,0.18);
        }
        .menu-option:hover .menu-option-icon {
          background: #fff4;
          transform: scale(1.18) rotate(-8deg);
        }
        .menu-option:active {
          background: linear-gradient(90deg, #1b5e20 90%, #388e3c 100%);
          transform: scale(0.98);
        }
        /* Modo contraste */
        .contraste .menu-toggle,
        .contraste .menu-title-icon,
        .contraste .menu-box,
        .contraste .menu-option {
          background: #222 !important;
          color: #fff !important;
          box-shadow: 2px 2px 8px rgba(255,255,255,0.2) !important;
        }
        .contraste .menu-option:hover {
          background: #444 !important;
        }
        .contraste .menu-title-text {
          color: #fff !important;
        }
        .contraste .menu-option-icon {
          background: #444 !important;
          color: #fff !important;
        }
      </style>
      <div class="menu-container">
        <button class="menu-toggle" data-tooltip="Ferramentas">
            <!-- <div> Ícones feitos por <a href="https://www.flaticon.com/br/autores/freepik" title="Freepik"> Freepik </a> from <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com'</a></div> -->
          <img width="40px" height="40px" src="img/chave-inglesa.png" wi alt="caixa de ferramentas ícones">
        </button>
        <div class="menu-box">
          <div class="menu-title">
            <span class="menu-title-icon">
              <!-- <svg viewBox="0 0 24 24" fill="none">
                <path d="M7 7L3 3M3 3L7 7M3 3L10 10M21 21L17 17M21 21L17 17M21 21L14 14" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                <circle cx="12" cy="12" r="4.5" stroke="#fff" stroke-width="2"/>
                <path d="M12 8V12L14 14" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
              </svg> -->
              
        
              <!-- <img width="24" height="24" src="img/chave-inglesa.png" wi alt="caixa de ferramentas ícones"> -->
            </span>
            <span class="menu-title-text">Ferramentas</span>
          </div>
          <div class="menu-list"></div>
        </div>
      </div>
    `;

    // Referências
    this.menuContainer = this.shadowRoot.querySelector('.menu-container');
    this.menuBox = this.shadowRoot.querySelector('.menu-box');
    this.toggleButton = this.shadowRoot.querySelector('.menu-toggle');
    const list = this.shadowRoot.querySelector('.menu-list');

    // Adiciona opções com ícones coloridos
    this.createOption(list, "🧮", "Calculadora", "#ffb300", () => document.querySelector("calc-modal")?.open());
    this.createOption(list, "🔄", "Conversor", "#29b6f6", () => document.querySelector("conversor-modal")?.open());
    this.createOption(list, "❓", "Ajuda", "#ab47bc", () => alert("Ajuda"));

    // Toggle do menu
    this.toggleButton.addEventListener("click", () => {
      this.menuBox.classList.toggle("open");
    });

    // Responsividade ao modo contraste
    const updateContraste = () => {
      if (document.body.classList.contains("contraste")) {
        this.menuContainer.classList.add('contraste');
      } else {
        this.menuContainer.classList.remove('contraste');
      }
    };
    updateContraste();
    // Observa mudanças na classe do body
    const observer = new MutationObserver(updateContraste);
    observer.observe(document.body, { attributes: true, attributeFilter: ["class"] });
  }

  // Cria opção com ícone, cor e texto
  createOption(list, icon, text, color, onClick) {
    const btn = document.createElement("button");
    btn.className = "menu-option";
    btn.innerHTML = `<span class="menu-option-icon" style="background:${color}22;color:${color}">${icon}</span><span>${text}</span>`;
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      onClick();
    });
    list.appendChild(btn);
    return btn;
  }
}

customElements.define("ferramentas-x", FerramentasMenu);
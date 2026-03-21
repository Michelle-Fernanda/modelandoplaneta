import { FloatingMenu } from "../Classes/floatingMenu.js";

const STYLES = `
  :host {
    --toggle-size: 64px;
    --option-size: 48px;
  }
  .menu-toggle {
    width:           var(--toggle-size) !important;
    height:          var(--toggle-size) !important;
    font-size:       1.6rem !important;
    line-height:     1 !important;
    padding:         0 !important;
    display:         flex !important;
    align-items:     center !important;
    justify-content: center !important;
    border-radius:   50% !important;
    box-shadow: 0 4px 24px rgba(0,0,0,0.22);
    background-color: var(--main-bg);
    transform: none;
  }
  .menu-toggle:hover {
    background-color: var(--main-bg);
    transform: none;
  }
  .menu-options a, .menu-options button, .menu-options .menu-option {
    width:           var(--option-size) !important;
    height:          var(--option-size) !important;
    min-width:       var(--option-size) !important;
    min-height:      var(--option-size) !important;
    font-size:       1.4rem !important;
    line-height:     1 !important;
    padding:         0 !important;
    display:         flex !important;
    align-items:     center !important;
    justify-content: center !important;
    border-radius:   50% !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    transform: none;
  }
`;

const OPTIONS = [
  { label: "A+", action: () => window.aumentarFonte?.(),     closeOnClick: false },
  { label: "A-", action: () => window.diminuirFonte?.(),     closeOnClick: false },
  { label: "🔲", action: () => window.alternarContraste?.(), closeOnClick: true  },
];

class AcessibilidadeMenu extends FloatingMenu {
  constructor() {
    super({ top: "20px", left: "20px", direction: "down" });

    this.addToggleButton("🧩");
    OPTIONS.forEach(({ label, action, closeOnClick }) =>
      this.#addOption(label, action, closeOnClick)
    );

    const style = document.createElement("style");
    style.textContent = STYLES;
    this.shadowRoot.appendChild(style);
  }

  #addOption(label, onClick, closeOnClick) {
    const a = document.createElement("a");
    a.href        = "#";
    a.textContent = label;
    a.addEventListener("click", (e) => {
      e.preventDefault();
      if (closeOnClick) this.toggleMenu();
      onClick();
    });
    this.optionsContainer.appendChild(a);
    return a;
  }
}

customElements.define("acessibilidade-x", AcessibilidadeMenu);

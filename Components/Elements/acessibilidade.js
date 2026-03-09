import { FloatingMenu } from "../Classes/floatingMenu.js";

const STYLES = `
  :host {
    --toggle-size: 60px;
    --option-size: 40px;
    --anim-duration: 260ms;
  }
  .menu-toggle {
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    background-color: var(--main-bg);
    transform: none;
  }
  .menu-toggle:hover {
    background-color: var(--main-bg);
    transform: none;
  }
  .menu-options a, .menu-options button, .menu-options .menu-option {
    border-radius: 10px;
    width: var(--option-size);
    height: var(--option-size);
    min-width: var(--option-size);
    min-height: var(--option-size);
    font-size: 1rem;
    box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    transform: none;
  }
`;

const OPTIONS = [
  { label: "A+", action: () => window.aumentarFonte?.(),   closeOnClick: false },
  { label: "A-", action: () => window.diminuirFonte?.(),   closeOnClick: false },
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

  // Sobrescreve addOption para controlar se fecha o menu ao clicar
  #addOption(label, onClick, closeOnClick) {
    const a = document.createElement("a");
    a.href = "#";
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
import { FloatingMenu } from "../Classes/floatingMenu.js";

class AcessibilidadeMenu extends FloatingMenu {
  constructor() {
    // Chama o construtor da classe base (FloatingMenu)
    super({ top: "20px", left: "20px", direction: "down" });

    // Botão principal
    this.addToggleButton("🧩");

    // Opções SEM fechar o menu ao clicar
    this.addOption("A+", () => aumentarFonte(), false);
    this.addOption("A-", () => diminuirFonte(), false);
    this.addOption("🔲", () => alternarContraste(), true);

    // Estilo customizado (Aplicado ao Shadow DOM do FloatingMenu base)
    const style = document.createElement("style");
    style.textContent = `
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
    // Adiciona o novo estilo ao Shadow DOM do componente base
    this.shadowRoot.appendChild(style); 
  }

  // Sobrescreve addOption para não fechar o menu
  addOption(label = "O", onClick = () => {}, closeOnClick = false) {
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

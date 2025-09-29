import { FloatingMenu } from "../Classes/FloatingMenu.js";

class AcessibilidadeMenu extends FloatingMenu {
  constructor() {
    super({ top: "20px", left: "20px", direction: "down"});

    this.addToggleButton("E"); // botão principal do menu
    this.addOption("C", () => alert("Abrir calculadora"));
    this.addOption("U", () => alert("Abrir conversor de unidades"));
  }
}

customElements.define("acessibilidade-x", AcessibilidadeMenu);
import { FloatingMenu } from "../Classes/FloatingMenu.js";

class CalcMenu extends FloatingMenu {
  constructor() {
    super({ top: "20px", right: "20px", direction: "down"});

    this.addToggleButton("v"); // botão principal do menu
    this.addOption("C", () => alert("Abrir calculadora"));
    this.addOption("U", () => alert("Abrir conversor de unidades"));
  }
}

customElements.define("teste-x", CalcMenu);
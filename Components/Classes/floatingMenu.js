export class FloatingMenu extends HTMLElement {
  /**
   * @param {Object} config
   *  {
   *    top, bottom, left, right,      // posições opcionais
   *    direction: "up"|"down"|"left"|"right" // direção das opções
   *  }
   */
  constructor(config = { bottom: "20px", right: "20px", direction: "up" }) {
    super();
    this.attachShadow({ mode: "open" });
    this.config = config;

    // Container principal
    const container = document.createElement("div");
    container.classList.add("floating-menu");
    container.style.position = "fixed";
    if (config.top !== undefined) container.style.top = config.top;
    if (config.bottom !== undefined) container.style.bottom = config.bottom;
    if (config.left !== undefined) container.style.left = config.left;
    if (config.right !== undefined) container.style.right = config.right;
    container.style.zIndex = "1000";

    // Container de opções
    const options = document.createElement("div");
    options.className = "menu-options";
    options.style.display = "none"; // escondido inicialmente
    options.style.flexDirection = this.getFlexDirection(config.direction);
    container.appendChild(options);
    this.optionsContainer = options;

    // Estilo base
    const style = document.createElement("style");
    style.textContent = `
      .floating-menu { display: flex; flex-direction: column; align-items: center; gap: 10px; }
      .menu-toggle { display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white; font-size: 1.6rem; border: none; border-radius: 50%; width: 55px; height: 55px; cursor: pointer; box-shadow: 2px 2px 8px rgba(0,0,0,0.3); transition: transform 0.3s; }
      .menu-toggle:hover { transform: scale(1.1); }
      .menu-options { display: flex; flex-direction: column; gap: 10px; margin: 0; align-items: flex-start; }
      .menu-options a { background-color: #4CAF50; color: white; font-size: 1.4rem; width: 45px; height: 45px; border-radius: 50%; text-align: center; line-height: 45px; text-decoration: none; box-shadow: 2px 2px 10px rgba(0,0,0,0.3); transition: background-color 0.3s, transform 0.3s; }
      .menu-options a:hover { background-color: #388e3c; transform: scale(1.1); }
    `;
    this.shadowRoot.append(style, container);
    this.container = container;
  }

  // Converte a direção em flex-direction para o container de opções
  getFlexDirection(direction) {
    switch (direction) {
      case "up": return "column-reverse";
      case "down": return "column";
      case "left": return "row-reverse";
      case "right": return "row";
      default: return "column";
    }
  }

  // Adiciona botão toggle flutuante
  addToggleButton(iconText = "+") {
    const btn = document.createElement("button");
    btn.className = "menu-toggle";
    btn.textContent = iconText;

    // Se for up/left, coloca depois das opções para subir/ir para esquerda
    if (["up", "left"].includes(this.config.direction)) {
      this.container.appendChild(btn);
    } else {
      this.container.insertBefore(btn, this.optionsContainer);
    }

    btn.addEventListener("click", () => {
      const isVisible = this.optionsContainer.style.display === "flex";
      this.optionsContainer.style.display = isVisible ? "none" : "flex";
      this.optionsContainer.style.flexDirection = this.getFlexDirection(this.config.direction);
    });

    this.toggleButton = btn;
    return btn;
  }

  // Adiciona opção
  addOption(label = "O", onClick = () => {}) {
    const a = document.createElement("a");
    a.href = "#";
    a.textContent = label;
    a.addEventListener("click", (e) => {
      e.preventDefault();
      onClick();
    });
    this.optionsContainer.appendChild(a);
  }
}

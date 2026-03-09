const BASE_STYLES = `
  :host {
    --main-bg:        #4CAF50;
    --main-color:     white;
    --hover-bg:       #388e3c;
    --contraste-bg:   #000;
    --contraste-color:#fff;
  }

  .floating-menu {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .menu-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--main-bg);
    color: var(--main-color);
    font-size: 1.6rem;
    border: none;
    border-radius: 50%;
    width: 55px;
    height: 55px;
    cursor: pointer;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.3);
    transition: transform 0.3s, background-color 0.3s, color 0.3s;
  }
  .menu-toggle:hover { transform: scale(1.1); }

  .menu-options {
    display: flex;
    gap: 10px;
    margin: 0;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease, transform 0.3s ease;
  }

  .menu-options[data-direction="up"]    { transform: translateY(10px);  flex-direction: column; }
  .menu-options[data-direction="down"]  { transform: translateY(-10px); flex-direction: column; }
  .menu-options[data-direction="left"]  { transform: translateX(10px);  align-items: flex-end; }
  .menu-options[data-direction="right"] { transform: translateX(-10px); align-items: flex-start; flex-direction: row; }

  .menu-options.menu-visible {
    opacity: 1;
    transform: translate(0, 0);
    pointer-events: auto;
  }

  .menu-options a {
    background-color: var(--main-bg);
    color: var(--main-color);
    font-size: 1.4rem;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    text-align: center;
    line-height: 45px;
    text-decoration: none;
    box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    transition: background-color 0.3s, transform 0.3s, color 0.3s;
  }
  .menu-options a:hover {
    background-color: var(--hover-bg);
    transform: scale(1.1);
  }

  .contraste-active .menu-toggle,
  .contraste-active .menu-options a {
    background-color: var(--contraste-bg)    !important;
    color:            var(--contraste-color) !important;
    border: 2px solid var(--contraste-color) !important;
  }
  .contraste-active .menu-options a:hover {
    background-color: #333                   !important;
    color:            var(--contraste-color) !important;
  }
`;

export class FloatingMenu extends HTMLElement {
  constructor(config = { bottom: "20px", right: "20px", direction: "up" }) {
    super();
    this.attachShadow({ mode: "open" });
    this.config    = config;
    this.isVisible = false;

    this.#buildShadowDOM(config);
    this.#observeContraste();
    this.#applyContraste(document.body.classList.contains("contraste"));
  }

  #buildShadowDOM(config) {
    const style = document.createElement("style");
    style.textContent = BASE_STYLES;

    this.container = document.createElement("div");
    this.container.className = "floating-menu";

    const { top, bottom, left, right, direction } = config;
    const flexMap = { up: "column-reverse", down: "column", left: "row-reverse", right: "row" };
    Object.assign(this.container.style, {
      position:      "fixed",
      zIndex:        "1000",
      flexDirection: flexMap[direction] ?? "column",
      ...(top    && { top }),
      ...(bottom && { bottom }),
      ...(left   && { left }),
      ...(right  && { right }),
    });

    this.optionsContainer = document.createElement("div");
    this.optionsContainer.className = "menu-options";
    this.optionsContainer.setAttribute("data-direction", direction);
    this.optionsContainer.setAttribute("aria-hidden", "true");

    // optionsContainer sempre entra no DOM aqui — addToggleButton só reordena
    this.container.appendChild(this.optionsContainer);
    this.shadowRoot.append(style, this.container);
  }

  #observeContraste() {
    new MutationObserver(() =>
      this.#applyContraste(document.body.classList.contains("contraste"))
    ).observe(document.body, { attributes: true, attributeFilter: ["class"] });
  }

  #applyContraste(active) {
    this.container.classList.toggle("contraste-active", active);
  }

  addToggleButton(iconText = "☰") {
    const btn = document.createElement("button");
    btn.className   = "menu-toggle";
    btn.textContent = iconText;
    btn.addEventListener("click", () => this.toggleMenu());

    this.container.insertBefore(btn, this.optionsContainer);

    this.toggleButton = btn;
    this.#applyContraste(document.body.classList.contains("contraste"));
    return btn;
  }

  toggleMenu() {
    this.isVisible = !this.isVisible;
    this.optionsContainer.classList.toggle("menu-visible", this.isVisible);
    this.optionsContainer.setAttribute("aria-hidden", String(!this.isVisible));
  }

  addOption(label = "O", onClick = () => {}) {
    const a = document.createElement("a");
    a.href        = "#";
    a.textContent = label;
    a.addEventListener("click", (e) => {
      e.preventDefault();
      this.toggleMenu();
      onClick();
    });
    this.optionsContainer.appendChild(a);
    return a;
  }
}

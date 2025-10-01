export class FloatingMenu extends HTMLElement {
  constructor(config = { bottom: "20px", right: "20px", direction: "up" }) {
    super();
    this.attachShadow({ mode: "open" });
    this.config = config;

    const container = document.createElement("div");
    container.classList.add("floating-menu");
    container.style.position = "fixed";
    if (config.top !== undefined) container.style.top = config.top;
    if (config.bottom !== undefined) container.style.bottom = config.bottom;
    if (config.left !== undefined) container.style.left = config.left;
    if (config.right !== undefined) container.style.right = config.right;
    container.style.zIndex = "1000";

    const options = document.createElement("div");
    options.className = `menu-options dir-${config.direction}`;
    options.style.flexDirection = this.getFlexDirection(config.direction);
    container.appendChild(options);
    this.optionsContainer = options;

    const style = document.createElement("style");
    style.textContent = `
:host {
  --toggle-size: 60px;
  --option-size: 48px;
  --gap: 10px;
  --anim-duration: 260ms;
  --anim-ease: cubic-bezier(.2,.9,.25,1);
}

.floating-menu {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--gap);
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
}

.menu-toggle {
  background: linear-gradient(135deg, #65bf68, #008905);
  font-size: 1.6rem;
  border-radius: 50%;
  width: var(--toggle-size);
  height: var(--toggle-size);
  border: none;
  color: #fff;
  cursor: pointer;
  box-shadow: 0 6px 18px rgba(0,0,0,0.18);
  transition: transform 0.18s var(--anim-ease), box-shadow 0.18s var(--anim-ease);
  display: flex;
  align-items: center;
  justify-content: center;
}

.menu-toggle:hover { transform: scale(1.06); box-shadow: 0 8px 22px rgba(0,0,0,0.22); }

.menu-options {
  display: flex;
  gap: var(--gap);
  align-items: center;
  justify-content: center;
  pointer-events: none;
}

.menu-options:not(.show) {
  pointer-events: none;
}

.menu-option {
  --delay: 0ms;
  width: var(--option-size);
  height: var(--option-size);
  min-width: var(--option-size);
  min-height: var(--option-size);
  border-radius: 50%;
  background: linear-gradient(135deg, #4CAF50, #2e7d32);
  color: #fff;
  font-size: 1rem;
  border: none;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  box-shadow: 0 6px 14px rgba(0,0,0,0.18);
  transition:
    transform var(--anim-duration) var(--anim-ease),
    opacity calc(var(--anim-duration) - 60ms) var(--anim-ease);
  transition-delay: var(--delay);
  opacity: 0;
  transform: translateY(0) scale(0.92);
  user-select: none;
  outline-offset: 2px;
}

.menu-options.dir-up .menu-option    { transform: translateY(18px) scale(0.92); }
.menu-options.dir-down .menu-option  { transform: translateY(-18px) scale(0.92); }
.menu-options.dir-left .menu-option  { transform: translateX(18px) scale(0.92); }
.menu-options.dir-right .menu-option { transform: translateX(-18px) scale(0.92); }

.menu-options.show {
  pointer-events: auto;
}
.menu-options.show .menu-option {
  opacity: 1;
  transform: translateX(0) translateY(0) scale(1);
}

.menu-options .menu-option:hover {
  transform: translateX(0) translateY(0) scale(1.08);
  box-shadow: 0 10px 28px rgba(0,0,0,0.22);
  background: linear-gradient(135deg, #66bb6a, #388e3c);
}

@media (max-width: 420px) {
  :host { --toggle-size: 52px; --option-size: 40px; --gap: 8px; }
  .menu-toggle { font-size: 1.3rem; }
  .menu-option { font-size: 0.9rem; }
}
`;
    this.shadowRoot.append(style, container);
    this.container = container;

    this._hideTimeout = null;
  }

  disconnectedCallback() {
    if (this._hideTimeout) {
      clearTimeout(this._hideTimeout);
      this._hideTimeout = null;
    }
  }

  getFlexDirection(direction) {
    switch (direction) {
      case "up": return "column-reverse";
      case "down": return "column";
      case "left": return "row-reverse";
      case "right": return "row";
      default: return "column";
    }
  }

  addToggleButton(iconText = "+") {
    const btn = document.createElement("button");
    btn.className = "menu-toggle";
    btn.type = "button";
    btn.setAttribute("aria-expanded", "false");
    btn.textContent = iconText;

    if (["up", "left"].includes(this.config.direction)) {
      this.container.appendChild(btn);
    } else {
      this.container.insertBefore(btn, this.optionsContainer);
    }

    btn.addEventListener("click", () => {
      const isShown = this.optionsContainer.classList.contains("show");
      if (!isShown) {
        if (this._hideTimeout) {
          clearTimeout(this._hideTimeout);
          this._hideTimeout = null;
        }

        const children = Array.from(this.optionsContainer.children);
        children.forEach((el, i) => {
          const delay = i * 60;
          el.style.setProperty("--delay", `${delay}ms`);
        });

        requestAnimationFrame(() => {
          this.optionsContainer.classList.add("show");
        });

        btn.setAttribute("aria-expanded", "true");
      } else {
        this.optionsContainer.classList.remove("show");
        btn.setAttribute("aria-expanded", "false");
        btn.focus();

        const children = Array.from(this.optionsContainer.children);
        const lastDelay = (children.length - 1) * 60;
        const base = 260;
        const total = base + lastDelay + 40;

        this._hideTimeout = setTimeout(() => {
          children.forEach((el) => el.style.removeProperty("--delay"));
          this._hideTimeout = null;
        }, total);
      }
    });

    this.toggleButton = btn;
    return btn;
  }

  addOption(label = "O", onClick = () => {}) {
    const button = document.createElement("button");
    button.className = "menu-option";
    button.type = "button";
    button.setAttribute("role", "button");
    button.textContent = label;

    button.addEventListener("click", (e) => onClick());

    this.optionsContainer.appendChild(button);
    return button;
  }
}

import { FloatingMenu } from "../Classes/floatingMenu.js";

class FixedContentFloatingMenu extends FloatingMenu {
  constructor() {
    super({ direction: "up", bottom: "20px", right: "20px" });
  }

  connectedCallback() {
    const options = [
      { icon: "🏠", title: "Início", href: "./" },
      { icon: "👩‍🏫", title: "Quem Somos", href: "/sobre" },
      { icon: "🌳", title: "Arborização", href: "/arborizacao" },
      { icon: "💧", title: "Desperdício de Água", href: "/agua" },
      { icon: "⛽", title: "Petróleo", href: "petroleo" },
      { icon: "🗑️", title: "Lixo na Escola", href: "/lixo" }
    ];

    options.forEach(opt => {
      this.addOption(opt.icon || '?', () => {
        if (opt.href) window.location.href = opt.href;
      });
      const button = this.optionsContainer.lastElementChild;
      button.style.fontSize = '1.4rem';
      if (opt.title) button.setAttribute('title', opt.title);
    });

    this.addToggleButton("☰");
  }

  disconnectedCallback() {
    super.disconnectedCallback();
  }
}

customElements.define('menu-x', FixedContentFloatingMenu);
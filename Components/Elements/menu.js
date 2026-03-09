import { FloatingMenu } from "../Classes/floatingMenu.js";

const MENU_OPTIONS = [
  { icon: "🏠", title: "Início",            href: "./"          },
  { icon: "👩‍🏫", title: "Quem Somos",       href: "/sobre"       },
  { icon: "🌳", title: "Arborização",       href: "/arborizacao" },
  { icon: "💧", title: "Desperdício de Água", href: "/agua"      },
  { icon: "⛽", title: "Petróleo",          href: "/petroleo"    },
  { icon: "🗑️", title: "Lixo na Escola",    href: "/lixo"        },
];

class FixedContentFloatingMenu extends FloatingMenu {
  constructor() {
    super({ direction: "up", bottom: "20px", right: "20px" });
  }

  connectedCallback() {
    MENU_OPTIONS.forEach(({ icon, title, href }) => {
      this.addOption(icon ?? '?', () => { if (href) window.location.href = href; });

      const btn = this.optionsContainer.lastElementChild;
      btn.style.fontSize = '1.4rem';
      if (title) btn.setAttribute('title', title);
    });

    this.addToggleButton("☰");
  }
}

customElements.define('menu-x', FixedContentFloatingMenu);

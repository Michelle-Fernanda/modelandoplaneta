import { FloatingMenu } from "../Classes/floatingMenu.js";

const MENU_OPTIONS = [
  { icon: "🏠", title: "Início",              href: "./"           },
  { icon: "👩‍🏫", title: "Quem Somos",         href: "/sobre"        },
  { icon: "🌳", title: "Arborização",         href: "/arborizacao"  },
  { icon: "💧", title: "Desperdício de Água", href: "/agua"         },
  { icon: "⛽", title: "Petróleo",            href: "/petroleo"     },
  { icon: "🗑️", title: "Lixo na Escola",      href: "/lixo"         },
];

class FixedContentFloatingMenu extends FloatingMenu {
  constructor() {
    super({ direction: "up", bottom: "20px", right: "20px" });
  }

  connectedCallback() {
    MENU_OPTIONS.forEach(({ icon, title, href }) => {
      this.addOption(icon ?? '?', () => { if (href) window.location.href = href; });

      const btn = this.optionsContainer.lastElementChild;
      Object.assign(btn.style, {
        fontSize:       '1.4rem',
        width:          '48px',
        height:         '48px',
        minWidth:       '48px',
        minHeight:      '48px',
        lineHeight:     '1',
        padding:        '0',
        display:        'flex',
        alignItems:     'center',
        justifyContent: 'center',
        borderRadius:   '50%',
      });
      if (title) btn.setAttribute('title', title);
    });

    this.addToggleButton("☰");

    if (this.toggleButton) {
      Object.assign(this.toggleButton.style, {
        width:          '64px',
        height:         '64px',
        fontSize:       '1.6rem',
        lineHeight:     '1',
        padding:        '0',
        display:        'flex',
        alignItems:     'center',
        justifyContent: 'center',
        borderRadius:   '50%',
      });
    }
  }
}

customElements.define('menu-x', FixedContentFloatingMenu);

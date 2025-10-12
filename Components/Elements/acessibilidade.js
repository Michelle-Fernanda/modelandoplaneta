import { FloatingMenu } from "../Classes/FloatingMenu.js";

class AcessibilidadeMenu extends FloatingMenu {
  constructor() {
    // Chama o construtor da classe base (FloatingMenu)
    super({ top: "20px", left: "20px", direction: "down" });

    // Botão principal
    this.addToggleButton("🧩");

    // Opções (assume que aumentarFonte, diminuirFonte, alternarContraste estão definidas globalmente)
    this.addOption("A+", () => aumentarFonte());
    this.addOption("A-", () => diminirFonte());
    this.addOption("🔲", () => alternarContraste());

    // Estilo customizado (Aplicado ao Shadow DOM do FloatingMenu base)
    const style = document.createElement("style");
    style.textContent = `
      /* * O FloatingMenu já define --option-size (60px) e estilos base.
       * Usaremos o CSS Customizado para sobrescrever SOMENTE o que precisamos
       * (Forma e tamanho das opções, e o tamanho do botão principal)
       */
      
      :host {
         /* Sobrescreve as variáveis do FloatingMenu para controle de tamanho */
         --toggle-size: 60px; /* Tamanho padrão do FloatingMenu, mantido */
         --option-size: 50px; /* Define o tamanho menor e quadrado das opções */
         --anim-duration: 260ms; /* Para evitar warnings */
      }

      /* Estilo para SOBRESCREVER o formato do BOTÃO PRINCIPAL (menu-toggle) */
      .menu-toggle {
         /* Apenas se você quiser mudar algo no toggle (ex: sombra/tamanho) */
         /* Usamos --toggle-size definido no :host */
         box-shadow: 0 4px 10px rgba(0,0,0,0.25);
      }
      
      /* Estilo para SOBRESCREVER o formato das OPÇÕES (menu-options a/button) */
      /* No código original do FloatingMenu, a opção é 'a'. Se você mudou para 'button', ajuste o seletor. */
      .menu-options a, .menu-options button, .menu-options .menu-option {
         /* Sobrescreve a forma circular (50%) para um quadrado suave (10px) */
         border-radius: 10px; 
         
         /* Sobrescreve a dimensão base para usar --option-size */
         width: var(--option-size);
         height: var(--option-size);
         min-width: var(--option-size);
         min-height: var(--option-size);

         /* Ajustes visuais que não estavam na base */
         font-size: 1rem;
         box-shadow: 0 3px 8px rgba(0,0,0,0.2);
      }

      /* Hover customizado para evitar o 'scale(1.08)' do FloatingMenu base */
      .menu-options a:hover, .menu-options button:hover, .menu-options .menu-option:hover {
         /* Remove o efeito de 'saltar' (scale) */
         transform: none; 
         /* Adiciona um efeito de 'mover para cima' */
         transform: translateY(-2px); 
         
         /* O resto do hover (background, box-shadow) já é tratado pela classe base, ou você pode sobrescrever aqui: */
         background: linear-gradient(135deg, #66bb6a, #388e3c);
      }
    `;
    // Adiciona o novo estilo ao Shadow DOM do componente base
    this.shadowRoot.appendChild(style); 
  }
}

customElements.define("acessibilidade-x", AcessibilidadeMenu);

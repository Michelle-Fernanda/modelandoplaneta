import { FloatingMenu } from "../Classes/FloatingMenu.js";

class CalcMenu extends FloatingMenu {
  constructor() {
    super({ top: "20px", right: "20px", direction: "down"});

<<<<<<< HEAD
        const style = document.createElement("style");
        style.textContent = `
            :host {
                /* POSICIONAMENTO: Fixado no canto superior DIREITO */
                position: fixed;
                top: 20px;
                right: 20px; 
                z-index: 1000;
                font-family: system-ui, sans-serif;
            }

            .menu-container {
                display: flex;
                /* FLUXO: row-reverse faz o toggle ficar à direita das opções */
                flex-direction: row-reverse; 
                align-items: center;
                gap: 10px;
            }

            /* Botão Principal */
            .menu-toggle {
                width: 50px;
                height: 50px;
                border-radius: 8px;
                /* NOVO ESTILO: Degradê de fundo */
                background: linear-gradient(135deg, #65bf68, #008905);
                color: #fff;
                font-size: 1.5rem;
                border: none;
                cursor: pointer;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
                transition: opacity 0.2s, transform 0.2s;
            }

            .menu-toggle:hover {
                /* Ajuste o hover para dar um feedback visual (esmaecendo um pouco) */
                opacity: 0.9;
            }
            
            /* Container das Opções */
            .options-wrapper {
                display: flex;
                gap: 8px;
                max-width: 0;
                overflow: hidden;
                transition: max-width 0.3s ease-in-out, opacity 0.3s ease-in-out;
                opacity: 0;
                pointer-events: none;
            }
            
            .options-wrapper.open {
                max-width: 500px;
                opacity: 1;
                pointer-events: auto;
            }

            /* Estilo dos Botões de Opção */
            .menu-option {
                padding: 10px 15px;
                /* Ajustamos a borda para contrastar melhor com o degradê principal */
                border: 1px solid #008905;
                background-color: #E8F5E9; /* Fundo claro para o botão de opção */
                color: #008905; /* Cor de texto que combina com o degradê */
                text-decoration: none;
                font-size: 0.95rem;
                cursor: pointer;
                white-space: nowrap;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: background-color 0.2s, transform 0.1s;
                text-align: center;
            }
            
            .menu-option:hover {
                /* Cor de hover levemente mais escura */
                background-color: #DCEADF;
                transform: translateY(-1px);
            }
            
            /* Ajuste responsivo */
            @media (max-width: 600px) {
                :host {
                    right: 16px;
                    bottom: 16px;
                    top: auto; 
                }
            }
        `;
        
        // Estrutura HTML
        const container = document.createElement("div");
        container.classList.add("menu-container");

        this.optionsWrapper = document.createElement("div");
        this.optionsWrapper.classList.add("options-wrapper");
        
        this.toggleButton = document.createElement("button");
        this.toggleButton.classList.add("menu-toggle");
        this.toggleButton.textContent = "☰";
        
        this.toggleButton.addEventListener("click", this.toggleMenu.bind(this));
        
        // Ordem: optionsWrapper (esquerda), toggleButton (direita)
        container.append(this.optionsWrapper, this.toggleButton);
        this.shadowRoot.append(style, container);

        this.addOptions();
    }

    addOptions() {
        // A estrutura de dados agora usa 'action' (função) em vez de 'href'
        const menuOptions = [
            { 
                label: "🔢 Calculadora", 
                action: () => { 
                    // Assume que 'calc-modal' tem um método open()
                    document.querySelector("calc-modal")?.open();
                } 
            },
            { 
                label: "📏 Unidades", 
                action: () => { 
                    // Assume que 'conversor-modal' tem um método open()
                    document.querySelector("conversor-modal")?.open();
                } 
            }
        ];

        menuOptions.forEach(opt => {
            const button = document.createElement("button"); 
            button.classList.add("menu-option");
            button.textContent = opt.label;
            
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Executa a função definida na estrutura de dados
                opt.action(); 
                
                // Fecha o menu após a ação
                this.toggleMenu(); 
            });

            this.optionsWrapper.appendChild(button);
        });
    }

    toggleMenu() {
        this.isOpen = !this.isOpen;
        this.optionsWrapper.classList.toggle("open", this.isOpen);
        this.toggleButton.textContent = this.isOpen ? "✕" : "☰";
    }
=======
    this.addToggleButton("v"); // botão principal do menu
    this.addOption("C", () => alert("Abrir calculadora"));
    this.addOption("U", () => alert("Abrir conversor de unidades"));
  }
>>>>>>> parent of f7a2931 (Menu adicionado)
}

customElements.define("teste-x", CalcMenu);
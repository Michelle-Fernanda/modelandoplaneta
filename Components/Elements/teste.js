class RightExpandingMenu extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: "open" });

        this.isOpen = false;

        const style = document.createElement("style");
        style.textContent = `
            :host {
                position: fixed;
                top: 20px;
                right: 20px; 
                z-index: 9999;
                font-family: system-ui, sans-serif;
            }

            .menu-container {
                display: flex;
                flex-direction: row-reverse; 
                align-items: center;
                gap: 10px;
            }

            .menu-toggle {
                width: 50px;
                height: 50px;
                border-radius: 8px;
                background: linear-gradient(135deg, #65bf68, #008905);
                color: #fff;
                font-size: 1.5rem;
                border: none;
                cursor: pointer;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
                transition: opacity 0.2s, transform 0.2s;
                /* Centraliza o ícone */
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .menu-toggle:hover {
                opacity: 0.9;
            }
            
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

            .menu-option {
                padding: 10px 15px;
                border: 1px solid #008905;
                border-radius: 4px;
                background-color: #E8F5E9; 
                color: #008905;
                text-decoration: none;
                font-size: 0.95rem;
                cursor: pointer;
                white-space: nowrap;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: background-color 0.2s, transform 0.1s;
                text-align: center;
            }
            
            .first-option {
                order: -1; 
            }
            
            .menu-option:hover {
                background-color: #DCEADF;
                transform: translateY(-1px);
            }
            
            @media (max-width: 600px) {
                :host {
                    right: 16px;
                    bottom: 16px;
                    top: auto; 
                }
            }
        `;
        
        const container = document.createElement("div");
        container.classList.add("menu-container");

        this.optionsWrapper = document.createElement("div");
        this.optionsWrapper.classList.add("options-wrapper");
        
        this.toggleButton = document.createElement("button");
        this.toggleButton.classList.add("menu-toggle");
        // === MUDANÇA AQUI: ÍCONE DE FERRAMENTA ===
        this.toggleButton.textContent = "🛠️"; 
        
        // Adiciona um flexbox para centralizar o ícone caso ele tenha tamanho variável
        this.toggleButton.style.display = 'flex';
        this.toggleButton.style.alignItems = 'center';
        this.toggleButton.style.justifyContent = 'center';
        
        this.toggleButton.addEventListener("click", this.toggleMenu.bind(this));
        
        container.append(this.optionsWrapper, this.toggleButton);
        this.shadowRoot.append(style, container);

        this.addOptions();
    }

    addOptions() {
        const menuOptions = [
            { 
                label: "🔢 Calculadora", 
                action: () => { 
                    document.querySelector("calc-modal")?.open();
                } 
            },
            { 
                label: "📏 Unidades", 
                action: () => { 
                    document.querySelector("conversor-modal")?.open();
                } 
            }
        ];

        menuOptions.forEach((opt, index) => {
            const button = document.createElement("button"); 
            button.classList.add("menu-option");
            button.textContent = opt.label;
            
            if (index === 0) {
                button.classList.add("first-option");
            }
            
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                opt.action(); 
                
                this.toggleMenu(); 
            });

            this.optionsWrapper.appendChild(button);
        });
    }

    toggleMenu() {
        this.isOpen = !this.isOpen;
        this.optionsWrapper.classList.toggle("open", this.isOpen);
        // === MUDANÇA AQUI: Alterna entre '✕' e o ícone de ferramenta ===
        this.toggleButton.textContent = this.isOpen ? "✕" : "🛠️"; 
    }
}

customElements.define("teste-x", RightExpandingMenu);
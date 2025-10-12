export class FloatingMenu extends HTMLElement {
    /**
     * @param {Object} config
     * {
     * top, bottom, left, right,        // posições opcionais
     * direction: "up"|"down"|"left"|"right" // direção das opções
     * }
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
        // Ocultamos usando classes e opacity/transform para a animação, não 'display: none'
        options.style.flexDirection = this.getFlexDirection(config.direction);
        options.setAttribute('aria-hidden', 'true'); // Inicialmente escondido para leitores de tela
        container.appendChild(options);
        this.optionsContainer = options;

        // Variável de estado para controle
        this.isVisible = false;
        
        // Estilo base com as classes de animação integradas
        const style = document.createElement("style");
        style.textContent = `
            .floating-menu { display: flex; flex-direction: column; align-items: center; gap: 10px; }
            
            /* Toggle Button */
            .menu-toggle { display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white; font-size: 1.6rem; border: none; border-radius: 50%; width: 55px; height: 55px; cursor: pointer; box-shadow: 2px 2px 8px rgba(0,0,0,0.3); transition: transform 0.3s; }
            .menu-toggle:hover { transform: scale(1.1); }

            /* Options Container - BASE */
            .menu-options { 
                display: flex; /* Mantemos flex para que os itens sejam renderizados */
                gap: 10px; 
                margin: 0; 
                align-items: center; 
                
                /* Estado Inicial (Escondido) */
                opacity: 0;
                pointer-events: none; /* Desabilita clique quando invisível */
                transition: opacity 0.3s ease, transform 0.3s ease;
                
                /* Ponto de partida para a animação de deslizamento */
                transform: translateY(10px); /* Padrão: desliza para cima (direction: 'up') */
            }

            /* Modificadores de Direção para o Transform (slide) */
            .menu-options[data-direction="up"] { transform: translateY(10px); }
            .menu-options[data-direction="down"] { transform: translateY(-10px); }
            .menu-options[data-direction="left"] { transform: translateX(10px); }
            .menu-options[data-direction="right"] { transform: translateX(-10px); }
            
            /* Estado VISÍVEL (Ativo) */
            .menu-options.menu-visible {
                opacity: 1;
                transform: translate(0, 0); /* Volta à posição original (0,0) */
                pointer-events: auto; /* Permite cliques */
            }

            /* Menu Items */
            .menu-options a { 
                background-color: #4CAF50; color: white; font-size: 1.4rem; width: 45px; height: 45px; 
                border-radius: 50%; text-align: center; line-height: 45px; text-decoration: none; 
                box-shadow: 2px 2px 10px rgba(0,0,0,0.3); transition: background-color 0.3s, transform 0.3s; 
            }
            .menu-options a:hover { background-color: #388e3c; transform: scale(1.1); }
        `;
        this.shadowRoot.append(style, container);
        this.container = container;
        
        // Define o atributo de direção para usar no CSS
        this.optionsContainer.setAttribute('data-direction', config.direction);
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
    addToggleButton(iconText = "☰") {
        const btn = document.createElement("button");
        btn.className = "menu-toggle";
        btn.textContent = iconText;

        // A ordem dos elementos no container é crucial para a direção
        if (["up", "left"].includes(this.config.direction)) {
            this.container.appendChild(btn);
        } else {
            this.container.insertBefore(btn, this.optionsContainer);
        }

        btn.addEventListener("click", () => this.toggleMenu());

        this.toggleButton = btn;
        return btn;
    }

    // Novo método para alternar o menu com animação
    toggleMenu() {
        if (this.isVisible) {
            // Escondendo
            this.optionsContainer.classList.remove("menu-visible");
            this.optionsContainer.setAttribute('aria-hidden', 'true');
        } else {
            // Mostrando
            this.optionsContainer.classList.add("menu-visible");
            this.optionsContainer.setAttribute('aria-hidden', 'false');
        }
        this.isVisible = !this.isVisible;
    }
    
    // Adiciona opção
    addOption(label = "O", onClick = () => {}) {
        const a = document.createElement("a");
        a.href = "#";
        a.textContent = label;
        a.addEventListener("click", (e) => {
            e.preventDefault();
            // Adicionalmente, podemos fechar o menu ao clicar em uma opção
            this.toggleMenu(); 
            onClick();
        });
        this.optionsContainer.appendChild(a);
    }
}
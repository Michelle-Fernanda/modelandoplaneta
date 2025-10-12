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
        options.style.flexDirection = this.getFlexDirection(config.direction);
        options.setAttribute('aria-hidden', 'true');
        container.appendChild(options);
        this.optionsContainer = options;

        this.isVisible = false;
        
        // Estilo base com as classes de animação e cores padrão
        const style = document.createElement("style");
        style.textContent = `
            .floating-menu { display: flex; flex-direction: column; align-items: center; gap: 10px; }
            
            /* -- Variáveis de Cor Padrão -- */
            :host {
                --main-bg: #4CAF50;
                --main-color: white;
                --hover-bg: #388e3c;
                --contraste-bg: #000;
                --contraste-color: #fff;
            }

            /* Toggle Button */
            .menu-toggle { 
                display: flex; align-items: center; justify-content: center; 
                background-color: var(--main-bg); 
                color: var(--main-color); 
                font-size: 1.6rem; border: none; border-radius: 50%; width: 55px; height: 55px; cursor: pointer; 
                box-shadow: 2px 2px 8px rgba(0,0,0,0.3); transition: transform 0.3s, background-color 0.3s, color 0.3s; 
            }
            .menu-toggle:hover { 
                transform: scale(1.1); 
                background-color: var(--main-bg); /* Adicione esta linha */
            }

            /* Options Container - BASE */
            .menu-options { 
                display: flex; gap: 10px; margin: 0; align-items: center; 
                opacity: 0; pointer-events: none; 
                transition: opacity 0.3s ease, transform 0.3s ease;
            }

            /* Configura o ponto de partida do deslize (estado inicial 'escondido') */
            .menu-options[data-direction="up"] { transform: translateY(10px); }
            .menu-options[data-direction="down"] { transform: translateY(-10px); flex-direction: column; }
            .menu-options[data-direction="left"] { transform: translateX(10px); align-items: flex-end; }
            .menu-options[data-direction="right"] { transform: translateX(-10px); align-items: flex-start; flex-direction: row; }
            
            /* Estado VISÍVEL (Ativo) */
            .menu-options.menu-visible { opacity: 1; transform: translate(0, 0); pointer-events: auto; }

            /* Menu Items */
            .menu-options a { 
                background-color: var(--main-bg); color: var(--main-color); 
                font-size: 1.4rem; width: 45px; height: 45px; 
                border-radius: 50%; text-align: center; line-height: 45px; text-decoration: none; 
                box-shadow: 2px 2px 10px rgba(0,0,0,0.3); transition: background-color 0.3s, transform 0.3s, color 0.3s; 
            }
            .menu-options a:hover { background-color: var(--hover-bg); transform: scale(1.1); }

            /* ======================================= */
            /* ESTILOS DE ALTO CONTRASTE (APLICADOS VIA CLASSE) */
            /* ======================================= */
            .contraste-active .menu-toggle,
            .contraste-active .menu-options a {
                background-color: var(--contraste-bg) !important;
                color: var(--contraste-color) !important;
                border: 2px solid var(--contraste-color) !important;
            }

            .contraste-active .menu-options a:hover {
                background-color: #333 !important; /* Um cinza escuro para hover */
                color: var(--contraste-color) !important;
            }
        `;
        this.shadowRoot.append(style, container);
        this.container = container;
        
        // Define o atributo de direção para usar no CSS
        this.optionsContainer.setAttribute('data-direction', config.direction);

        // --- Lógica de Observação do Contraste ---
        this.initializeContrasteObserver();
        
        // Aplica o contraste inicial se o body já tiver a classe
        this.applyContrasteStyles(document.body.classList.contains("contraste"));
    }

    // Método que aplica as classes CSS de contraste ao container do Shadow DOM
    applyContrasteStyles(isContrasteActive) {
        if (isContrasteActive) {
            this.container.classList.add("contraste-active");
        } else {
            this.container.classList.remove("contraste-active");
        }
    }

    // Configura o observador de mutação no body
    initializeContrasteObserver() {
        // A função que será chamada quando a classe do body mudar
        const updateContraste = (mutationsList, observer) => {
            for (const mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const isContrasteActive = document.body.classList.contains("contraste");
                    this.applyContrasteStyles(isContrasteActive);
                }
            }
        };

        // Cria e inicia o observador
        const observer = new MutationObserver(updateContraste);
        observer.observe(document.body, { 
            attributes: true, 
            attributeFilter: ["class"] // Foca apenas em mudanças na classe
        });
    }

    // Restante dos métodos (getFlexDirection, addToggleButton, toggleMenu, addOption) permanecem como estavam
    // ...

    getFlexDirection(direction) {
        switch (direction) {
            case "up": return "column-reverse";
            case "down": return "column";
            case "left": return "row-reverse";
            case "right": return "row";
            default: return "column";
        }
    }

    addToggleButton(iconText = "☰") {
        const btn = document.createElement("button");
        btn.className = "menu-toggle";
        btn.textContent = iconText;

        if (["up", "left"].includes(this.config.direction)) {
            this.container.appendChild(btn);
        } else {
            this.container.insertBefore(btn, this.optionsContainer);
        }

        btn.addEventListener("click", () => this.toggleMenu());

        this.toggleButton = btn;
        
        // Aplica o contraste inicial se o botão for adicionado depois do constructor
        this.applyContrasteStyles(document.body.classList.contains("contraste"));
        
        return btn;
    }

    toggleMenu() {
        if (this.isVisible) {
            this.optionsContainer.classList.remove("menu-visible");
            this.optionsContainer.setAttribute('aria-hidden', 'true');
        } else {
            this.optionsContainer.classList.add("menu-visible");
            this.optionsContainer.setAttribute('aria-hidden', 'false');
        }
        this.isVisible = !this.isVisible;
    }
    
    addOption(label = "O", onClick = () => {}) {
        const a = document.createElement("a");
        a.href = "#";
        a.textContent = label;
        a.addEventListener("click", (e) => {
            e.preventDefault();
            this.toggleMenu(); 
            onClick();
        });
        this.optionsContainer.appendChild(a);
    }
}
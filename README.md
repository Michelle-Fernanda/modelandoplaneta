# 🌍 Modelando o Planeta

> Site educacional que une **Matemática** e **Educação Ambiental**.

---

## 📖 Descrição

O **Modelando o Planeta** é uma plataforma web interativa desenvolvida para incentivar crianças a explorar temas de sustentabilidade — lixo na escola, desperdício de água, petróleo e arborização — por meio de atividades matemáticas. O projeto foi criado como ferramenta pedagógica de apoio a professores e alunos, tornando o aprendizado mais dinâmico e significativo.

---

## ✨ Funcionalidades

### 🗺️ Navegação
- Roteamento dinâmico via PHP sem bibliotecas externas
- Menu de navegação flutuante com atalhos para todas as páginas

### ♿ Acessibilidade
- Aumentar / diminuir tamanho da fonte
- Modo de alto contraste
- Todos os controles acessíveis por teclado

### 🧮 Ferramentas Interativas
- **Calculadora** — operações básicas com suporte a teclado
- **Conversor de Unidades** — comprimento, peso e volume com animação de resultado
- Modais arrastáveis com gerenciamento de z-index (sobreposição por foco)

### 🗑️ Lixo na Escola
- Formulário para registro de coleta de lixo (tipo, quantidade, data)
- Tabela de resultados com título editável
- Exportação em **PDF** via html2canvas + jsPDF
- Envio do relatório por **e-mail** com anexos de imagens
- Animação interativa do clipe de papel (estados: aberto, piscando, joinha, click)

### 💧 Desperdício de Água / ⛽ Petróleo / 🌳 Arborização
- Conteúdo educativo com textos, imagens e vídeos do YouTube
- Atividades matemáticas contextualizadas

### 🤖 Assistente Virtual
- Personagem "Michelle" com balões de fala rotativos
- Aparece automaticamente ao carregar a página

---

## 🛠️ Tecnologias

| Camada | Tecnologia |
|--------|-----------|
| Backend | PHP 8+ |
| Frontend | HTML5, CSS3, JavaScript (ES Modules) |
| Web Components | Custom Elements v1 (Shadow DOM) |
| PDF | [jsPDF](https://github.com/parallax/jsPDF) + [html2canvas](https://html2canvas.hertzen.com/) |
| Fontes | Google Fonts — Fredoka One |

---

## 📁 Estrutura do Projeto

```
/
├── index.php                  # Roteador principal
├── script.js                  # JS global (assistente, acessibilidade, z-index)
├── styles.css                 # CSS global
├── Components/
│   ├── head.php               # Imports de CSS, fontes e web components
│   ├── scripts.php            # Import do script.js global
│   ├── Classes/
│   │   ├── floatingMenu.js    # Base dos menus flutuantes
│   │   └── menuModal.js       # Modal arrastável com gerenciamento de z-index
│   └── Elements/
│       ├── menu.js            # Menu de navegação (direction: up)
│       ├── ferramentas.js     # Menu de ferramentas
│       ├── acessibilidade.js  # Controles de acessibilidade (direction: down)
│       ├── calculadora.js     # Web component da calculadora
│       └── conversor.js       # Web component do conversor de unidades
└── view/
    ├── home.php
    ├── agua.php
    ├── arborizacao.php
    ├── petroleo.php
    ├── sobre.php
    ├── contato.php
    └── lixo/
        ├── lixo.php
        └── lixo.css
```

---

## 🚀 Como Rodar Localmente

### Pré-requisitos
- PHP 8.0 ou superior
- Servidor local com suporte a PHP (XAMPP, Laragon, WAMP ou PHP built-in server)

### Passo a passo

**1. Clone o repositório**
```bash
git clone https://github.com/seu-usuario/modelando-o-planeta.git
cd modelando-o-planeta
```

**2. Inicie o servidor PHP embutido**
```bash
php -S localhost:8000
```

**3. Acesse no navegador**
```
http://localhost:8000
```

> ⚠️ O envio de e-mail (`enviar_email.php`) requer configuração de SMTP. Sem isso, o restante do site funciona normalmente.

---

## 📸 Screenshots

> Adicione capturas de tela do projeto aqui.

```
img/screenshots/home.png
img/screenshots/lixo.png
img/screenshots/ferramentas.png
```

---

## 👩‍💻 Contribuidores



| [<img src="https://avatars.githubusercontent.com/u/208886660?v=4" width=115><br><sub>Michelle Fernanda</sub>](https://github.com/Michelle-Fernanda?tab=repositories) |  
| :---: 



---

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais.  
Contato: example@gmail.com

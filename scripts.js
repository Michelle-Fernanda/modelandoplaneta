// ── Assistente ────────────────────────────────────────────────────────────────

function closeAssistant() {
  document.querySelector('.fala-container')?.style.setProperty('display', 'none');
}

const falas = document.querySelectorAll('.fala');
let index = 0;

function mostrarFala() {
  falas.forEach((fala, i) => {
    fala.style.display = i === index ? 'block' : 'none';
  });
  index = (index + 1) % falas.length;
}

// ── Acessibilidade ────────────────────────────────────────────────────────────

let tamanhoFonte = 100;

window.aumentarFonte = () => {
  if (tamanhoFonte < 150) document.body.style.fontSize = `${tamanhoFonte += 10}%`;
};

window.diminuirFonte = () => {
  if (tamanhoFonte > 70) document.body.style.fontSize = `${tamanhoFonte -= 10}%`;
};

window.alternarContraste = () => {
  document.body.classList.toggle('contraste');
};

// ── Gerenciador global de z-index ─────────────────────────────────────────────
// e.composedPath() atravessa shadow DOMs e retorna o caminho completo do evento,
// permitindo detectar cliques dentro de qualquer shadow DOM.

let _zTop = 1000;

Promise.all([
  customElements.whenDefined('calc-modal'),
  customElements.whenDefined('conversor-modal'),
]).then(() => {
  window.addEventListener('mousedown', (e) => {
    const modals = ['calc-modal', 'conversor-modal'];
    const path   = e.composedPath();

    for (const selector of modals) {
      const el = document.querySelector(selector);

      el.style.zIndex = 1;

      if (el && path.includes(el)) {
        console.log(el.style.zIndex)
        el.style.zIndex = 3;
        break;
      }
    }
  }, true);
});

// ── Inicialização ─────────────────────────────────────────────────────────────

window.onload = () => {
  setTimeout(() => {
    document.getElementById('assistant-img')?.classList.add('show');
    document.querySelector('.fala-container')?.classList.add('show');

    mostrarFala();
    setInterval(mostrarFala, 8000);
  }, 500);
};

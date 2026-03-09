// Assistente
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

// Acessibilidade — expostas no window para que módulos ES possam acessar
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

// Inicialização
window.onload = () => {
  setTimeout(() => {
    document.getElementById('assistant-img')?.classList.add('show');
    document.querySelector('.fala-container')?.classList.add('show');

    mostrarFala();
    setInterval(mostrarFala, 8000);
  }, 500);
};

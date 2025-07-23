function toggleMenu() {
  const menu = document.getElementById('menuOptions');

  if (menu.classList.contains('menu-visible')) {
    menu.classList.remove('menu-visible');
    menu.classList.add('menu-hiding');

    // Espera 300ms (igual à duração da transição no CSS)
    setTimeout(() => {
      menu.classList.remove('menu-hiding');
    }, 300);
  } else {
    menu.classList.add('menu-visible');
  }
}

function closeAssistant() {
  const falaContainer = document.querySelector('.fala-container');
  if (falaContainer) falaContainer.style.display = "none";
}

// Falas do boneco
const falas = document.querySelectorAll('.fala');
let index = 0;

function mostrarFala() {
  falas.forEach((fala, i) => {
    fala.style.display = (i === index) ? 'block' : 'none';
  });
  index = (index + 1) % falas.length;
}

// Acessibilidade: tamanho da fonte
let tamanhoFonte = 100;

function aumentarFonte() {
  if (tamanhoFonte < 150) {
    tamanhoFonte += 10;
    document.body.style.fontSize = `${tamanhoFonte}%`;
  }
}

function diminuirFonte() {
  if (tamanhoFonte > 70) {
    tamanhoFonte -= 10;
    document.body.style.fontSize = `${tamanhoFonte}%`;
  }
}

function alternarContraste() {
  document.body.classList.toggle('contraste');
}

function toggleAcessibilidadeMenu() {
  const menu = document.getElementById('acessibilidade-options');
  menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
}

function toggleHelpMenu() {
  const menu = document.getElementById('help-options');
  menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
}

// Exibe o boneco e começa as falas após 2 segundos
window.onload = function () {
  setTimeout(() => {
    const img = document.getElementById('assistant-img');
    const falaContainer = document.querySelector('.fala-container');
    
    if (img) img.classList.add('show');
    if (falaContainer) falaContainer.classList.add('show');

    mostrarFala(); // Inicia a primeira fala
    setInterval(mostrarFala, 8000); // Troca a cada 8 segundos
  }, 500); // Espera 2 segundos
};

ScrollReveal().reveal('#contato', { delay: 500 });
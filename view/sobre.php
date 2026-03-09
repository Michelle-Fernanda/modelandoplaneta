<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quem Somos?</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">

  <script type="module" src="Components/Elements/calculadora.js"></script>
  <script type="module" src="Components/Elements/conversor.js"></script>

  <script type="module" src="Components/Elements/acessibilidade.js"></script>
  <script type="module" src="Components/Elements/menu.js"></script>
  <script type="module" src="Components/Elements/ferramentas.js"></script>
</head>

<body>

  <header>
    <a href=".">
      <img src="img/3.gif" width="1300" alt="Imagem animada de boas-vindas">
    </a>
    <h1>Quem Somos?</h1>
  </header>
  
  <ferramentas-x></ferramentas-x>

  <menu-x></menu-x>

  <calc-modal></calc-modal>

  <conversor-modal></conversor-modal>

  <acessibilidade-x></acessibilidade-x>

  <section class="perfil-container">

    <!-- Michelle -->
    <div class="perfil">
      <div>
        <img src="img/michelle.jpg" alt="Foto da Michelle">
        <div class="perfil-nome">Michelle Fernanda da Silva</div>
      </div>
      <div class="perfil-info">
        <p>
          Professora efetiva na Rede Pública de Ensino, no Município de Bandeirantes - PR.
        </p>
        <p>
          Mestranda do Mestrado Profissional no Programa de Pós-Graduação em Ensino (PPGEN), Universidade Estadual do
          Norte do Paraná (UENP), Campus de Cornélio Procópio.
        </p>
        <p>
          Membro do GEPIEEM - Grupo de Estudo e Pesquisa em Educação Matemática (UENP).
        </p>
      </div>
    </div>

    <!-- Bárbara -->
    <div class="perfil" style="flex-direction: row-reverse;">
      <div>
        <img src="img/barbara.jpg" alt="Foto da Bárbara">
        <div class="perfil-nome">Bárbara N. Palharini A. Sousa</div>
      </div>
      <div class="perfil-info">
        <p>
          Professora no Mestrado Profissional em Ensino da Universidade Estadual do Norte do Paraná, Campus de Cornélio
          Procópio.
        </p>
        <p>
          Mestre e Doutora em Ensino de Ciências e Educação Matemática.
        </p>
        <p>
          Realizou o Pós-doutorado no Departamento de Filosofia da Educação e Ciências da Educação da Faculdade de
          Educação da Universidade de São Paulo (USP).
        </p>
        <p>
          Líder do GEPIEEM - Grupo de Estudo e Pesquisa em Educação Matemática (UENP).
        </p>
      </div>
    </div>

  </section>
<!-- 
  <div class="floating-menu">
    <div class="menu-options" id="menuOptions">
      <a href="lixo" title="Lixo na Escola">🗑️</a>
      <a href="petroleo" title="Petróleo">⛽</a>
      <a href="agua" title="Desperdício de Água">💧</a>
      <a href="arborizacao" title="Arborização">🌳</a>
      <a href="sobre" title="Quem Somos">👩‍🏫</a>
      <a href="." title="Início">🏠</a>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
  </div> -->

  <section id="contato">
    <div class="formulario">
      <iframe
        src="https://docs.google.com/forms/d/e/1FAIpQLScOqk4U1onhrD9ZN5cKTJnaKPQ85pvzFSSK4UIuJhm4zdG0dg/viewform?embedded=true"
        width="640" height="687" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eb86828d8e83d9deab8c868a8287c5888486">[email&#160;protected]</a></p>
    
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quem Somos?</title>
  <?php include 'Components/head.php'; ?>
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

    <div class="perfil">
      <div>
        <img src="img/michelle.jpg" alt="Foto da Michelle">
        <div class="perfil-nome">Michelle Fernanda da Silva</div>
      </div>
      <div class="perfil-info">
        <p>Professora efetiva na Rede Pública de Ensino, no Município de Bandeirantes - PR.</p>
        <p>Mestranda do Mestrado Profissional no Programa de Pós-Graduação em Ensino (PPGEN), Universidade Estadual do Norte do Paraná (UENP), Campus de Cornélio Procópio.</p>
        <p>Membro do GEPIEEM - Grupo de Estudo e Pesquisa em Educação Matemática (UENP).</p>
      </div>
    </div>

    <div class="perfil" style="flex-direction:row-reverse">
      <div>
        <img src="img/barbara.jpg" alt="Foto da Bárbara">
        <div class="perfil-nome">Bárbara N. Palharini A. Sousa</div>
      </div>
      <div class="perfil-info">
        <p>Professora no Mestrado Profissional em Ensino da Universidade Estadual do Norte do Paraná, Campus de Cornélio Procópio.</p>
        <p>Mestre e Doutora em Ensino de Ciências e Educação Matemática.</p>
        <p>Realizou o Pós-doutorado no Departamento de Filosofia da Educação e Ciências da Educação da Faculdade de Educação da Universidade de São Paulo (USP).</p>
        <p>Líder do GEPIEEM - Grupo de Estudo e Pesquisa em Educação Matemática (UENP).</p>
      </div>
    </div>

  </section>

  <section id="contato">
    <div class="formulario">
      <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScOqk4U1onhrD9ZN5cKTJnaKPQ85pvzFSSK4UIuJhm4zdG0dg/viewform?embedded=true"
        width="640" height="687" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>
    </div>
  </section>

  <footer>
    <p>© 2025 - Projeto Educacional de Modelagem Matemática | Contato: mifeh25@gmail.com</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  <?php include 'Components/scripts.php'; ?>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modelando o Planeta</title>
  <?php include 'Components/head.php'; ?>
</head>

<body>

  <header>
    <a href=".">
      <img src="img/3.gif" width="1300" alt="Imagem animada de boas-vindas">
    </a>
  </header>

  <ferramentas-x></ferramentas-x>
  <menu-x></menu-x>
  <calc-modal></calc-modal>
  <conversor-modal></conversor-modal>
  <acessibilidade-x></acessibilidade-x>

  <div class="intro">
    <h1>🌿🌍 EI, SEJA BEM-VINDO! 🌍🌿</h1>
    <h3>Você já imaginou explorar assuntos interessantes e aprender mais sobre Educação Ambiental por meio da Matemática?</h3>
    <p>Tenho certeza que aqui no "Modelando o Planeta" você irá aprender muito!</p>
  </div>

  <div class="sections">
    <div class="activity" onclick="window.location.href='lixo'">
      <div class="section"><img src="img/Lixo.png" alt="Lixo na Escola"></div>
      <p class="section-title">Lixo na Escola</p>
    </div>
    <div class="activity" onclick="window.location.href='petroleo'">
      <div class="section"><img src="img/Petróleo.png" alt="Problemas com Petróleo"></div>
      <p class="section-title">Problemas com Petróleo</p>
    </div>
    <div class="activity" onclick="window.location.href='agua'">
      <div class="section"><img src="img/Desperdício.png" alt="Desperdício de Água"></div>
      <p class="section-title">Desperdício de Água</p>
    </div>
    <div class="activity" onclick="window.location.href='arborizacao'">
      <div class="section"><img src="img/Reflorestamento.png" alt="Arborização"></div>
      <p class="section-title">Arborização</p>
    </div>
  </div>

  <div class="desen">
    <p>Venha descobrir como nosso site é super legal, onde a matemática encontra assuntos de sustentabilidade por meio de diferentes atividades!</p>
    <h2>Vamos lá!?</h2>
  </div>

  <section class="videos-section">
    <h2 class="videos-title">Vídeos Educativos</h2>

    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/ZSrhXP4-aec" title="Vídeo 1" allowfullscreen></iframe>
      <div class="video-info">
        <p>Este vídeo mostra como a matemática pode ser usada para refletir sobre problemas ambientais do nosso cotidiano.</p>
      </div>
    </div>

    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/KlV3ASpM19M" title="Vídeo 2" allowfullscreen></iframe>
      <div class="video-info">
        <p>Aqui você aprenderá sobre consumo consciente e como pequenas atitudes fazem grande diferença no meio ambiente.</p>
      </div>
    </div>

    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/5FCW_h7S9Dw" title="Vídeo 3" allowfullscreen></iframe>
      <div class="video-info">
        <p>Descubra como o desperdício de água pode ser evitado com a ajuda de ideias simples e pensamento matemático.</p>
      </div>
    </div>

    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/j8L1CcanjT8" title="Vídeo 4" allowfullscreen></iframe>
      <div class="video-info">
        <p>Conheça iniciativas de reflorestamento e veja como os números ajudam a planejar e acompanhar esses projetos.</p>
      </div>
    </div>

    <div class="video-closing-message">
      <h3>Quanta coisa interessante a gente pode descobrir juntos, não é mesmo?</h3>
      <p>Nas guias sobre lixo na escola, petróleo no mar, desperdício de água e arborização, você vai explorar temas importantes para o mundo em que vivemos — e o melhor: tudo isso por meio da matemática!</p>
      <p>Vamos transformar números em ideias, cálculos em soluções e aprendizado em atitude.</p>
      <p class="closing-highlight">Topa entrar nessa aventura com a gente?</p>
    </div>
  </section>

  <div class="fala-container">
    <button id="close-assistant" onclick="closeAssistant()">×</button>
    <div class="fala">Oiê! Eu me chamo Michelle e sou seu guia no site Modelando o Planeta! 🌍</div>
    <div class="fala">Aqui, a matemática se junta à sustentabilidade para te ajudar a pensar sobre o mundo de um jeito diferente!</div>
    <div class="fala">Vamos conversar sobre consumo sustentável, ou seja, usar só o que a gente realmente precisa, sem desperdício. 💧🌱</div>
    <div class="fala">Nas atividades do site, você vai explorar temas como lixo na escola, petróleo no mar, desperdício de água e arborização – tudo isso com a ajuda da matemática! 🧮✨</div>
    <div class="fala">Venha descobrir como nosso site é super legal! Vamos lá!? 🎉</div>
  </div>
  <img id="assistant-img" src="img/boneco.png" alt="Assistente">

  <footer>
    <p>Contato: mifeh25@gmail.com | Sobre: Este site foi criado para incentivar a criatividade matemática de crianças do Ensino Fundamental 1.</p>
    <a href="sobre" class="link-somos">Quem somos?</a>
  </footer>

  <?php include 'Components/scripts.php'; ?>

</body>
</html>

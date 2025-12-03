<?php
session_start();

// Se não houver usuário logado, redireciona para o formulário de cadastro/login
if (empty($_SESSION['login'])) {
    header('Location: ../BD/cadastro.php');
    exit;
}


// Inclui cabeçalho
include 'header.php';
?>

<main style="padding: 1rem;">
  <section style="text-align:center; margin-bottom: 1.5rem;">
    <h1>Bem-vindo(a), <?= $nome ?>!</h1>
    <p>Você entrou <strong></strong> (login: <?= $login ?>)</p>
  </section>

    <section>
      <h2>Área do Cliente</h2>
      <p>Aqui você pode ver ofertas, agendar serviços e gerenciar seus pedidos.</p>
      <!-- conteúdo específico de cliente -->
   
      <h2>Área do Usuário</h2>
      <p>Conteúdo geral para usuários autenticados.</p>
    </section>
  <?php endif; ?>

  <p style="text-align:center; margin-top:2rem;">
    <a href="logout.php">Sair</a>
  </p>
</main>

<?php include 'header.php'; ?>

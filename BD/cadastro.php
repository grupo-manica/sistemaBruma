<?php
include '../PHP/header.php';
include '../BD/conexao.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
    <title>Bruma | Cadastro de Usuário</title>

    <style>
      body {
        align-items: center;
      }
      form{
        margin: 0% 20%;
      }
    </style>
  </head>

<body>
  <form action="../BD/cadastroSucesso.php" method="POST">
    <fieldset>
      <h2 style="text-align: center;"> <legend><strong>Cadastro de Usuário</strong></legend></h2>
      
      <fieldset>
        <legend>Dados de Conta</legend>
        <label for="mail">E-mail:</label>
        <input id="mail" name="email" type="email" size="35" maxlength="50"
        placeholder="Máx. 30 caracteres" autocomplete = "email" required />
        <br/>

        <label for="login">Usuário: </label>
        <input id= "login" name="login" type="text" size="25" maxlength="20"
        placeholder="Máximo 20 caracteres" required/>
        <br/>

        <label for="senha">Senha:</label>
        <input id="senha" name="senha" type="password" size="25" maxlength="20"
        placeholder="Máx. 12 caracteres" autocomplete="current-password" required/>
      </fieldset><br/>

      <fieldset>
        <legend>Dados do(a) Usuário</legend>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" size="35" maxlength="30"
        placeholder="Máximo 30 caracteres" required>
        <br/>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"
        placeholder="Ex.: 999.999.999-99" required>
        <br/>

        <label for="birthdate">Data de Nascimento:</label>
        <input type="date" id="birthdate" name="nascimento" required>
        <br/>

        <label for="address">Endereço:</label>
        <input type="text" size="70" id="address" name="endereco"
        maxlength="100" placeholder="Máx. 100 caracteres" required>
        <br/>

        <label for="phone">Telefone:</label>
        <input type="tel" id="phone" name="telefone"
        placeholder="(DDD) 9xxxx-xxxx" required>
      </fieldset>
      <br/><br/>

        <input id="btn1" type="submit" name="btn1" value="Criar Usuário" />
        <input id="btn2" type="reset" name="btn2" value="Limpar dados" />
    </fieldset>
    <br/><br/><br/><br/><br/>
  </form>
</body>
</html>

<?php include '../PHP/footer.php'; ?>

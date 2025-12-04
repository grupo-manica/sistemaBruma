<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
    <title>Bruma | Cadastro de Usuário</title>

    <script src="jquery-3.7.1.js"></script>
    <script src="../JS/forms.js"></script>

    <style>
      fieldset{
        border-radius: 8px;
        background-color: #f2f2f2;
      }
      
      #containerPai {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center;
      }

      #containerPai, #containerForms{
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        height: 100%;
      }

      #formClinica, #formCliente{
        display: none;
      }
    </style>
  </head>
  
<body>
  
  <div id="containerPai">
  <fieldset class="fsEscolha">
  <legend><strong>Cadastro</strong></legend>
  <label id="lblEscolha" for="escolha" >Escolha o seu perfil de usuário: </label>
  <br><hr>
    <button href="#lblEscolha" onclick="mostrarCliente()">SOU CLIENTE</button>
    <button href="#lblEscolha" onclick="mostrarClinica()">SOU CLÍNICA</button>
  </fieldset>
  
    <div id="containerForms">
    <form id=formCliente action="../PHP/cadastroSucesso.php" method="POST">
      <fieldset>
        <legend><b>Formulário de Usuário</b></legend>
          <div>
            <label for="nome">Nome:</label><br>
              <input type="text" id="nome" name="nome" maxlength="150"
              placeholder="Digite seu nome completo" required><br>
            
            <label for="cpf">CPF:</label><br>
              <input type="text" id="cpf" name="cpf"
              placeholder="xxx.xxx.xxx-xx" required><br>

            <label for="birthdate">Data de Nascimento:</label><br>
              <input type="date" id="birthdate" name="nascimento" required><br>

            <label for="address">Endereço:</label><br>
              <input type="text" id="address" name="endereco" maxlength="100"
              placeholder="rua, número, bairro, cidade, estado" required><br>

            <label for="telefone">Telefone:</label><br>
              <input type="tel" id="telefone" name="telefone"
              placeholder="(xx)xxxxx-xxxx" required><br>

          <h4>Informações de Login</h4>
            <label for="mail">E-mail:</label><br>
              <input id="email" name="email" type="email" maxlength="50"
              placeholder="Máx. 30 caracteres" autocomplete="email" required><br>

            <label for="login">Usuário: </label><br>
              <input id="login" name="login" type="text" maxlength="20"
              placeholder="Máximo 20 caracteres" required /><br>

            <label for="senha">Senha:</label><br>
              <input id="senha" name="senha" type="password" maxlength="20"
              placeholder="Máx. 12 caracteres" autocomplete="current-password" required /><br>

            <label for="senha_confirma">Confirme a Senha:</label><br>
              <input id="senha_confirma" name="senha_confirma" type="password"
              placeholder="Confirme a senha" required><br><br>

            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
          </div>
      </fieldset><br/><br/>
    </form>


    <form id="formClinica" action="validacao.php" method="POST">
      <fieldset>
        <legend><b>Formulário de Clínicas</b></legend>  
          <div id="form_usuario" class="form-box"></div>
            <label for="nomeClinica">Nome da Clínica:</label><br>
              <input id="nomeClinica" name="nomeClinica" type="text" required /><br>

            <label for="cnpj">CNPJ:</label><br>
              <input id="cnpj" name="cnpj" type="text"
              placeholder="XXXXXXXXXXXXXXXX" required><br>

            <label id="enderecoClinica">Endereço:</label><br>
              <input id="enderecoClinica" name="enderecoClinica" type="adress" required><br>

            <label for="telClinica">Telefone:</label><br>
              <input id="telClinica" name="telClinica" type="tel" required><br>

          <h4>Informações de Login</h4>
            <label for="emailClinica">E-mail:</label><br>
            <input id="emailClinica" name="emailClinica" type="email" required><br>

            <label for="senhaClinica">Senha:</label><br>
              <input id="senhaClinica" name="senhaClinica" type="password" required><br>

            <label for="confirmaSenhaClinica">Confirmar Senha:</label><br>
              <input id="confirmaSenhaClinica" name="confirmaSenhaClinica" type="password" required>
            <br><br>

            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
      </fieldset>
    </form>
    </div>
  </div>
</body>
</html>

<?php include 'footer.php'; ?>

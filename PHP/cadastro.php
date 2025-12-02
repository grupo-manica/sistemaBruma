<?php include 'header.php'; ?>
<form action="validacao.php" method="POST">
  
  <script src="jquery-3.7.1.js"></script>
<script src="../JS/forms.js"></script>
    <br/><br/>
   <h2 style="text-align: center;"> <legend><strong>Cadastro</strong></legend></h2>

   <label for="escolha">Escolha o tipo de Usuário:</label>
    <input type="button" class="btn" id="btn_cliente" value="usuario" onclick="Usuario()" required>
  <input type="button" class="btn" id="btn_usuario" value="clinica" onclick="Clinica()" required>
    <br/><br/>
    <fieldset>

    <div id="form_cliente" class="form-box">
        <h3>Formulário de Usuário</h3>

    <label type="text" name="Nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="nome completo" required><br><br>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" required><br><br>

    <label for="birthdate">Data de Nascimento:</label>
    <input type="date" id="birthdate" name="nascimento" required><br><br>

    <label for="address">Endereço:</label>
    <input type="text" size="70" id="address" name="endereco" maxlength="100" placeholder="rua, número, bairro, cidade, estado" required><br><br>

    <label for="telefone">Telefone:</label>
    <input type="tel" id="phone" name="telefone" placeholder="(xx)xxxxx-xxxx" required><br><br>

    <legend><strong>Informações de Login</strong></legend>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" placeholder="e-mail" required><br><br>

    <label for="password">Senha:</label>
    <input type="password" id="password" name="senha" placeholder="senha" required><br><br>

    <label for="password_confirm">Confirme a Senha:</label>
    <input type="password" id="password_confirm" name="senha_confirm" placeholder="confirme a senha" required><br><br>
<br/><br/>
<div id="form_usuario" class="form-box">
  <h3>Cadastro - Clínica</h3>

  <form action="validacao.php" method="POST">
    <input type="hidden" name="tipo" value="usuario">

    <label>Nome da Clínica:</label><br>
    <input id="nomeClinica"  type="text" name="nome" required><br><br>

    <label>CNPJ:</label><br>
    <input type="text" name="cnpj" placeholder="XXXXXXXXXXXXXXXX" required><br><br>

    <label>Endereço:</label><br>
    <input type="text" name="endereco" required><br><br>

    <label>Telefone:</label><br>
    <input type="tel" name="telefone" required><br><br>

    <h4>Informações de Login</h4>

    <label>E-mail:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <label>Confirmar Senha:</label><br>
    <input type="password" name="senha_confirm" required><br><br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Limpar">
  </form>
</div>
</div>
</form>
</main>
<?php include 'rodape.php'; ?>

</body>
</html>

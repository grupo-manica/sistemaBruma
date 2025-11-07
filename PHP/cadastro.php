<?php include 'cabecalho.php'; ?>
<form action="validacao.php" method="POST">
  <fieldset>
    <br/><br/>
   <h2 style="text-align: center;"> <legend><strong>Cadastro</strong></legend></h2>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="nome completo" required><br><br>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" required><br><br>

    <label for="birthdate">Data de Nascimento:</label>
    <input type="date" id="birthdate" name="nascimento" required><br><br>

    <label for="address">Endereço:</label>
    <input type="text" size="70" id="address" name="endereco" maxlength="100" placeholder="rua, número, bairro, cidade, estado" required><br><br>

    <label for="phone">Telefone:</label>
    <input type="tel" id="phone" name="telefone" placeholder="(xx)xxxxx-xxxx" required><br><br>

    <label for="escolha">Tipo de Usuário:</label>
    <select id="escolha" name="escolha" required>
      <option value="">Selecione</option>
      <option value="Cliente">Cliente</option>
      <option value="Profissional">Profissional</option>
    </select>
    <br/><br/>
    <fieldset>

    <legend><strong>Informações de Login</strong></legend>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" placeholder="e-mail" required><br><br>

    <label for="password">Senha:</label>
    <input type="password" id="password" name="senha" placeholder="senha" required><br><br>

    <label for="password_confirm">Confirme a Senha:</label>
    <input type="password" id="password_confirm" name="senha_confirm" placeholder="confirme a senha" required><br><br>
  </fieldset>

  <input type="submit" value="Enviar">
  <input type="reset" value="Limpar">
</fieldset>
</form>
</main>
<?php include 'rodape.php'; ?>

</body>
</html>

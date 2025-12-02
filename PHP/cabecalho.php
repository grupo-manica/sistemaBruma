 <?php $titulo="página com css" ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bruma | Plataforma de Estética</title>

  <style>
    * {
        box-sizing: border-box;
        text-decoration: none;
        color: black;
    }

    body {
        background-color: #fff;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
      color: black;
      padding: 2px;
      display: flex;
      align-items: center;
      justify-content: space-evenly;
      font-size: 15px;
      flex-wrap: wrap;
    }

    #navbar {
        align-items: first baseline;
        display: flex;
        gap: 2em;
        font-size: 14px;
        font-weight: bold;
    }

    #navbar label {
        display: block;
        font: 1rem "Fira Sans", sans-serif;    
    }

    #navbar input, label {
        margin: 0.4rem 0;
    }

    a:hover {
        color: coral;
    }
  </style>
 </head>

 <body>
    <header>
        <div>
        <a href="../PHP/index.php"><h1><b>Bruma</b></h1></a>
        </div>

        <div id="barraPesquisa">
            <label for="pesquisar">Encontre no site:</label>
            <input type="search" id="pesquisar" name="pesquisar">
            <input type="submit" value="Pesquisar">
        </div>

        <div id="navbar">
            <a href="">Clínicas</a>
            <a href="">Profissionais</a>
            <a href="">Agendamentos</a>
            <a href="">Sobre Nós</a>
        </div>

        <div id="escolhaCliente">
            <input type="button" name="" value="Login"
            onclick="window.location.href='../BD/cadastroUser.php'">
            <input type="button" name="" id="" value="Agende"
            onclick="window.location.href=''">
        </div>
    </header>
 </body>
 </html>

<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Bruma - Plataforma de Estética</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f1f7ff;
    }
    header {
      background-color: #a086caff;
      color: white;
      padding: 10px 0;
      text-align: center;
    }
    main {
      padding: 20px;
    }
    fieldset {
      border: 1px solid #200d75ff;
      padding: 10px;
      margin-bottom: 20px;
      background-color: #c9d0d3ff;
    }
    #password_confirm {
      margin-bottom: 20px;
    background-color: #e8eceeff;  
    }
</style>
</head>
<body>
  <header>
    <h1>Bruma - Plataforma de Estética</h1>
    <img src="TCC_BRUMA/Assets/IMG/bannerPrincipal.png" alt="banner principal" width="80" height="80">
  </header>
</body>
</html> !-->
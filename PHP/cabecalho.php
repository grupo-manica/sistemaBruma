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

    button{
        background-color: #fff;
        color: black;
        padding: 08px 50px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }
  </style>
 </head>

 <body>
    <header>
        <div id="logo">
        <a href="../PHP/index.php"><h1><b>BRUMA</b></h1></a>
        </div>

        <div id="navbar">
            <a href="">Clínicas</a>
            <a href="">Serviços</a>
            <a href="">Sobre Nós</a>
        </div>

        <div id="login">
            <button href="../BD/principal.php">Entrar</button>
        </div>
    </header>
 </body>
 </html>
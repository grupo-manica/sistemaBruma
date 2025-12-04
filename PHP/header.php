<html>
<head>
    <title></title>
    <style>
        * {
            box-sizing: border-box;
            text-decoration: none;
            color: black;
        }

        .styleHeader {
            color: black;
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            font-size: 15px;
            flex-wrap: wrap;
            background-color: #fff;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            margin: 0; padding: 0;
        }

        .navbar {
            align-items: first baseline;
            display: flex;
            gap: 2em;
            font-size: 14px;
        }

        .header label {
            display: block;
            font: 1rem "Fira Sans", sans-serif;    
        }

        .navbar input, label {
            margin: 0.4rem 0;
        }

        a:hover {
            color: coral;
        }

        .buttonEntrar{
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
    <header class="styleHeader" style="background-color: #fff">
        <div class="logo">
        <a href="index.php"><h1><b>BRUMA</b></h1></a>
        </div>

        <div class="navbar">
            <a href="#clinicas">Clínicas</a>
            <a href="#servicos">Serviços</a>
            <a href="#sobre">Sobre Nós</a>
        </div>

        <div class="login">
            <input type="button" class="buttonEntrar" value="Entrar" onclick="window.location.href='principal.php'">
        </div>
    </header>
 </body>
 </html>